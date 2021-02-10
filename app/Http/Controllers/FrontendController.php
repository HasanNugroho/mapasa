<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use App\Models\galeri;
use App\Models\event;
use App\Models\pengumuman;
use App\Models\agenda;
use App\Models\blog;
use App\Models\manage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $jumbotron = manage::where('keterangan', 'jumbotron')->first();
        $sejarah = manage::where('keterangan', 'sejarah')->first();
        $pengumuman = pengumuman::get();
        $event = event::all();
        $agenda = agenda::get();
        $kegiatan = kegiatan::paginate(4);
        $galeri = galeri::paginate(3);
        $blog = blog::paginate(3);
        return view('index', compact('pengumuman', 'event', 'kegiatan', 'agenda', 'galeri', 'blog', 'jumbotron', 'sejarah'));
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

        if (!session()->get('visitsNews-'.$slug)) {
            session()->put('visitsNews-'.$slug, true);
            $blog->update([
                'visitor' => $blog->visitor + 1
            ]);
        }
        
        return view('blog', compact('blog', 'rekomendasi'));
    }
    public function kegiatan($id)
    {
        $data = kegiatan::where('id', $id)->first();
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
        $ada = blog::all()->count();
        $jenis = "Blog";
        return view('semua', compact('data', 'jenis', 'preview', 'ada'));
    }
    public function semua_kegiatan()
    {
        $data = kegiatan::all();
        $jenis = "Kegiatan";
        return view('semua', compact('data', 'jenis'));
    }
    public function event($slug)
    {
        $data = event::where('slug', $slug)->first();
        return view('event', compact('data'));
    }
}
