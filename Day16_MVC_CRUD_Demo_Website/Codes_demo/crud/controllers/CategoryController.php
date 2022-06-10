<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
//controllers/CategoryController.php
class CategoryController extends Controller {
    public function create() {
        // - Xử lý submit form tại controller:
        // + B1: Debug:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // + B2: Bỏ qua vì đã khai báo thuộc tính error tại class
        //cha
        // + B3:
        if (isset($_POST['submit'])) {
            // + B4:
            $name = $_POST['name'];
            // + B5:
            if (empty($name)) {
                $this->error = "Name ko đc để trống";
            }
            // + B6:
            if (empty($this->error)) {
                // + Controller gọi Model để nhờ Model insert
                //vào CSDL
                $category_model = new Category();
                $is_insert = $category_model->insertData($name);
//                var_dump($is_insert);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
            // + B7: Hiển thị error ra view
        }

//        echo 'create';
        // - Controller gọi View để nhờ view hiển thị giao
        //diện:
        // + Gán giá trị tương ứng cho view:
        $this->page_title = 'Trang thêm mới danh mục';
        $this->content =
            $this->render('views/categories/create.php');
//        var_dump($this->content);
        // Gọi layout để hiển thị ra các thông tin vừa gán:
        require_once 'views/layouts/main.php';

    }

    // index.php?controller=category&action=index
    public function index() {
        // - Controller gọi Model để truy vấn CSDL
        $category_model = new Category();
        $categories = $category_model->listData();
        echo '<pre>';
        print_r($categories);
        echo '</pre>';

        // - Controller gọi View để hiển thị giao diện
        $this->page_title = 'Trang liệt kê danh mục';
        $this->content =
            $this->render('views/categories/index.php');
        require_once 'views/layouts/main.php';
    }
}