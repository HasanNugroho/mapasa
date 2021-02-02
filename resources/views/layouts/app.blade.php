<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('swipper/css/swiper-bundle.css')}}" rel="stylesheet">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>@yield('title')</title>
</head>

<body>
    @include('layouts.navbar')

    {{-- content --}}
    @yield('content')
    {{--  --}}

    @include('layouts.footer')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('swipper/js/swiper-bundle.min.js')}}"></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

    {{-- swipper --}}
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            // spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                '@0.25': {
                slidesPerView: 2,
                spaceBetween: 10,
                },
                '@0.50': {
                slidesPerView: 2,
                spaceBetween: 10,
                },
                '@0.75': {
                slidesPerView: 2,
                spaceBetween: 10,
                },
                '@1.00': {
                slidesPerView: 3,
                spaceBetween: 10,
                },
                '@1.25': {
                slidesPerView: 3,
                spaceBetween: 10,
                },
                '@1.50': {
                slidesPerView: 4,
                spaceBetween: 10,
                },
            },
        });
    </script>
    {{-- swipper end --}}
</body>

</html>
