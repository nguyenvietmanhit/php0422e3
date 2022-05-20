<?php
session_start();
//logout.php
// Xóa các session khi đăng nhập thành công sinh ra
unset($_SESSION['username']);
setcookie('username', '', time() - 1);
$_SESSION['success'] = 'Đăng xuất thành công';
//$success = 'Đăng xuất thành công';
header('Location: login.php');
exit();