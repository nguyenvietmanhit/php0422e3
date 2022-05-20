<?php
session_start();
//admin.php
// - Ktra nếu user chưa login thì ko cho truy cập trang này:
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Bạn chưa đăng nhập, ko thể truy cập
    trang admin';
    header('Location: login.php');
    exit();
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// Với các message mà chỉ hiển thị 1 lần, thì sau khi
//hiển thị cần phải xóa đi
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['username'])) {
    echo "Chào bạn, " . $_SESSION['username'];
}

echo "<a href='logout.php'>Đăng xuất</a>";