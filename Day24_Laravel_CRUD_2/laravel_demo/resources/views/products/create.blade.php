{{--views/products/create.blade.php--}}
@extends('layouts.main')
@section('page_title', 'Form thêm mới sản phẩm')

@section('content')
    <h2>Form thêm mới sp</h2>
    <form method="post" action="{{ url('insert-sp') }}"
    enctype="multipart/form-data">
        @csrf
        Nhập tên sp:
        <input type="text" name="name" value="{{ old('name') }}" />
        <br />
        Nhập giá sp:
        <input type="text" name="price" value="{{ old('price') }}" />
        <br />
        Upload ảnh:
        <input type="file" name="avatar" />
        <br />
        <input type="submit" name="submit" value="Lưu" />
        <a href="{{ url('danh-sach-sp') }}">Về trang danh sách</a>
    </form>
@endsection()
