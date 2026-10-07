@extends('layouts.volunteer')

@section('title', 'Hồ sơ cá nhân - Tình Nguyện Xanh')

@section('content')

    <div class="page-heading">
        <h2>Hồ sơ cá nhân</h2>
        <p>Quản lý thông tin tài khoản tình nguyện viên của bạn.</p>
    </div>

    <div class="row g-4">

        {{-- ===== Cột trái: thẻ tóm tắt ===== --}}
        <div class="col-lg-4">
            <div class="vl-card">
                <div class="profile-cover"></div>
                <div class="vl-card-body pt-0">
                    <div class="profile-avatar-wrap">
                        <span class="avatar avatar-lg">{{ $user['initials'] }}</span>
                    </div>
                    <div class="text-center mt-2">
                        <h4 class="mb-0">{{ $user['name'] }}</h4>
                        <div class="text-muted small">{{ $user['email'] }}</div>
                        <div class="text-muted small">Tham gia từ {{ $user['joined'] }}</div>
                    </div>
                    <div class="row g-0 mt-3 pt-3 border-top">
                        <div class="col-4 profile-mini-stat"><strong>{{ $stats['registered'] }}</strong><span>Đăng ký</span></div>
                        <div class="col-4 profile-mini-stat"><strong>{{ $stats['completed'] }}</strong><span>Hoàn thành</span></div>
                        <div class="col-4 profile-mini-stat"><strong>{{ $stats['hours'] }}</strong><span>Giờ</span></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Cột phải: xem / sửa thông tin ===== --}}
        <div class="col-lg-8">
            <div class="vl-card">
                <div class="vl-card-header">
                    <h5>Thông tin cá nhân</h5>
                    <button type="button" class="btn btn-primary btn-sm" id="btnEditProfile">
                        <i class="bi bi-pencil-square me-1"></i>Chỉnh sửa hồ sơ
                    </button>
                </div>

                {{-- Chế độ XEM --}}
                <div class="vl-card-body" id="profileView">
                    <div class="row">
                        <div class="col-md-6 profile-field"><small>Họ và tên</small><strong>{{ $user['name'] }}</strong></div>
                        <div class="col-md-6 profile-field"><small>Email</small><strong>{{ $user['email'] }}</strong></div>
                        <div class="col-md-6 profile-field"><small>Số điện thoại</small><strong>{{ $user['phone'] }}</strong></div>
                        <div class="col-md-6 profile-field"><small>Ngày sinh</small><strong>{{ $user['birthday'] }}</strong></div>
                        <div class="col-12 profile-field"><small>Địa chỉ</small><strong>{{ $user['address'] }}</strong></div>
                        <div class="col-12 profile-field border-bottom-0"><small>Giới thiệu bản thân</small><p class="mb-0">{{ $user['bio'] }}</p></div>
                    </div>
                </div>

                {{-- Chế độ SỬA (ẩn cho đến khi bấm "Chỉnh sửa hồ sơ") --}}
                <form method="POST" action="{{ route('volunteer.profile.update') }}" enctype="multipart/form-data"
                      id="profileEdit" @class(['vl-card-body', 'd-none' => !$errors->any()])>
                    @csrf

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="avatar avatar-lg" id="avatarInitials">{{ $user['initials'] }}</span>
                        <img id="avatarPreview" class="avatar avatar-lg d-none" alt="Ảnh đại diện mới"
                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                        <div>
                            <label for="avatarInput" class="form-label mb-1">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="avatarInput" name="avatar" accept="image/*" data-avatar-input="#avatarPreview">
                            <div class="form-text">JPG hoặc PNG, tối đa 2MB.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input name="name" label="Họ và tên" icon="bi-person" :value="$user['name']" required />
                        </div>
                        <div class="col-md-6">
                            <x-form-input name="email" label="Email" type="email" icon="bi-envelope" :value="$user['email']" required />
                        </div>
                        <div class="col-md-6">
                            <x-form-input name="phone" label="Số điện thoại" type="tel" icon="bi-telephone" :value="$user['phone']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input name="birthday" label="Ngày sinh" type="date" icon="bi-calendar3" :value="$user['birthday_iso']" />
                        </div>
                        <div class="col-12">
                            <x-form-input name="address" label="Địa chỉ" icon="bi-geo-alt" :value="$user['address']" />
                        </div>
                        <div class="col-12 mb-3">
                            <label for="bio" class="form-label">Giới thiệu bản thân</label>
                            <textarea class="form-control" id="bio" name="bio" rows="4">{{ old('bio', $user['bio']) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 justify-content-end">
                        <button type="button" class="btn btn-outline-secondary" id="btnCancelEdit">Hủy</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check2 me-1"></i>Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Chuyển qua lại giữa chế độ XEM và chế độ SỬA hồ sơ (chỉ là giao diện)
    (function () {
        var view = document.getElementById('profileView');
        var form = document.getElementById('profileEdit');
        var btnEdit = document.getElementById('btnEditProfile');

        function showEdit(edit) {
            view.classList.toggle('d-none', edit);
            form.classList.toggle('d-none', !edit);
            btnEdit.classList.toggle('d-none', edit);
        }

        btnEdit.addEventListener('click', function () { showEdit(true); });
        document.getElementById('btnCancelEdit').addEventListener('click', function () { showEdit(false); });

        // Nếu form có lỗi validate (giai đoạn sau) thì mở sẵn chế độ sửa
        if (!form.classList.contains('d-none')) { showEdit(true); }

        // Khi chọn ảnh: ẩn chữ cái viết tắt, hiện ảnh xem trước (app.js đã gán src cho ảnh)
        document.getElementById('avatarInput').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                document.getElementById('avatarInitials').classList.add('d-none');
                document.getElementById('avatarPreview').classList.remove('d-none');
            }
        });
    })();
</script>
@endpush