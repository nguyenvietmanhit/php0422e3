<?php
require_once 'connection.php';
//crud/sql_injection.php
// Lỗi bảo mật khi câu viết câu truy vấn: SQL Injection
// - Là kỹ thuật tấn công vào câu truy vấn, bằng cách thay đổi
//câu truy vấn thông qua form

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    // - Cần lọc dữ liệu từ form bằng hàm sau để chống lỗi bảo
    //mật SQL Injection:
    // Thực tế luôn cần chống lỗi này
    $name = mysqli_real_escape_string($connection, $name);
    // Thực hiện truy vấn tìm kiếm:
    // + Viết truy vấn:
    $sql_select_all = "SELECT * FROM categories WHERE
name LIKE '%$name%'";
    //    123456' OR name != '
    // SELECT * FROM categories
    // WHERE name LIKE '%123456' OR name != '%'
    var_dump($sql_select_all);
    // + Thực thi truy vấn: SELECT trả obj trung gian
    $result_all = mysqli_query($connection, $sql_select_all);
    // + Trả về mảng 2 chiều:
    $categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    echo '<pre>';
    print_r($categories);
    echo '</pre>';

}
?>
<form action="" method="post">
    Nhập tên muốn tìm:
    <input type="text" name="name" value="" />
    <input type="submit" name="submit" value="Tìm kiếm" />
</form>

