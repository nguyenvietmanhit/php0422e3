<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //public/them-moi-sp
    public function create() {
        // - Controller gọi View để hiển thị giao diện:
        return view('products/create');
    }

    public function createSave(Request $request) {
        dump($request->all());
        // Validate form bằng các rule của Laravel
        $rules = [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric']
        ];
        $messages = [
            'name.required' => 'Tên sp phải nhập',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giả phải là số'
        ];
        $request->validate($rules, $messages);
        // Validate thành công, hệ thống ko có lỗi nào
        echo 'Test validate thành công';
    }
}
