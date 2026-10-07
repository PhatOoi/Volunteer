@extends('layouts.volunteer')

@section('title', 'Dashboard - Tình Nguyện Xanh')

@section('content')

    {{-- Lời chào --}}
    <div class="welcome-banner">
        <h2>Xin chào, {{ $user['name'] }}!</h2>
        <p>Cảm ơn bạn đã đồng hành cùng cộng đồng. Hôm nay bạn muốn làm điều tử tế nào?</p>
    </div>

    {{-- 4 thẻ thống kê --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="vl-card stat-card">
                <div class="stat-icon"><i class="bi bi-journal-check"></i></div>
                <div><div class="stat-value">{{ $stats['registered'] }}</div><div class="stat-label">Đã đăng ký</div></div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="vl-card stat-card">
                <div class="stat-icon blue"><i class="bi bi-calendar-event"></i></div>
                <div><div class="stat-value">{{ $stats['upcoming'] }}</div><div class="stat-label">Sắp tham gia</div></div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="vl-card stat-card">
                <div class="stat-icon accent"><i class="bi bi-check2-circle"></i></div>
                <div><div class="stat-value">{{ $stats['completed'] }}</div><div class="stat-label">Đã hoàn thành</div></div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="vl-card stat-card">
                <div class="stat-icon"><i class="bi bi-clock-history"></i></div>
                <div><div class="stat-value">{{ $stats['hours'] }}</div><div class="stat-label">Giờ tình nguyện</div></div>
            </div>
        </div>
    </div>

    {{-- Hoạt động sắp tới --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Hoạt động sắp tới</h4>
        <a href="{{ route('volunteer.my-activities') }}" class="small fw-semibold">Xem tất cả</a>
    </div>

    @forelse ($upcoming as $row)
        <x-activity-row :activity="$row['activity']" :status="$row['status']" />
    @empty
        <div class="vl-card empty-state">
            <i class="bi bi-calendar-x"></i>
            Bạn chưa đăng ký hoạt động nào.
        </div>
    @endforelse

    {{-- Hoạt động nổi bật --}}
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <h4 class="mb-0">Hoạt động nổi bật</h4>
        <a href="{{ route('volunteer.activities') }}" class="small fw-semibold">Khám phá thêm</a>
    </div>
    <div class="row g-3 g-lg-4">
        @foreach ($featured as $activity)
            <div class="col-12 col-md-6 col-lg-4">
                <x-activity-card :activity="$activity" />
            </div>
        @endforeach
    </div>

@endsection