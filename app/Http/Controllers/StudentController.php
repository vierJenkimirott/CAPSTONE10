<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function account()
    {
        $user = Auth::user();
        return view('student.student_account', compact('user'));
    }

    public function violation()
    {
        // You can add logic to fetch student violations here
        return view('student.student_violation');
    }

    public function behavior()
    {
        // You can add logic to fetch student behavior records here
        return view('student.student_behavior');
    }

    public function reward()
    {
        // You can add logic to fetch student rewards here
        return view('student.student_reward');
    }

    public function earnPoints()
    {
        // You can add logic to handle earning points here
        return view('student.student_earn_points');
    }

    public function redemption()
    {
        // You can add logic to handle reward redemption here
        return view('student.student_redemption');
    }
}
