<?php
//views/categories/index.php
?>
<!--Với chức năng tìm kiếm, nên để method=get
 Bản chất của method = get, truyền lên url dựa vào
 name của các input
 -->
<form action="" method="get">
<!--  Thêm 2 input ẩn để giữ lại tham số controller và action  -->
    <input type="hidden" name="controller" value="category" >
    <input type="hidden" name="action" value="index" />

    <label for="keyword">Tìm theo tên hoặc mô tả</label>
    <input type="text" name="keyword" id="keyword"
           value="<?php echo isset($_GET['keyword'])
               ? $_GET['keyword'] : ''?>"
           class="form-control" />
    <br />
    <input type="submit" name="submit" value="Tìm kiếm"
           class="btn btn-primary" />
    <a class="btn btn-default"
       href="index.php?controller=category&action=index">
        Xóa tìm kiếm
    </a>
</form>
<br />
<br />
<a class="btn btn-success" href="index.php?controller=category&action=create">
    Thêm mới
</a>
<h2>Danh sách danh mục</h2>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th></th>
    </tr>
    <?php foreach($categories AS $category): ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td><?php echo $category['description']; ?></td>
            <td>
                <a href="#">Sửa</a>
                <a href="#" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
