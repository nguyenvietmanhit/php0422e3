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
// XỬ LÝ FORM: copy B1 - B7 logic xử lý form từ Thêm mới
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
        // - Thực hiện truy vấn cập nhật dữ liệu:
        // + Viết truy vấn:
        $sql_update = "UPDATE categories 
                    SET name='$name', description='$description'
                    WHERE id = $id";
        // + Thực thi truy vấn: UPDATE trả về boolean
        $is_update = mysqli_query($connection, $sql_update);
//        var_dump($is_update);
        if ($is_update) {
            $_SESSION['success'] = 'Cập nhật thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
    }
}
// + B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!--Copy form HTML từ Thêm mới sang Cập nhật-->
<form action="" method="post">
    Tên danh mục:
    <input type="text" name="name"
   value="<?php echo $product['name']; ?>" />
    <br />
    Chi tiết danh mục:
    <textarea name="description"><?php echo $product['description']?></textarea>
    <br />
    <input type="submit" name="submit" value="Cập nhật danh mục" />
    <a href="index.php">Về trang ds</a>
</form>
