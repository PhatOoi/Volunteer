@extends('layouts.volunteer')

@section('title', 'Lịch sử tham gia - Tình Nguyện Xanh')

@section('content')

    <div class="page-heading">
        <h2>Lịch sử tham gia</h2>
        <p>Những hoạt động bạn đã tham gia và số giờ đóng góp.</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4">
            <div class="vl-card stat-card">
                <div class="stat-icon accent"><i class="bi bi-check2-circle"></i></div>
                <div><div class="stat-value">{{ $stats['completed'] }}</div><div class="stat-label">Hoạt động đã tham gia</div></div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="vl-card stat-card">
                <div class="stat-icon"><i class="bi bi-clock-history"></i></div>
                <div><div class="stat-value">{{ $stats['hours'] }}</div><div class="stat-label">Giờ tình nguyện</div></div>
            </div>
        </div>
    </div>

    <div class="vl-card">
        <div class="vl-card-header">
            <h5>Danh sách hoạt động</h5>
            {{-- Ô lọc nhanh bảng: app.js đọc thuộc tính data-table-filter --}}
            <div class="input-group" style="max-width: 280px">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Lọc trong bảng..." data-table-filter="#historyTable">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table vl-table" id="historyTable">
                <thead>
                    <tr>
                        <th>Hoạt động</th>
                        <th>Danh mục</th>
                        <th>Ngày</th>
                        <th>Địa điểm</th>
                        <th class="text-end">Số giờ</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $item)
                        <tr>
                            <td class="fw-semibold">{{ $item['title'] }}</td>
                            <td>{{ $item['category'] }}</td>
                            <td>{{ $item['date'] }}</td>
                            <td>{{ $item['location'] }}</td>
                            <td class="text-end">{{ $item['hours'] }}h</td>
                            <td><x-badge :status="$item['status']" /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection