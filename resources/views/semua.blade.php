@extends('layouts.app')
@section('title', $jenis, '| MAPASA')
@section('content')
{{-- Blog --}}
<div class="container">
    <div class="bagian-blog">
        <div class="d-flex align-items-center mb-3">
            <a href="{{route('landing')}}"><span class="iconify icon-prev" data-icon="carbon:previous-filled"
                    data-inline="false"></span></a>
            <div class="text-judul ml-2">{{$jenis}}</div>
        </div>
        @if ($jenis === "Galeri")
        {{-- GALERI --}}
        @if ($data->count() != 0)
        <div class="bagian">
            <div class="row">
                @foreach ($data as $da)
            <?php $gambar = Arr::first(json_decode($da->gambar))?>
            <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                <a href="{{route('galeri.front', $da->slug)}}">
                    <div class="card card-gambar bayangan text-white">
                        <img src="{{asset('images/galeri')}}/{{$gambar}}" style="object-fit: cover"
                            class="card-img card-gambar img-thumbnail" alt="...">
                        <div class="card-img-overlay text-center galeri">
                            <div class="text-4 text-dark">{{Str::limit($da->kegiatan,20,'...')}}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            </div>
        </div>
        @else
        <div class="text-3 text-secondary text-center mt-5 mb-5">Galeri tidak tersedia</div>
        @endif
        {{-- GALERI END --}}
        @elseif ($jenis === 'Blog')
        {{-- BLOG --}}
        @if ($ada != 0)
        <div class="text-3 mb-2">Terbaru</div>
        <div class="row d-flex align-items-center">
            <div class="col-md-6 col-sm-12">
                <img src="{{asset('images/blog')}}/{{$preview->foto}}" class="hero-img" alt="">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="text-3">{{$preview->title}}</div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="text-5">Penulis : {{$preview->author}}</div>
                    <div class="text-5 text-secondary">{{$preview->created_at->isoformat('DD MMMM YYYY')}}</div>
                </div>
                <div class="text-blog mt-3 mb-3">
                    {!!Str::limit($preview->artikel,100,'...')!!}
                </div>
                <a href="{{route('blog.front', $preview->slug)}}" class="btn btn-md btn-primary text-4 mt-2">Baca
                    artikel</a>
            </div>
        </div>
        <div class="bagian">
            <div class="row">
                @foreach ($data as $da)
                <div class="col-lg-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="{{route('blog.front', $da->slug)}}">
                        <div class="card bayangan">
                            <img src="{{asset('images/blog')}}/{{$da->foto}}" style="object-fit:cover;" class="card-img-top card-gambar img-thumbnail"
                            style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">                            
                            <div class="card-footer ">
                                <div class="text-4 text-dark">{{$da->title}}</div>
                                <div class="text-5 mt-1 text-secondary">{{$da->created_at->isoformat('DD MMMM YYYY')}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        {{-- BLOG END --}}
        @else
        <div class="text-3 text-secondary text-center mt-5 mb-5">Blog tidak tersedia</div>
        @endif

        @else
        {{-- KEGIATAN --}}
        @if ($data->count() != 0)
        <div class="bagian">
            <div class="row">
                @foreach ($data as $da)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 mb-2">
                    <a href="#" class="lihat-kegiatan" data-id="{{$da->id}}">
                        <div class="card bayangan text-center text-dark">
                            <div class="card-body bg-abu-abu">
                                <div class="d-flex justify-content-between">
                                    <div class="text-5">{{$da->jam->isoformat('HH:mm')}}</div>
                                    <div class="text-5">{{$da->tanggal->isoformat('DD MMMM YYYY')}}</div>
                                </div>
                                <img class="img-kegiatan img-thumbnail" style="object-fit:cover;" src="{{asset('images/kegiatan')}}/{{$da->foto_utama}}" alt="">
                                <div class="text-4">{{$da->kegiatan}}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="text-3 text-secondary text-center mt-5 mb-5">Kegiatan tidak tersedia</div>
        @endif
        {{-- KEGIATAN END --}}
        @endif
    </div>
</div>

{{-- Blog end --}}

@endsection
