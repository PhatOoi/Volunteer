<footer class="vl-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-5">
                <h6><i class="bi bi-heart-fill text-success me-1"></i> Tình Nguyện Xanh</h6>
                <p class="mb-0">Kết nối những trái tim tử tế. Cùng nhau lan tỏa những việc làm ý nghĩa cho cộng đồng.</p>
            </div>
            <div class="col-6 col-md-3">
                <h6>Liên kết</h6>
                <ul>
                    <li><a href="{{ route('volunteer.activities') }}">Hoạt động</a></li>
                    <li><a href="{{ route('volunteer.my-activities') }}">Hoạt động của tôi</a></li>
                    <li><a href="{{ route('volunteer.history') }}">Lịch sử tham gia</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4">
                <h6>Liên hệ</h6>
                <ul>
                    <li><i class="bi bi-envelope me-2"></i>lienhe@tinhnguyenxanh.vn</li>
                    <li><i class="bi bi-telephone me-2"></i>0900 000 000</li>
                    <li><i class="bi bi-geo-alt me-2"></i>TP. Hồ Chí Minh</li>
                </ul>
            </div>
        </div>
        <div class="copyright">&copy; {{ date('Y') }} Tình Nguyện Xanh. Bản quyền thuộc về dự án.</div>
    </div>
</footer>