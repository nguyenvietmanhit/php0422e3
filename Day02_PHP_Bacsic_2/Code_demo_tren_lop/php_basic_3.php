<!--php_basic_3.php-->
<?php
// 1 - Toán tử: là các ký tự xử lý các biểu thức xung
//quanh nó
// - Toán tử số học: dùng tính toán các con số -> trả về
//kiểu số integer / float
// Cộng +
$number1 = 5;
$number2 = 2;
$result1 = $number1 + $number2; //7
// Trừ -
$result2 = $number1 - $number2; //3
// Nhân *
$result3 = $number1 * $number2; //10
// Chia /
$result4 = $number1 / $number2; //2.5
// Chia lấy phần dư %
$result5 = $number1 % $number2; // 1
// Tăng giảm tích lũy đi 1 ++ --
$number3 = 5;
$number3++;
echo $number3; //6
$number4 = 6;
$number4--;
echo $number4; //5
// Chú ý khi ++ -- đứng trc tên biến:
$number5 = 3;
++$number5;
echo $number5; //4
// Sự khác nhau khi ++ -- đứng trc hay sau, là sự thay
//đổi giá trị của biến trước hay sau khi khai báo
$x = 5;
$sum = $x++ + $x++;
//   =   5  +   6 = 11

$y = 5;
$sum = $y++ + ++$y;  //12
//   =   5  +   7

$z = 5;
$sum = --$z + $z-- - ($z++ * 2); //2  0 -4
//   =   4  +   4  - ( 3   * 2);//2
echo "<br />";
echo $sum;

$x = 5;
$sum = $x++ * ++$x + 2 * --$x % 2; //12 35
//   =   5  *  7   + 2 *  6  % 2 = 35
// 2 - Toán tử so sánh: so sánh 2 biểu thức xung quanh
//nó -> boolean
$number1 = 5;
$number2 = 4;
// So sánh bằng ==
$result1 = $number1 == $number2; //false
// So sánh khác !=
$result2 = $number1 != $number2; //true
// So sánh lớn hơn >
$result3 = $number1 > $number2; //true
// So sánh lớn hơn hoặc bằng >=
$result4 = $number1 >= 5; //true
// So sánh nhỏ hơn <
$result5 = $number1 < 0; //false
// So sánh nhỏ hơn hoặc bằng <=
$result6 = $number1 <= 0; // false
// - Toán tử logic: dùng kết hợp các biểu thức so sánh
//với nhau -> boolean
// Toán tử logic AND &&
// true && true -> true
// true && false -> false
// false && true -> false
// false && false -> false
$number1 = 5;
$number2 = 4;
$result1 = ($number1 >= 5) && ($number2 < 0); //false
// Toán tử OR ||
// true || true -> true
// true || false -> true
// false || true -> true
// false || false -> false
$result2 = ($number1 < $number2) || ($number2 > 0); //true
// Toán tử NOT !
// true -> false
// false -> true
$result3 = !($number1 > 0); //false
// - Toán tử gán: gán giá trị bên phải toán tử cho
//bên trái toán tử của nó
// Toán tử gán thông thường:
$number = 5;
// Toán tử gán tích lũy:
// Cộng tích lũy +=
$number += 2; // $number = $number + 2 = 7
// Trừ tích lũy -=
$number -= 4; //number = number - 4 = 3
// Nhân tích lũy *=
$number *= 2; //number = number * 2 = 6
// Chia tích lũy /=
$number /= 3; //number = number / 3 = 2
// Chia lấy dư tích lũy %=
$number %= 2; //number = number % 2 = 0

?>