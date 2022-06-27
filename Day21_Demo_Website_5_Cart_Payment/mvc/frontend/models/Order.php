<?php
require_once 'models/Model.php';
class Order extends Model {
    public function insertData($infos) {
        $sql_insert = "INSERT INTO 
orders(fullname,address,mobile,email,note,price_total,payment_status)
VALUES(:fullname,:address,:mobile,:email,:note,:price_total,:payment_status)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':fullname' => $infos['fullname'],
            ':address' => $infos['address'],
            ':mobile' => $infos['mobile'],
            ':email' => $infos['email'],
            ':note' => $infos['note'],
            ':price_total' => $infos['price_total'],
            ':payment_status' => $infos['payment_status'],
        ];
        // Ko cần trả về boolean
        $obj_insert->execute($inserts);
        // Trả về id của order sau khi insert thành công
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
}