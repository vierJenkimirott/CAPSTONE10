<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showLoginForm (){
        return view ('student.student_login');
    }

    public function processLogin (Request $request){
        $request->validate([
            'id'=> ['required', 'regex:/^20\d{2}[0-9]{2}[0-9]{4}C[0-9A-Za-z]{1}$/'],
            'password' => 'required|min:5',
        ]);

        $validID = '2024010001C1';
        $validPassword = '12345';

        if ($request->id === $validID && $request->password === $validPassword) {
            Auth::loginUsingId(1);

            return redirect()->route('student.account');
        }

        return back()->withErrors(['id'=>'Invalid credentials']);
    }

    public function account(){
        return view('student.student_account');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('student.login');
    }
}
