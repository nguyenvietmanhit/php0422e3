<?php
/**
 * note.php
 * - Gửi mail:
 * - Giỏ hàng:
 * + Lưu bằng cơ chế nào ? session, cookie, database ...
 * -> session
 * Thêm sp vào giỏ sử dụng Ajax của jQuery để tạo hiệu ứng tốt
 * cho user
 * + Giỏ hàng có cấu trúc như sau:
 */
$_SESSION['cart'] = [
    2 => [
        'name' => 'Iphone x',
        'avatar' => 'ip.png',
        'price' => 3000,
        'quantity' => 4
    ],
    1 => [
        'name' => 'Iphone x1',
        'avatar' => 'ip1.png',
        'price' => 1,
        'quantity' => 1
    ],
];