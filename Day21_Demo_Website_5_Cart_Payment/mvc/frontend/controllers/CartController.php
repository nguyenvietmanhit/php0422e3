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
}