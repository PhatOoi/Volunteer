{{-- Dùng: <x-form-textarea name="motivation" label="Lý do tham gia" rows="4" hint="Tối thiểu 20 ký tự" required />
     - tự giữ lại nội dung cũ (old) và hiện lỗi validate của Laravel --}}
@props(['name', 'label', 'rows' => 4, 'placeholder' => '', 'value' => null, 'required' => false, 'hint' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }} @if($required)<span class="text-danger">*</span>@endif
    </label>

    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
              @if($required) required @endif
              {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>{{ old($name, $value) }}</textarea>

    @if($hint)
        <div class="form-text">{{ $hint }}</div>
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>