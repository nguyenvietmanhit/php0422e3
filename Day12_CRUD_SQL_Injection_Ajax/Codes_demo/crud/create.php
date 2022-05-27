<!--
create.php
Bảng categories: id, name, description, created_at
-->
<?php
session_start();
require_once 'connection.php';
// XỬ LÝ FORM
// + B1: Debug
echo '<pre>';
print_r($_POST);
echo '</pre>';
// + B2: Tạo biến lưu lỗi và kết quả:
$error = '';
$result = '';
// + B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_POST['submit'])) {
    // + B4: Lấy giá trị từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    // + B5: Validate form: ko đc để trống các trường
    if (empty($name) || empty($description)) {
        $error = 'Phải nhập tất cả trường';
    }
    // + B6: Xử lý logic bài toán chỉ khi ko có lỗi nào xảy ra
    if (empty($error)) {
        // + Insert dữ liệu vào bảng categories
        // Cần nhúng file connection.php để sử dụng ddc biến
        //kết nối:
        // B1: Viết truy vấn:
        $sql_insert = "INSERT INTO categories(name, description)
        VALUES('$name', '$description')";
        // B2: Thực thi truy vấn: trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        var_dump($is_insert);
        // Khi thêm thành công cần chuyển hướng về trang danh sách
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm mới thành công';
            header('Location: index.php');
            exit();
        }
    }
}
// + B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
    Nhập tên danh mục:
    <input type="text" name="name" value="" />
    <br />
    Nhập chi tiết danh mục:
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu danh mục" />
    <a href="index.php">Về trang ds</a>
</form>



