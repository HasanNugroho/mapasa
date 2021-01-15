<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = kegiatan::paginate(5);
        return view('admin.kegiatan', compact('kegiatan'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'kegiatan' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'foto_utama' => 'required',
            'foto' => 'required',
            'foto.*' => 'required'
        ]);
        // dd($request);


        $data = [];
        if($request->hasfile('foto'))
        {
            foreach($request->file('foto') as $image)
            {
                $imgname = Storage::putFile('public/galeri',  $image->path());
                $data[] = $imgname;  
            }
        }
        if($request->hasfile('foto_utama'))
        {
            $fotoutama = Storage::putFile('public/galeri',  $request->foto_utama->path());
        }
        // dd($request);
        kegiatan::create([
            'foto' => json_encode($data),
            'slug' => Str::slug($request->kegiatan),
            'foto_utama' => $fotoutama,
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = kegiatan::find($id);
        return view('admin.setup.kegiatan-edit', ['data' => $data]);
    }
    // hapus
    public function hapus($id)
    {
        $delete = kegiatan::where('id', $id)->first();
        Storage::delete($delete->foto_utama);
        foreach(json_decode($delete->foto) as $hapus){
            Storage::delete($hapus);
        }
        $delete->delete();

        return redirect()->back();
    }
}
