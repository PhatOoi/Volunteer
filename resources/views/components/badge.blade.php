{{-- Dùng: <x-badge status="approved" />  hoặc  <x-badge status="open" label="Đang mở" />
     Các status có sẵn: pending, approved, rejected, attended, absent, upcoming, open, ongoing, finished, full, active, inactive --}}
@props(['status' => 'default', 'label' => null])

@php
    $map = [
        // Trạng thái đăng ký
        'pending'  => ['Chờ duyệt',    'badge-pending'],
        'approved' => ['Đã duyệt',     'badge-approved'],
        'rejected' => ['Từ chối',      'badge-rejected'],
        'attended' => ['Đã tham gia',  'badge-attended'],
        'absent'   => ['Vắng mặt',     'badge-absent'],
        // Trạng thái hoạt động
        'upcoming' => ['Sắp diễn ra',  'badge-pending'],
        'open'     => ['Đang mở đăng ký', 'badge-approved'],
        'ongoing'  => ['Đang diễn ra', 'badge-attended'],
        'finished' => ['Đã kết thúc',  'badge-absent'],
        'full'     => ['Đã đủ người',  'badge-rejected'],
        // Trạng thái tài khoản
        'active'   => ['Hoạt động',    'badge-approved'],
        'inactive' => ['Tạm khóa',     'badge-absent'],
    ];
    [$text, $class] = $map[$status] ?? [$status, 'badge-default'];
@endphp

<span {{ $attributes->class(['vl-badge', $class]) }}>{{ $label ?? $text }}</span>