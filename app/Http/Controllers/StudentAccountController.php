<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentAccountController extends Controller
{
    public function index()
    {
        // Get the authenticated student
        $student = Auth::user();
        
        return view('student.account', compact('student'));
    }
} 