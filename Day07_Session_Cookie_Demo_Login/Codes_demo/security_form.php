<!--
security_form.php
Hai lỗi bảo mật phổ biến nhất trong form:
+ XSS: Cross Site Scripting: tấn công bằng các code Javascript
+ CSRF: Cross Site Request Forgery: tấn công giả mạo chủ hệ thống
VD: Mạnh là admin của 1 hệ thống
Url xóa user: user.php?id=1
Bạn Trang tình cờ biết đc url xóa user trên, soạn 1 email
<a href='user.php?id=1'><img src='hap-dan.jpg' /></a>
- Cách phòng chống: mỗi 1 form tạo 1 input dạng ẩn có giá trị
là 1 token nào đó, mỗi khi xử lý form cần check token này trc
, nếu token trùng với token đã định nghĩa từ trc trên hệ thống
thì mới xử lý form
-->
<!--Demo XSS-->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    //   <script>alert(document.cookie)</script>
    // - Nếu như nhập chuỗi ở trên, thì thay vì hiển thị ra thì
    // lại chạy code Javascript -> XSS
    // - Cách chống: chuyển đổi các ký tự đặc biệt như < >
    //thành ký tự an toàn để hiển thị ra
    // - Thực tế luôn luôn cần chống XSS
    $fullname = htmlspecialchars($fullname);
    echo "Họ tên vừa nhập: $fullname";
}
?>
<form action="" method="post">
    Nhập họ tên:
    <input type="text" name="fullname" />
    <br />
    <input type="submit" name="submit" value="Hiển thị" />
</form>
