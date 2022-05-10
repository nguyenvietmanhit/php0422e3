<!--
upload_file.php
XỬ LÝ UPLOAD FILE TRONG PHP
-->
<?php
// XỬ LÝ FORM:
// Để xử lý form có file, bắt buộc phải upload file lên hệ thống
//  - B1: Debug
// $_GET chỉ bắt đc tên file -> ko thể xử lý upload file đc
// + Có 2 điều kiện bắt buộc để PHP lấy đc thông tin file gửi lên:
// - Method form phải là POST
// - Form phải thêm thuộc tính enctype
// + PHP tạo ra sẵn 1 mảng là $_FILES lưu thông tin file gửi lên,
//, là mảng 2 chiều
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// + Các thuộc tính của $_FILES:
// - name và full_path: tên file upload
// - type: kiểu file upload
// - tmp_name (temporary): là đường dẫn vật lý lưu tạm thời file
// vừa upload
// - error: mã lỗi khi upload file vào tmp_name
// = 0: ko có lỗi
// = 1: upload thất bại do file vượt quá dung lượng cho phép
// -> chỉ cần quan tâm nếu error = 0 thì ko có lỗi gì cả, ngược
//lại là có lỗi
// - size: dung lượng của file upload, đơn vị là Byte
// 1MB = 1024Kb = 1024 * 1024 B = 1024 * 1024 * 8 Bit
// - B2: Tạo biến error và result:
$error = '';
$result = '';
// - B3: Ktra nếu submit form thì mới xử lý form
if (isset($_POST['upload'])) {
    // - B4: Lấy giá trị từ form
    $avatars = $_FILES['avatar']; // mảng 1 chiều
    // - B5: Validate form:
    // + File upload phải là ảnh: jpeg, png, jpg, gif
    // + File upload ko đc vượt quá 2Mb
    // Cần phải check nếu như có file tải lên thì mới xử lý file:
    if ($avatars['error'] == 0) {
        // + File upload phải là ảnh:
        // Lấy đuôi file từ file upload:
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
        // Chuyển đuôi file về chữ thường hết
        $extension = strtolower($extension);
        // Tạo mảng lưu đuôi file ảnh hợp lệ
        $allows = ['jpg', 'jpeg', 'png', 'gif'];
        // Ktra đuôi file nếu ko nằm trong mảng trên thì báo lỗi:
        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        // + File upload ko đc vượt quá 2Mb
        $size_b = $avatars['size'];
        // Chuyển Byte về Mb: 1mb = 1024 Kb = 1024 * 1024 B
        $size_mb = $size_b / 1024  / 1024;
        if ($size_mb > 2) {
            $error = 'File upload ko đc vượt quá 2Mb';
        }
    }

    // B6 - Xử lý logic chính chỉ khi ko có lỗi nào xảy ra:
    if (empty($error)) {
        // + Xử lý upload file vào thư mục chỉ định
        // Lưu tên file
        $avatar = '';
        // Ktra nếu có file lên thì mới xử lý đc
        if ($avatars['error'] == 0) {
            // Tạo đường dẫn tương đối tới thư mục muốn upload file
            $dir_upload = 'uploads';
            // Ko tạo thủ công thư mục trên trong cấu trúc project,
            // cần tạo bằng code, luôn cần kiểm tra nếu đường dẫn
            // thư mục chưa tồn tại thì mới tạo mới
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Tạo ra tên file mang tính duy nhất, để tránh upload
            //file trùng tên sẽ bị ghi đè nhau:
            $avatar = time() . "-" . $avatars['name'];
            // Upload file từ thư mục tạm tmp_name vào thư mục
            //chỉ định:
            $is_upload = move_uploaded_file($avatars['tmp_name'],
            "$dir_upload/$avatar");
            var_dump($is_upload);
            if ($is_upload) {
                $result .= "Ảnh đại diện:";
                $result .= "<img src='$dir_upload/$avatar' height='100px' />";
                $result .= "<br />Dung lượng file Byte: " . $avatars['size'];

            }

        }
    }
}
// - B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    Tải ảnh đại diện:
    <input type="file" name="avatar" />
    <br />
    <input type="submit" name="upload" value="Tải ảnh" />
</form>