<?php
/**
 * 1 - Composer
 * + Là công cụ quản lý các thư viên 1 cách tự
 * động
 * + Do Laravel tích hợp nhiều thư viện từ bên ngoài, thay vì
 * phải đi check thủ công các update của thư viện -> dùng
 * Composer để tự động quản lý các update này bằng lệnh
 * của Composer
 * 2 - Laravel:
 * + Là 1 framework của PHP, dựa trên mô hình MVC
 * + Là FW thông dụng nhất hiện nay
 * + Thực tế các cty luôn luôn chọn 1 Framework hoặc CMS để code,
 * chứ ít khi dùng MVC thuần
 * 3 - Cấu trúc thư mục của Laravel:
 * app / Http
 *     / Models
 *
 * public / index.php: File index gốc của Laravel
 *
 * 4 - Code CRUD sản phẩm
 * + Tạo CSDL php0422e3_laravel
 * + Tạo bảng products: id, name, price, avatar,
 *      created_at, updated_at
 * -> sử dụng cơ chế migrate của Laravel để tạo
 * -> sử dụng các lệnh của Artisan
 * Cần cài đặt môi trường trước tại file .env
 * File migrate nằm trong database/migrations
 * -> chạy lệnh sau: php artisan migrate
 * - Tạo controller và model để xử lý product
 * php artisan make:controller ProductController
 * php artisan make:model Product
 * - Tạo views:
 * resources / views /
 *                   /layouts
 *                           /main.blade.php
 *                   /products
 *                            /create.blade.php
 *                            /update.blade.php
 *                            /index.blade.php
 * + Code CRUD: Create trước
 * Thêm url tại routes/web.php
 * - Laravel sử dụng templage engine là Blade, hỗ trợ viết code
 * PHP 1 cách dễ dàng và sạch sẽ
 */
