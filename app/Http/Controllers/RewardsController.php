<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;

class RewardsController extends Controller
{
    public function index()
    {
        $rewards = Reward::orderBy('created_at', 'desc')->get();
        return view('educator.rewards', compact('rewards'));
    }

    public function create()
    {
        return view('educator.add_reward');
    }

    public function pending()
    {
        // Logic for pending rewards
        return view('rewards.pending');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'reward_type' => 'required|string',
            'points' => 'required|integer|min:1',
            'description' => 'required|string'
        ]);

        // Add logic to store the reward in the database
        // For now, just redirect with success message
        return redirect()->route('rewards')->with('success', 'Reward added successfully');
    }

    public function generateMonthlyPoints()
    {
        // Get all students
        $students = \App\Models\Student::all();
        
        // Get current month and year
        $currentMonth = now()->format('Y-m');
        
        foreach ($students as $student) {
            // Check if points were already generated for this month
            $existingPoints = \App\Models\Reward::where('student_name', $student->name)
                ->where('reward_type', 'monthly_points')
                ->where('created_at', 'like', $currentMonth . '%')
                ->first();
            
            if (!$existingPoints) {
                // Create new reward entry for monthly points
                \App\Models\Reward::create([
                    'student_name' => $student->name,
                    'reward_type' => 'monthly_points',
                    'points' => 100,
                    'description' => 'Monthly points for ' . now()->format('F Y')
                ]);
            }
        }
        
        return redirect()->route('rewards')->with('success', 'Monthly points generated successfully for all students');
    }
}
