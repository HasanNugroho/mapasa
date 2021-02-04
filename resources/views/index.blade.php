@extends('layouts.app')
@section('title', 'MAPASA')
@section('content')

<div class="pengumuman">
    <marquee  scrolldelay="9" class="text-berjalan text-5">Pengumuman dari pak" hehehehehheheheeheheheheheeheheheheh anu bingung meh nulis opo heheh -by burhan nurhasan nugroho</marquee>
</div>

{{-- Hero --}}
<div class="d-none d-md-block">
    <div class="container">
        <div class="row hero align-items-center">
            <div class="col-md-6">
                <div class="text-2">MAPASA</div>
                <div class="text-3">Manunggaling Pemuda Salakan</div>
                <a href="#" class="btn btn-md btn-primary text-4 mt-4">Selengkapnya</a>
            </div>
            <div class="col-md-6">
                <div id="hero-img-line"></div>
                <img src="{{asset('images/jumbotron.png')}}" class="hero-img" alt="gambar anggota mapasa">
            </div>
        </div>
    </div>
</div>

<div class="d-md-none">
    {{-- <img src="{{asset('images/hero-m.svg')}}" id="gradient" class="hero-mobile" alt="">
    <div class="text-hero card-img-overlay text-light">

    </div> --}}
    <div class="hero-utama" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, #ffffff), url(/images/hero-m.svg);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 300px;
    width: 100%;">
        <div class="center-item">
            <div class="text-light">
                <div class="text-2">Mapasa</div>
                <div class="text-3">Manunggaling Pemuda Salakan</div>
                <a href="#" class="btn btn-md btn-primary text-4 mt-4">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

{{-- Hero end --}}

{{-- Event --}}
<div class="container">
    <div class="bagian">
        <div class="text-3 mb-3">Event</div>
        <div class="row">
            <div class="col-md-6 mt-2 mb-2">
                <a href="#">
                    <div class="card bayangan">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="iconify icon-event" data-icon="mdi:virus" data-inline="false"></span>
                                <div class="col-10">
                                    <div class="text-4 text-dark">
                                        Penanggulangan Covid 19 didusun Salakan oleh Satgas Covid
                                    </div>
                                </div>
                                <span class="iconify icon-event" data-icon="mdi:virus" data-inline="false"></span>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6  mt-2 mb-2">
                <a href="#">
                    <div class="card bayangan">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="iconify icon-event" data-icon="el:flag" data-inline="false"></span>
                                <div class="col-10">
                                    <div class="text-4 text-dark">
                                        Peringatan Hari Kemerdekaan Republik Indonesia
                                    </div>
                                </div>
                                <span class="iconify icon-event" data-icon="el:flag" data-inline="false"></span>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- Event End --}}

{{-- Agenda --}}
<div class="container">
    <div class="bagian">
        <div class="text-3 mb-3">Agenda</div>
        <div class="swiper-container swiper-index">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card card-agenda text-center">
                        <div class="card-body bg-abu-abu">
                            <div class="d-flex justify-content-between">
                                <div class="text-5">19:00</div>
                                <div class="text-5">Januari</div>
                                <div class="text-5">2021</div>
                            </div>
                            <div class="text-1">
                                31
                            </div>
                            <div class="text-5">Rumah Sdri Latifah</div>
                        </div>
                        <div class="card-footer text-4 text-light" style="background-color: #828282;">
                            RAPAT RUTIN
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-agenda text-center">
                        <div class="card-body bg-abu-abu">
                            <div class="d-flex justify-content-between">
                                <div class="text-5">19:00</div>
                                <div class="text-5">Januari</div>
                                <div class="text-5">2021</div>
                            </div>
                            <div class="text-1">
                                31
                            </div>
                            <div class="text-5">Rumah Sdri Latifah</div>
                        </div>
                        <div class="card-footer text-4 text-light" style="background-color: #828282;">
                            RAPAT RUTIN
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-agenda text-center">
                        <div class="card-body bg-abu-abu">
                            <div class="d-flex justify-content-between">
                                <div class="text-5">19:00</div>
                                <div class="text-5">Januari</div>
                                <div class="text-5">2021</div>
                            </div>
                            <div class="text-1">
                                31
                            </div>
                            <div class="text-5">Rumah Sdri Latifah</div>
                        </div>
                        <div class="card-footer text-4 text-light" style="background-color: #828282;">
                            RAPAT RUTIN
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-agenda text-center">
                        <div class="card-body bg-abu-abu">
                            <div class="d-flex justify-content-between">
                                <div class="text-5">19:00</div>
                                <div class="text-5">Januari</div>
                                <div class="text-5">2021</div>
                            </div>
                            <div class="text-1">
                                31
                            </div>
                            <div class="text-5">Rumah Sdri Latifah</div>
                        </div>
                        <div class="card-footer text-4 text-light" style="background-color: #828282;">
                            RAPAT RUTIN
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
{{-- Agenda end --}}
{{-- Kegiatan terlaksana --}}
<div class="container">
    <div class="bagian">
        <div class="d-flex justify-content-between mb-3">
            <div class="text-3">Kegiatan Terlaksana</div>
            <div>
                <a href="#" class="btn btn-sm btn-primary text-5">Lihat semua</a>
                {{-- <a href="#" class="text-primary text-5">Lihat semua</a> --}}
            </div>
        </div>
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
</div>
{{-- Kegiatan terlaksana end --}}
{{-- Galeri --}}
<div class="container">
    <div class="bagian">
        <div class="d-flex justify-content-between mb-3">
            <div class="text-3">Galeri</div>
            <div>
                <a href="#" class="btn btn-sm btn-primary text-5">Lihat semua</a>
                {{-- <a href="#" class="text-primary text-5">Lihat semua</a> --}}
            </div>
        </div>
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
</div>
{{-- Galeri end --}}
{{-- Blog --}}
<div class="container">
    <div class="bagian">
        <div class="d-flex justify-content-between mb-3">
            <div class="text-3">Blog</div>
            <div>
                <a href="#" class="btn btn-sm btn-primary text-5">Lihat semua</a>
                {{-- <a href="#" class="text-primary text-5">Lihat semua</a> --}}
            </div>
        </div>
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
</div>
{{-- Blog end --}}
{{-- kritik dan saran --}}
<div class="container">
    <div class="bagian">
        <div class="kritik">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-3">Kritik dan Saran</div>
                <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Tulis
                </button>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kritik dan Saran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <label for="exampleInputEmail1" class="form-label ">Nama</label>
                            <div id="nama" class="form-text ml-2">(optional)</div>
                        </div>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                      <label for="pesan" class="form-label">Kritik dan Saran</label>
                      <textarea name="" id="pesan" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
{{-- modal end --}}

{{-- kritik dan saran end --}}
@endsection
