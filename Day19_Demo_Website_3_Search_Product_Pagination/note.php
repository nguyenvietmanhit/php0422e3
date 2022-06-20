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
 *
 * - Chức năng tìm kiếm danh mục:
 * + Tìm kiếm theo tên hoặc mô tả của danh mục, dùng
 * truy vấn SELECT kết hợp LIKE để tìm kiếm tương đối
 * + Hay đi chung với chức năng liệt kê
 * - Chức năng phân trang:
 * + NẾu ko dùng phân trang, thì nếu có nhiều bản ghi cần hiển
 * thị trong trang danh sách -> chết trang
 * + Thực tế luôn cần áp dụng chức năng phân trang cho danh sách
 * + SQL cho phân trang: SELECT kết hợp LIMIT
 * VD: 1 trang hiển thị 10 bản ghi, tổng = 51 bản ghi -> cần 6 trang
 * Trang 1 hiển thị 1 -> 10
 * Trang 2 hiển thị 11 -> 20
 * Trang 3 hiển thị 21 -> 30
 * Trang 4 hiển thị 31 -> 40
 * Trang 5 hiển thị 41 -> 50
 * Trang 6 hiển thị 51
 * + Url phân trang:
 * index.php?controller=category&action=index&page=1
 * + Code theo hướng là tạo 1 class chuyên dùng cho phân trang
 */