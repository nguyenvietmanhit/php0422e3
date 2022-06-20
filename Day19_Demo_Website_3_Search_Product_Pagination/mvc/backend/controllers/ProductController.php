<?php
//backend/controllers/ProductController.php
require_once 'controllers/Controller.php';

class ProductController extends Controller {

    //index.php?controller=product&action=create
    public function create() {
        // NẾu chưa login thì ko cho truy cập...

        // - Controller gọi View để hiển thị giao diện:
        $this->page_title = 'Trang thêm mới sản phẩm';
        $this->content =
        $this->render('views/products/create.php');
        require_once 'views/layouts/main.php';
    }

}