@extends('layouts.volunteer')

@section('title', $activity['title'] . ' - Tình Nguyện Xanh')

@php
    $genders = ['Nam', 'Nữ', 'Khác'];
    $experiences = ['Lần đầu tham gia tình nguyện', 'Đã tham gia nhiều lần'];
    $percent = $activity['capacity'] > 0 ? min(100, round($activity['registered'] / $activity['capacity'] * 100)) : 0;
@endphp

@section('content')

    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.activities') }}">Hoạt động</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $activity['title'] }}</li>
        </ol>
    </nav>

    {{-- ===== 1. HERO: ảnh + tiêu đề + nút đăng ký ===== --}}
    <div class="vl-card mb-4 overflow-hidden">
        <div class="activity-thumb thumb-{{ $activity['color'] }}" style="height: 320px;">
            <img src="{{ asset($activity['images']) }}" alt="{{ $activity['title'] }}" class="thumb-image">
        </div>
        <div class="vl-card-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                <span class="vl-badge badge-attended">{{ $activity['category'] }}</span>
                <x-badge :status="$activity['status']" />
            </div>
            <h1 class="mb-3">{{ $activity['title'] }}</h1>

            <div class="d-flex flex-wrap gap-2 mb-3">
                @if ($isRegistered)
                    <button type="button" class="btn btn-success btn-lg" disabled><i class="bi bi-check-circle-fill me-2"></i>Đã đăng ký</button>
                @elseif ($activity['status'] === 'finished')
                    <button type="button" class="btn btn-secondary btn-lg" disabled>Hoạt động đã kết thúc</button>
                @elseif ($activity['status'] === 'full')
                    <button type="button" class="btn btn-secondary btn-lg" disabled>Đã đủ số lượng</button>
                @else
                    <a href="#dang-ky" class="btn btn-primary btn-lg">Đăng ký ngay</a>
                @endif
            </div>

            {{-- Liên kết nhảy nhanh tới từng phần --}}
            <div class="d-flex flex-wrap gap-3 small fw-semibold">
                <a href="#thong-tin">Thông tin</a>
                <a href="#dieu-kien">Điều kiện &amp; quyền lợi</a>
                <a href="#dang-ky">Đăng ký</a>
            </div>
        </div>
    </div>

    {{-- ===== 2. THÔNG TIN CHƯƠNG TRÌNH ===== --}}
    <div class="vl-card mb-4" id="thong-tin" style="scroll-margin-top: 90px;">
        <div class="vl-card-header"><h5>Thông tin chương trình</h5></div>
        <div class="vl-card-body">
            <p>{{ $activity['description'] }}</p>

            <div class="detail-section">
                <h5><i class="bi bi-list-task text-primary me-2"></i>Nội dung công việc</h5>
                <ul class="detail-list">
                    @foreach ($activity['tasks'] as $item)
                        <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- ===== 3. THỜI GIAN & ĐỊA ĐIỂM ===== --}}
    <div class="vl-card mb-4">
        <div class="vl-card-header"><h5>Thời gian &amp; địa điểm</h5></div>
        <div class="vl-card-body">
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
                    <div><small>Ban tổ chức</small><strong>{{ $activity['organizer'] }}</strong></div>
                </li>
                <li>
                    <span class="info-icon"><i class="bi bi-people"></i></span>
                    <div class="flex-grow-1">
                        <small>Số lượng tình nguyện viên</small>
                        <strong>{{ $activity['registered'] }}/{{ $activity['capacity'] }} đã đăng ký</strong>
                        <div class="progress mt-2" style="height: 6px" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- ===== 4. ĐIỀU KIỆN + QUYỀN LỢI ===== --}}
    <div class="row g-4 mb-4" id="dieu-kien" style="scroll-margin-top: 90px;">
        <div class="col-md-6">
            <div class="vl-card h-100">
                <div class="vl-card-header"><h5><i class="bi bi-person-check text-primary me-2"></i>Điều kiện tham gia</h5></div>
                <div class="vl-card-body">
                    <ul class="detail-list">
                        @foreach ($activity['requirements'] as $item)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="vl-card h-100">
                <div class="vl-card-header"><h5><i class="bi bi-gift text-primary me-2"></i>Quyền lợi</h5></div>
                <div class="vl-card-body">
                    <ul class="detail-list">
                        @foreach ($activity['benefits'] as $item)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="note-box mb-4">
        <h5><i class="bi bi-exclamation-triangle me-2"></i>Lưu ý</h5>
        <ul class="detail-list mb-0">
            @foreach ($activity['notes'] as $item)
                <li><i class="bi bi-dot"></i><span>{{ $item }}</span></li>
            @endforeach
        </ul>
    </div>

    {{-- ===== 5. BIỂU MẪU ĐĂNG KÝ ===== --}}
    <div class="vl-card mb-4" id="dang-ky" style="scroll-margin-top: 90px;">
        <div class="vl-card-header"><h5>Biểu mẫu đăng ký tham gia</h5></div>
        <div class="vl-card-body">

            @if ($isRegistered)
                <div class="empty-state">
                    <i class="bi bi-check-circle"></i>
                    Bạn đã đăng ký hoạt động này. Xem trạng thái tại mục
                    <a href="{{ route('volunteer.my-activities') }}">Hoạt động của tôi</a>.
                </div>
            @elseif ($activity['status'] === 'finished')
                <div class="empty-state"><i class="bi bi-calendar-x"></i>Hoạt động này đã kết thúc.</div>
            @elseif ($activity['status'] === 'full')
                <div class="empty-state"><i class="bi bi-people"></i>Hoạt động này đã đủ số lượng tình nguyện viên.</div>
            @else
                <p class="text-muted">Vui lòng điền thông tin bên dưới. Các mục có dấu <span class="text-danger">*</span> là bắt buộc.</p>

                <form method="POST" action="{{ route('volunteer.activities.register.store', $activity['id']) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input name="name" label="Họ và tên" icon="bi-person" placeholder="VD: Nguyễn Thị A" :value="$user['name']" required />
                        </div>
                        <div class="col-6 col-md-3">
                            <x-form-select name="gender" label="Giới tính" :options="$genders" required />
                        </div>
                        <div class="col-6 col-md-3">
                            <x-form-input name="birthday" label="Ngày sinh" type="date" :value="$user['birthday_iso']" required />
                        </div>
                        <div class="col-md-6">
                            <x-form-input name="phone" label="Số điện thoại" type="tel" icon="bi-telephone" placeholder="VD: 0915 926 450" :value="$user['phone']" required />
                        </div>
                        <div class="col-md-6">
                            <x-form-select name="experience" label="Bạn đã từng tham gia tình nguyện chưa?" :options="$experiences" required />
                        </div>
                        <div class="col-12">
                            <x-form-input name="school" label="Trường / nơi công tác" icon="bi-building" placeholder="VD: Đại học Công nghệ thông tin" required />
                        </div>
                        <div class="col-12">
                            <x-form-textarea name="note" label="Bạn có điều gì muốn gửi tới ban tổ chức không?" rows="3" />
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-send me-2"></i>Gửi đơn đăng ký</button>
                    </div>
                </form>
            @endif

        </div>
    </div>

    {{-- Gửi form sai thì tự cuộn xuống form để xem lỗi --}}
    @if ($errors->any())
        <script>document.getElementById('dang-ky').scrollIntoView();</script>
    @endif

@endsection