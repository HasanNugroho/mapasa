<?php

namespace App\Http\Controllers;
use App\Models\visitor;
use App\Models\feedback;
use App\Models\agenda;
use App\Models\kegiatan;
use App\Models\galeri;
use App\Models\event;
use App\Models\blog;
use App\Models\pengumuman;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pesan = feedback::paginate(6);
        

        $visitor = visitor::all()->count();
        $feedback = feedback::all()->count();
        $agenda = agenda::all()->count();
        $kegiatan = kegiatan::all()->count();
        $galeri = galeri::all()->count();
        $event = event::all()->count();
        $blog = blog::all()->count();
        $pengumuman = pengumuman::all()->count();
        return view('home', compact('visitor', 'feedback', 'agenda', 'kegiatan', 'galeri', 'event', 'blog', 'pengumuman', 'pesan'));
    }
}
