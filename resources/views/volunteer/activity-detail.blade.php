@extends('layouts.volunteer')

@section('title', $activity['title'] . ' - Tình Nguyện Xanh')

@section('content')

    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.activities') }}">Hoạt động</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $activity['title'] }}</li>
        </ol>
    </nav>

    {{-- Banner --}}
    <!-- <div class="detail-banner thumb-{{ $activity['color'] }}">
        <i class="bi {{ $activity['icon'] }} thumb-icon"></i>
    </div> -->

    <div class="row g-4">

        {{-- ===== Cột trái: nội dung ===== --}}
        <div class="col-lg-8">
            <div class="vl-card vl-card-body">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                    <span class="vl-badge badge-attended">{{ $activity['category'] }}</span>
                    <x-badge :status="$activity['status']" />
                </div>
                <h1 class="mb-3">{{ $activity['title'] }}</h1>
                <p class="mb-0">{{ $activity['description'] }}</p>

                <div class="detail-section">
                    <h5><i class="bi bi-list-task text-primary me-2"></i>Nội dung công việc</h5>
                    <ul class="detail-list">
                        @foreach ($activity['tasks'] as $item)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div class="detail-section">
                    <h5><i class="bi bi-person-check text-primary me-2"></i>Yêu cầu tham gia</h5>
                    <ul class="detail-list">
                        @foreach ($activity['requirements'] as $item)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div class="detail-section">
                    <h5><i class="bi bi-gift text-primary me-2"></i>Quyền lợi</h5>
                    <ul class="detail-list">
                        @foreach ($activity['benefits'] as $item)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div class="detail-section">
                    <div class="note-box">
                        <h5><i class="bi bi-exclamation-triangle me-2"></i>Lưu ý</h5>
                        <ul class="detail-list mb-0">
                            @foreach ($activity['notes'] as $item)
                                <li><i class="bi bi-dot"></i><span>{{ $item }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Cột phải: thông tin + nút đăng ký ===== --}}
        <div class="col-lg-4">
            <div class="vl-card vl-card-body sticky-side">
                <ul class="info-list">
                    <li>
                        <span class="info-icon"><i class="bi bi-calendar-event"></i></span>
                        <div><small>Thời gian</small><strong>{{ $activity['date'] }}</strong><br>{{ $activity['time'] }}</div>
                    </li>
                    <li>
                        <span class="info-icon"><i class="bi bi-geo-alt"></i></span>
                        <div><small>Địa điểm</small><strong>{{ $activity['location'] }}</strong></div>
                    </li>
                    <li>
                        <span class="info-icon"><i class="bi bi-person-badge"></i></span>
                        <div><small>Người phụ trách</small><strong>{{ $activity['organizer'] }}</strong></div>
                    </li>
                    <li>
                        <span class="info-icon"><i class="bi bi-people"></i></span>
                        <div class="flex-grow-1">
                            <small>Số lượng tình nguyện viên</small>
                            <strong>{{ $activity['registered'] }}/{{ $activity['capacity'] }} đã đăng ký</strong>
                            @php $percent = min(100, round($activity['registered'] / $activity['capacity'] * 100)); @endphp
                            <div class="progress mt-2" style="height: 6px" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    </li>
                </ul>

                {{-- Nút đăng ký: đổi theo trạng thái --}}
                <div class="d-grid mt-3">
                    @if ($isRegistered)
                        <button type="button" class="btn btn-success btn-lg" disabled><i class="bi bi-check-circle-fill me-2"></i>Đã đăng ký</button>
                    @elseif ($activity['status'] === 'finished')
                        <button type="button" class="btn btn-secondary btn-lg" disabled>Hoạt động đã kết thúc</button>
                    @elseif ($activity['status'] === 'full')
                        <button type="button" class="btn btn-secondary btn-lg" disabled>Đã đủ số lượng</button>
                    @else
                        <a href="{{ route('volunteer.activities.register', $activity['id']) }}" class="btn btn-primary btn-lg">
                            Đăng ký tham gia
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection