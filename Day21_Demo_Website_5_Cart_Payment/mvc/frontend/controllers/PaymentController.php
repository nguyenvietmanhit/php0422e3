<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';

class PaymentController extends Controller
{
    public function index() {
        // - Controller xử lý submit form:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            if (empty($this->error)) {
                // Xử lý logic thanh toán:
                // - Lưu vào bảng orders trước:
                // + Tính tổng giá trị đơn hàng:
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $cart_item) {
                    $price_total +=
                        $cart_item['price'] * $cart_item['quantity'];
                }
                $payment_status = 0; //mặc định là chưa thanh toán
                $infos = [
                    'fullname' => $fullname,
                    'address' => $address,
                    'mobile' => $mobile,
                    'email' => $email,
                    'note' => $note,
                    'method' => $method,
                    'price_total' => $price_total,
                    'payment_status' => $payment_status,
                ];
                $order_model = new Order();
                // Trả về id của order vừa insert thành công, để
                //insert tiếp vào bảng order_details
                $order_id = $order_model->insertData($infos);
                var_dump($order_id);
                // - Lưu tiếp vào bảng order_details
                foreach ($_SESSION['cart'] AS $cart_item) {
                    $order_detail_model = new OrderDetail();
                    $details = [
                        'order_id' => $order_id,
                        'product_name' => $cart_item['name'],
                        'product_price' => $cart_item['price'],
                        'quantity' => $cart_item['quantity']
                    ];
                    $is_insert = $order_detail_model->insertData($details);
                    var_dump($is_insert);
                }
                // - Dựa vào phương thức thanh toán để xử lý:
                if ($method == 0) {
                    //Thanh toán trực tuyến
                } else {
                    // Là thanh toán COD
                }
                // - Gửi mail xác nhận đơn hàng
                // - Xóa giỏ hàng
                // - Chuyển hướng về trang cám ơn
            }
        }

        // - Controller gọi View
        $this->page_title = 'Trang thanh toán';
        $this->content =
            $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }
}