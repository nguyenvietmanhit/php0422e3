<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function add() {
        // Lấy id của sản phẩm gửi lên từ ajax
        $product_id = $_GET['product_id'];
        // - Controller gọi Model truy vấn lấy sp theo id
        $product_model = new Product();
        $product = $product_model->getById($product_id);
//        echo '<pre>';
//        print_r($product);
//        echo '</pre>';
        // Tạo mảng để lưu các thông tin của item giỏ hàng:
        $cart_item = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1 //mặc định mỗi lần thêm vào giỏ là
            //thêm 1 sp
        ];

        // - Nếu giỏ hàng chưa tồn tại, khởi tạo giỏ hàng và thêm
        //item đầu tiên vào giỏ
        // - Nếu giỏ hàng đã tồn tại:
        // + Sp thêm đã tồn tại trong giỏ: cập nhật số lượng lên 1
        // + Sp thêm ko tồn tại -> thêm mới
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [
                $product_id => $cart_item
            ];
        } else {
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
        echo '<pre>';
        print_r($_SESSION['cart']);
        echo '</pre>';
    }

    public function index() {
        // - Controller xử lý submit form:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            // Update lại số lượng sản phẩm trong giỏ hàng
            foreach ($_SESSION['cart'] AS $product_id => $cart_item) {
                // Validate số lượng < 0 với trường hợp user sửa
                //trực tiếp HTML
                if ($_POST[$product_id] < 0) {
                    $_SESSION['error'] = 'Số lượng phải > 0';
                    header('Location: gio-hang-cua-ban.html');
                    exit();
                }
                $_SESSION['cart'][$product_id]['quantity']
                    = $_POST[$product_id];
            }
            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
        }

        // - Controller gọi View
        $this->page_title = 'Giỏ hàng của bạn';
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';

        //xoa-san-pham/2.html
    }

    public function delete() {
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['success'] = "Xóa sp có id = $product_id thành công";
        header('Location: gio-hang-cua-ban.html');
        exit();
        //san-pham/fdaafdasfd/2.html
    }
}