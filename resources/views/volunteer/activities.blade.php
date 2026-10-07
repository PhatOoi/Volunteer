@extends('layouts.volunteer')

@section('title', 'Hoạt động tình nguyện - Tình Nguyện Xanh')

@section('content')

    <div class="page-heading">
        <h2>Hoạt động tình nguyện</h2>
        <p>Tìm hoạt động phù hợp và đăng ký tham gia ngay hôm nay.</p>
    </div>

    {{-- Thanh tìm kiếm + bộ lọc (gửi bằng GET nên có thể chia sẻ đường dẫn) --}}
    <form method="GET" action="{{ route('volunteer.activities') }}" class="vl-card filter-card">
        <div class="row g-2 g-lg-3 align-items-end">
            <div class="col-12 col-lg-4">
                <label for="q" class="form-label">Tìm kiếm</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}" placeholder="Tên hoạt động...">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-select" id="category" name="category">
                    <option value="">Tất cả</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item }}" @selected(request('category') === $item)>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
                <label for="location" class="form-label">Địa điểm</label>
                <select class="form-select" id="location" name="location">
                    <option value="">Tất cả</option>
                    @foreach ($locations as $item)
                        <option value="{{ $item }}" @selected(request('location') === $item)>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
                <label for="time" class="form-label">Thời gian</label>
                <select class="form-select" id="time" name="time">
                    <option value="">Tất cả</option>
                    @foreach ($months as $value => $label)
                        <option value="{{ $value }}" @selected(request('time') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1"><i class="bi bi-search me-1"></i>Tìm kiếm</button>
                @if(request()->hasAny(['q', 'category', 'location', 'time']))
                    <a href="{{ route('volunteer.activities') }}" class="btn btn-outline-secondary" title="Xóa bộ lọc" aria-label="Xóa bộ lọc"><i class="bi bi-x-lg"></i></a>
                @endif
            </div>
        </div>
    </form>

    <p class="text-muted mb-3">Tìm thấy <strong>{{ count($activities) }}</strong> hoạt động</p>

    @if (count($activities))
        <div class="row g-3 g-lg-4">
            @foreach ($activities as $activity)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-activity-card :activity="$activity" />
                </div>
            @endforeach
        </div>

        {{-- Phân trang (chỉ là giao diện mẫu). Giai đoạn 5 sẽ thay bằng {{ $activities->links() }} --}}
        <nav class="mt-4" aria-label="Phân trang">
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </nav>
    @else
        <div class="vl-card empty-state">
            <i class="bi bi-search"></i>
            <h5>Không tìm thấy hoạt động phù hợp</h5>
            <p class="mb-0">Hãy thử đổi từ khóa hoặc bỏ bớt bộ lọc.</p>
        </div>
    @endif

@endsection