<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use App\Models\galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = galeri::all();
        $kegiatan = kegiatan::all();
        return view('admin.galeri', compact('galeri', 'kegiatan'));
    }
    // store gambar
    public function store(Request $request)
    {
        $validateImageData = $request->validate([
            'kegiatan' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);
        if($request->hasfile('gambar'))
        {
            foreach($request->file('gambar') as $image)
            {
                $imgname = Storage::putFile('public/galeri',  $image->path());
                $data[] = $imgname;  
            }
        }
        galeri::create([
            'gambar' => json_encode($data),
            'kegiatan' => $request->kegiatan,
        ]);
        session()->flash('message', "Swal.fire('Success','Foto berhasil ditambah','success')");
        return redirect('/dashboard/galeri');
    }
    // lihat gambar
    public function see($id)
    {
        $data = galeri::find($id)->first();
        return view('admin.setup.see-galeri', ['data' => $data]);    
    }
    // get to edit
    public function edit($id)
    {
        $kegiatan = kegiatan::all();
        $data = galeri::find($id)->first();
        return view('admin.setup.edit-galeri', ['data' => $data, 'kegiatan' => $kegiatan]);   
    }
    // update galeri
    public function update(Request $request)
    {
        $data = [];
        // validasi kegiatan
        if($request->kegiatan){
            $data['kegiatan'] = 'required';
        }
        // validasi gambar
        if($request->file('gambar')){
            $data['gambar'] = 'required';
            $data['gambar.*'] = 'required';
        }
        $request->validate($data);

        $targetItem = galeri::where('id', $request->id)->first();
        // update multiple gambar
        if($request->hasfile('gambar')){
            foreach(json_decode($targetItem->gambar) as $hapus){
                Storage::delete($hapus);
            }
            if($request->hasfile('gambar')){
                foreach($request->file('gambar') as $image)
                {
                    $imgname = Storage::putFile('public/galeri',  $image->path());
                    $update_gambar[] = $imgname;
                    $update['gambar'] = json_encode($update_gambar);
                }
            }
        }
        if($request->kegiatan){
            $update['kegiatan'] = $request->kegiatan;
        }

        galeri::where('id', $request->id)->update($update);

        session()->flash('message', "Swal.fire('Success','Foto berhasil diupdate','success')");
        return redirect('/dashboard/galeri');
    }
    // hapus galeri
    public function delete($id)
    {
        $delete = galeri::find($id);
        foreach(json_decode($delete->gambar) as $hapus){
            Storage::delete($hapus);
        }
        $delete->delete();

        return redirect()->back();
    }
}
