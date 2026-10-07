{{-- Dùng: <x-activity-row :activity="$a" status="approved" :cancel="true" />
     - status: trạng thái ĐĂNG KÝ (pending/approved/...). Bỏ trống thì hiện trạng thái của hoạt động.
     - cancel: true để hiện nút "Hủy đăng ký" (mở modal #cancelModal) --}}
@props(['activity', 'status' => null, 'cancel' => false])

<div class="vl-card activity-row">
    <div class="row-thumb thumb-{{ $activity['color'] }}">
        <i class="bi {{ $activity['icon'] }} thumb-icon"></i>
    </div>

    <div class="row-body">
        <div class="d-flex flex-wrap align-items-start justify-content-between gap-2 mb-2">
            <h3 class="activity-title mb-0">{{ $activity['title'] }}</h3>
            <x-badge :status="$status ?? $activity['status']" />
        </div>
        <div class="activity-meta"><i class="bi bi-calendar-event"></i>{{ $activity['date'] }}</div>
        <div class="activity-meta"><i class="bi bi-clock"></i>{{ $activity['time'] }}</div>
        <div class="activity-meta"><i class="bi bi-geo-alt"></i>{{ $activity['location'] }}</div>
        <div class="activity-meta"><i class="bi bi-people"></i>{{ $activity['registered'] }}/{{ $activity['capacity'] }} người tham gia</div>
    </div>

    <div class="row-actions">
        <a href="{{ route('volunteer.activities.show', $activity['id']) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
        @if($cancel)
            <button type="button" class="btn btn-outline-danger btn-sm"
                    data-bs-toggle="modal" data-bs-target="#cancelModal" data-name="{{ $activity['title'] }}">Hủy đăng ký</button>
        @endif
    </div>
</div>