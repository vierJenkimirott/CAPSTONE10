<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Violation;

class EducatorController extends Controller
{
    public function addViolator()
    {
        try {
            $students = DB::table('users')
                ->join('student_details', 'users.user_id', '=', 'student_details.user_id')
                ->where('users.role', 'student')
                ->where('users.status', 'active')
                ->select('users.fname', 'users.lname', 'student_details.student_id')
                ->orderBy('users.lname')
                ->get();

            $offenseCategories = DB::table('offense_categories')
                ->select('id', 'category_name')
                ->orderBy('category_name')
                ->get();

            \Log::info('Students found: ' . $students->count());
            \Log::info('Students data: ' . $students->toJson());

            if ($students->isEmpty()) {
                $students = collect(); // Return empty collection if no students found
            }

            return view('educator.educator_add_violator', [
                'students' => $students,
                'offenseCategories' => $offenseCategories
            ]);
        } catch (Exception $e) {
            // Log the error and return with empty collections
            \Log::error('Error fetching data: ' . $e->getMessage());
            return view('educator.educator_add_violator', [
                'students' => collect(),
                'offenseCategories' => collect()
            ]);
        }
    }

    public function getViolationTypes($categoryId)
    {
        try {
            $violationTypes = DB::table('violation_types')
                ->where('offense_category_id', $categoryId)
                ->select('id', 'violation_name as name', 'default_penalty')
                ->orderBy('violation_name')
                ->get();

            // Add severity information based on default_penalty
            $violationTypes = $violationTypes->map(function ($type) {
                $type->severity = $this->getSeverityFromPenalty($type->default_penalty);
                return $type;
            });

            return response()->json($violationTypes);
        } catch (Exception $e) {
            \Log::error('Error fetching violation types: ' . $e->getMessage());
            return response()->json([], 500);
        }
    }

    public function getByCategory($categoryId)
    {
        $violationTypes = DB::table('violation_types')
            ->where('offense_category_id', $categoryId)
            ->select('id', 'violation_name as name', 'default_penalty')
            ->get();

        $violationTypes = $violationTypes->map(function ($type) {
            $type->severity = $this->getSeverityFromPenalty($type->default_penalty);
            return $type;
        });

        return response()->json($violationTypes);
    }

    private function getSeverityFromPenalty($penalty)
    {
        switch ($penalty) {
            case 'W':
                return 'Low';
            case 'VW':
                return 'Medium';
            case 'WW':
                return 'High';
            case 'Exp':
                return 'Very High';
            default:
                return 'Low';
        }
    }

    public function storeViolator(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'student_id' => 'required',
                'violation_date' => 'required|date',
                'violation_type_id' => 'required',
                'severity' => 'required',
                'offense' => 'required',
                'penalty' => 'required',
                'consequence' => 'required'
            ]);

            // Insert into violations table
            $violationId = DB::table('violations')->insertGetId([
                'student_id' => $validated['student_id'],
                'violation_date' => $validated['violation_date'],
                'violation_type_id' => $validated['violation_type_id'],
                'severity' => $validated['severity'],
                'offense' => $validated['offense'],
                'penalty' => $validated['penalty'],
                'consequence' => $validated['consequence'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Violation recorded successfully',
                'violation_id' => $violationId
            ]);

        } catch (Exception $e) {
            \Log::error('Error storing violation: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error recording violation: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showStudentViolations() {
        $violations = Violation::with('student')->get();
        return view('educator.show_student_violations', compact('violations'));
    }

    public function showViolations()
    {
        // Fetch all violations from the database with their relationships
        $violations = Violation::with(['student', 'violationType', 'offenseCategory'])->get();

        // Pass the violations to the view
        return view('educator.educator-violation', compact('violations'));
    }

    public function storeViolationType(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'violation_name' => 'required|string|max:500',
                'category' => 'required|string',
                'severity' => 'required|string',
                'offense' => 'required|string',
                'penalty' => 'required|string'
            ]);

            // Get the offense category ID
            $category = DB::table('offense_categories')
                ->where('category_name', $validated['category'])
                ->first();

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid category selected'
                ], 400);
            }

            // Insert into violation_types table
            $violationTypeId = DB::table('violation_types')->insertGetId([
                'offense_category_id' => $category->id,
                'violation_name' => $validated['violation_name'],
                'default_penalty' => $this->getPenaltyCode($validated['penalty']),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Violation type added successfully',
                'violation_type_id' => $violationTypeId
            ]);

        } catch (Exception $e) {
            \Log::error('Error storing violation type: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error adding violation type: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getPenaltyCode($penalty)
    {
        switch ($penalty) {
            case 'warning':
                return 'W';
            case 'verbal':
                return 'VW';
            case 'written':
                return 'WW';
            case 'probation':
                return 'Pro';
            case 'expulsion':
                return 'Exp';
            default:
                return 'W';
        }
    }

    public function getViolationFormData()
    {
        try {
            $categories = DB::table('offense_categories')
                ->select('id', 'category_name')
                ->orderBy('category_name')
                ->get();

            $severities = ['Low', 'Medium', 'High', 'Very High'];
            $offenses = ['1st', '2nd', '3rd'];
            $penalties = [
                ['value' => 'warning', 'label' => 'Warning'],
                ['value' => 'verbal', 'label' => 'Verbal Warning'],
                ['value' => 'written', 'label' => 'Written Warning'],
                ['value' => 'probation', 'label' => 'Probation'],
                ['value' => 'expulsion', 'label' => 'Expulsion']
            ];

            return response()->json([
                'success' => true,
                'data' => [
                    'categories' => $categories,
                    'severities' => $severities,
                    'offenses' => $offenses,
                    'penalties' => $penalties
                ]
            ]);
        } catch (Exception $e) {
            \Log::error('Error fetching violation form data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching form data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getViolationTypesList()
    {
        try {
            $violationTypes = DB::table('violation_types')
                ->join('offense_categories', 'violation_types.offense_category_id', '=', 'offense_categories.id')
                ->select('violation_types.id', 'violation_types.violation_name', 'offense_categories.category_name')
                ->orderBy('violation_types.violation_name')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $violationTypes
            ]);
        } catch (Exception $e) {
            \Log::error('Error fetching violation types list: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching violation types: ' . $e->getMessage()
            ], 500);
        }
    }

    public function viewViolation($id)
    {
        try {
            $violation = Violation::with(['student', 'violationType', 'offenseCategory'])
                ->findOrFail($id);

            return view('educator.view_violation', compact('violation'));
        } catch (Exception $e) {
            \Log::error('Error viewing violation: ' . $e->getMessage());
            return redirect()->route('educator-violation')
                ->with('error', 'Error viewing violation: ' . $e->getMessage());
        }
    }

    public function editViolation($id)
    {
        try {
            $violation = Violation::with(['student', 'violationType', 'offenseCategory'])
                ->findOrFail($id);

            $students = DB::table('users')
                ->join('student_details', 'users.user_id', '=', 'student_details.user_id')
                ->where('users.role', 'student')
                ->where('users.status', 'active')
                ->select('users.fname', 'users.lname', 'student_details.student_id')
                ->orderBy('users.lname')
                ->get();

            $offenseCategories = DB::table('offense_categories')
                ->select('id', 'category_name')
                ->orderBy('category_name')
                ->get();

            return view('educator.edit_violation', compact('violation', 'students', 'offenseCategories'));
        } catch (Exception $e) {
            \Log::error('Error editing violation: ' . $e->getMessage());
            return redirect()->route('educator-violation')
                ->with('error', 'Error editing violation: ' . $e->getMessage());
        }
    }

    public function updateViolation(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'student_id' => 'required',
                'violation_date' => 'required|date',
                'violation_type_id' => 'required',
                'severity' => 'required',
                'offense' => 'required',
                'penalty' => 'required',
                'consequence' => 'required'
            ]);

            $violation = Violation::findOrFail($id);
            $violation->update([
                'student_id' => $validated['student_id'],
                'violation_date' => $validated['violation_date'],
                'violation_type_id' => $validated['violation_type_id'],
                'severity' => $validated['severity'],
                'offense' => $validated['offense'],
                'penalty' => $validated['penalty'],
                'consequence' => $validated['consequence'],
                'updated_at' => now()
            ]);

            return redirect()->route('educator-violation')
                ->with('success', 'Violation updated successfully');
        } catch (Exception $e) {
            \Log::error('Error updating violation: ' . $e->getMessage());
            return redirect()->route('educator-violation')
                ->with('error', 'Error updating violation: ' . $e->getMessage());
        }
    }
}