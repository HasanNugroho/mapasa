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
            'link' => 'required',
            'foto_utama' => 'required',
        ]);
        // dd($request);


        $data = [];
        if($request->hasfile('foto_utama'))
        {
            $fotoutama = Storage::putFile('public/galeri',  $request->foto_utama->path());
        }
        // dd($request);
        kegiatan::create([
            'slug' => Str::slug($request->kegiatan),
            'foto_utama' => $fotoutama,
            'link' => $request->link,
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);

        session()->flash('message', "Swal.fire('Success','Kegiatan berhasil ditambah','success')");
        return redirect()->back();
    }
    // ambil data untuk di edit
    public function edit($id)
    {
        $data = kegiatan::find($id);
        return view('admin.setup.kegiatan-edit', ['data' => $data]);
    }
    // update data
    public function update(Request $request)
    {
        $data = [
            'kegiatan' => 'required',
            'keterangan' => 'required',
            'jam' => 'required',
            'link' => 'required',
        ];

        // validasi tanggal
        if($request->tanggal != null){
            $data['tanggal'] = 'required';
        }
        // validasi foto utama
        if($request->file('foto_utama')){
            $data['foto_utama'] = 'required';
        }
        $request->validate($data);

        // update tanggal
        if($request->tanggal){
            $update['tanggal'] = $request->tanggal;
        }
        // update foto utama
        $targetItem = kegiatan::where('id', $request->id)->first();
        if($request->file('foto_utama')){
            Storage::delete($targetItem->foto_utama);

            $fotoutama = Storage::putFile('public/galeri',  $request->foto_utama->path());
            $update['foto_utama'] = $fotoutama;
        }
        $update['kegiatan'] = $request->kegiatan;
        $update['keterangan'] = $request->keterangan;
        $update['jam'] = $request->jam;
        $update['link'] = $request->link;

        kegiatan::where('id', $request->id)->update($update);

        session()->flash('message', "Swal.fire('Success','Kegiatan berhasil diupdate','success')");
        return redirect('/dashboard/kegiatan');
    }
    // hapus
    public function hapus($id)
    {
        $delete = kegiatan::where('id', $id)->first();
        Storage::delete($delete->foto_utama);
        $delete->delete();

        session()->flash('message', "Swal.fire('Success','Kegiatan berhasil dihapus','success')");
        return redirect()->back();
    }
}