<?php
//mvc/backend/controllers/UserController.php
// Tạo luôn:
// models/User.php
// views/users/
//            /register.php
//            /login.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {
    //index.php?controller=user&action=register
    public function register() {
        // - Controller xử lý submit form:
        // B1:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // B2:
        // B3:
        if (isset($_POST['submit'])) {
            //B4:
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            //B5:
            //B6:
            if (empty($this->error)) {
                // Mã hóa mật khẩu:
                $password = password_hash($password, PASSWORD_BCRYPT);
                // - Controller gọi Model truy vấn insert:
                $user_model = new User();
                $is_register = $user_model
                    ->registerUser($username, $password);
                var_dump($is_register);
            }
        }
        // - Controller gọi View để hiển thị giao diện
        $this->page_title = 'Trang đăng ký';
        $this->content =
            $this->render('views/users/register.php');
//        require_once 'views/layouts/main.php';
        // Tạo 1 layout mới: copy main.php
        // -> main_login.php
        //xóa hết nội dung trong thẻ body
        require_once 'views/layouts/main_login.php';
    }

    //index.php?controller=user&action=login
    public function login() {
        // - Controller xử lý submit form:
        // B1:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        //B2:
        //B3:
        if (isset($_POST['submit'])) {
            //B4
            $username = $_POST['username'];
            $password = $_POST['password'];
            //B5:
            //B6:
            if (empty($this->error)) {
                // -Xử lý logic đăng nhập:
                // + Cần dựa vào thuật toán mã hóa lúc đăng ký:
                // B1: Truy vấn CSDL lấy ra user dựa theo username
                // -> lấy đc mật khẩu đã mã hóa của user
                $user_model = new User();
                $user = $user_model->getUser($username);
//                echo '<pre>';
//                print_r($user);
//                echo '</pre>';
                if (empty($user)) {
                    $this->error = 'Username ko tồn tại';
                } else {
                    // B2: So khớp mk đã mã hóa này với mk từ form
                    // theo thuật toán mã hóa
                    $password_hash = $user['password'];
                    $is_login = password_verify($password, $password_hash);
                    var_dump($is_login);
                    if ($is_login) {
                        //Đăng nhập thành công
                        $_SESSION['user'] = $user;
                        // Chuyển hướng sang trang quản trị
                        header('Location: index.php?controller=product&action=create');
                        exit();
                    } else {
                        $this->error = 'Sai tài khoản hoặc mật khẩu';
                    }
                }


            }
        }
        // - Controller gọi View
        $this->page_title = 'Form đăng nhập';
        $this->content =
            $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }

    //index.php?controller=user&action=logout
    public function logout() {
        unset($_SESSION['user']);
        header('Location: index.php?controller=user&action=login');
        exit();
    }
}