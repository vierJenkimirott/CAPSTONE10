<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BehaviorController;

// <<<<<<< new/violation-features
// =======

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::get('/', function (){  
// //     return view('staff');
// // }); 
// >>>>>>> main

// STUDENT ROUTES
// Route::get('/student_account', function () {
//     return view('student.student_account'); 
// });

// Route::get('/student_violation', function () {
//     return view('student.student_violation'); 
// });

// Route::get('/student_behavior', function () {
//     return view('student.student_behavior'); 
// });

// Route::get('/student_reward', function () {
//     return view('student.student_reward'); 
// });

Route::get('/student_account', function () {
    return view('student.student_account');
})->name('student.student_account');

Route::get('/student_violation', function () {
    return view('student.student_violation');
})->name('student.student_violation');

Route::get('/student_behavior', function () {
    return view('student.student_behavior');
})->name('student.student_behavior');

Route::get('/student_reward', function () {
    return view('student.student_reward');
})->name('student.student_reward');

Route::get('/student_earn_points', function () {
    return view('student.student_earn_points');
})->name('student.student_earn_points');

Route::get('/student_redemption', function () {
    return view('student.student_redemption');
})->name('student.student_redemption');



Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [LoginController::class, 'dashboard'])->name('staff-dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/behavior', [BehaviorController::class, 'behavior'])->name('behavior');
Route::post('/behavior', [BehaviorController::class, 'behavior']);
Route::get('/student-manual', function () {
    return view('student-manual');
})->name('student.manual');



