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

Route::get('/behavior', function () {
    return view('behavior');
});
Route::post('/behavior', [behaviorController::class, 'behavior'])->name('behavior');
Route::get('/educator_violation', function () {
    return view('educator_violation');
});
