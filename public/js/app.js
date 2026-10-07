/* =====================================================
   public/js/app.js  -  JavaScript giao diện (không có logic database)
   Cần nạp SAU bootstrap.bundle.min.js
   Việc mở/đóng sidebar mobile, dropdown, modal đã do Bootstrap lo.
   ===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    // 1. Alert tự đóng: <div class="alert" data-autoclose="5000"> (5000 = 5 giây)
    document.querySelectorAll('[data-autoclose]').forEach(function (el) {
        var delay = parseInt(el.getAttribute('data-autoclose'), 10) || 5000;
        setTimeout(function () {
            if (document.body.contains(el)) {
                bootstrap.Alert.getOrCreateInstance(el).close();
            }
        }, delay);
    });

    // 2. Xem trước avatar:
    //    <input type="file" data-avatar-input="#avatarPreview">
    //    <img id="avatarPreview" ...>
    document.querySelectorAll('[data-avatar-input]').forEach(function (input) {
        input.addEventListener('change', function () {
            var preview = document.querySelector(input.getAttribute('data-avatar-input'));
            if (preview && input.files && input.files[0]) {
                preview.src = URL.createObjectURL(input.files[0]);
            }
        });
    });

    // 3. Modal xác nhận xóa: nút bấm có data-name="Tên mục" sẽ đổ tên vào <span data-modal-name> trong modal
    document.querySelectorAll('.modal').forEach(function (modal) {
        modal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var target = modal.querySelector('[data-modal-name]');
            if (button && target && button.getAttribute('data-name')) {
                target.textContent = button.getAttribute('data-name');
            }
        });
    });

    // 4. Ô tìm kiếm lọc nhanh bảng (chỉ lọc giao diện):
    //    <input data-table-filter="#bangDuLieu">  ...  <table id="bangDuLieu">
    document.querySelectorAll('[data-table-filter]').forEach(function (input) {
        input.addEventListener('input', function () {
            var keyword = input.value.toLowerCase().trim();
            document.querySelectorAll(input.getAttribute('data-table-filter') + ' tbody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().indexOf(keyword) > -1 ? '' : 'none';
            });
        });
    });
});