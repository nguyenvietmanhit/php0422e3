<?php
//oop.php
// 1/ Lập trình hướng đối tượng:
// - OOP - Object Oriented Programming
// - Là 1 phương pháp lập trình giúp code có thể bảo trì và
// mở rộng dễ dàng hơn so các các phương pháp lập trình truyền
//thống
// - KHó tiếp cận hơn, thay đổi hoàn toàn tư duy khi thiết kế
//và lập trình
// VD: crud cho user
// + Lập trình thủ tục: create, read, update, delete -> hàm
// + OOP: lấy ra đối tượng là user -> thuộc tính: id, name , age,
//created_at; phương thức: create, read, update, delete ...
// - Khó tiếp cận ở các thuật ngữ của OOP
// - Phần lớn các website đều viết dựa trên OOP
// 2 - Các thuật ngữ trong OOP:
// + class : lớp, là 1 khuôn mẫu cho các đối tượng sinh ra từ nó,
//class và object luôn đi đôi với nhau
// VD: class = php0422e3, trong class có nhiều đối tượng,
// VD: class = bản vẽ thiết kế trên giấy của 1 ngôi nhà, thì ngôi
// nhà A, ngôi nhà B là 2 đối tượng đc sinh ra từ bản vẽ
// - Cú pháp khai báo:
// Tên class nên viết hõa ký tự đầu tiên của từng từ
class HomeClass {

}

class AClass {}
class BClass {}
// + object: đối tượng, là thể hiện cụ thể của 1 class
// Cú pháp:
$obj1 = new HomeClass();
$obj2 = new HomeClass();
// + Member variable: thuộc tính của class
// Là các biến đc khai báo trong class
// Khi định nghĩa 1 class, cần định nghĩa thuộc tính nếu có
// Có phạm vi truy cập trc tên thuộc tính
class Student {
    // Thuộc tính
    public $id; //mã sinh viên
    public $fullname; //họ tên sv
    public $age; //tuổi
    public $address; //địa chỉ
}
// Khởi tạo 1 obj từ class:
$obj1 = new Student();
// Đối tượng truy cập thuộc tính của class: ->
$obj1->id = 123;
$obj1->fullname = 'Tiến';
$obj1->age = 30;
$obj1->address = 'TH';

$obj2 = new Student();
$obj2->id = 234;
$obj2->name = 'Vy';
$obj2->age = 36;
$obj2->address = 'abc';

// + Member function: phương thức của class
// - Là hàm đc khai báo bên trong class
// - Tương tự như thuộc tính, có phạm vi truy cập trc tên phương
//thức
// - Khi khai báo 1 class, cần phân tích và xác định của 1 class
class Student1 {
    public function add() {
        echo 'add';
    }
    public function index() {
        echo 'index';
    }
    public function update($id) {
        echo "Update id = $id";
    }
    public function delete($id) {
        echo "Delete id = $id";
    }
}
$obj1 = new Student1();
// Sử dụng -> để truy cập phương thức
$obj1->add();
$obj1->index();
$obj1->update(3);
$obj1->delete(4);
// + Constructor: phương thức khởi tạo của class
// - Là 1 phương thức tự động chạy ngầm ngay sau khi có 1 obj
//đc sinh ra bởi class
class Student2 {
    // Cú pháp khai báo của pt khởi tạo:
//    public function __construct() {
//        echo 'Về sớm ko?';
//    }
    // PT khởi tạo có tham số
    public function __construct($name) {
        echo "Hello, $name";
    }

    public function show() {
        echo 'show';
    }
}
// Khởi tạo đối tượng từ 1 class , class có PTKT có tham số
$obj1 = new Student2('manhnv');
$obj1->show();
// + Từ khóa this: đc sử dụng bên trong class, tham chiếu đến chính
//class đó
class Student3 {
    public $name;
    public $age;

    public function show() {
        echo "Tên: $this->name";
        echo "Tuổi: $this->age";
    }
}
$obj = new Student3();
$obj->name = 'abc';
$obj->age = 123;
$obj->show(); //Tên: abc Tuổi: 123
// + Access Modifier: phạm vi truy cập
// - 3 từ khóa: private, protected, public
// - Là từ khóa đứng trc khai báo TT / PT, quy định cách thức
//truy cập cho TT/ PT này -> tính chất Đóng gói của OOP
// - private: TT/PT chỉ có thể truy cập đc từ class khai báo ra nó
class Student4 {
    private $fullname;

    private function show() {
        echo $this->fullname; //truy cập ok
        echo 'show';
    }
}
$obj = new Student4();
//báo lỗi vì ko thể truy cập private bên ngoài class
//$obj->fullname = 'abc';
//$obj->show();
// - protected: TT/ PT truy cập đc bên trong class và class kế
//thừa từ nó
class Person {
    protected $fullname;
}

class Student5 extends Person {
    public function show() {
        echo $this->fullname; // ok
    }
}
$obj = new Student5();
//$obj->fullname = 'abc'; //báo lỗi ko truy cập đc
// - public: ở đâu cũng truy cập đc

// + Từ khóa static: đứng trước tên TT/PT, sau phạm vi truy cập
//, có thể truy cập mà ko cần khởi tạo đối tượng
class Student6 {
    public static $fullname;

    public static function show() {
        echo 'show';
    }
}
Student6::$fullname = 'manhnv';
Student6::show();
// + Từ khóa extends:
// - Thể hiện tính kế thừa của PHP, PHP hỗ trợ đơn kế thừa
// - Class con kế thừa / sử dụng lại đc TT/PT của class cha có
// phạm vi truy cập là protected hoặc public
class Car {
    public $brand;

    public function showBrand() {
        echo 'showBrand';
    }
}
class Bus extends Car {
    public function test() {
        $this->brand = 'Xe buýt';
        $this->showBrand();
    }
}
// + Từ khóa abstract: thể hiện cho tính trừu tượng của OOP
// - Sử dụng cho class abstract
abstract class Person1 {
    public $name;
    public $age;

    public function show() {
        echo 'show';
    }
    // Class abstract chứa các phương thức abstract: là PT
    //ko có nội dung
    abstract public function test();
}
// Class abstract chỉ dùng kế thừa, bắt các class con phải định
//nghĩa cụ thể các phương thức abstract của nó
class User1 extends Person1 {
    // Bắt buộc class con phải định nghĩa cụ thể PT trừu tượng
    public function test() {
        echo 'user 1 test';
    }
}
// + Từ khóa implements: thể hiện cho tính đa hình của OOP
// - Thực thi interface
// - 1 class có thể implements nhiều interface
// - Interface chỉ chứa các PT ko có nội dung
interface Config {
    public function sendMail();
    public function receiveMail();
}
class A implements Config {
    public function sendMail() {
        echo 'A sendMail';
    }

    public function receiveMail() {
        echo 'A receiveMail';
    }
}
// 3 / Bốn tính chất của OOP:
// + Tính trừu tượng: thể hiện thông qua class abstract
// + Tính đóng gói: thể hiện qua phạm vi truy cập -> che giấu
//thông tin
// + Tính kế thừa: thể hiện qua extends, cho phép tạo class mới
//dựa trên class có sẵn
// + Tính đa hình: thể hiện qua interface