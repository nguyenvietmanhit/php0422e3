<?php
// backend/controllers/CategoryController.php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
class CategoryController extends Controller {
    //index.php?controller=category&action=index
    public function index() {
        // - Controller xử lý submit form:
        // B1:
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        //B2:
        //B3:
        $keyword = '';
        if (isset($_GET['submit'])) {
            //B4
            $keyword = $_GET['keyword'];
            //B5:
            //B6:
//            if (empty($this->error)) {
//                // - Controller gọi Model truy vấn lấy
//                //các danh mục theo từ khóa tìm kiếm
//            }
        }

        // - Controller gọi Model truy vấn lấy dữ liệu
        $category_model = new Category();
        $categories = $category_model->getAll($keyword);
//        echo '<pre>';
//        print_r($categories);
//        echo '</pre>';

        // - Controller gọi View để hiển thị giao diện:
        $this->page_title = 'Trang danh sách danh mục';
        $this->content =
        $this->render('views/categories/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
}