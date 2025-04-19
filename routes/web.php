<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BehaviorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StudentController;

// <<<<<<< new/violation-features
// =======

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::get('/', function (){  
// //     return view('staff');
// // }); 
// >>>>>>> main


//ADMIN ROUTES
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/manage_student', [DashboardController::class, 'manageStudents'])->name('admin.manage_student');
    Route::get('/manage_educator', [DashboardController::class, 'manageEducators'])->name('admin.manage_educator');
    
    // User Management Routes
    Route::get('/create_user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.create_user'); 
    Route::post('/create_user', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.create_user.store');


//STUDENT ROUTES
Route::get('/student_account', [StudentController::class, 'account'])->name('student.student_account');
Route::get('/student_violation', [StudentController::class, 'violation'])->name('student.student_violation');
Route::get('/student_behavior', [StudentController::class, 'behavior'])->name('student.student_behavior');
Route::get('/student_reward', [StudentController::class, 'reward'])->name('student.student_reward');
Route::get('/student_earn_points', [StudentController::class, 'earnPoints'])->name('student.student_earn_points');
Route::get('/student_redemption', [StudentController::class, 'redemption'])->name('student.student_redemption');

Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [LoginController::class, 'dashboard'])->name('staff-dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/behavior', [BehaviorController::class, 'behavior'])->name('behavior');
Route::post('/behavior', [BehaviorController::class, 'behavior']);
Route::get('/student-manual', function () {
    return view('student-manual');
})->name('student.manual');



