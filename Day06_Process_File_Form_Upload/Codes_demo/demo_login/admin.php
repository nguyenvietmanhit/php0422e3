<?php
session_start();
//admin.php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// Với các message mà chỉ hiển thị 1 lần, thì sau khi
//hiển thị cần phải xóa đi
echo $_SESSION['success'];
unset($_SESSION['success']);
echo "Chào bạn, " . $_SESSION['username'];