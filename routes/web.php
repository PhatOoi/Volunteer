<?php

use App\Support\DemoData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route cũ của Laravel (trang welcome) - giữ lại, đổi sang /welcome để nhường '/' cho trang chủ.
Route::get('/welcome', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| TRANG CHỦ + ĐĂNG NHẬP / ĐĂNG KÝ
|--------------------------------------------------------------------------
| Giai đoạn 2: các route POST chỉ để DEMO giao diện (chưa kiểm tra tài khoản thật).
| Giai đoạn 5 sẽ thay bằng Controller + Authentication thật.
*/
Route::get('/', function () {
    // Lấy 3 hoạt động đầu tiên làm "hoạt động nổi bật"
    return view('home.index', ['featured' => array_slice(DemoData::activities(), 0, 3)]);
})->name('home');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', function () {
    return redirect()->route('volunteer.dashboard');
})->name('login.submit');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', function () {
    return redirect()->route('login')->with('success', 'Đăng ký thành công (bản demo)! Hãy đăng nhập.');
})->name('register.submit');

Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::post('/forgot-password', function () {
    return back()->with('success', 'Nếu email tồn tại, chúng tôi đã gửi hướng dẫn đặt lại mật khẩu (bản demo).');
})->name('password.email');

/*
|--------------------------------------------------------------------------
| KHU VỰC TÌNH NGUYỆN VIÊN  (/volunteer/...)
|--------------------------------------------------------------------------
| Giai đoạn 3: dữ liệu lấy từ DemoData (giả). Các route POST chỉ để demo,
| giai đoạn 5 sẽ chuyển vào Controller và lưu vào database.
*/
Route::prefix('volunteer')->name('volunteer.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        // 3 hoạt động nổi bật: id 2, 3, 5
        $featured = array_values(array_filter(DemoData::activities(), fn ($a) => in_array($a['id'], [2, 3, 5])));

        return view('volunteer.dashboard', [
            'user' => DemoData::user(),
            'stats' => DemoData::stats(),
            'upcoming' => DemoData::myRegistrations(),
            'featured' => $featured,
        ]);
    })->name('dashboard');

    // Hồ sơ cá nhân
    Route::get('/profile', function () {
        return view('volunteer.profile', ['user' => DemoData::user(), 'stats' => DemoData::stats()]);
    })->name('profile');
    Route::post('/profile', function () {
        return redirect()->route('volunteer.profile')->with('success', 'Đã lưu hồ sơ (bản demo, chưa lưu vào database).');
    })->name('profile.update');

    // Danh sách hoạt động (có tìm kiếm + lọc)
    Route::get('/activities', function (Request $request) {
        return view('volunteer.activities', [
            'activities' => DemoData::searchActivities($request->q, $request->category, $request->location, $request->time),
            'categories' => DemoData::categories(),
            'locations' => DemoData::locations(),
            'months' => DemoData::months(),
        ]);
    })->name('activities');

    // Chi tiết hoạt động + đăng ký
    Route::get('/activities/{id}', function ($id) {
        $activity = DemoData::activity((int) $id);
        abort_if(!$activity, 404);   // không có hoạt động này thì báo 404

        return view('volunteer.activity-detail', [
            'activity' => $activity,
            'isRegistered' => in_array($activity['id'], DemoData::registeredIds()),
        ]);
    })->name('activities.show');
    Route::post('/activities/{id}/register', function ($id) {
        return redirect()->route('volunteer.my-activities')->with('success', 'Đăng ký thành công (bản demo)! Vui lòng chờ ban tổ chức duyệt.');
    })->name('activities.register');

    // Hoạt động của tôi
    Route::get('/my-activities', function () {
        return view('volunteer.my-activities', ['registrations' => DemoData::myRegistrations()]);
    })->name('my-activities');
    Route::post('/my-activities/cancel', function () {
        return back()->with('success', 'Đã hủy đăng ký (bản demo).');
    })->name('my-activities.cancel');

    // Lịch sử + Thông báo
    Route::get('/history', function () {
        return view('volunteer.history', ['history' => DemoData::history(), 'stats' => DemoData::stats()]);
    })->name('history');
    Route::get('/notifications', function () {
        return view('volunteer.notifications', ['notifications' => DemoData::notifications()]);
    })->name('notifications');
});

/*
|--------------------------------------------------------------------------
| KHU VỰC QUẢN TRỊ  (/admin/...)
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