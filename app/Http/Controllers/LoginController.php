<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm (){
        return view ('educator.staff-login');
    }

    public function processLogin (Request $request){
        $request->validate([
            'id'=> ['required', 'regex:/^(admin|20\d{2}[0-9]{2}[0-9]{4}C[0-9A-Za-z]{1})$/'],
            'password' => 'required|min:5',
        ]);

        $validID = 'admin';
        $validPassword = '12345';

        if ($request->id === $validID && $request->password === $validPassword) {
            Auth::loginUsingId(1);

            return redirect()->route('staff-dashboard');
        }

        return back()->withErrors(['id'=>'Invalid credentials']);
    }

    public function dashboard(){
        return view('educator.staff-dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('staff-login');
    }
}
