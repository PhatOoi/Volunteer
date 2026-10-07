@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    {{-- Đây là trang THỬ để kiểm tra layout. Giai đoạn 4 sẽ thay bằng dashboard đầy đủ. --}}
    <x-alert type="success" :autoclose="true">Layout Admin đã hoạt động! Thử thu nhỏ trình duyệt để xem sidebar thành menu trượt.</x-alert>

    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="vl-card stat-card">
                <div class="stat-icon"><i class="bi bi-people"></i></div>
                <div><div class="stat-value">128</div><div class="stat-label">Tổng tình nguyện viên</div></div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="vl-card stat-card">
                <div class="stat-icon blue"><i class="bi bi-calendar-event"></i></div>
                <div><div class="stat-value">6</div><div class="stat-label">Hoạt động sắp tới</div></div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="vl-card stat-card">
                <div class="stat-icon accent"><i class="bi bi-journal-check"></i></div>
                <div><div class="stat-value">342</div><div class="stat-label">Lượt đăng ký</div></div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="vl-card stat-card">
                <div class="stat-icon"><i class="bi bi-clock-history"></i></div>
                <div><div class="stat-value">1.250</div><div class="stat-label">Tổng giờ tình nguyện</div></div>
            </div>
        </div>
    </div>

    <div class="vl-card">
        <div class="vl-card-header"><h5>Thử bảng và badge</h5></div>
        <div class="table-responsive">
            <table class="table vl-table">
                <thead><tr><th>Tình nguyện viên</th><th>Hoạt động</th><th>Ngày đăng ký</th><th>Trạng thái</th></tr></thead>
                <tbody>
                    <tr><td>Nguyễn Văn An</td><td>Dọn bãi biển Vũng Tàu</td><td>01/10/2026</td><td><x-badge status="pending" /></td></tr>
                    <tr><td>Trần Thị Bình</td><td>Dạy học cho trẻ em</td><td>02/10/2026</td><td><x-badge status="approved" /></td></tr>
                    <tr><td>Lê Minh Châu</td><td>Hiến máu nhân đạo</td><td>03/10/2026</td><td><x-badge status="rejected" /></td></tr>
                    <tr><td>Phạm Quốc Dũng</td><td>Trồng cây xanh</td><td>04/10/2026</td><td><x-badge status="attended" /></td></tr>
                    <tr><td>Võ Thu Hà</td><td>Phát cơm từ thiện</td><td>05/10/2026</td><td><x-badge status="absent" /></td></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection