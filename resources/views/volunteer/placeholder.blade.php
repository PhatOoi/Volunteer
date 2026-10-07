@extends('layouts.volunteer')

@section('title', $title . ' - Tình Nguyện Xanh')

@section('content')
    <div class="page-heading">
        <h2>{{ $title }}</h2>
    </div>
    <div class="vl-card">
        <div class="vl-card-body text-center py-5">
            <i class="bi bi-tools fs-1 text-muted"></i>
            <h4 class="mt-3">{{ $title }}</h4>
            <p class="text-muted mb-0">Trang này sẽ được xây dựng ở Giai đoạn 3.</p>
        </div>
    </div>
@endsection