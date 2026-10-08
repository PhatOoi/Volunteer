<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Support\DemoData;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Danh sách hoạt động (có tìm kiếm + lọc)
    public function index(Request $request)
    {
        // TODO (khi có database):
        // $activities = Activity::filter($request->q, $request->category, $request->location, $request->time)->get();
        $activities = DemoData::searchActivities($request->q, $request->category, $request->location, $request->time);
        $categories = DemoData::categories();
        $locations = DemoData::locations();
        $months = DemoData::months();

        return view('volunteer.activities', compact('activities', 'categories', 'locations', 'months'));
    }

    // Chi tiết hoạt động
    public function show($id)
    {
        $activity = DemoData::activity((int) $id);   // TODO: Activity::findOrFail($id)
        abort_if(!$activity, 404);

        $isRegistered = in_array($activity['id'], DemoData::registeredIds());

        return view('volunteer.activity-detail', compact('activity', 'isRegistered'));
    }

    // Hiện form đăng ký tham gia
    public function registerForm($id)
    {
        $activity = DemoData::activity((int) $id);
        abort_if(!$activity, 404);

        // Đã đăng ký rồi thì quay về trang chi tiết
        if (in_array($activity['id'], DemoData::registeredIds())) {
            return redirect()->route('volunteer.activities.show', $id)
                ->with('error', 'Bạn đã đăng ký hoạt động này rồi.');
        }
        // Hoạt động đã đủ người / kết thúc
        if (in_array($activity['status'], ['full', 'finished'])) {
            return redirect()->route('volunteer.activities.show', $id)
                ->with('error', 'Hoạt động này không còn nhận đăng ký.');
        }

        $user = DemoData::user();

        return view('volunteer.activity-register', compact('activity', 'user'));
    }

    // Nhận form đăng ký: validate rồi báo thành công
    public function storeRegistration(Request $request, $id)
    {
        $activity = DemoData::activity((int) $id);
        abort_if(!$activity, 404);

        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'birthday' => 'required|date|before:today',
            'phone' => ['required', 'regex:/^[0-9+\s]{9,15}$/'],
            'school' => 'required|string|max:150',
            'experience' => 'required|in:Lần đầu tham gia tình nguyện,Đã tham gia nhiều lần',
            'note' => 'nullable|string|max:500',
        ], [
            'required' => ':attribute không được để trống.',
            'date' => ':attribute không hợp lệ.',
            'before' => ':attribute phải là ngày trong quá khứ.',
            'regex' => ':attribute chưa đúng định dạng (9-15 chữ số).',
            'max' => ':attribute quá dài (tối đa :max ký tự).',
            'in' => ':attribute không hợp lệ.',
        ], [
            'name' => 'Họ và tên',
            'gender' => 'Giới tính',
            'birthday' => 'Ngày sinh',
            'phone' => 'Số điện thoại',
            'school' => 'Trường / nơi công tác',
            'experience' => 'Kinh nghiệm tình nguyện',
            'note' => 'Lời nhắn',
        ]);

        // TODO (khi có database):
        // Registration::create($request->only(['name', 'gender', 'birthday', 'phone', 'school', 'experience', 'note'])
        //     + ['user_id' => auth()->id(), 'activity_id' => $id, 'status' => 'pending']);
        return redirect()->route('volunteer.my-activities')
            ->with('success', 'Đã gửi đơn đăng ký tham gia "' . $activity['title'] . '" (bản demo). Vui lòng chờ ban tổ chức duyệt.');
    }
}