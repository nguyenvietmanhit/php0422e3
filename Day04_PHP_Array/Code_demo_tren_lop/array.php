<?php
// array.php
// KIỂU DỮ LIỆU MẢNG TRONG PHP
// 1 - Định nghĩa:
// VD: lưu trữ tên của 500 ae
// thay vì phải tạo 500 biến để lưu, sẽ tạo 1 biến duy nhất có
//kiểu dữ liệu mảng để lưu
// - Là 1 kiểu dữ liệu có thể lưu nhiều giá trị tại 1 thời điểm
//, các giá trị này có thể là bất cứ 1 kiểu dữ liệu nào
// 2 - Cú pháp khai báo
// C1: dùng từ khóa array, dùng cho mọi phiên bản PHP
$names = array('Trang', 'Nam', 'Hằng');
// C2: dùng [], chỉ dùng cho PHP >= 5.4
$names = ['Trang', 'Nam', 'Hằng'];
// Thực tế nên dùng C2 để khai báo mảng vì gọn hơn
// 3 - Thuật ngữ liên quan đến mảng
// + Phần tử mảng (Elements)
// + Key (Index, Chỉ mục): là giá trị để xác định phần tử mảng
// + Value: là giá trị tương ứng của phần tử mảng dựa theo key
// 4 - Xác định key và value của mảng:
$names = ['Trang', 'Vi', 'A', 'B'];
// Key của mảng mặc định sẽ bắt đầu từ 0, ko phải 1
// Cách debug mảng để nhìn rõ đc key và value tương ứng
echo '<pre>';
print_r($names);
echo '</pre>';
// - Lấy giá trị của phần tử mảng theo cách thủ công:
// Nguyên tắc: luôn luôn biết key thì mới lấy value
echo $names[2]; //A
echo $names[1]; // Vi
echo $names[0]; //Trang
echo $names[3]; //B
// echo $names[4]; // báo lỗi do key ko tồn tại
// - Thao tác với toàn bộ phần tử mảng, cần sử dụng vòng lặp
$names = ['A', 'B', 'C', 'D', 'E', 'F'];
// Lấy số phần tử mảng:
$count = count($names); //6
// Sử dụng for để lặp
for ($key = 0; $key < $count; $key++) {
    echo $names[$key];
}
//ABCDEF
//5 - Vòng lặp foreach
// + Chuyên dùng để lặp mảng
// For lặp đc với các mảng đơn giản, khó xử lý mảng phức tạp
$names = ['A', 'B', 'C', 'D', 'E', 'F'];
// + Cú pháp khai báo dạng đầy đủ cả key value
foreach ($names AS $key => $value) {
    echo "<br /> Phần tử mảng có key = $key, value tương 
    ứng là: $value";
}
// + Cú pháp khai báo dạng khuyết key
foreach ($names AS $value) {
    echo "<br /> Value tương ứng là: $value";
}
// Bản chất của foreach: lặp qua từng phần tử mảng, mỗi lần đi
//qua từng phần tử xác định luôn cặp key value
// -> thao tác với mảng trong PHP luôn luôn dùng foreach
// 6 - Phân loại mảng:
// + Mảng tuần tự / mảng số nguyên: toàn bộ key của mảng đều ở
//dạng số nguyên
$numbers = [1, 2, 3, 4, 5];
echo '<pre>';
print_r($numbers);
echo '</pre>';
foreach ($numbers AS $k => $v) {
    echo "<br /> Key = $k, Value = $v";
}
// + Mảng kết hợp: key xuất hiện ở dạng chuỗi
$infos = [
    'name' => 'manhnv',
    'age' => 32,
    'address' => 'Hà Nội'
];
foreach ($infos AS $key => $value) {
    echo "<br /> Key: $key, Value: $value";
}
// + Mảng đa chiều: mảng trong mảng
$infos = [
    'class_name' => 'PHP0422e3',
    'info' => [
        'amount' => 34,
        'school_name' => 'Thương mại',
        'test' => [1, 2, 3]
    ]
];
// Lấy giá trị thủ công:
echo $infos['info']['school_name']; //Thương mại
echo $infos['info']['test'][2]; //3
foreach ($infos AS $key => $value) {
//    echo "<br />Key: $key, Value: $value";
    // Chú ý ko đc echo mảng
}
// Độ phức tạp của mảng đa chiều sẽ tăng theo số chiều
// Thông thường, nếu mảng đa chiều do bạn tạo ra, thì chỉ nên
//dừng ở tối đa 3 chiều
// 7 - Cú pháp viết tắt của foreach khi hiển thị mã HTML phức tạp
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
// Hiển thị bằng echo của PHP
echo "<table border='1' cellspacing='0' cellpadding='8'>";
echo "<tr>";
echo "<th>Tên khóa học</th>";
echo "</tr>";
foreach ($arrs AS $name) {
    echo "<tr>";
        echo "<td>$name</td>";
    echo "</tr>";
}
echo "</table>";
// Nên dùng cú pháp viết tắt của foreach
?>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Tên khóa học</th>
    </tr>
    <?php foreach($arrs AS $name): ?>
        <tr>
            <td>PHP</td>
        </tr>
    <?php endforeach; ?>
</table>

