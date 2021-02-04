@extends('layouts.app')
@section('title', 'Semua | MAPASA')
@section('content')
{{-- Blog --}}
<div class="container">
    <div class="bagian-blog">
        <div class="d-flex align-items-center mb-3">
            <a href="#"><span class="iconify icon-prev" data-icon="carbon:previous-filled"
                    data-inline="false"></span></a>
            <div class="text-judul ml-2">RAPAT RUTIN</div>
        </div>
        <div class="bagian-blog text-center">
            <img id="expandedImg" style="width:80%" src="{{asset('images/hero.JPG')}}">
        </div>
        <div class="swiper-galeri swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{asset('images/hero.JPG')}}" class="hero-img galeri-preview" onclick="myFunction(this);" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/hero.png')}}" class="hero-img galeri-preview" onclick="myFunction(this);" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/jumbotron.png')}}" class="hero-img galeri-preview" onclick="myFunction(this);" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/hero-m.svg')}}" class="hero-img galeri-preview" onclick="myFunction(this);" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('images/image-preview.png')}}" class="hero-img galeri-preview" onclick="myFunction(this);" alt="">
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="bagian-blog">
            <div id="linkto" class="text-4 mb-1">Jika ingin download atau lihat foto. Akses link dibawah:</div>
            <a href="https://youtube.com" for="linkto" target="_blank" class="btn btn-md btn-primary text-4 mt-2">Akses</a>
        </div>
    </div>
</div>


<script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      expandImg.src = imgs.src;
      expandImg.parentElement.style.display = "block";
    }
    </script>
@endsection
