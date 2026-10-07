@extends('layouts.volunteer')

@section('title', 'Thông báo - Tình Nguyện Xanh')

@section('content')

    <div class="page-heading d-flex flex-wrap justify-content-between align-items-end gap-2">
        <div>
            <h2>Thông báo</h2>
            <p>Cập nhật mới nhất về các hoạt động của bạn.</p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-sm" id="btnReadAll">
            <i class="bi bi-check2-all me-1"></i>Đánh dấu tất cả đã đọc
        </button>
    </div>

    <div class="vl-card">
        @forelse ($notifications as $item)
            <div @class(['notice', 'unread' => !$item['read']])>
                <div @class(['notice-icon', $item['color']])><i class="bi {{ $item['icon'] }}"></i></div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between gap-2">
                        <strong>{{ $item['title'] }}</strong>
                        <small class="text-muted text-nowrap">{{ $item['time'] }}</small>
                    </div>
                    <div class="text-muted">{{ $item['message'] }}</div>
                </div>
                @unless ($item['read'])
                    <span class="notice-dot" title="Chưa đọc"></span>
                @endunless
            </div>
        @empty
            <div class="empty-state">
                <i class="bi bi-bell-slash"></i>
                Bạn chưa có thông báo nào.
            </div>
        @endforelse
    </div>

@endsection

@push('scripts')
<script>
    // Đánh dấu tất cả đã đọc (chỉ là giao diện, chưa lưu vào database)
    document.getElementById('btnReadAll').addEventListener('click', function () {
        document.querySelectorAll('.notice.unread').forEach(function (el) { el.classList.remove('unread'); });
        document.querySelectorAll('.notice-dot').forEach(function (el) { el.remove(); });
    });
</script>
@endpush