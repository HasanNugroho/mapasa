<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use App\Models\galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use File;

class GaleriController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "superadmin") {
            $galeri = galeri::all();
        }else{
            $galeri = galeri::where('author', Auth::user()->name)->all();
        }
        return view('admin.galeri', compact('galeri'));
    }
    // store gambar
    public function store(Request $request)
    {
        $validateImageData = [
            'kegiatan' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ];

        if ($request->validate($validateImageData)) {
            if($request->hasfile('gambar'))
        {
            foreach($request->file('gambar') as $image)
            {
                // $gambar = $request->gambar;
                $imgname = time()."_".$image->getClientOriginalName();
                $image->move(\base_path() ."/public/images/galeri", $imgname);
                $data[] = $imgname;  
            }
        }
        $store = [
            'gambar' => json_encode($data),
            'kegiatan' => $request->kegiatan,
            'link' => $request->link,
            'slug' => Str::random(5),
            'author' => Auth::user()->name,
        ];
        if(galeri::create($store)){
            session()->flash('message', "Swal.fire('Success','Foto berhasil ditambah','success')");
        }else{
            session()->flash('message', "Swal.fire('Error','Foto gagal ditambah','error')");
        }
    } else {
        session()->flash('message', "Swal.fire('Error','Foto gagal ditambah','error')");
    }
    return redirect('/dashboard/galeri');
        
        
    }
    // lihat gambar
    public function see($id)
    {
        $data = galeri::where('id', $id)->first();
        return view('admin.setup.see-galeri', ['data' => $data]);    
    }
    // get to edit
    public function edit($id)
    {
        $data = galeri::find($id)->first();
        return view('admin.setup.edit-galeri', ['data' => $data]);   
    }
    // update galeri
    public function update(Request $request)
    {
        $data = [];
        // validasi kegiatan

        if($request->kegiatan){
            $data['kegiatan'] = 'required';
        }
        if($request->link){
            $data['link'] = 'required';
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
                File::delete(\base_path() .'/public/images/galeri/'.$hapus);
            }
            if($request->hasfile('gambar')){
                foreach($request->file('gambar') as $image)
                {                 
                    $imgname =$image->getClientOriginalName();
                    $image->move(\base_path() ."/public/images/galeri", $imgname);
                    $update_gambar[] = $imgname;  
                }
                $update['gambar'] = json_encode($update_gambar);
            }
        }
        if($request->kegiatan){
            $update['kegiatan'] = $request->kegiatan;
        }
        if($request->link){
            $update['link'] = $request->link;
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
            File::delete(\base_path() .'/public/images/galeri/'.$hapus);
        }
        $delete->delete();

        return redirect()->back();
    }
}
