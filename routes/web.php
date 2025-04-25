<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RewardsController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/violations', function () {
    return view('violations');
})->name('violations');

Route::get('/behavior', function () {
    return view('behavior');
})->name('behavior');

Route::get('/rewards', [RewardsController::class, 'index'])->name('rewards');
Route::get('/rewards/add', [RewardsController::class, 'create'])->name('rewards.add');
Route::get('/rewards/pending', [RewardsController::class, 'pending'])->name('rewards.pending');
Route::post('/rewards', [RewardsController::class, 'store'])->name('rewards.store');

