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
# 5 - Các kiểu dữ liệu trong CSDL MySQL:
# 6 - Tạo bảng:
# Bảng categories: id, name, description, created_at
CREATE TABLE IF NOT EXISTS categories(
id INT(11) AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
#khai báo khóa chính khóa ngoại nếu có
PRIMARY KEY (id)
);
# Bảng products: id, category_id, name, price, description, created_at
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
category_id INT(11) DEFAULT 0,
name VARCHAR(150) NOT NULL,
price INT(11) DEFAULT 0,
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES categories(id)
);
# 7 - Xóa bảng:
# DROP TABLE abc;
# 8 - Truy vấn INSERT: thêm dữ liệu vào bảng
# - Bảng categories: id, name, description, created_at
# + Chỉ thêm dữ liệu cho các trường ko sinh tự động
#INSERT INTO categories(name, description)
#VALUES ('Tivi', 'Mô tả tivi'),
#       ('Điện thoại', 'Mô tả điện thoại'),
#       ('Máy tính', 'Mô tả máy tính');
# - Bảng products: id, category_id, name, price, description, created_at -> id và created_at sinh tự động
#INSERT INTO products(category_id, name, price, description) VALUES
#(1, 'TV Samsung', 1000, 'Chi tiết TV Samsung'),
#(1, 'TV Toshiba', 2000, 'Chi tiết TV Toshiba'),
#(2, 'iphone X', 3000, 'Chi tiết iPhone X'),
#(3, 'Laptop Asus', 4000, 'Chi tiết laptop Asus'),
#(3, 'Laptop Dell', 5000, 'Chi tiết laptop Dell'),
#(3, 'Laptop HP', 6000, 'Chi tiết laptop HP');

# 9 - Truy vấn SELECT: lấy dữ liệu
# + Lấy tất cả trường và tất cả sp trong bảng products:
SELECT * FROM products;
# + Lấy tên và giá  của tất cả sp:
SELECT name, price FROM products;
# + Lấy 2 sản phẩm đầu tiên: LIMIT
SELECT * FROM products LIMIT 2;
# + Lấy 4 sản phẩm tính từ sản phẩm thứ 2 trở đi: LIMIT
SELECT * FROM products LIMIT 2,4;
# SELECT * FROM products LIMIT 4 OFFSET 2;
# + Lấy sp có giá < 3000: WHERE
SELECT * FROM products WHERE price < 3000;
# + Lấy sp có giá nằm trong khoảng 1000 đến 3000:
SELECT * FROM products WHERE price >= 1000 AND price <= 3000;
# Thay thế bằng BETWEEN:
SELECT * FROM products WHERE price BETWEEN 1000 AND 3000;
# + Lấy sp có id = 1 hoặc = 2 hoặc bằng 5:
SELECT * FROM products WHERE id = 1 OR id = 2 OR id = 5;
# Thay thế bằng IN khi có nhiều phép OR sử dụng so sánh =
SELECT * FROM products WHERE id IN (1, 2, 5);
# + Lấy sp có tên chứa chuỗi ip: LIKE
# myip, ipmy, mipm, ip
SELECT * FROM products WHERE name LIKE '%ip%';
# ip, ipabc, aip -> false
SELECT * FROM products WHERE name LIKE 'ip%';
# abcip, mip, ip123 -> false
SELECT * FROM products WHERE name LIKE '%ip';
# ip
SELECT * FROM products WHERE name LIKE 'ip';
# + Lấy sp theo thứ tự hiển thị từ mới nhất  -> cũ nhất:
# ORDER BY
# DESC : descend, ASC: ascend
SELECT * FROM products ORDER BY created_at DESC;
# + SELECT sử dụng JOIN:
# JOIN dùng để lấy dữ liệu từ bảng có liên kết
# - Lấy các sp kèm theo tên danh mục tương ứng:
# Khi dùng join, luôn phải có tên bảng trước tên trường
# Có 3 cơ chế join:
# + INNER: lấy dữ liệu toàn vẹn nhất
# Bảng gốc/left = products, lặp qua toàn bộ bản ghi của
# bảng products -> mỗi lần đi qua từng bản ghi, thực hiện join vào bảng categories dựa theo khóa ngoại là category_id, tìm trong bảng categories có bản ghi nào phù hợp với giá trị của khóa ngoại -> tìm thấy thì trả về, ngược lại ko trả về
# + LEFT
# + RIGHT
SELECT products.*, categories.name AS category_name
FROM products
INNER JOIN categories
ON products.category_id = categories.id;

# LEFT JOIN
# Bảng gốc/left = products, lặp qua toàn bộ bản ghi của
# bảng products -> mỗi lần đi qua từng bản ghi, thực hiện join vào bảng categories dựa theo khóa ngoại là category_id, tìm trong bảng categories có bản ghi nào phù hợp với giá trị của khóa ngoại -> tìm thấy thì trả về, nếu ko tìm thấy vẫn trả về tuy nhiên giá trị sẽ bị null hết
SELECT products.*, categories.name AS category_name
FROM products
LEFT JOIN categories
ON products.category_id = categories.id;
# RIGHT JOIN
# Giống LEFT , chỉ khác là bảng gốc là bảng đc join, là bảng categories
SELECT products.*, categories.name AS category_name
FROM products
RIGHT JOIN categories
ON products.category_id = categories.id;
# 10 - Truy vấn UPDATE: cập nhật dữ liệu
# - Sửa tên = abc, giá =123 cho sp có id > 5:
UPDATE products SET name = 'abc', price = 123
WHERE id > 5;
# Chú ý: Luôn cần phải set điều kiện khi update, nếu ko
# update toàn bộ bảng!
# 11 - Truy vấn DELETE: xóa dữ liệu
# - Xóa các sản phẩm có id > 10:
DELETE FROM products WHERE id > 10;
# Chú ý: luôn phải set điều kiện khi delete, nếu ko
# xóa toàn bộ bảng
# 12 - Hàm COUNT: đếm số bản ghi, hàm trong MySQL luôn dùng với SELECT
# - Đếm số sp đang có
SELECT COUNT(id) AS count_product FROM products;
# 13 - Hàm MIN , MAX, SUM, AVG
# giá nhỏ nhất
SELECT MIN(price) AS min_price FROM products;
# 14 - GROUP BY: tìm theo nhóm
# Đếm các sản phẩm trùng giá
SELECT price, COUNT(price) FROM products
GROUP BY price;
# 15 - Export và import CSDL sử dụng PHPMyadmin
# - Export: xuất CSDL ra 1 file .sql: đứng tại CSDL muốn export, vào menu Export / Xuất -> Go để xuất file .sql
# - Import: tạo mới 1 CSDL -> Import/Nhập, tìm file .sql -> Go để import


