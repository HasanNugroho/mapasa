@extends('layouts.app')
@section('title', 'MAPASA')
@section('content')
<?php
use App\Models\kegiatan;
use App\Models\galeri;
use App\Models\event;
use App\Models\pengumuman;
use App\Models\agenda;
use App\Models\blog;

$pengumuman_count = pengumuman::count();
$event_count = event::count();
$agenda_count = agenda::count();
$kegiatan_count = kegiatan::count();
$galeri_count = galeri::count();
$blog_count = blog::count();
?>
@if ($pengumuman_count != 0)  
<div class="pengumuman">
    <marquee  scrolldelay="9" class="text-berjalan text-5">
        @foreach ($pengumuman as $p)
            {{$p->pengumuman}} -by {{$p->author}} &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
        @endforeach
    </marquee>
</div>
@endif


{{-- Hero --}}
<div class="d-none d-md-block">
    <div class="container">
        <div class="row hero align-items-center">
            <div class="col-md-6">
                <div class="text-2">MAPASA</div>
                <div class="text-3">Manunggaling Pemuda Salakan</div>
                <a href="#agenda" class="btn btn-md btn-primary text-4 mt-4">Selengkapnya</a>
            </div>
            <div class="col-md-6">
                <div id="hero-img-line"></div>
                <img src="{{asset('images/jumbotron.png')}}" class="hero-img" alt="gambar anggota mapasa">
            </div>
        </div>
    </div>
</div>

<div class="d-md-none">
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
@if ($event_count != 0)  
<div class="container">
    <div class="bagian">
        <div class="text-3 mb-3">Event</div>
        <div class="row">
            @foreach ($event as $ev)
            <div class="col-md-6 mt-2 mb-2">
                <a href="#">
                    <div class="card bayangan">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="iconify icon-event" data-icon="mdi:virus" data-inline="false"></span>
                                <div class="col-10">
                                    <div class="text-4 text-dark">
                                        {{$ev->nama_event}}
                                    </div>
                                </div>
                                <span class="iconify icon-event" data-icon="mdi:virus" data-inline="false"></span>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- Event End --}}

{{-- Agenda --}}
<div class="container" id="agenda">
    <div class="bagian">
        <div class="text-3 mb-3">Agenda</div>
        @if ($agenda_count != 0)
        <div class="swiper-container swiper-index">
            <div class="swiper-wrapper">
                @foreach ($agenda as $ag)
                <div class="swiper-slide">
                    <div class="card card-agenda text-center">
                        <div class="card-body bg-abu-abu">
                            <div class="d-flex justify-content-between">
                                <div class="text-5">{{$ag->jam}}</div>
                                <div class="text-5" style="margin: 0 .8rem">{{$ag->tanggal->isoformat('MMMM')}}</div>
                                <div class="text-5">{{$ag->tanggal->isoformat('YYYY')}}</div>
                            </div>
                            <div class="text-1">
                                {{$ag->tanggal->isoformat('DD')}}
                            </div>
                            <div class="text-5">Rumah Sdr/i {{$ag->tempat}}</div>
                        </div>
                        <div class="card-footer text-uppercase text-4 text-light" style="background-color: #828282;">
                            {{$ag->kegiatan}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        @else
        <div class="text-4 text-center text-secondary bagian-blog">Tidak ada agenda</div>
        @endif
        </div>
    </div>
</div>
{{-- Agenda end --}}
{{-- Kegiatan terlaksana --}}
<div class="container" id="kegiatan">
    <div class="bagian">
        <div class="d-flex justify-content-between mb-3">
            <div class="text-3">Kegiatan Terlaksana</div>
            <div>
                {{-- <a href="{{route('kegiatan.semua')}}" class="btn btn-sm btn-primary text-5">Lihat semua</a> --}}
                <a href="{{route('kegiatan.semua')}}" class="text-primary text-5">Lihat semua</a>
            </div>
        </div>
        @if ($kegiatan_count != 0)
        <div class="row">
            @foreach ($kegiatan as $kg)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 mb-2">
                <a href="#" class="lihat-kegiatan" data-id="{{$kg->id}}">
                    <div class="card bayangan text-center text-dark">
                        <div class="card-body bg-abu-abu">
                            <div class="d-flex justify-content-between">
                                <div class="text-5">{{$kg->jam->isoformat('HH:mm')}}</div>
                                <div class="text-5">{{$kg->tanggal->isoformat('DD MMMM YYYY')}}</div>
                            </div>
                            <img class="img-kegiatan" src="{{ Storage::url($kg->foto_utama)}}" alt="">
                            <div class="text-4">{{$kg->kegiatan}}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
            <div class="text-4 text-center text-secondary bagian-blog">Tidak ada Kegiatan</div>
        @endif
    </div>
</div>
{{-- Kegiatan terlaksana end --}}
{{-- Galeri --}}
<div class="container" id="galeri">
    <div class="bagian">
        <div class="d-flex justify-content-between mb-3">
            <div class="text-3">Galeri</div>
            <div>
                {{-- <a href="{{route('galeri.semua')}}" class="btn btn-sm btn-primary text-5">Lihat semua</a> --}}
                <a href="{{route('galeri.semua')}}" class="text-primary text-5">Lihat semua</a>
            </div>
        </div>
        @if ($galeri_count != 0)
        <div class="row">
            @foreach ($galeri as $ga)
            <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                <a href="{{route('galeri.front', $ga->slug)}}">
                    <div class="card bayangan card-img text-white">
                        <img src="{{ Storage::url(Arr::first(json_decode($ga->gambar)))}}" class="card-img" alt="...">
                        <div class="card-img-overlay text-center galeri">
                            <div class="text-4 text-dark">{{$ga->kegiatan}}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
            <div class="text-4 text-center text-secondary bagian-blog">Tidak ada foto</div>
        @endif
    </div>
</div>
{{-- Galeri end --}}
{{-- Blog --}}
<div class="container" id="blog">
    <div class="bagian">
        <div class="d-flex justify-content-between mb-3">
            <div class="text-3">Blog</div>
            <div>
                {{-- <a href="{{route('blog.semua')}}" class="btn btn-sm btn-primary text-5">Lihat semua</a> --}}
                <a href="{{route('blog.semua')}}" class="text-primary text-5">Lihat semua</a>
            </div>
        </div>
        @if ($blog_count != 0)
        <div class="row">
            @foreach ($blog as $bl)
            <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                <a href="{{route('blog.front', $bl->slug)}}">
                    <div class="card bayangan">
                        <img src="{{ Storage::url($bl->foto)}}" class="card-img-top"
                            style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                        <div class="card-footer ">
                            <div class="text-4 text-dark">{{$bl->title}}</div>
                            <div class="text-5 mt-1 text-secondary">{{$bl->created_at->isoformat('DD MMMM YYYY')}}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-4 text-center text-secondary bagian-blog">Tidak ada Blog</div>
        @endif
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
                <form method="POST" action="{{route('saran.store')}}">
                    @csrf
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <label for="exampleInputEmail1" class="form-label ">Nama</label>
                            <div id="nama" class="form-text ml-2">(optional)</div>
                        </div>
                      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                      <label for="pesan" class="form-label">Kritik dan Saran</label>
                      <textarea name="pesan" id="pesan" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal end --}}

{{-- kritik dan saran end --}}
@endsection
