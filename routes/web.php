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

// =============================================
// Default Route
// =============================================
Route::get('/', function () {
    return redirect()->route('login');
});

// =============================================
// Authentication Routes
// =============================================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =============================================
// Student Routes
// =============================================
Route::get('/student_login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('/student_login', [StudentController::class, 'processLogin']);
Route::get('/student_account', [StudentController::class, 'account'])->name('student.account');
Route::post('/student_logout', [StudentController::class, 'logout'])->name('student.logout');
Route::get('/student_violation', [StudentController::class, 'violation'])->name('student.violation');
Route::get('/student_behavior', [StudentController::class, 'behavior'])->name('student.behavior');
Route::get('/student_reward', [StudentController::class, 'reward'])->name('student.reward');
Route::get('/student_earn_points', [StudentController::class, 'earnPoints'])->name('student.earn_points');
Route::get('/student_redemption', [StudentController::class, 'redemption'])->name('student.redemption');

// =============================================
// Notification Routes
// =============================================
Route::get('/student_notification', [NotificationController::class, 'index'])->name('notification');

// =============================================
// Staff Routes
// =============================================
Route::get('/staff-login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff-login', [LoginController::class, 'processLogin']);
Route::get('/staff-dashboard', [EducatorController::class, 'dashboard'])->name('staff-dashboard');
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


// =============================================

// Admin Routes
// =============================================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/manage_student', [DashboardController::class, 'manageStudents'])->name('admin.manage_student');
Route::get('/manage_educator', [DashboardController::class, 'manageEducators'])->name('admin.manage_educator');
Route::get('/create_user', [UserController::class, 'create'])->name('admin.create_user'); 
Route::post('/create_user', [UserController::class, 'store'])->name('admin.create_user.store');

// =============================================
// Behavior Routes
// =============================================
Route::get('/behavior', [BehaviorController::class, 'showBehavior'])->name('behavior');


Route::get('/student-manual', [StudentManualController::class, 'index'])->name('student-manual');

// =============================================
// Student Manual Routes
// =============================================
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

Route::get('/educator-violation', [App\Http\Controllers\EducatorController::class, 'showViolations'])->name('educator-violation');

// =============================================
// Educator Routes
// =============================================
// Violation Management
Route::get('/educator-violation', [EducatorController::class, 'violations'])->name('educator-violation');

Route::get('/educator_add_violation', function () {
    return view('educator.educator_add_violation');
})->name('educator_add_violation');
Route::get('/educator_add_violator', [EducatorController::class, 'addViolator'])->name('educator_add_violator');

// Violation Type Management
Route::get('/violation-types/{categoryId}', [EducatorController::class, 'getViolationTypes'])->name('educator.violation-types');
Route::post('/violation-type', [EducatorController::class, 'storeViolationType'])->name('educator.add-violation-type');

// Violation Form and Data
Route::get('/educator/violation-form-data', [EducatorController::class, 'getViolationFormData'])->name('educator.violation-form-data');
Route::post('/educator/add-violator', [EducatorController::class, 'storeViolator'])->name('educator.add-violator');

// Student Penalty Management
Route::get('/educator/students-by-penalty', [EducatorController::class, 'studentsByPenalty'])->name('educator.students-by-penalty');
Route::get('/educator/students-by-penalty/{penalty}', [EducatorController::class, 'studentsByPenalty'])->name('educator.students-by-penalty');

// Violation Statistics
Route::get('/educator/violation-stats', [EducatorController::class, 'getViolationStatsByPeriod'])->name('educator.violation-stats');

// Violation View and Edit
Route::get('/educator/violation/{id}', [EducatorController::class, 'viewViolation'])->name('educator_view_violation');
Route::get('/educator/violation/{id}/edit', [EducatorController::class, 'editViolation'])->name('educator_edit_violation');
Route::put('/educator/violation/{id}', [EducatorController::class, 'updateViolation'])->name('educator_update_violation');



// =============================================
// Rewards Routes
// =============================================
Route::get('/rewards', [RewardsController::class, 'index'])->name('rewards');
Route::get('/rewards/add', [RewardsController::class, 'create'])->name('rewards.add');
Route::get('/rewards/pending', [RewardsController::class, 'pending'])->name('rewards.pending');
Route::post('/rewards', [RewardsController::class, 'store'])->name('rewards.store');


