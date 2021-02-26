<?php

namespace App\Http\Controllers;
use App\Models\manage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ManageController extends Controller
{
    public function index_jumbotron()
    {
        $data = manage::where('keterangan', 'jumbotron')->first();
        $route = '/dashboard/web/jumbotron/update';
        $keterangan = 'jumbotron';

        return view('admin.management', compact('data', 'keterangan', 'route'));
    }
    // store jumbotron
    public function update_jumbotron(Request $request)
    {
        $validasi = [
            'judul' => 'required',
            'deskripsi' => 'required',
        ];

        if ($request->file('gambar')) {
            $validasi = ['gambar' => 'required'];
        }
        
        $request->validate($validasi);
        
        $edit_jumbotron = manage::where('id', $request->id)->first();
        if ($request->file('gambar')) {
            if($request->file('gambar') != "jumbotron.svg"){
                File::delete(\base_path() .'/public/images/manage/'.$edit_jumbotron->gambar);
            }
            $gambar = $request->gambar;
            $fotoutama =time()."_".$gambar->getClientOriginalName();
            $img = Image::make($gambar->path());
            $img->resize(750, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(\base_path().'/public/images/manage/'.$fotoutama)->filesize(); 

            $update['gambar'] = $fotoutama;
        }

        $update['deskripsi'] = $request->deskripsi;
        $update['judul'] = $request->judul;
        $update['author'] = Auth::user()->name;

        manage::where('id', $request->id)->update($update);
        
        session()->flash('message', "Swal.fire('Success','Jumbotron berhasil diupdate','success')");
        return redirect('/dashboard/web/jumbotron');
    }
    
    public function index_sejarah()
    {
        $data = manage::where('keterangan', 'sejarah')->first();
        $route = '/dashboard/web/sejarah/update';
        $keterangan = 'sejarah';

        return view('admin.management', compact('data', 'keterangan', 'route'));
    }
    // store sejarah
    public function update_sejarah(Request $request)
    {
        // dd($request);
        $validasi = [
            'deskripsi' => 'required',
        ];
        
        $request->validate($validasi);
        
        $edit_sejarah = manage::where('id', $request->id)->first();

        $update['status'] = $request->status;
        $update['deskripsi'] = $request->deskripsi;
        $update['author'] = Auth::user()->name;

        manage::where('id', $request->id)->update($update);
        
        session()->flash('message', "Swal.fire('Success','sejarah berhasil diupdate','success')");
        return redirect('/dashboard/web/sejarah');
    }
}
