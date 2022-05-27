<!--
index.php
- CRUD: Create - Read - Update - Delete là 4 chức năng nền
tảng của bất cứ 1 website nào
 - Code chức năng nào trước ? Create
crud /
     /index.php: Liệt kê danh mục
     /create.php: Thêm mới danh mục
     /update.php: Sửa danh mục
     /delete.php: Xóa danh mục
     /connection.php: trả về đối tượng kết nối CSDL
-->
<?php
session_start();
require_once 'connection.php';
// Hiển thị session success theo dạng flash
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
// - Lấy bản ghi đổ ra cấu trúc bảng

// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM categories 
ORDER BY created_at DESC";
// B2: Thực thi truy vấn: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng kết hợp 2 chiều nhiều phần tử:
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
// - Đổ mảng ra cấu trúc bảng:
?>
<a href="create.php">Thêm mới danh mục</a>
<h2>Danh sách sản phẩm</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach ($products AS $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td>
<!--                23/05/2022 20:55:00-->
                <?php
                    echo date('d/m/Y H:i:s',
                    strtotime($product['created_at']));
                ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo $product['id']?>">Update</a>
                <a href="delete.php?id=<?php echo $product['id']?>" onclick="return confirm('Are you delete?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>