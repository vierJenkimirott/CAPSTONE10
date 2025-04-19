<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// <<<<<<< new/violation-features
// =======

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::get('/', function (){
// //     return view('staff');
// // }); 
// >>>>>>> main

Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [LoginController::class, 'dashboard'])->name('staff-dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/behavior', [behaviorController::class, 'behavior'])->name('behavior');
Route::post('/behavior', [behaviorController::class, 'behavior']);
Route::get('/student-manual', function () {
    return view('student-manual'); // or your correct view path
})->name('student.manual');



Route::get('/behavior', function () {
    return view('behavior');
});
Route::post('/behavior', [behaviorController::class, 'behavior'])->name('behavior');
Route::get('/educator_addViolatior', function () {
    return view('educator_addViolator');
});


Route::get('/educator_violation', function () {
    return view('educator_violation');
});


use App\Http\Controllers\ViolationController;

Route::get('/add-violation', [ViolationController::class, 'addViolation']);

Route::get('/add-violator', [ViolationController::class, 'addViolator']);
Route::get('/violation-history', [ViolationController::class, 'violationHistory']);
