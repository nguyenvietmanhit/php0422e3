<?php
//connection.php
// KẾt nối CSDL, trả về đối tượng kết nối
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0422e3';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo 'Kết nối CSDL thành công';