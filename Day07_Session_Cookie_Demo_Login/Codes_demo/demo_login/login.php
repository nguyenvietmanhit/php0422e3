<!--demo_login /-->
<!--           /login.php: xử lý đăng nhập-->
<!--           /logout.php: xử lý đăng xuất-->
<!--           /admin.php: sau khi login thành công-->
<!--login.php-->
<?php
session_start();
// - Ktra nếu tồn tại cookie username thì đăng nhập luôn bằng
//cách chuyển hướng sang trang admin:
if (isset($_COOKIE['username'])) {
    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: admin.php');
    exit();
}

// - Ktra nếu đã đăng nhập thì ko cho truy cập lại trang login,
//mà chuyển hướng sang trang admin
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Ko thể truy cập lại trang login khi
    đã đăng nhập';
    header('Location: admin.php');
    exit();
}

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
            // - Nếu user có tích vào Ghi nhớ đăng nhập thì tạo
            //cookie để lưu lại username:
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 3600);
            }
            // - Tạo session để lưu lại thông tin đăng nhập
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

<h3 style="color: red">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
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