@extends('layouts.app')
@section('title', 'MAPASA')
@section('content')
{{-- Hero --}}
{{-- <div class="bg-hero"><img src="{{asset('images/hero.JPG')}}" class="hero-img" alt=""></div> --}}
<div class="container">
    <div class="row hero align-items-center">
        <div class="col-md-6">
            <div class="text-2">MAPASA</div>
            <div class="text-3">Manunggaling Pemuda Salakan</div>
            <a href="#" class="btn btn-md btn-primary text-4 mt-4">Selengkapnya</a>
        </div>
        <div class="col-md-6">
            <div id="hero-img-line"></div>
            <img src="{{asset('images/hero.JPG')}}" class="hero-img" alt="gambar anggota mapasa">
        </div>
    </div>
</div>
{{-- Hero end --}}

{{-- Event --}}
<div class="container mt-5 mb-5">
    <div class="text-3 mb-3">Event</div>
    <div class="row">
        <div class="col-md-6">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="iconify icon-event" data-icon="mdi:virus" data-inline="false"></span>
                            <div class="col-10">
                                <div class="text-3 text-dark">
                                    Penanggulangan Covid 19 didusun Salakan
                                </div>
                            </div>
                            <span class="iconify icon-event" data-icon="mdi:virus" data-inline="false"></span>
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="iconify icon-event" data-icon="el:flag" data-inline="false"></span>
                            <div class="col-10">
                                <div class="text-3 text-dark">
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
{{-- Event End --}}
@endsection
