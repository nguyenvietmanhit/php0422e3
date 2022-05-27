<?php
session_start();
require_once 'connection.php';
//update.php
// update.php?id=3
// - Cần validate tham số id trên url:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Tham số id ko hợp lệ';
    header('Location: index.php');
    exit();
}
// - Lấy thông tin danh mục muốn sửa đổ ra form
$id = $_GET['id'];
// + Thực hiện các bước truy vấn lấy dữ liệu ra:
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM categories WHERE id = $id";
// B2: Thực thi truy vấn: SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về mảng kết hợp 1 chiều chứa thông tin bản ghi:
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';
?>
<!--Copy form HTML từ Thêm mới sang Cập nhật-->
<form action="" method="post">
    Tên danh mục:
    <input type="text" name="name" value="" />
    <br />
    Chi tiết danh mục:
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Cập nhật danh mục" />
    <a href="index.php">Về trang ds</a>
</form>
