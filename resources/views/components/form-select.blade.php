{{-- Dùng: <x-form-select name="gender" label="Giới tính" :options="['Nam', 'Nữ', 'Khác']" required />
     - :value="..." để chọn sẵn một mục
     - tự giữ lại lựa chọn cũ (old) và hiện lỗi validate của Laravel --}}
@props(['name', 'label', 'options' => [], 'value' => null, 'required' => false, 'placeholder' => '-- Chọn --'])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }} @if($required)<span class="text-danger">*</span>@endif
    </label>

    <select id="{{ $name }}" name="{{ $name }}"
            @if($required) required @endif
            {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}>
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option }}" @selected(old($name, $value) === $option)>{{ $option }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>