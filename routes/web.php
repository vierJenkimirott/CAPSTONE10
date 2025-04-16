<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function (){
//     return view('staff');
// }); 

Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [LoginController::class, 'dashboard'])->name('staff-dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/student-manual', function () {
    return view('student-manual'); // or your correct view path
})->name('student.manual');


