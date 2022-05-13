<!--demo_login /-->
<!--           /login.php: xử lý đăng nhập-->
<!--           /logout.php: xử lý đăng xuất-->
<!--           /admin.php: sau khi login thành công-->
<!--login.php-->
<?php
session_start();
// XỬ LÝ FORM:
// - B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// - B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// - B3: Ktra nếu submit form thì mới xử lý:
if (isset($_POST['login'])) {
    // - B4: Lấy giá trị từ form thông qua việc gán biến
    $username = $_POST['username'];
    $password = $_POST['password'];
    // - B5: Validate form:
    // + Ko để trống username và password: empty
    // + Username phải lớn hơn 3 ký tự: strlen
    if (empty($username) || empty($password)) {
        $error = 'Ko để trống username và password';
    } else if (strlen($username) < 3) {
        $error = 'Username phải lớn hơn 3 ký tự';
    }
    // - B6: Xử lý logic bài toán chỉ ko có lỗi xảy ra:
    if (empty($error)) {
        // + Xử lý đăng nhập
        // Giả sử đăng nhập thành công khi password = 123
        if ($password == 123) {
            // Login thành công
            // Tạo session để lưu lại thông tin đăng nhập
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Đăng nhập thành công';
            // Chuyển hướng sang trang admin.php
            header('Location: admin.php');
            exit(); // Kết thúc header luôn là exit
        } else {
            // Login thất bại
            $error = 'Sai username hoặc password';
        }
    }
}
// - B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
    Username:
    <input type="text" name="username" value="" />
    <br />
    Password:
    <input type="password" name="password" value="" />
    <br />
    <input type="checkbox" name="remember" value="0" />
    Ghi nhớ đăng nhập
    <br />
    <input type="submit" name="login" value="Login" />
</form>