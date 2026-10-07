@extends('layouts.guest')

@section('title', 'Tình Nguyện Xanh - Kết nối những trái tim tử tế')

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="hero-tag"><i class="bi bi-stars"></i> Cùng nhau tạo nên điều tử tế</span>
                <h1 class="hero-title">Trở thành tình nguyện viên, <span>lan tỏa yêu thương</span> đến cộng đồng</h1>
                <p class="hero-lead">Tìm kiếm và đăng ký các hoạt động tình nguyện gần bạn: bảo vệ môi trường, dạy học, hiến máu, hỗ trợ người khó khăn và nhiều hơn nữa.</p>
                <div class="d-grid gap-2 d-sm-flex">
                    <a href="{{ route('register') }}" class="btn btn-accent btn-lg px-4">Đăng ký ngay</a>
                    <a href="{{ route('volunteer.activities') }}" class="btn btn-outline-light btn-lg px-4">Xem hoạt động</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-stats">
                    <div class="hero-stat"><strong>500+</strong><span>Tình nguyện viên</span></div>
                    <div class="hero-stat"><strong>120</strong><span>Hoạt động</span></div>
                    <div class="hero-stat"><strong>3.000</strong><span>Giờ đóng góp</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ GIỚI THIỆU ============ --}}
<section class="section" id="gioi-thieu">
    <div class="container">
        <div class="section-title">
            <h2>Vì sao chọn Tình Nguyện Xanh?</h2>
            <p>Nền tảng giúp việc làm tình nguyện trở nên đơn giản, minh bạch và có ý nghĩa hơn.</p>
        </div>
        <div class="row g-3 g-lg-4">
            <div class="col-12 col-md-4">
                <div class="vl-card feature-card">
                    <div class="feature-icon"><i class="bi bi-hand-index-thumb"></i></div>
                    <h5>Đăng ký dễ dàng</h5>
                    <p class="text-muted mb-0">Chọn hoạt động yêu thích và đăng ký tham gia chỉ với một cú nhấp chuột.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="vl-card feature-card">
                    <div class="feature-icon blue"><i class="bi bi-grid-3x3-gap"></i></div>
                    <h5>Hoạt động đa dạng</h5>
                    <p class="text-muted mb-0">Môi trường, giáo dục, sức khỏe, cộng đồng... luôn có hoạt động phù hợp với bạn.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="vl-card feature-card">
                    <div class="feature-icon accent"><i class="bi bi-award"></i></div>
                    <h5>Ghi nhận đóng góp</h5>
                    <p class="text-muted mb-0">Theo dõi số giờ tình nguyện và lịch sử tham gia của bạn một cách rõ ràng.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ HOẠT ĐỘNG NỔI BẬT ============ --}}
<section class="section pt-0">
    <div class="container">
        <div class="section-title">
            <h2>Hoạt động nổi bật</h2>
            <p>Những hoạt động đang được nhiều bạn trẻ quan tâm.</p>
        </div>
        <div class="row g-3 g-lg-4">
            @foreach ($featured as $activity)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-activity-card :activity="$activity" />
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('volunteer.activities') }}" class="btn btn-primary px-4">Xem tất cả hoạt động <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>

{{-- ============ CÁCH THAM GIA ============ --}}
<section class="section pt-0" id="cach-tham-gia">
    <div class="container">
        <div class="section-title">
            <h2>Tham gia chỉ với 3 bước</h2>
        </div>
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="step">
                    <div class="step-number">1</div>
                    <h5>Tạo tài khoản</h5>
                    <p class="text-muted mb-0">Đăng ký miễn phí và hoàn thiện hồ sơ của bạn.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="step">
                    <div class="step-number">2</div>
                    <h5>Chọn hoạt động</h5>
                    <p class="text-muted mb-0">Tìm hoạt động theo danh mục, địa điểm và thời gian.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="step">
                    <div class="step-number">3</div>
                    <h5>Tham gia &amp; lan tỏa</h5>
                    <p class="text-muted mb-0">Có mặt đúng giờ, cùng mọi người làm nên điều ý nghĩa.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ KÊU GỌI HÀNH ĐỘNG ============ --}}
<section class="section pt-0">
    <div class="container">
        <div class="cta-band">
            <h2 class="mb-2">Sẵn sàng cùng chúng tôi tạo nên khác biệt?</h2>
            <p class="mb-3">Tham gia cộng đồng tình nguyện viên ngay hôm nay.</p>
            <a href="{{ route('register') }}" class="btn btn-accent btn-lg px-4">Đăng ký tình nguyện viên</a>
        </div>
    </div>
</section>

@endsection