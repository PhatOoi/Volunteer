@extends('layouts.volunteer')

@section('title', 'Hoạt động của tôi - Tình Nguyện Xanh')

@section('content')

    <div class="page-heading d-flex flex-wrap justify-content-between align-items-end gap-2">
        <div>
            <h2>Hoạt động của tôi</h2>
            <p>Các hoạt động bạn đã đăng ký và sắp tham gia.</p>
        </div>
        <a href="{{ route('volunteer.activities') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Tìm hoạt động mới</a>
    </div>

    @forelse ($registrations as $row)
        <x-activity-row :activity="$row['activity']" :status="$row['status']" :cancel="in_array($row['status'], ['pending', 'approved'])" />
    @empty
        <div class="vl-card empty-state">
            <i class="bi bi-calendar-x"></i>
            <h5>Bạn chưa đăng ký hoạt động nào</h5>
            <a href="{{ route('volunteer.activities') }}" class="btn btn-primary mt-2">Khám phá hoạt động</a>
        </div>
    @endforelse

    {{-- ===== Modal xác nhận hủy đăng ký ===== --}}
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" method="POST" action="{{ route('volunteer.my-activities.cancel') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Hủy đăng ký</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc muốn hủy đăng ký hoạt động <strong data-modal-name></strong> không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Giữ lại</button>
                    <button type="submit" class="btn btn-danger">Hủy đăng ký</button>
                </div>
            </form>
        </div>
    </div>

@endsection