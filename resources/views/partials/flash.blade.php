{{-- Hiển thị thông báo flash: return back()->with('success', '...') --}}
@if (session('success'))
    <x-alert type="success" :autoclose="true">{{ session('success') }}</x-alert>
@endif
@if (session('error'))
    <x-alert type="danger">{{ session('error') }}</x-alert>
@endif
@if ($errors->any())
    <x-alert type="danger">
        <strong>Vui lòng kiểm tra lại:</strong>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif