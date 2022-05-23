<?php
//connect.php
// 1 - Tổng quan:
// + Có 1 form liên hệ, user nhập thông tin -> lưu vào CSDL
// bằng cách nào
// + PHP và MySQL hoàn toàn độc lập nhau, để kết nối đc cần sử
//dụng thư viện từ bên thứ 3:
// - MySQLi: hỗ trợ cả 2 cách tiếp cận là dùng PHP thuần và OOP,
// ưu tiên dùng thuần vị nó dễ tiếp cận, chỉ hỗ trợ kết nối tới
// 1 CSDL là MySQL
// - PDO: chỉ tiếp cận theo hướng OOP, hỗ trợ kết nối tới nhiều
// CSDL thông dụng
// + Cài thư viện MySQLi ntn ?XAMPP cài sẵn r
// 2 - Các bước kết nối từ PHP tới MySQL
// + Khởi tạo kết nối:
// Tên máy chủ đang chứa CSDL
const DB_HOST = 'localhost';
// Username đăng nhập vào CSDL:
const DB_USERNAME = 'root'; // XAMPP tạo sẵn user có quyền admin
// Password đăng nhập vào CSDL:
const DB_PASSWORD = ''; // XAMPP tạo sẵn
// Tên CSDL sẽ kết nối tới:
const DB_NAME = 'php0422e3';
// Cổng kết nối tới CSDL:
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME,
DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo 'Kết nối CSDL thành công';

// 3 - Truy vấn INSERT:
// Bảng products: id, category_id, name, price, description,
//created_at
// + B1: Viết truy vấn:
$sql_insert = "INSERT INTO 
products(category_id, name, price, description)
VALUES (3, 'Máy tính Apple', 1000, 'Des Apple')";
// + B2: Thực thi truy vấn: truy vấn INSERT trả về boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// -> Debug khi false: copy câu truy vấn chạy trực tiếp trên
//PHPMyadmin
// 4 - Truy vấn UPDATE:
// Update name=abc, price=123 cho sp có id = 3
// + B1: Viết truy vấn:
$sql_update = "UPDATE products SET name = 'abc', price = 123
WHERE id = 3";
// + B2: Thực thi truy vấn: UPDATE trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);
// 5 - Truy vấn DELETE:
// Xóa sp có id > 7
// + B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > 7";
// + B2: Thực thi truy vấn: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
// 6 - Truy vấn SELECT:
// + SELECT 1 bản ghi: lấy ra sp có id = 1
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// B2: Thực thi truy vấn: khác với INSERT UPDATE DELETE, kiểu dữ
//liệu trả về ko phải là boolean, mà 1 obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về mảng kết hợp 1 chiều chứa bản ghi mong muốn:
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';
echo 'Tên sp: ' . $product['name'];
// + SELECT nhiều bản ghi: lấy tất cả sp đang có
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products";
// B2: Thực thi truy vấn:
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng 2 chiều nhiều phần tử, mỗi phần tử là 1 bản ghi
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
