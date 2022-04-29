<?php
// 1 - Hàm xử lý chuỗi
// + Hàm trả về độ dài chuỗi: strlen
$length = strlen('hello manhnv');
var_dump($length); //
// + Chuyển thành ký tự hoa, trả về chuỗi mới
$string = strtoupper('abc def');//ABC DEF
// + Chuyển về ký tự thường, trả về chuỗi mới
$string = strtolower('ABC DEF'); //abc def
// + Chuyển ký tự đầu tiên của chuỗi thành ký tự hoa
$string = ucfirst('abc def');// Abc def
// + Chuyển ký tự đầu tiên của từng từ thành ký tự hoa
$string = ucwords('abc def'); //Abc Def
// + Tìm kiếm và thay thế chuỗi
$string = 'abc def ghi';
$search = 'abc';
$replace = 'xyz';
$result = str_replace($search, $replace, $string);
//xyz def ghi
// + Cắt chuỗi
$string = 'hello manhnv';
$result = substr($string, 0, 5); //hello
// - Hàm xử lý số:
// + Kiểm tra phải là số hay ko
$is_num = is_numeric('123456abc'); //
// + Làm tròn theo phần thập phân:
echo round(12.65); //13
echo round(12.65, 1); //12.7
// + Làm tròn lên số nguyên gần nhất so với nó
echo ceil(1.37); //2
echo ceil(-2.12); //-2
// + Làm tròn xuống số nguyên gần nhất so với nó
echo floor(1.37); //1
echo floor(-2.12); //-3
// + Tìm số lớn nhất, nhỏ nhất
echo max(2, 1, 3 ,4); //4
echo min(2, 1, 3 ,4); //1
// + Format số:
echo number_format(1000000); //1,000,000
echo number_format(1000000,
    0, '.', '.');
//1.000.000
// - Hàm xử lý thời gian:
// + Set múi giờ:
date_default_timezone_set('Asia/Ho_Chi_Minh');
// + Format thời gian theo định dạng cho trước
echo date('d-m-Y H:i:s'); //
// + Lấy số giây từ thời điểm hiện tại so với 01-01-1970:
echo time(); //