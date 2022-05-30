<?php
//overview.php
// Sự tiến hóa trong lập trình
// VD: tính tổng 2 số bất kỳ
// - Lập trình tuần tự / tuyến tính: nghĩ gì code nấy:
$number1 = 5;
$number2 = 4;
$sum = $number1 + $number2;
echo $sum;

$number1 = 2;
$number2 = 3;
$sum = $number1 + $number2;
echo $sum;
// - Lập trình hướng thủ tục / hàm: phân tích bài toán để chia
// ra các chức năng, mỗi 1 chức năng là 1 hàm:
function sum($number1, $number2) {
    $sum = $number1 + $number2;
    return $sum;
}
$sum1 = sum(1, 2);
echo $sum1;
// - Lập trình hướng đối tượng
class Number {
    public $number1;
    public $number2;
    public function sum() {
        $sum = $this->number1 + $this->number2;
        return $sum;
    }
}
$obj = new Number();
$obj->number1 = 2;
$obj->number2 = 3;
$sum = $obj->sum();
echo $sum;
