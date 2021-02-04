<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("favicon/apple-icon-57x57.png")}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("favicon/apple-icon-60x60.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("favicon/apple-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("favicon/apple-icon-76x76.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("favicon/apple-icon-114x114.png")}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("favicon/apple-icon-120x120.png")}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("favicon/apple-icon-144x144.png")}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("favicon/apple-icon-152x152.png")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("favicon/apple-icon-180x180.png")}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset("favicon/android-icon-192x192.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("favicon/favicon-96x96.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("favicon/manifest.json")}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    {{-- favicon end --}}

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

    {{-- modal see --}}
    <div class="modal fade" id="kegiatan-see" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">

                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal see end --}}

    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('swipper/js/swiper-bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    {{-- swipper --}}
    <!-- Initialize Swiper -->
    <script>
        {!!session()->get('message')!!}

        var swiper = new Swiper('.swiper-index', {
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

        var swiper = new Swiper('.swiper-galeri', {
            slidesPerView: 4,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                type: 'progressbar',
                clickable: true,
            },
            breakpoints: {
                '@0.50': {
                slidesPerView: 3,
                spaceBetween: 10,
                },
                '@1.00': {
                slidesPerView: 4,
                spaceBetween: 10,
                },
            },
        });
    </script>
    {{-- swipper end --}}
    {{-- lihat kegiatan --}}
    {{-- ajax --}}
    <script>
        $('.lihat-kegiatan').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id')
            $.ajax({
                url: '/kegiatan/' + id,
                method: "GET",
                success: function (data) {
                    $('#kegiatan-see').find('.modal-body').html(data)
                    $('#kegiatan-see').modal('show')
                },
                error: function (error) {
                    console.log(error)
                }
            })
        })
    </script>
    {{-- lihat kegiatan end --}}
</body>

</html>
