
<?php
// pdo.php
// Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
// + Thư viện MySQLi chỉ kết nối tới 1 CSDL duy nhất là MySQL
// + PDO : PHP Data Object, là thư viện dùng để kết nối CSDL từ
//PHP, hỗ trợ kết nối nhiều CSDL khác nhau
// + Thực tế website luôn ưu tiên dùng PDO
// 1 - Khởi tạo kết nối:
// Data Source Name:
const DB_DSN = 'mysql:host=localhost;dbname=php0422e3;port=3306;charset=utf8';
// Username đăng nhập CSDL:
const DB_USERNAME = 'root';
//Password đăng nhập CSDL:
const DB_PASSWORD = '';
try {
    $connection = new PDO(DB_DSN,
        DB_USERNAME,DB_PASSWORD);
} catch (Exception $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo 'Kết nối CSDL thành công';
// Bảng categories: id, name, description, created_at
// 2 - Truy vấn INSERT:
// B1: Viết truy vấn: cần chống lỗi bảo mật SQL Injection
//ngay tại bước này, sử dụng kỹ thuật bind param: thời điểm viết
//truy vấn ko truyền giá trị thật cho các trường, mà sẽ để ở dạng
//tham số
$sql_insert = "INSERT INTO categories(name, description)
VALUES(:name, :description)";
// B2: Chuẩn bị đối tượng truy vấn:
$obj_insert = $connection->prepare($sql_insert);
// B3: Tạo mảng để truyền giá trị thật cho các tham số trong câu
//truy vấn, số phần tử mảng = số tham số trong câu truy vấn, chỉ
//có khi câu truy vấn có tham số
$inserts = [
    ':name' => 'Thể thao',
    ':description' => 'Chi tiết thể thao'
];
// B4: Thực thi obj truy vấn: INSERT trả về boolean
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
// 3 - Truy vấn UPDATE: các bước giống hệt INSERT
// B1: Viết truy vấn dạng tham số:
$sql_update = "UPDATE categories 
SET name = :name, description = :description
WHERE id = :id";
// B2: Cbi obj truy vấn
$obj_update = $connection->prepare($sql_update);
// B3: Tạo mảng:
$updates = [
    ':name' => 'abc',
    ':description' => 'def',
    ':id' => 1
];
//B4: Thực thi: UPDATE trả về boolean
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 4 - Truy vấn DELETE: giống INSERT UPDATE
// B1: Viết truy vấn dạng tham số:
$sql_delete = "DELETE FROM categories WHERE id > :id";
// B2: Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// B3: Tạo mảng
$deletes = [
    ':id' => 10
];
// B4: Thực thi: DELETE trả về boolean
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// 5 - Truy vấn SELECT:
// - SELECT 1 bản ghi
// B1: Viết truy vấn dạng tham số:
$sql_select_one = "SELECT * FROM categories WHERE id = :id";
// B2: cbi obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// B3: Tạo mảng:
$selects = [
    ':id' => 2
];
// B4: Thực thi: với SELECT ko cần quan tâm đến kết quả trả về
$obj_select_one->execute($selects);
// B5: Trả về mảng 1 chiều:
$category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($category);
echo '</pre>';

// - SELECT nhiều bản ghi
// B1: Viết truy vấn dạng tham số:
$sql_select_all = "SELECT * FROM categories";
// B2: Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// B3: Tạo mảng -> bỏ qua vì câu truy vấn ko có tham số nào
// B4: Thực thi:
$obj_select_all->execute();
// B5: Trả về mảng 2 chiều:
$categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($categories);
echo '</pre>';

