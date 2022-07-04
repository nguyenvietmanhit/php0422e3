{{--
views/layouts/main.blade.php
- Tạo cấu trúc sau: public/
                          /css/style.css
                          /js/script.js
--}}
    <!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>
<header>Header</header>
<main>
    @if(session()->has('success'))
        <h3 style="color: green">
            {{ session()->get('success') }}
            @php(session()->forget('success'))
        </h3>
    @endif
        @if(session()->has('error'))
            <h3 style="color: red">
                {{ session()->get('error') }}
                @php(session()->forget('error'))
            </h3>
        @endif

    {{--            Đổ thông tin lỗi dựa vào biến có sẵn $errors--}}
    @foreach($errors->all() AS $error)
        <p style="color: red">{{ $error }}</p>
    @endforeach

    @yield('content')
</main>
<footer>Footer</footer>
</body>
</html>
