<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm (){
        return view ('staff-login');
    }

    public function processLogin (Request $request){
        $request->validate([
            '$email->required|email',
            '$password->required|min:25',
        ]);

        $validEmail = 'jenvier@gmail.com';
        $validPassword = '123456';

        if($request->email == $validEmail && $request->password == $validPassword){
            return redirect()->route('staff-dashboard')->with('success', 'Login Successfully!');
        }

        return back()->withErrors(['email'=>'Invalid credentials']);
    }

    public function dashboard(){
        return view('staff-dashboard');
    }
}
