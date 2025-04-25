<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Educator;

class DashboardController extends Controller
{
    // Removed duplicate index method

    public function manageStudents()
    {
        return view('admin.manage_student');
    }

    public function manageEducators()
    {
        return view('admin.manage_educator');
    }

    public function index()
    {
        // Fetch the total number of students and educators from the database
        $totalStudents = Student::count();
        $totalEducators = Educator::count();

        // Pass the data to the admin dashboard view
        return view('admin.dashboard', compact('totalStudents', 'totalEducators'));
    }
}
