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


