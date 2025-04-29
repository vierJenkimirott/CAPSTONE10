<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViolationController extends Controller
{

    public function addViolator()
{
    return view('educator.add_violator');
}


    public function addViolation()
    {
        return view('educator.add_violation'); 
    }

    public function violationHistory()
    {
        return view('violation.history'); // resources/views/violation/history.blade.php
    }

}
