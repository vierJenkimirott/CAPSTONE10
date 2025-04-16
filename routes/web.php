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
Route::get('/student-manual', )
Route::get('/student-manual', function () {
    return view('student-manual'); // or your correct view path
})->name('student.manual');



