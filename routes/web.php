<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\BehaviorController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EducatorController;
use App\Http\Controllers\StudentManualController;


Route::get('/student_login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('/student_login', [StudentController::class, 'processLogin']);
Route::get('/student_account', [StudentController::class, 'account'])->name('student.account');
Route::post('/student_logout', [StudentController::class, 'logout'])->name('student.logout');
Route::get('/student_violation', [StudentController::class, 'violation'])->name('student.violation');
Route::get('/student_behavior', [StudentController::class, 'behavior'])->name('student.behavior');
Route::get('/student_reward', [StudentController::class, 'reward'])->name('student.reward');
Route::get('/student_earn_points', [StudentController::class, 'earnPoints'])->name('student.earn_points');
Route::get('/student_redemption', [StudentController::class, 'redemption'])->name('student.redemption');

Route::get('/student_notification', [NotificationController::class, 'index'])->name('notification');

// Staff Routes
Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [LoginController::class, 'dashboard'])->name('staff-dashboard');
Route::post('/staff_logout', [LoginController::class, 'logout'])->name('logout');

// Rewards Routes
Route::get('/rewards', [RewardsController::class, 'index'])->name('rewards');
Route::get('/rewards/add', [RewardsController::class, 'create'])->name('rewards.add');
Route::get('/rewards/pending', [RewardsController::class, 'pending'])->name('rewards.pending');
Route::post('/rewards', [RewardsController::class, 'store'])->name('rewards.store');
Route::post('/rewards/generate-monthly-points', [RewardsController::class, 'generateMonthlyPoints'])->name('rewards.generate-monthly-points');
Route::get('/rewards/{reward}/edit', [RewardsController::class, 'edit'])->name('rewards.edit');
Route::put('/rewards/{reward}', [RewardsController::class, 'update'])->name('rewards.update');
Route::delete('/rewards/{reward}', [RewardsController::class, 'destroy'])->name('rewards.destroy');

// Admin Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/manage_student', [DashboardController::class, 'manageStudents'])->name('admin.manage_student');
Route::get('/manage_educator', [DashboardController::class, 'manageEducators'])->name('admin.manage_educator');
Route::get('/create_user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.create_user'); 
Route::post('/create_user', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.create_user.store');

// Behavior Routes
Route::get('/behavior', [BehaviorController::class, 'behavior'])->name('behavior');
Route::post('/behavior', [BehaviorController::class, 'behavior']);

Route::get('/behavior', function (){
    return view('educator.behavior');
})->name('behavior');

Route::get('/student-manual', [StudentManualController::class, 'index'])->name('student-manual');

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

Route::get('/educator-violation', [App\Http\Controllers\EducatorController::class, 'showViolations'])->name('educator-violation');

Route::get('/educator_add_violation', function () {
    return view('educator.educator_add_violation');
})->name('educator_add_violation');
Route::get('/educator_add_violator', [App\Http\Controllers\EducatorController::class, 'addViolator'])->name('educator_add_violator');
Route::get('/educator/violation-types/{categoryId}', [App\Http\Controllers\EducatorController::class, 'getViolationTypes'])->name('educator.violation-types');
Route::post('/educator/add-violator', [App\Http\Controllers\EducatorController::class, 'storeViolator'])->name('educator.add-violator');

Route::post('/educator/add-violation-type', [EducatorController::class, 'storeViolationType'])->name('educator.add-violation-type');

// Violation View and Edit Routes
Route::get('/educator/violation/{id}', [App\Http\Controllers\EducatorController::class, 'viewViolation'])->name('educator_view_violation');
Route::get('/educator/violation/{id}/edit', [App\Http\Controllers\EducatorController::class, 'editViolation'])->name('educator_edit_violation');
Route::put('/educator/violation/{id}', [App\Http\Controllers\EducatorController::class, 'updateViolation'])->name('educator_update_violation');

