<?php
session_start();
//test.php
// - Nhúng file chứa biến fullname vào
// PHP có 4 hàm nhúng file: include, require, include_once,
//require_once
// Nhóm include và require khác nhau ở thực thi đoạn code phía
//sau việc nhúng file trong trường hợp nhúng file ko tồn tại,
//include nó vẫn chạy code phía sau còn require thì ko
// -> ưu tiên dùng hàm require_once
// -> nhúng file đã giải quyết đc trường hợp sử dụng lại đc biến,
//tuy nhiên đang bị thừa các xử lý ko mong muốn trong file nhúng
//require_once 'session_cookie.php';
//echo $fullname;
// + Ktra sau khi khởi tạo session thì có truy cập đc từ mọi file
//trên hệ thống:
// + Luôn luôn cần chắc chắn là tồn tại session thì mới thao tác:
echo isset($_SESSION['address']) ? $_SESSION['address'] : '';
// Mở trình duyệt ẩn:
// + Tương tự session, cùng cần ktra nếu tồn tại cookie thì mới
//thao tác
echo isset($_COOKIE['name1']) ? $_COOKIE['name1'] : '';