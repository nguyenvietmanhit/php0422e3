<?php
// backend/controllers/CategoryController.php
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
    //index.php?controller=category&action=index
    public function index() {
        // - Controller gọi View để hiển thị giao diện:
        $this->page_title = 'Trang danh sách danh mục';
        $this->content =
        $this->render('views/categories/index.php');
        require_once 'views/layouts/main.php';
    }
}