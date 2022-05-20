<?php
/**
 * note_database.php
 * 1 - Tổng quan về CSDL MySQL:
 * - CSDL là gì? là nơi lưu trữ dữ liệu, giúp quản lý dữ liệu
 * tốt hơn, trong thời gian dài
 * - CSDL thông dụng: MySQL, SQL Server, MongoDB (Json), Oracle,
 * SQLite, PostgreSQL ...
 * - Với PHP ưu tiên nhất là MySQL, vì free
 * - 1 trang web ko thể thiếu đc CSDL, giúp website là web động
 * - Cài MySQL ? XAMPP đã auto cài
 * 2 - Thuật ngữ về CSDL:
 * + Database: tên CSDL. VD: php0422e3
 * + Trong database sẽ có các table / bảng, table lưu trữ
 * dữ liệu theo cấu trúc bảng
 * VD: bảng users: lưu thông tin của toàn bộ user
 * bảng products, categories, slides ...
 * + Trong table sẽ có row - record / bản ghi và
 * column - field/ cột
 * Cột: quản lý các thông tin của bảng.
 * VD: Bảng users: có các cột id, username, password, age ...
 * Bản ghi: mô tả thông tin cụ thể của 1 đối tượng trong bảng
 * VD: Bảng users có 1 hàng dữ liệu như sau:
 * id = 1, username = manhnv, password=123456, age=32
 * + Khóa chính / primary key: định danh của bảng giúp phân
 * biệt đc các bản ghi với nhau
 * + KHóa ngoại / foreign key: giúp liên kết các bảng có mối
 * quan hệ với nhau, là cột bình thường của 1 bảng nhưng là
 * khóa chính của bảng liên kết
 * 3 - Tương tác với CSDL MySQL bằng cách nào:
 * + Dùng giao diện đồ họa: phpmyadmin, Navicat, MySQLWorkbench
 * + Viết truy vấn SQL: ưu tiên
 * 4 - Các truy vấn cơ bản để tương tác với CSDL MySQL
 * SQL viết tắt của Structure Query Language
 * Viết SQL sử dụng công cụ PHPMyadmin mà XAMPP đã cài sẵn:
 * http://localhost/phpmyadmin
 * - Để viết truy vấn SQL sử dụng PHPMyadmin, sử dụng tab SQL
 * 5 - Các truy vấn SQL cơ bản:
 *# Comment trong SQL dùng ký tự #
# Nếu muốn chạy nhiều câu SQL, mỗi câu SQL cần kết thúc
# bởi dấu ;
# 1 - Tạo CSDL
#CREATE DATABASE abc;
# Tạo CSDL nếu như tồn tại kèm theo tùy chọn cho phép
# lưu đc ký tự có dấu
CREATE DATABASE IF NOT EXISTS php0422e3
CHARACTER SET utf8
COLLATE utf8_general_ci;
# 2 - Sử dụng CSDL, phải có bước này thì mới thao tác đc
# với CSDL như tạo bảng, tạo trường ...
# lệnh này chỉ có tác dụng khi thao tác với CSDL sử dụng
#command line, PHPMyadmin ko có tác dụng -> click trực
# tiếp vào CSDL muốn thao tác
USE php0422e3;

 */