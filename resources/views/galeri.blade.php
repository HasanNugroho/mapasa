@extends('layouts.app')
@section('title', 'Semua | MAPASA')
@section('content')
{{-- Blog --}}
<div class="container">
    <div class="bagian-blog">
        @if ($galeri)
        <div class="d-flex align-items-center mb-3">
            <a href="{{route('landing')}}"><span class="iconify icon-prev" data-icon="carbon:previous-filled"
                    data-inline="false"></span></a>
            <div class="text-judul ml-2">{{$galeri->kegiatan}}</div>
        </div>
        <div class="bagian-blog text-center">
            <img id="expandedImg" style="width:80%"
                src="{{asset('images/galeri')}}/{{Arr::first(json_decode($galeri->gambar))}}">
        </div>
        <div class="swiper-galeri swiper-container">
            <div class="swiper-wrapper">
                <?php foreach (json_decode($galeri->gambar) as $g) {  ?>
                <div class="swiper-slide">
                    <img src="{{asset('images/galeri')}}/{{$g}}" class="hero-img galeri-preview"
                        onclick="myFunction(this);" alt="">
                </div>
                <?php } ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        @if ($galeri->status == "on")
        <div class="bagian-blog">
            <div id="linkto" class="text-4 mb-1">Jika ingin download atau lihat foto. Akses link dibawah:</div>
            <a href="{{$galeri->link}}" for="linkto" target="_blank"
                class="btn btn-md btn-primary te
                xt-4 mt-2">Akses</a>
        </div>
        @endif
        @else
        <div class="d-flex align-items-center mb-3">
            <a href="{{route('landing')}}"><span class="iconify icon-prev" data-icon="carbon:previous-filled"
                    data-inline="false"></span></a>
            <div class="text-judul ml-2">Kembali</div>
        </div>
        <div class="text-3 text-secondary text-center mt-5 mb-5">Galeri tidak tersedia</div>
        @endif

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
