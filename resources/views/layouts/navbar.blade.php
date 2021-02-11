<?php 
use App\Models\blog;
use App\Models\galeri;
use Illuminate\Support\Str;

$jenis = request()->path();

$trim_blog = Str::of($jenis)->trim('blog');
$trim_blog = Str::of($trim_blog)->trim('/');

$trim_galeri = Str::of($jenis)->trim('galeri');
$trim_galeri = Str::of($trim_galeri)->trim('/');

$blog = blog::where('slug', $trim_blog)->first();
$galeri = galeri::where('slug', $trim_galeri)->first();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary text-light">
    <div class="container">
        <a class="navbar-brand text-3" href="{{route('landing')}}">MAPASA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-4 ml-1 @if( $jenis == 'kegiatan' or $jenis == 'galeri' or $jenis == 'blog' or $galeri or $blog) @else active @endif" href="{{route('landing')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-4 ml-1" href="/#agenda">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-4 ml-1 @if( $jenis == 'kegiatan') active @endif" href="/#kegiatan">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-4 ml-1 @if($jenis == 'galeri' or $galeri) active @endif" href="/#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-4 ml-1 @if($jenis == 'blog' or $blog) active @endif" href="/#blog">Blog</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

