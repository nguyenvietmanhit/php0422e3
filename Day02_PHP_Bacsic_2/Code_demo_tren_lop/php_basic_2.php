<!--php_basic_2.php-->
<?php
// 1 - Kiểu dữ liệu: integer, float, string, boolean,
//null, array, object
// 2 - Ép kiểu dữ liệu
$number = 11.2;
// Ép sang integer
$result1 = (integer) $number; //11
var_dump($result1);
// Ép sang string, giá trị giữ nguyên:
$result2 = (string) $number; //
var_dump($result2);
// Ép sang boolean, các giá trị khác số 0, chuỗi rỗng,
//null, mảng rỗng, đối tượng rỗng
// thì ép thành true, ngược lại là false
$result3 = (boolean) $number;//
var_dump($result3); //true
//3 - Hằng số
// + Là biến, lưu giá trị, tuy nhiên giá trị khi đã
//gán cho hằng thì ko thể gán lại giá trị khác
// + Khai báo: tên hăng tuân theo quy tắc đặt tên biến,
// nên viết hoa
// C1:
define('PI', 3.14);
echo PI; //3.14
// C2:
const MAX_AGE = 120; // ưu tiên dùng cách này
//MAX_AGE = 100; //báo lỗi vì cố gán lại giá trị cho hằng
// - Một số hằng có sẵn của PHP
echo "<br />";
echo __LINE__;// số dòng code đang gọi hằng
echo "<br />";
echo __FILE__; // đường dẫn tuyệt đối/vật lý tới file
echo "<br />";
echo __DIR__; // đường dẫn tuyệt đối của thư mục cha
//trực tiếp của file
// 4 - Hàm:
// + Là tập các dòng code xử lý logic nào đó
// + Hàm có tính sử dụng lại, nếu như 1 chức năng mà
//đc sử dụng từ 2 lần trở lên -> viết hàm
//VD: tính tổng 2 số bất kỳ
$number1 = 1;
$number2 = 2;
echo $number1 + $number2; //3
// - Phân loại hàm: 2 kiểu:
// + Hàm có sẵn: var_dump
// + Hàm tự định nghĩa:
// Cú pháp:
function show() {
    echo 'Hàm show';
}
// Gọi hàm
show(); //Hàm show
// - Các kiểu hàm tự định nghĩa:
// + Hàm ko có tham số, ko có giá trị trả về
// + Hàm có tham số, có giá trị trả về
// VD: Viết hàm tính tích của 2 số nguyên bất kỳ:
// Bất cứ khi nào viết hàm, cần xác định 2 thông tin sau?
// a/ Hàm này có tham số nào ko ? tham số là biến, tuy
//nhiên chưa biết giá trị cụ thể tại thời điểm khai báo
//tham số -> có 2 tham số là 2 số bất kỳ
// b/ Hàm này trả về kiểu dữ liệu nào ? dựa vào bài
//toán -> integer, sử dụng từ khóa return
function multiple($number1, $number2) {
    $result = $number1 * $number2;
    return $result;
// từ khóa return làm cho hàm mang 1 giá trị nào đó,
// và thoát hàm (code trong hàm sau return sẽ ko chạy)
    // Nếu text chỉ là text thuần dùng nháy đơn
    echo 'Text này có chạy ko?';
}
echo "<br />";
// Gọi hàm:
$res1 = multiple(1, 2);
var_dump($res1); //2
// Dùng nháy kép khi muốn hiển thị giá trị của biến trong
//1 chuỗi mà ko muốn nối chuỗi
echo "Tích 2 số là: $res1";
// echo 'Tích 2 số là: ' . $res1;
// - Viết hàm hiển thị tên của ai đó
// + Tham số của hàm? 1 tham số là tên của ai đó
// + Kiểu dữ liệu/giá trị trả về của hàm? string
// Tên hàm nên viết theo camel case - con lạc đà
$name_of_me = 'manhnv';
function showName($name) {
    $result = "Tên của bạn là: $name";
    return $result;
}
$res = showName('Trang');
echo $res;
echo showName('Nam');
echo showName('Nữ');
// 5 - Truyền kiểu tham trị, tham chiếu trong hàm
// + Truyền kiểu tham trị:
// Bài toán: viết hàm thay đổi giá trị của biến
// bên ngoài hàm
$number = 5;
echo "Ban đầu biến number = $number"; //5
function changeNumber1($num) {
    $num = 100;
    echo "Bên trong hàm, biến có giá trị = $num"; //100
}
changeNumber1($number);
echo "Sau khi gọi hàm, biến number = $number"; //100
// -> do truyền giá trị vào hàm theo kiểu tham trị,
// truyền tham trị là truyền bản sao của biến vào hàm
// -> nếu muốn hàm thao tác với bản gốc, cần truyền
//tham chiếu
$number = 5;
echo "Ban đầu biến number = $number" ; //5
//Thêm ký tự & phía trc tham số để truyền đc theo
//kiểu tham chiếu
function changeNumber2(&$num) {
    $num = 100;
    echo "Bên trong hàm biến num = $num"; //100
}
changeNumber2($number);
echo "Sau khi gọi hàm, biến number = $number"; //5
// -> truyền tham chiếu là truyền bản gốc vào hàm
?>