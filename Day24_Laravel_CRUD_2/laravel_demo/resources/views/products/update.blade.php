{{--views/products/update.blade.php--}}
@extends('layouts.main')
@section('page_title', 'Form cập nhật sản phẩm')

@section('content')
    <h2>Form cập nhật sp</h2>
    <form method="post"
          action="{{ url('update-sp/' . $product['id']) }}"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        Nhập tên sp:
        <input type="text" name="name"
       value="{{ old('name') ? old('name') : $product['name'] }}" />
        <br />
        Nhập giá sp:
        <input type="text" name="price"
       value="{{ old('price') ? old('price') : $product['price'] }}" />
        <br />
        <input type="submit" name="submit" value="Lưu" />
        <a href="{{ url('danh-sach-sp') }}">Về trang danh sách</a>
    </form>
@endsection()
