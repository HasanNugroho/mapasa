@extends('layouts.app')
@section('title', 'Blog | MAPASA')
@section('content')
<?php
use App\Models\blog;
$blog_count = blog::count();
?>
<div class="container">
    <div class="row bagian-blog">
        @if ($blog)
        {{-- content --}}
        <div class="col-lg-8">
            <img src="{{asset('images/blog')}}/{{$blog->foto}}" class="hero-img" alt="">
            <div class="text-judul-blog">{{$blog->title}}</div>
            <div class="d-flex align-items-center justify-content-between mt-2">
                <div class="text-5">Penulis : {{$blog->author}}</div>
                <div class="text-5 text-secondary">{{$blog->created_at->isoformat('DD MMMM YYYY')}}</div>
            </div>
            <hr>
            <div class="text-blog mb-3">{!!$blog->artikel!!}</div>
        </div>
        {{-- content end --}}
        <div class="col-lg-4">
            {{-- rekomendasi --}}
            <div class="card bg-abu-abu" style="border: none;">
                <div class="card-body">
                    <div class="text-4">
                        Rekomendasi Artikel
                    </div>
                    <div class="mt-3 mb-3">
                        @if ($blog_count > 1)
                        @foreach ($rekomendasi as $reko)
                        <a href="{{route('blog.front', $reko->slug)}}">
                            <div class="card rekomendasi mt-1 mb-1">
                                <div class="card-body">
                                    <div class="text-5 text-dark" style="font-weight: 500">
                                        {{Str::limit($reko->title,30,'...')}}</div>
                                    <div class="text-6 text-secondary">{!!Str::limit($reko->artikel,35,'...')!!}</div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @else
                        <div class="text-4 text-center text-secondary bagian-blog">Tidak ada rekomendasi</div>
                        @endif

                    </div>
                    <div class="text-center">
                        <a href="{{route('blog.semua')}}" class="text-5 text-link-blog">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- rekomendasi end --}}
        @else
        <div class="text-3 text-secondary text-center mt-5 mb-5">Blog tidak tersedia</div>
        @endif
    </div>
</div>

@endsection
