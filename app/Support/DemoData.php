<?php

namespace App\Support;

/**
 * Dữ liệu GIẢ dùng trong giai đoạn làm giao diện.
 * Giai đoạn 5 (có database) chúng ta sẽ xóa file này và lấy dữ liệu từ Model.
 */
class DemoData
{
    /**
     * Danh sách 6 hoạt động tình nguyện mẫu.
     * status: open | upcoming | ongoing | full | finished  (khớp với <x-badge>)
     * color:  green | blue | orange | teal                 (màu ảnh nền, xem pages.css)
     */
    public static function activities(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Dọn rác bãi biển Vũng Tàu',
                'description' => 'Cùng nhau nhặt rác, làm sạch bờ biển và truyền thông điệp bảo vệ môi trường biển đến cộng đồng.',
                'category' => 'Môi trường',
                'date' => '18/10/2026',
                'time' => '06:30 - 10:30',
                'location' => 'Bãi Sau, Vũng Tàu',
                'capacity' => 50,
                'registered' => 38,
                'status' => 'open',
                'icon' => 'bi-water',
                'color' => 'teal',
                'organizer' => 'CLB Môi trường Xanh Sài Gòn',
                'tasks' => ['Nhặt rác dọc bờ biển và phân loại rác thải', 'Hướng dẫn người dân và du khách bỏ rác đúng nơi', 'Chụp ảnh, ghi nhận và tổng kết khối lượng rác thu gom'],
            ],
            [
                'id' => 2,
                'title' => 'Dạy học cho trẻ em vùng cao',
                'description' => 'Hỗ trợ dạy chữ, dạy kỹ năng sống và tổ chức trò chơi cho các em học sinh có hoàn cảnh khó khăn.',
                'category' => 'Giáo dục',
                'date' => '24/10/2026',
                'time' => '07:00 - 16:00',
                'location' => 'Xã Tà Năng, Lâm Đồng',
                'capacity' => 20,
                'registered' => 12,
                'status' => 'open',
                'icon' => 'bi-book',
                'color' => 'blue',
                'organizer' => 'Nhóm Thắp Sáng Ước Mơ',
                'tasks' => ['Dạy đọc, viết và toán cơ bản cho các em nhỏ', 'Tổ chức trò chơi và hoạt động ngoại khóa', 'Trao tặng sách vở và dụng cụ học tập'],
            ],
            [
                'id' => 3,
                'title' => 'Trồng cây xanh công viên',
                'description' => 'Trồng mới 500 cây xanh tại công viên khu dân cư, góp phần làm xanh môi trường sống.',
                'category' => 'Môi trường',
                'date' => '07/11/2026',
                'time' => '06:00 - 11:00',
                'location' => 'Công viên Gia Định, TP.HCM',
                'capacity' => 40,
                'registered' => 25,
                'status' => 'open',
                'icon' => 'bi-tree',
                'color' => 'green',
                'organizer' => 'Đoàn Thanh niên Quận Bình Thạnh',
                'tasks' => ['Đào hố, trồng và tưới cây theo hướng dẫn', 'Gắn bảng tên cho từng cây', 'Dọn dẹp khu vực sau khi trồng'],
            ],
            [
                'id' => 4,
                'title' => 'Phát cơm từ thiện cuối tuần',
                'description' => 'Chuẩn bị và phát những suất cơm miễn phí cho người lao động nghèo và bệnh nhân tại bệnh viện.',
                'category' => 'Cộng đồng',
                'date' => '10/10/2026',
                'time' => '10:00 - 13:00',
                'location' => 'Bệnh viện Chợ Rẫy, TP.HCM',
                'capacity' => 30,
                'registered' => 15,
                'status' => 'upcoming',
                'icon' => 'bi-basket',
                'color' => 'orange',
                'organizer' => 'Nhóm Cơm Yêu Thương',
                'tasks' => ['Đóng gói các suất cơm theo tiêu chuẩn vệ sinh', 'Phát cơm cho bệnh nhân và người nhà', 'Thu dọn và vệ sinh khu vực sau khi phát'],
            ],
            [
                'id' => 5,
                'title' => 'Hiến máu nhân đạo',
                'description' => 'Ngày hội hiến máu tình nguyện. Tình nguyện viên hỗ trợ đón tiếp, hướng dẫn và chăm sóc người hiến máu.',
                'category' => 'Sức khỏe',
                'date' => '14/11/2026',
                'time' => '07:30 - 12:00',
                'location' => 'Nhà văn hóa Thanh Niên, TP.HCM',
                'capacity' => 60,
                'registered' => 60,
                'status' => 'full',
                'icon' => 'bi-droplet-half',
                'color' => 'orange',
                'organizer' => 'Hội Chữ thập đỏ TP.HCM',
                'tasks' => ['Đón tiếp và hướng dẫn người hiến máu điền phiếu', 'Hỗ trợ bố trí chỗ ngồi và giữ trật tự', 'Chăm sóc người hiến máu sau khi hiến'],
            ],
            [
                'id' => 6,
                'title' => 'Vui Trung thu cho trẻ em',
                'description' => 'Tổ chức đêm hội trăng rằm, tặng quà và biểu diễn văn nghệ cho các em nhỏ có hoàn cảnh đặc biệt.',
                'category' => 'Cộng đồng',
                'date' => '25/09/2026',
                'time' => '17:00 - 21:00',
                'location' => 'Mái ấm Hoa Hồng, TP.HCM',
                'capacity' => 40,
                'registered' => 40,
                'status' => 'finished',
                'icon' => 'bi-moon-stars',
                'color' => 'blue',
                'organizer' => 'Mái ấm Hoa Hồng',
                'tasks' => ['Trang trí sân khấu và gian hàng trung thu', 'Phát quà và bánh cho các em nhỏ', 'Tổ chức trò chơi và biểu diễn văn nghệ'],
            ],
        ];
    }

    /** Lấy 1 hoạt động theo id, kèm phần mô tả chi tiết (yêu cầu, quyền lợi, lưu ý). Không có thì trả về null. */
    public static function activity(int $id): ?array
    {
        foreach (self::activities() as $activity) {
            if ($activity['id'] === $id) {
                return $activity + [
                    'requirements' => [
                        'Từ 16 tuổi trở lên, có sức khỏe tốt',
                        'Nhiệt tình, có trách nhiệm và tinh thần làm việc nhóm',
                        'Có mặt đúng giờ theo thông báo của ban tổ chức',
                    ],
                    'benefits' => [
                        'Được cấp giấy chứng nhận tham gia và ghi nhận số giờ tình nguyện',
                        'Được hỗ trợ nước uống, ăn nhẹ và bảo hiểm trong thời gian hoạt động',
                        'Cơ hội kết nối với cộng đồng những người tử tế',
                    ],
                    'notes' => [
                        'Mang theo giấy tờ tùy thân và mặc trang phục gọn gàng, thoải mái',
                        'Nếu không thể tham gia, hãy hủy đăng ký trước ít nhất 24 giờ',
                    ],
                ];
            }
        }

        return null;
    }

    /** Tìm kiếm + lọc hoạt động cho trang danh sách (chỉ dùng trong giai đoạn giao diện). */
    public static function searchActivities(?string $q, ?string $category, ?string $location, ?string $time): array
    {
        return array_values(array_filter(self::activities(), function ($a) use ($q, $category, $location, $time) {
            if ($q && mb_stripos($a['title'] . ' ' . $a['description'], $q) === false) {
                return false;
            }
            if ($category && $a['category'] !== $category) {
                return false;
            }
            if ($location && !str_contains($a['location'], $location)) {
                return false;
            }
            if ($time && substr($a['date'], 3) !== $time) {   // '18/10/2026' -> '10/2026'
                return false;
            }
            return true;
        }));
    }

    public static function categories(): array
    {
        return ['Môi trường', 'Giáo dục', 'Sức khỏe', 'Cộng đồng'];
    }

    public static function locations(): array
    {
        return ['TP.HCM', 'Vũng Tàu', 'Lâm Đồng'];
    }

    public static function months(): array
    {
        return ['09/2026' => 'Tháng 9/2026', '10/2026' => 'Tháng 10/2026', '11/2026' => 'Tháng 11/2026'];
    }

    /** Tình nguyện viên đang "đăng nhập" (giả). */
    public static function user(): array
    {
        return [
            'name' => 'Nguyễn Văn An',
            'initials' => 'NA',
            'email' => 'nguyenvanan@example.com',
            'phone' => '0901 234 567',
            'birthday' => '15/08/2003',
            'birthday_iso' => '2003-08-15',
            'address' => '12 Nguyễn Huệ, Quận 1, TP. Hồ Chí Minh',
            'bio' => 'Sinh viên năm cuối ngành Công nghệ thông tin. Yêu thích các hoạt động bảo vệ môi trường và dạy học cho trẻ em. Mong muốn góp một phần nhỏ để cộng đồng tốt đẹp hơn.',
            'joined' => '03/2026',
        ];
    }

    /** Các hoạt động mà tình nguyện viên đã đăng ký (chưa diễn ra). status = trạng thái đăng ký. */
    public static function myRegistrations(): array
    {
        $rows = [
            [1, 'approved', '02/10/2026'],
            [4, 'pending', '05/10/2026'],
            [2, 'approved', '06/10/2026'],
        ];

        return array_map(fn ($r) => [
            'activity' => self::activity($r[0]),
            'status' => $r[1],
            'registered_at' => $r[2],
        ], $rows);
    }

    /** Danh sách id hoạt động đã đăng ký (để hiện nút "Đã đăng ký"). */
    public static function registeredIds(): array
    {
        return array_map(fn ($r) => $r['activity']['id'], self::myRegistrations());
    }

    /** Lịch sử tham gia (các hoạt động đã kết thúc). */
    public static function history(): array
    {
        return [
            ['title' => 'Vui Trung thu cho trẻ em', 'category' => 'Cộng đồng', 'date' => '25/09/2026', 'location' => 'Mái ấm Hoa Hồng, TP.HCM', 'hours' => 4, 'status' => 'attended'],
            ['title' => 'Hiến máu nhân đạo - Giọt hồng mùa hè', 'category' => 'Sức khỏe', 'date' => '20/08/2026', 'location' => 'Nhà văn hóa Thanh Niên, TP.HCM', 'hours' => 5, 'status' => 'attended'],
            ['title' => 'Làm sạch kênh Nhiêu Lộc', 'category' => 'Môi trường', 'date' => '12/07/2026', 'location' => 'Kênh Nhiêu Lộc, TP.HCM', 'hours' => 3, 'status' => 'attended'],
            ['title' => 'Mùa hè xanh - Dạy tiếng Anh', 'category' => 'Giáo dục', 'date' => '28/06/2026', 'location' => 'Huyện Cần Giờ, TP.HCM', 'hours' => 4, 'status' => 'attended'],
            ['title' => 'Chạy bộ gây quỹ vì trẻ em', 'category' => 'Cộng đồng', 'date' => '15/05/2026', 'location' => 'Công viên Tao Đàn, TP.HCM', 'hours' => 0, 'status' => 'absent'],
        ];
    }

    /** 4 số liệu ở dashboard, tính từ dữ liệu bên trên để luôn khớp với các trang khác. */
    public static function stats(): array
    {
        $history = self::history();
        $upcoming = count(self::myRegistrations());

        return [
            'registered' => $upcoming + count($history),
            'upcoming' => $upcoming,
            'completed' => count(array_filter($history, fn ($h) => $h['status'] === 'attended')),
            'hours' => array_sum(array_column($history, 'hours')),
        ];
    }

    /** Thông báo của tình nguyện viên. color: '' (xanh lá) | blue | accent | danger */
    public static function notifications(): array
    {
        return [
            ['icon' => 'bi-check-circle', 'color' => '', 'title' => 'Đăng ký được duyệt', 'message' => 'Đăng ký tham gia "Dọn rác bãi biển Vũng Tàu" của bạn đã được duyệt.', 'time' => '2 giờ trước', 'read' => false],
            ['icon' => 'bi-alarm', 'color' => 'accent', 'title' => 'Nhắc lịch hoạt động', 'message' => 'Hoạt động "Phát cơm từ thiện cuối tuần" sẽ diễn ra vào ngày 10/10/2026. Hãy có mặt đúng giờ nhé!', 'time' => '5 giờ trước', 'read' => false],
            ['icon' => 'bi-check-circle', 'color' => '', 'title' => 'Đăng ký được duyệt', 'message' => 'Đăng ký tham gia "Dạy học cho trẻ em vùng cao" của bạn đã được duyệt.', 'time' => 'Hôm qua', 'read' => true],
            ['icon' => 'bi-megaphone', 'color' => 'blue', 'title' => 'Hoạt động mới', 'message' => 'Có hoạt động mới phù hợp với bạn: "Trồng cây xanh công viên". Đăng ký ngay!', 'time' => '2 ngày trước', 'read' => true],
            ['icon' => 'bi-x-circle', 'color' => 'danger', 'title' => 'Đăng ký chưa được chấp nhận', 'message' => 'Rất tiếc, hoạt động "Hiến máu nhân đạo" đã đủ số lượng tình nguyện viên.', 'time' => '3 ngày trước', 'read' => true],
            ['icon' => 'bi-award', 'color' => 'accent', 'title' => 'Ghi nhận đóng góp', 'message' => 'Bạn đã hoàn thành 16 giờ tình nguyện. Cảm ơn những đóng góp của bạn!', 'time' => '1 tuần trước', 'read' => true],
        ];
    }
}