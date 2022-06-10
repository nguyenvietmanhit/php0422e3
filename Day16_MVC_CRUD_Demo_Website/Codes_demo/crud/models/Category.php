<?php
//models/Category.php
require_once 'models/Model.php';
class Category extends Model {

    public function insertData($name) {
        // + B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO categories(name) VALUES(:name)";
        // + B2: Cbi obj truy vấn
        $obj_insert = $this->connection->prepare($sql_insert);
        // + B3: Tạo mảng:
        $inserts = [
            ':name' => $name
        ];
        // + B4: Thực thi obj truy vấn: INSERT trả về boolean:
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }

    public function listData() {
        //B1:
        $sql_select_all = "SELECT * FROM categories";
        //B2:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        //B3: bỏ qua
        //B4: SELECT ko cần quan tâm đến kqua trả về
        $obj_select_all->execute();
        //B5: Trả về mảng kết hợp 2 chiều:
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}