@extends('layouts.app')
@section('title', 'Semua | MAPASA')
@section('content')
{{-- Blog --}}
<div class="container">
    <div class="bagian-blog">
        <div class="d-flex align-items-center mb-3">
            <a href="#"><span class="iconify icon-prev" data-icon="carbon:previous-filled"
                    data-inline="false"></span></a>
            <div class="text-judul ml-2">Blog</div>
        </div>
        {{-- BLOG --}}
        <div class="text-3 mb-2">Terbaru</div>
        <div class="row d-flex align-items-center">
            <div class="col-md-6 col-sm-12">
                <img src="{{asset('images/hero.JPG')}}" class="hero-img" alt="">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="text-3">RAPAT RUTIN</div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="text-5">Penulis : M arif Nurrohman</div>
                    <div class="text-5 text-secondary">20 Maret 2021</div>
                </div>
                <div class="text-blog mt-3 mb-3">
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...
                </div>
                <a href="/blog" class="btn btn-md btn-primary text-4 mt-2">Baca artikel</a>
            </div>
        </div>
        <div class="bagian">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan">
                            <img src="{{asset('images/hero.JPG')}}" class="card-img-top"
                                style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                            <div class="card-footer ">
                                <div class="text-4 text-dark">RAPAT RUTIN</div>
                                <div class="text-5 mt-1 text-secondary">2 Januari 2020</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan">
                            <img src="{{asset('images/hero.JPG')}}" class="card-img-top"
                                style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                            <div class="card-footer ">
                                <div class="text-4 text-dark">RAPAT RUTIN</div>
                                <div class="text-5 mt-1 text-secondary">2 Januari 2020</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan">
                            <img src="{{asset('images/hero.JPG')}}" class="card-img-top"
                                style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                            <div class="card-footer ">
                                <div class="text-4 text-dark">RAPAT RUTIN</div>
                                <div class="text-5 mt-1 text-secondary">2 Januari 2020</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- BLOG END --}}
        {{-- KEGIATAN --}}
        <div class="bagian">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan text-center text-dark">
                            <div class="card-body bg-abu-abu">
                                <div class="d-flex justify-content-between">
                                    <div class="text-5">08:00</div>
                                    <div class="text-5">21 Januari 2021</div>
                                </div>
                                <img class="img-kegiatan" src="{{asset('images/hero.JPG')}}" alt="">
                                <div class="text-4">Rapat Rutin</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan text-center text-dark">
                            <div class="card-body bg-abu-abu">
                                <div class="d-flex justify-content-between">
                                    <div class="text-5">08:00</div>
                                    <div class="text-5">21 Januari 2021</div>
                                </div>
                                <img class="img-kegiatan" src="{{asset('images/hero.JPG')}}" alt="">
                                <div class="text-4">Rapat Rutin</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan text-center text-dark">
                            <div class="card-body bg-abu-abu">
                                <div class="d-flex justify-content-between">
                                    <div class="text-5">08:00</div>
                                    <div class="text-5">21 Januari 2021</div>
                                </div>
                                <img class="img-kegiatan" src="{{asset('images/hero.JPG')}}" alt="">
                                <div class="text-4">Rapat Rutin</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan text-center text-dark">
                            <div class="card-body bg-abu-abu">
                                <div class="d-flex justify-content-between">
                                    <div class="text-5">08:00</div>
                                    <div class="text-5">21 Januari 2021</div>
                                </div>
                                <img class="img-kegiatan" src="{{asset('images/hero.JPG')}}" alt="">
                                <div class="text-4">Rapat Rutin</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- KEGIATAN END --}}
        {{-- GALERI --}}
        <div class="bagian">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan card-img text-white">
                            <img src="{{asset('images/hero.JPG')}}" class="card-img" alt="...">
                            <div class="card-img-overlay text-center galeri">
                                <div class="text-4 text-dark">Penyemprotan</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan card-img text-white">
                            <img src="{{asset('images/hero.JPG')}}" class="card-img" alt="...">
                            <div class="card-img-overlay text-center galeri">
                                <div class="text-4 text-dark">Penyemprotan</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#">
                        <div class="card bayangan card-img text-white">
                            <img src="{{asset('images/hero.JPG')}}" class="card-img" alt="...">
                            <div class="card-img-overlay text-center galeri">
                                <div class="text-4 text-dark">Penyemprotan</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- GALERI END --}}
    </div>
</div>

{{-- Blog end --}}

@endsection
