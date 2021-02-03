@extends('layouts.app')
@section('title', 'Blog | MAPASA')
@section('content')
<div class="container">
    <div class="row bagian-blog">
        {{-- content --}}
        <div class="col-lg-8">
            <img src="{{asset('images/hero.JPG')}}" class="hero-img" alt="">
            <div class="text-judul-blog">Agenda rapat rutin Mapasa</div>
            <div class="d-flex align-items-center justify-content-between mt-2">
                <div class="text-5">Penulis : M arif Nurrohman</div>
                <div class="text-5 text-secondary">20 Maret 2021</div>
            </div>
            <hr>
            <div class="text-blog mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia deserunt mollit anim id est laborum.<br><br>

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</div>
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
                        <a href="#">
                            <div class="card rekomendasi mt-1 mb-1">
                                <div class="card-body">
                                    <div class="text-5 text-dark" style="font-weight: 500">Voli sore hari</div>
                                    <div class="text-6 text-secondary">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card rekomendasi mt-1 mb-1">
                                <div class="card-body">
                                    <div class="text-5 text-dark" style="font-weight: 500">Voli sore hari</div>
                                    <div class="text-6 text-secondary">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card rekomendasi mt-1 mb-1">
                                <div class="card-body">
                                    <div class="text-5 text-dark" style="font-weight: 500">Voli sore hari</div>
                                    <div class="text-6 text-secondary">Lorem ipsum dolor sit amet...</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="#" class="text-5 text-link-blog">Lihat Semua</a>
                    </div>
                </div>
            </div>
            {{-- rekomendasi end --}}
        </div>
    </div>
</div>

@endsection
