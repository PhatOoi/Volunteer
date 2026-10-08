<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Volunteer\ActivityController;
use App\Http\Controllers\Volunteer\DashboardController;
use App\Http\Controllers\Volunteer\HistoryController;
use App\Http\Controllers\Volunteer\MyActivityController;
use App\Http\Controllers\Volunteer\NotificationController;
use App\Http\Controllers\Volunteer\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route cũ của Laravel (trang welcome) - giữ lại
Route::get('/welcome', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| TRANG CHỦ + ĐĂNG NHẬP / ĐĂNG KÝ
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

/*
|--------------------------------------------------------------------------
| KHU VỰC TÌNH NGUYỆN VIÊN  (/volunteer/...)
|--------------------------------------------------------------------------
*/
Route::prefix('volunteer')->name('volunteer.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/activities', [ActivityController::class, 'index'])->name('activities');
    Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
    Route::get('/activities/{id}/register', [ActivityController::class, 'registerForm'])->name('activities.register');
    Route::post('/activities/{id}/register', [ActivityController::class, 'storeRegistration'])->name('activities.register.store');

    Route::get('/my-activities', [MyActivityController::class, 'index'])->name('my-activities');
    Route::post('/my-activities/cancel', [MyActivityController::class, 'cancel'])->name('my-activities.cancel');

    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
});

/*
|--------------------------------------------------------------------------
| KHU VỰC QUẢN TRỊ  (/admin/...)  - giữ nguyên, không thuộc phần việc của bạn
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/volunteers', 'admin.placeholder', ['title' => 'Quản lý tình nguyện viên'])->name('volunteers');
    Route::view('/activities', 'admin.placeholder', ['title' => 'Quản lý hoạt động'])->name('activities');
    Route::view('/registrations', 'admin.placeholder', ['title' => 'Quản lý đăng ký'])->name('registrations');
    Route::view('/attendance', 'admin.placeholder', ['title' => 'Điểm danh'])->name('attendance');
    Route::view('/notifications', 'admin.placeholder', ['title' => 'Thông báo'])->name('notifications');
    Route::view('/reports', 'admin.placeholder', ['title' => 'Báo cáo / Thống kê'])->name('reports');
    Route::view('/settings', 'admin.placeholder', ['title' => 'Cài đặt'])->name('settings');
});