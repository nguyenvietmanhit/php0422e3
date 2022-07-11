{{-- views/products/index.blade.php --}}
@extends('layouts/main')
@section('page_title', 'Trang liệt kê sp')

@section('content')
    <a href="{{ url('them-moi-sp') }}">Thêm mới sp</a>
    <h2>Danh sách sp</h2>
    <table class="table table-hover">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Avatar</th>
            <th></th>
        </tr>
        @foreach($products AS $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>
                    @if(!empty($product['avatar']))
                        <img src="{{ asset('uploads/' . $product['avatar']) }}"
                             height="80px" />
                    @endif
                </td>
                <td>
                    <a href="#">Sửa</a>
                    <a href="#" onclick="return confirm('Xóa?')">Xóa</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@endsection()
