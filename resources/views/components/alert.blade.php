{{-- Dùng: <x-alert type="success">Lưu thành công!</x-alert>
     type: success | danger | warning | info
     autoclose: tự đóng sau 5 giây (đặt :autoclose="true") --}}
@props(['type' => 'info', 'dismissible' => true, 'autoclose' => false])

@php
    $icons = [
        'success' => 'bi-check-circle-fill',
        'danger'  => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        'info'    => 'bi-info-circle-fill',
    ];
@endphp

<div {{ $attributes->class(['alert', 'alert-' . $type, 'd-flex', 'align-items-start', 'gap-2', 'alert-dismissible fade show' => $dismissible]) }}
     role="alert" @if($autoclose) data-autoclose="5000" @endif>
    <i class="bi {{ $icons[$type] ?? $icons['info'] }} mt-1"></i>
    <div class="flex-grow-1">{{ $slot }}</div>
    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
    @endif
</div>