@extends('layouts.app')
@section('title', 'Event | MAPASA')
@section('content')
<div class="hero-event">
    <div class="img-event" style="background: linear-gradient(180deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100%), url({{asset('images/event')}}/{{$data->pamflet}});
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;">
        <div class="center">
            <div class="text-light">
                <div class="text-2">{{$data->nama_event}}</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="bagian">
        <div class="text-4">
            {!!$data->deskripsi!!}
        </div>
    </div>
    @if ($data->kegiatan)
    <div class="bagian-blog">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lomba voli</td>
                    <td>anu</td>
                    <td>kui</td>
                    <td>08:00</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
