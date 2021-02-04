<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use App\Models\galeri;
use App\Models\event;
use App\Models\pengumuman;
use App\Models\agenda;
use App\Models\blog;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $pengumuman = pengumuman::get();
        $event = event::latest();
        $agenda = agenda::get();
        $kegiatan = kegiatan::paginate(4);
        $galeri = galeri::paginate(3);
        $blog = blog::paginate(3);
        return view('index', compact('pengumuman', 'event', 'kegiatan', 'agenda', 'galeri', 'blog'));
    }

    public function galeri($slug)
    {
        $galeri = galeri::where('slug', $slug)->first();
        return view('galeri', compact('galeri'));
    }

    public function blog($slug)
    {
        $blog = blog::where('slug', $slug)->first();
        $rekomendasi = blog::where('slug', '!=' , $slug)->latest()->paginate(3);
        return view('blog', compact('blog', 'rekomendasi'));
    }
    public function kegiatan($id)
    {
        $data = kegiatan::find($id)->first();
        return view('admin.setup.see-kegiatan', ['data' => $data]);    
    }
    public function semua_galeri()
    {
        $data = galeri::all();
        $jenis = "Galeri";
        return view('semua', compact('data', 'jenis'));
    }

    public function semua_blog()
    {
        $preview = blog::latest()->first();
        $data = blog::where('id', '!=' , $preview->id)->get();
        $jenis = "Blog";
        return view('semua', compact('data', 'jenis', 'preview'));
    }
    public function semua_kegiatan()
    {
        $data = kegiatan::all();
        $jenis = "Kegiatan";
        return view('semua', compact('data', 'jenis'));
    }
}
