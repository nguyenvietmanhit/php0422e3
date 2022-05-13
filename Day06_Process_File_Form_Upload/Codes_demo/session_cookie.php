<?php
session_start();
//session_cookie.php
// Session và cookie trong PHP
// - Đều dùng để lưu trữ thông tin -> giống hệt biến thông thường
//, tuy nhiên sẽ khác ở điểm là thông tin sau khi đc khởi tạo
//có thể đc truy cập từ mọi file trên hệ thống
// VD:
$fullname = 'manhnv';
echo $fullname;
// Tạo 1 file test.php, ngang hàng với file session_cookie.php
// -> test xem ở file test.php muốn sử dụng lại biến $fullname
// thì có cách nào ko ?

// 2 - Session:
// + Đc lưu bởi biến mảng $_SESSION
// + Bắt buộc phải khởi tạo r mới sử dụng đc, phải khởi tạo
//ở đầu file bằng hàm session_start()
// + Đc lưu trên server, user ko thể biết đc 1 trang web đang
//lưu các session -> session bảo mật
// + Một số chức năng: đăng nhập, giỏ hàng ...
// + Mất đi khi đóng trình duyệt
// - Các thao tác với session: giống hệt thao tác với mảng
// + Thêm session mới:
$_SESSION['address'] = 'Hà Nội';
$_SESSION['age'] = 32;
$_SESSION['class'] = 'PHP0422E3';
$_SESSION['amount'] = 34;
// + Xóa session: unset
unset($_SESSION['amount']);
//Xóa mọi session đang có trên hệ thống:
// session_destroy();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo "<br />";
// 3 - Cookie:
// + Đc lưu bởi mảng $_COOKIE, lưu toàn bộ thông tin cookie đang
// có trên hệ thống
// + Ko cần khởi tạo, sử dụng đc luôn
// + Lưu trên trình duyệt, user có thể biết web lưu cookie gì vào
//trình duyệt
// VD: Truy cập vnxpress.net, ktra xem trang này lưu cookie nào
//vào trình duyệt
//Inspect HTML -> Application -> Storage -> Cookies, check
//theo domain tương ứng của web đang truy cập
// + Chức năng: quảng cáo, tăng tốc độ tải trang
// + Ko tự mất đi khi đóng trình duyệt, mà phụ thuộc vào thời
//gian sống lúc tạo ra
// - Thao tác với cookie
// + Thêm cookie:
 //$_COOKIE['name1'] = 'manhnv1'; ko thêm đc kiểu này
setcookie('name1', 'manhnv1', time() + 60); // sống trong 1p
setcookie('name2', 'manhnv2', time() + 10);
setcookie('name3', 'manhnv3', time() + 3600); //1 giờ
// + Xóa cookie: set thời gian sống là quá khứ, ko dùng đc hàm
//unset
setcookie('name3', '', time() - 1);
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
// 4 - Giống và khác nhau giữa session và cookie:
// + Giống: đều lưu trữ thông tin, khởi tạo 1 lần, truy cập đc
//từ mọi nơi trên hệ thống
// + Khác:
// - Session mất đi khi đóng trình duyệt, cookie thì ko
// - Session bắt buộc phải khởi tạo, cookie thì ko
// - Session lưu trên server, cookie lưu trên trình duyệt

