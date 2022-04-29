<?php
// demo.php
// MỘT SỐ HÀM CÓ SẴN CỦA PHP XỬ LÝ MẢNG
// + Tính tổng giá trị của mảng:
$numbers = [1, 2, 3, 4];
$sum = 0;
foreach ($numbers AS $number) {
    $sum += $number;
}
echo "Tổng = $sum <br />";
echo array_sum($numbers); //10
// + Kiểm tra sự tồn tại của phần tử mảng theo key: isset
$infos = [
    'name' => 'manh',
    'age' => 32
];
echo isset($infos['name']) ;// true
echo isset($infos['abc']); //false
// + Tìm kiếm theo giá trị của mảng, trả về key nếu tìm thấy
$names = ['a', 'b', 'c'];
echo array_search('a', $names); //0
// + Loại bỏ phần tử mảng trùng lặp: array_unique
$numbers = [1, 2, 3, 5, 1, 1, 1];
$b = array_unique($numbers);
echo '<pre>';
print_r($b); // [1, 2, 3, 5]
echo '</pre>';
// + Đếm số phần tử mảng: count
// + Chuyển từ chuỗi thành mảng dựa theo ký tự phân tách: explode
$str = "Hello manhnv abc";
$arrs = explode(' ', $str);
echo '<pre>';
print_r($arrs); // ['hello', 'manhnv', 'abc']
echo '</pre>';
// + Chuyển từ mảng về chuỗi: implode
$arrs = [1, 2, 3];
echo implode('-', $arrs); //1-2-3
// + Lấy giá trị của phần tử mảng cuối cùng: end
$arrs = ['a', 'b', 'c', 'd'];
echo $arrs[3]; //d
echo end($arrs); //d
// + Lấy giá trị của phần tử mảng đầu tiên: reset
echo reset($arrs); //a
// + Xóa phần tử mảng theo key: unset
$infos = [
    'name' => 'manhnv',
    'age' => 32
];
unset($infos['name']);
echo '<pre>';
print_r($infos); //['age' => 32]
echo '</pre>';
// + Ktra kiểu dữ liệu mảng: is_array
echo is_array($infos); //true