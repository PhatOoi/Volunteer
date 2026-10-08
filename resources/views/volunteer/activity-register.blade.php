@extends('layouts.volunteer')

@section('title', 'Đơn đăng ký tham gia - Tình Nguyện Xanh')

@php
    // Các lựa chọn trong form (giai đoạn sau có thể chuyển vào database)
    $genders = ['Nam', 'Nữ', 'Khác'];
    $occupations = ['Sinh viên', 'Học sinh', 'Người đi làm', 'Khác'];
    $experiences = ['Chưa từng tham gia', 'Đã tham gia 1-3 hoạt động', 'Đã tham gia trên 3 hoạt động'];
    $positions = ['Hậu cần', 'Truyền thông / chụp ảnh', 'Hướng dẫn / điều phối', 'Hỗ trợ y tế', 'Bất kỳ vị trí nào'];
    $skills = ['Giao tiếp', 'Sơ cứu', 'Chụp ảnh / quay phim', 'Dạy học', 'Thiết kế', 'Lái xe', 'Văn nghệ', 'Ngoại ngữ'];
    $transports = ['Tự di chuyển', 'Cần xe đưa đón'];
    $shirtSizes = ['S', 'M', 'L', 'XL', 'XXL'];
@endphp

@section('content')

    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ route('volunteer.activities') }}">Hoạt động</a></li>
            <li class="breadcrumb-item"><a href="{{ route('volunteer.activities.show', $activity['id']) }}">{{ $activity['title'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
        </ol>
    </nav>

    <div class="page-heading">
        <h2>Đơn đăng ký tham gia</h2>
        <p>Vui lòng điền đầy đủ thông tin. Các mục có dấu <span class="text-danger">*</span> là bắt buộc.</p>
    </div>

    <div class="row g-4">

        {{-- ===== Cột trái: FORM ===== --}}
        <div class="col-lg-8">
            <form method="POST" action="{{ route('volunteer.activities.register.store', $activity['id']) }}">
                @csrf

                {{-- 1. Thông tin cá nhân (tự điền sẵn từ hồ sơ) --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">1</span>Thông tin cá nhân</h5></div>
                    <div class="vl-card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form-input name="name" label="Họ và tên" icon="bi-person" :value="$user['name']" required />
                            </div>
                            <div class="col-6 col-md-3">
                                <x-form-input name="birthday" label="Ngày sinh" type="date" :value="$user['birthday_iso']" required />
                            </div>
                            <div class="col-6 col-md-3">
                                <x-form-select name="gender" label="Giới tính" :options="$genders" required />
                            </div>
                            <div class="col-md-6">
                                <x-form-input name="phone" label="Số điện thoại" type="tel" icon="bi-telephone" :value="$user['phone']" required />
                            </div>
                            <div class="col-md-6">
                                <x-form-input name="email" label="Email" type="email" icon="bi-envelope" :value="$user['email']" required />
                            </div>
                            <div class="col-12">
                                <x-form-input name="address" label="Địa chỉ" icon="bi-geo-alt" :value="$user['address']" required />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2. Học vấn / công việc --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">2</span>Học vấn hoặc công việc</h5></div>
                    <div class="vl-card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <x-form-select name="occupation_type" label="Bạn hiện là" :options="$occupations" required />
                            </div>
                            <div class="col-md-8">
                                <x-form-input name="school" label="Trường / nơi công tác" icon="bi-building" placeholder="Ví dụ: Đại học Công nghệ thông tin" required />
                            </div>
                            <div class="col-md-6">
                                <x-form-input name="major" label="Ngành học / nghề nghiệp" icon="bi-mortarboard" />
                            </div>
                            <div class="col-md-6">
                                <x-form-input name="student_id" label="Mã số sinh viên (nếu có)" icon="bi-card-text" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3. Kinh nghiệm và kỹ năng --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">3</span>Kinh nghiệm và kỹ năng</h5></div>
                    <div class="vl-card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form-select name="experience" label="Kinh nghiệm tình nguyện" :options="$experiences" required />
                            </div>
                            <div class="col-md-6">
                                <x-form-select name="position" label="Vị trí muốn tham gia" :options="$positions" required />
                            </div>
                        </div>

                        <label class="form-label">Kỹ năng của bạn (chọn nhiều)</label>
                        <div class="mb-3">
                            @foreach ($skills as $skill)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="skills[]" id="skill{{ $loop->index }}"
                                           value="{{ $skill }}" @checked(in_array($skill, old('skills', [])))>
                                    <label class="form-check-label" for="skill{{ $loop->index }}">{{ $skill }}</label>
                                </div>
                            @endforeach
                        </div>

                        <x-form-textarea name="experience_note" label="Mô tả kinh nghiệm (nếu có)" rows="3"
                                         placeholder="Các hoạt động tình nguyện bạn đã tham gia, vai trò của bạn..." />
                    </div>
                </div>

                {{-- 4. Sắp xếp tham gia --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">4</span>Sắp xếp tham gia</h5></div>
                    <div class="vl-card-body">
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label class="form-label d-block">Phương tiện di chuyển <span class="text-danger">*</span></label>
                                @foreach ($transports as $transport)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="transport" id="transport{{ $loop->index }}"
                                               value="{{ $transport }}" @checked(old('transport', $transports[0]) === $transport)>
                                        <label class="form-check-label" for="transport{{ $loop->index }}">{{ $transport }}</label>
                                    </div>
                                @endforeach
                                @error('transport')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-5">
                                <x-form-select name="shirt_size" label="Cỡ áo đồng phục (nếu có)" :options="$shirtSizes" placeholder="-- Không cần --" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5. Liên hệ khẩn cấp --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">5</span>Liên hệ khẩn cấp</h5></div>
                    <div class="vl-card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <x-form-input name="emergency_name" label="Họ tên người thân" icon="bi-person-heart" required />
                            </div>
                            <div class="col-md-3">
                                <x-form-input name="emergency_relation" label="Quan hệ" placeholder="Ví dụ: Mẹ" required />
                            </div>
                            <div class="col-md-4">
                                <x-form-input name="emergency_phone" label="Số điện thoại" type="tel" icon="bi-telephone" required />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 6. Lý do tham gia --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">6</span>Lý do tham gia</h5></div>
                    <div class="vl-card-body">
                        <x-form-textarea name="motivation" label="Vì sao bạn muốn tham gia hoạt động này?" rows="4"
                                         hint="Viết ngắn gọn, tối thiểu 20 ký tự." required />
                    </div>
                </div>

                {{-- 7. Cam kết --}}
                <div class="vl-card mb-4">
                    <div class="vl-card-header"><h5><span class="badge rounded-pill bg-success me-2">7</span>Cam kết</h5></div>
                    <div class="vl-card-body">
                        <ul class="detail-list mb-3">
                            <li><i class="bi bi-dot"></i><span>Thông tin tôi cung cấp là chính xác.</span></li>
                            <li><i class="bi bi-dot"></i><span>Tôi có mặt đúng giờ, tuân thủ hướng dẫn của ban tổ chức.</span></li>
                            <li><i class="bi bi-dot"></i><span>Nếu không thể tham gia, tôi sẽ thông báo trước ít nhất 24 giờ.</span></li>
                        </ul>
                        <div class="form-check">
                            <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" name="agree" id="agree" required @checked(old('agree'))>
                            <label class="form-check-label" for="agree">Tôi đã đọc và đồng ý với các cam kết trên. <span class="text-danger">*</span></label>
                            @error('agree')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column-reverse flex-sm-row justify-content-end gap-2 mb-4">
                    <a href="{{ route('volunteer.activities.show', $activity['id']) }}" class="btn btn-outline-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-send me-2"></i>Gửi đơn đăng ký</button>
                </div>
            </form>
        </div>

        {{-- ===== Cột phải: tóm tắt hoạt động ===== --}}
        <div class="col-lg-4">
            <div class="vl-card sticky-side">
                <div class="detail-banner thumb-{{ $activity['color'] }} mb-0" style="height: 120px; border-radius: var(--vl-radius) var(--vl-radius) 0 0;">
                    <i class="bi {{ $activity['icon'] }} thumb-icon" style="font-size: 3rem"></i>
                </div>
                <div class="vl-card-body">
                    <h5 class="mb-3">{{ $activity['title'] }}</h5>
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
                            <span class="info-icon"><i class="bi bi-people"></i></span>
                            <div><small>Đã đăng ký</small><strong>{{ $activity['registered'] }}/{{ $activity['capacity'] }} người</strong></div>
                        </li>
                    </ul>
                    <div class="note-box mt-3 small">
                        <i class="bi bi-info-circle me-1"></i>Ban tổ chức sẽ xem xét đơn và thông báo kết quả cho bạn trong mục <strong>Thông báo</strong>.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection