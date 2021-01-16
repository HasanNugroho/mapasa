<?php

namespace App\Http\Controllers;
use App\Models\manage;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index_jumbotron()
    {
        $jumbotron = manage::where('keterangan', 'jumbotron')->paginate(5);
        $route_add = '/dashboard/web/jumbotron/store';
        $route_edit = '/dashboard/web/jumbotron/edit';
        $route_delete = '/dashboard/web/jumbotron/delete';
        $keterangan = 'jumbotron';

        return view('admin.management', compact('jumbotron', 'keterangan', 'route_add', 'route_edit', 'route_delete'));
    }
    // store jumbotron
    public function store_jumbotron(Request $request)
    {
        $data = [
            'judul' => 'required',
            'gambar' => 'required',
        ];

        if ($request->deskripsi) {
            $data = [
                'deskripsi' => 'required',
            ];
        }
        $request->validate($data);
        // dd($request);
        if($request->hasfile('gambar'))
        {
            $fotoutama = Storage::putFile('public/manage',  $request->gambar->path());
        }

        manage::create([
            'gambar' => $fotoutama,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'keterangan' => 'jumbotron',
        ]);
        session()->flash('message', "Swal.fire('Success','Jumbotron berhasil ditambahkan','success')");
        return redirect()->back();
    }
    // get to edit
    public function edit_jumbotron($id)
    {
        $jumbotron = manage::find($id)->first();
        $keterangan = 'jumbotron';
        $route = '/dashboard/web/jumbotron/update';

        return view('admin.setup.edit-manage', compact('jumbotron', 'route', 'keterangan'));
    }
    // update
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
            Storage::delete($edit_jumbotron->gambar);
            
            $fotoutama = Storage::putFile('public/manage',  $request->gambar->path());
            $update['gambar'] = $fotoutama;
        }

        $update['deskripsi'] = $request->deskripsi;
        $update['judul'] = $request->judul;

        manage::where('id', $request->id)->update($update);
        
        session()->flash('message', "Swal.fire('Success','Jumbotron berhasil diupdate','success')");
        return redirect('/dashboard/web/jumbotron');
    }

    public function delete_jumbotron ($id)
    {
        $hapus = manage::find($id)->first();
        Storage::delete($hapus->gambar);
        $hapus->delete();

        session()->flash('message', "Swal.fire('Success','Jumbotron berhasil dihapus','success')");
        return redirect('/dashboard/web/jumbotron');
    }
}
