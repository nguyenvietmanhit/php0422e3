<!--views/products/create.php-->
<h3>Form thêm mới sp</h3>
<form action="" method="post">
    Nhập tên sp:
    <input type="text" name="title" value=""
           class="form-control" />
    <br />
    Nhập chi tiết sp:
    <textarea name="description" id="des" class="form-control"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu sp"
    class="btn btn-primary"
    />
</form>
<!--
- Tích hợp trình soạn thảo CKEditor vào:
+ Tải thư viện tại trang ckeditor.com,
giải nén r đặt trong thư mục assets
+ Nhúng file ckeditor.js vào file layout
-->