<?php
/**
 * note.php
 * Các bước dựng Website:
 * - B1: Chuẩn bị giao diện tĩnh (HTML CSS JS)
 * - B2: Phân tích CSDL từ B1: dựa chủ yếu vào giao
 * diện frontend để phân tích:
 * Chạy hết các file giao diện của frontend, đi qua
 * từng file, phân tích từ trên xuống dưới của giao
 * diện: với các thông tin ít khi thay đổi thì coi
 * như dữ liệu tĩnh, ngược lại cần tạo bảng để lưu
 * + Tạo các bảng sau:
 * - Bảng menus: quản lý thông tin của menu:
 * id
 * title: tiêu đề menu con, VARCHAR
 * link: link cho các menu con, VARCHAR
 * status: trạng thái menu con, TINYINT, 0 - ẩn, 1 - hiển thị
 * created_at
 * updated_at: thời gian cập nhật cuối cùng của bản ghi
 * - Bảng products: quản lý các sp -> CRUD
 * id
 * name: tên sp, VARCHAR
 * price: giá sp INT
 * summary: mô tả ngắn, TEXT
 * description: mô tả chi tiết TEXT
 * amount: số lượng sp đang có
 * avatar: lưu tên file ảnh, VARCHAR
 * seo_title: SEO tiêu đề sp, VARCHAR
 * seo_description: SEO mô tả sp, TEXT
 * seo_keywords: SEO từ khóa liên quan đến sp, TEXT
 * created_at
 * updated_at
 * ...
 * - Tạo CSDL php0422e3_project, copy nội dung trong file
 * file_create_db.html để tạo các bảng
 *
 *  B3: Tạo cấu trúc thư mục MVC để code:
 *  backend /
 *          /assets
 *          /configs
 *          /controllers
 *          /models
 *          /views
 *  frontend /
 *          /assets
 *          /configs
 *          /controllers
 *          /models
 *          /views
 * B4: Code khung MVC trc: index gốc, file Database.php
 * , Controller cha, Model cha ...
 * Thường sẽ code backend trc để sinh ra dữ liệu trc, backend
 * chủ yếu là CRUD -> frontend
 * - Thư viện CKFinder cần tương thích với phiên bản PHP đang
 cài thì mới sử dụng đc
 * - Chức năng đăng ký user:
 * + Bắt buộc phải mã hóa password trc khi lưu
 * + Một số thuật toán mã hóa: md5 -> ko dùng trong thực tế vì
 * dễ bị giải mã ngược, hay dùng bcrypt
 * + Dùng INSERT
 */