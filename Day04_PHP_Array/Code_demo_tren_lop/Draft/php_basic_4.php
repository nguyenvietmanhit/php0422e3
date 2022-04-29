<!--php_basic_4.php-->
<?php
// 1/ Câu lệnh điều kiện:
// - Có 2 dạng câu lệnh điều kiện:
// NGôn ngữ đời thường: kiểm tra 1 số, nếu số đó chia
// hết cho 2 là số chẵn
// + If, else, elseif
// If: chỉ dùng cho 1 trường hợp duy nhất là điều kiện
//đúng
$number = 4;
if ($number % 2 == 0) {
    echo 'Là số chẵn';
}
// If else: dùng cho 2 trường hợp điều kiện đúng và sai
if ($number % 2 == 0) {
    echo 'Là số chẵn';
} else {
    echo 'Là số lẻ';
}
// - Toán tử điều kiện: thay thế cho if else khi logic
//xử lý trong if else là đơn giản
echo $number % 2 == 0 ? 'Là số chẵn' : 'Là số lẻ';
// If elseif else: xử lý >= 3 trường hợp
// VD: hiển thị học lực dựa vào điểm:
// 8 - 10: giỏi, 6.5 - 8 khá ...
$point = 7.5;
if ($point >= 8 && $point <= 10) {
    echo 'Giỏi';
} elseif ($point >= 6.5 && $point < 8) {
    echo 'Khá';
} elseif ($point >= 5 && $point < 6.5) {
    echo 'TB';
} else {
    echo 'Ko phải giỏi, khá, tb';
}
// Với câu lệnh điều kiện, khi tìm đc case đúng thì
//sẽ thoát câu lệnh điều kiện
// - Chú ý về hiển thị 1 khối HTML phức tạp khi sử dụng
//câu lệnh điều kiện
$number = 1;
if ($number % 2 == 1) {
    echo '<table border="1" cellpadding="8" cellspacing="0">';
    echo '<tr>';
    echo '<td>Hàng 1 cột 1</td>';
    echo '<td>Hàng 1 cột 2</td>';
    echo '<td>Hàng 1 cột 3</td>';
    echo '</tr>';
    echo '</table>';
}

// + Switch case
?>
<?php if ($number % 2 == 1): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <td>Hàng 1 cột 1</td>
            <td>Hàng 1 cột 2</td>
            <td>Hàng 1 cột 3</td>
        </tr>
    </table>
<?php endif; ?>

<?php if ($number % 2 == 1): ?>
    <h1>Là số lẻ</h1>
<?php else: ?>
    <h1>Là số chẵn</h1>
<?php endif; ?>

<?php if ($number == 1): ?>
    <h1>Chủ nhật</h1>
<?php elseif ($number == 2): ?>
    <h1>Thứ hai</h1>
<?php elseif ($number == 3): ?>
    <h1>Thứ ba</h1>
<?php else: ?>
    <h1>Không phải cn, thứ hai, thứ ba</h1>
<?php endif; ?>

<?php
// - Biểu thức switch case: là 1 dạng câu lệnh điều
//kiện, sử dụng thay thế cho if elseif vì có tính dễ
//đọc code hơn
$day = 2;
switch ($day) {
    case 1: echo 'Chủ nhật';break;
    case 2: echo 'Thứ hai';break;
    case 3: echo 'Thứ ba';break;
    default: echo 'Không phải cn, t2, t3';
}
// Viết lại bằng if elseif
$day = 2;
if ($day == 1) {
    echo 'Chủ nhật';
} elseif ($day == 2) {
    echo 'Thứ hai';
} elseif ($day == 3) {
    echo 'Thứ ba';
} else {
    echo 'CN, t2, t3';
}
// Switch case chỉ sử dụng cho so sánh bằng
// VÒNG LẶP
// - Sử dụng cho logic lặp đi lặp lại giống nhau
// VD: hiển thị chuỗi "500ae" 500 lần
// 1/ Vòng lặp for: vòng lặp xác định trc số lần lặp
// VD: hiển thị 1 đến 10
// Biểu thức đầu tiên: khởi tạo biến lặp
// Biểu thức thứ 2: điều kiện để lặp
// Biểu thức thứ 3: tác động vào biến lặp để tới 1 thời
//điểm nào đó, làm cho điều kiện lặp bị sai -> thoát
//vòng lặp -> tránh đc vòng lặp vô hạn
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
// 2/ While: vòng lặp ko xác định trc số lần lặp
$j = 1; // tương đương biểu thức thứ 1 của for
while ($j <= 10) { //tương đương biểu thức thứ 2 của for
    echo $j;
    $j++; // tương đương biểu thức thứ 3 của for
}
// 3 - Do while: khác for và while là thực thi logic trc
//r mới ktra điều kiện -> chắc chắn sẽ thực thi đc ít
//nhất 1 lần cho dù điều kiện sai ngay từ đầu
$number = 1;
do {
    echo 'Đoạn text này có chạy ko?';
} while ($number < 0);

// TỪ KHÓA BREAK CONTINUE TRONG VÒNG LẶP
// - break: thoát hẳn vòng lặp, nghĩa là bỏ qua toàn
//bộ các lần lặp còn lại và code phía sau break
for ($i = 1; $i <= 10; $i++) {
    if ($i >= 2 || $i == 1) {
        break;
    }
    echo $i;
}
// - continue: bỏ qua lần lặp hiện tại, nhảy tới lần lặp
//kế tiếp, bỏ quả lần lặp hiện tại là ko chạy code phía
//sau continue
for ($i = 1; $i <= 10; $i++) {
    echo $i;
    if ($i == 1 || $i >= 4) {
        continue;
    }
}
//12345678910
//234
//1
//1234
//123
?>
