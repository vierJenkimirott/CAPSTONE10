<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Notification;

class StudentController extends Controller
{
    protected $unreadCount = 0;

    public function __construct()
    {
        try {
            if (Auth::check()) {
                $this->unreadCount = Notification::where('user_id', Auth::id())
                    ->where('is_read', false)
                    ->count();
            }
        } catch (\Exception $e) {
            // If there's any error (like table doesn't exist), set count to 0
            $this->unreadCount = 0;
        }
        
        View::share('unreadCount', $this->unreadCount);
    }

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

    public function logout(){
        Auth::logout();
        return redirect()->route('student.login');
    }

    public function account()
    {
        $user = Auth::user();
        return view('student.student_account', compact('user'));
    }

    public function violation()
    {
        $violations = collect(); // Create an empty collection
        return view('student.student_violation', compact('violations'));
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
        // You can add logic to handle redemption here
        return view('student.student_redemption');
    }
}
