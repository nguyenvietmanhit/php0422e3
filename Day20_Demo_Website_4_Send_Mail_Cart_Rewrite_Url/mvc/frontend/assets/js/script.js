// mvc/frontend/assets/js/script.js
$(document).ready(function () {
    // Ctrl + Shift + R để xóa cache trình duyệt
    // alert('hello');
    $('.add-to-cart').click(function () {
        // Lấy id của sp đang click Thêm vào giỏ
        var product_id = $(this).attr('data-id');
        // Gọi ajax nhờ PHP thêm sp hiện tại vào session giỏ hàng
        $.ajax({
            // Url PHP để xử lý ajax
            url: 'index.php?controller=cart&action=add',
            // Phương thức gửi dữ liệu: get, post, put, delete ...
            method: 'get',
            // Dữ liệu truyền lên
            data: {
                product_id: product_id
            },
            // Nơi nhận dữ liệu trả về từ PHP
            success: function(data) {
                console.log(data);
                // Thông báo cho user sau khi thêm giỏ hàng thành
                //công
                $('.ajax-message').html('Thêm sản phẩm vào giỏ thành công');
                $('.ajax-message').addClass('ajax-message-active');

                // Ẩn message sau 3s
                setTimeout(function() {
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000);

                // Cập nhật số lượng trong giỏ lên 1
                var cart_total = $('.cart-amount').html();
                cart_total++;
                $('.cart-amount').html(cart_total);
            }
        });
    })
})