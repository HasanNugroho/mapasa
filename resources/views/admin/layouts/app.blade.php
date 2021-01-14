<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="dashboard/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="dashboard/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    @include('admin.layouts.sidebar')

    {{-- content --}}
    @yield('content')
    {{-- content --}}

    @include('admin.layouts.navbar')
</body>

{{-- JS --}}
<script src="dashboard/vendor/jquery/dist/jquery.min.js"></script>
<script src="dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="dashboard/vendor/js-cookie/js.cookie.js"></script>
<script src="dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="dashboard/vendor/chart.js/dist/Chart.min.js"></script>
<script src="dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="dashboard/js/argon.js?v=1.2.0"></script>

</html>
