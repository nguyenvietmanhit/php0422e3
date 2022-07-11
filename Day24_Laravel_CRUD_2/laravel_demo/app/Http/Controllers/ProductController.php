<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //public/them-moi-sp
    public function create() {
        // - Controller gọi View để hiển thị giao diện:
        return view('products/create');
    }

    public function createSave(Request $request) {
//        dump($request->all());
        // Validate form bằng các rule của Laravel
        $rules = [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric'],
            'avatar' => ['image', 'max:2048'] //max:KB
        ];
        $messages = [
            'name.required' => 'Tên sp phải nhập',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giả phải là số',
            'avatar.image' => 'File upload phải là ảnh',
            'avatar.max' => 'File upload ko đc vượt quá 2MB'
        ];
        $request->validate($rules, $messages);
        // Validate thành công, hệ thống ko có lỗi nào
//        echo 'Test validate thành công';
        // - Controller gọi Model lưu vào CSDL
        // +  Laravel có 2 cơ chế tương tác với CSDL:
        // Query Builder: dùng truy vấn SQL thuần -> tốc độ nhanh hơn
        // Eloquent: là Model trong MVC
        // + Lấy tất cả mảng dữ liệu gửi lên từ form:
        $request_all = $request->all();

        // - Xử lý upload file
        $avatar = '';
        if (isset($request_all['avatar'])) {
            $obj_avatar = $request_all['avatar'];
            // Tạo tên file mang tính duy nhất
            $avatar = time() . $obj_avatar->getClientOriginalName();
            // Tạo thư mục upload chứa các file sẽ tải lên
            $dir_uploads = public_path('uploads');
            // Upload file vào thư mục upload
            $is_upload = $obj_avatar->move($dir_uploads, $avatar);
        }
        $request_all['avatar'] = $avatar;
        dump($request_all);
//        die;
        // Hàm create này chỉ chạy đc khi name của input trùng
        //với tên trường
        $obj_product = Product::create($request_all);
        if (!empty($obj_product)) {
            session()->put('success', 'Thêm mới thành công');
        } else {
            session()->put('error', 'Thêm mới thất bại');
        }
        return redirect()->route('danh-sach-sp');
    }

    //public/danh-sach-sp
    public function index() {
//        $products = Product::all();
        $products = Product::paginate(1);
        return view('products/index', [
            'products' => $products
        ]);
    }
}
