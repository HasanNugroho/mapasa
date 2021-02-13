<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "superadmin") {
            $kegiatan = kegiatan::paginate(8);
        }else{
            $kegiatan = kegiatan::where('author', Auth::user()->name)->paginate(8);
        }
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
        ]);
        // dd($request);


        $data = [];
        if($request->hasfile('foto_utama'))
        {
            $gambar = $request->foto_utama;
            $fotoutama =time()."_".$gambar->getClientOriginalName();
            $gambar->move(\base_path() ."/public/images/kegiatan", $fotoutama);
        }
        // dd($request);
        kegiatan::create([
            'slug' => Str::slug($request->kegiatan),
            'foto_utama' => $fotoutama,
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
            'author' => Auth::user()->name,
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
        ];

        // validasi tanggal
        if($request->tanggal){
            $data['tanggal'] = 'required';
        }
        // validasi jam
        if($request->jam){
            $data['jam'] = 'required';
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
        // update jam
        if($request->jam){
            $update['jam'] = $request->jam;
        }
        // update foto utama
        $targetItem = kegiatan::where('id', $request->id)->first();
        if($request->file('foto_utama')){
            File::delete(\base_path() .'/public/images/kegiatan/'.$targetItem->foto_utama);

            $gambar = $request->foto_utama;
            $fotoutama =time()."_".$gambar->getClientOriginalName();
            $gambar->move(\base_path() ."/public/images/kegiatan", $fotoutama);
            $update['foto_utama'] = $fotoutama;
        }
        $update['kegiatan'] = $request->kegiatan;
        $update['keterangan'] = $request->keterangan;

        kegiatan::where('id', $request->id)->update($update);

        session()->flash('message', "Swal.fire('Success','Kegiatan berhasil diupdate','success')");
        return redirect('/dashboard/kegiatan');
    }
    // hapus
    public function hapus($id)
    {
        $delete = kegiatan::where('id', $id)->first();
        File::delete(\base_path() .'/public/images/kegiatan/'.$delete->foto_utama);
        $delete->delete();

        session()->flash('message', "Swal.fire('Success','Kegiatan berhasil dihapus','success')");
        return redirect()->back();
    }
}
