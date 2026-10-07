{{-- Dùng: <x-activity-card :activity="$activity" />
     $activity là 1 phần tử trong App\Support\DemoData::activities() --}}
@props(['activity'])

@php
    $percent = $activity['capacity'] > 0 ? min(100, round($activity['registered'] / $activity['capacity'] * 100)) : 0;
@endphp

<article class="vl-card activity-card">
    <div class="activity-thumb thumb-{{ $activity['color'] }}">
        <i class="bi {{ $activity['icon'] }} thumb-icon"></i>
        <x-badge :status="$activity['status']" class="badge-corner" />
    </div>

    <div class="activity-body">
        <small class="text-primary fw-semibold">{{ $activity['category'] }}</small>
        <h3 class="activity-title">{{ $activity['title'] }}</h3>
        <p class="text-muted small mb-2">{{ Str::limit($activity['description'], 90) }}</p>

        <div class="activity-meta"><i class="bi bi-calendar-event"></i>{{ $activity['date'] }} &middot; {{ $activity['time'] }}</div>
        <div class="activity-meta"><i class="bi bi-geo-alt"></i>{{ $activity['location'] }}</div>
        <div class="activity-meta"><i class="bi bi-people"></i>{{ $activity['registered'] }}/{{ $activity['capacity'] }} người tham gia</div>

        <div class="progress mt-2" style="height: 6px" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: {{ $percent }}%"></div>
        </div>

        <div class="mt-auto pt-3">
            <a href="{{ route('volunteer.activities.show', $activity['id']) }}" class="btn btn-outline-primary w-100">Xem chi tiết</a>
        </div>
    </div>
</article>