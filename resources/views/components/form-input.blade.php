{{-- Dùng: <x-form-input name="email" label="Email" type="email" icon="bi-envelope" placeholder="ban@example.com" required />
     - type="password" sẽ tự có nút hiện/ẩn mật khẩu
     - tự hiện lỗi validate của Laravel và giữ lại giá trị cũ (old) khi nhập sai --}}
@props(['name', 'label', 'type' => 'text', 'icon' => null, 'placeholder' => '', 'value' => null, 'required' => false, 'autocomplete' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }} @if($required)<span class="text-danger">*</span>@endif
    </label>

    <div class="input-group">
        @if($icon)
            <span class="input-group-text"><i class="bi {{ $icon }}"></i></span>
        @endif

        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
               value="{{ $type === 'password' ? '' : old($name, $value) }}"
               placeholder="{{ $placeholder }}"
               @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
               @if($required) required @endif
               {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>

        @if($type === 'password')
            <button type="button" class="btn btn-outline-secondary" data-toggle-password="#{{ $name }}" aria-label="Hiện/ẩn mật khẩu">
                <i class="bi bi-eye"></i>
            </button>
        @endif
    </div>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>