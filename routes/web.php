<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BehaviorController;
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

Route::get('/student_login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('/student_login', [StudentController::class, 'processLogin']);
Route::get('/student_account', [StudentController::class, 'account'])->name('student.account');
Route::post('/student_logout', [StudentController::class, 'logout'])->name('student.logout');

Route::get('/student_violation', [StudentController::class, 'violation'])->name('student.violation');

Route::get('/student_behavior', function () {
    return view('student.student_behavior');
})->name('student.behavior');

Route::get('/student_reward', function () {
    return view('student.student_reward');
})->name('student.reward');

Route::get('/student_earn_points', function () {
    return view('student.student_earn_points');
})->name('student.earn_points');

Route::get('/student_redemption', function () {
    return view('student.student_redemption');
})->name('student.redemption');

Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff.login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [LoginController::class, 'dashboard'])->name('staff-dashboard');
Route::post('/staff_logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/behavior', [BehaviorController::class, 'behavior'])->name('behavior');
Route::post('/behavior', [BehaviorController::class, 'behavior']);

Route::get('/behavior', function (){
    return view('educator.behavior');
})->name('behavior');

Route::get('/student-manual', function () {
    return view('student-manual');

})->name('student-manual');

Route::get('/student-manual/general-behavior', function () {
    return view('student-manual.general-behavior');
})->name('student-manual.general-behavior');

Route::get('/student-manual/schedules', function () {
    return view('student-manual.schedules');
})->name('student-manual.schedules');

Route::get('/student-manual/room-rules', function () {
    return view('student-manual.room-rules');
})->name('student-manual.room-rules');

Route::get('/student-manual/dress-code', function () {
    return view('student-manual.dress-code');
})->name('student-manual.dress-code');

Route::get('/student-manual/equipment', function () {
    return view('student-manual.equipment');
})->name('student-manual.equipment');

Route::get('/student-manual/center-tasking', function () {
    return view('student-manual.center-tasking');
})->name('student-manual.center-tasking');

Route::get('/educator-violation', function () {
    return view('educator.educator-violation');
})->name('educator-violation');

Route::get('/educator_add_violation', function () {
    return view('educator.educator_add_violation');
})->name('educator_add_violation');

Route::get('/educator_add_violator', function () {
    return view('educator.educator_add_violator');
})->name('educator_add_violator');


