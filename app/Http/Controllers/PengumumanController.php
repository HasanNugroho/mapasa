<?php

namespace App\Http\Controllers;
use App\Models\pengumuman;

use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = pengumuman::paginate(8);
        return view('admin.pengumuman', compact('pengumuman'));
    }
    // store data
    public function store(Request $request)
    {
        $request->validate([
            'pengumuman' => 'required',
            'author' => 'required',
        ]);
        pengumuman::create([
            'pengumuman' => $request->pengumuman,
            'author' => $request->author
        ]);
        
        session()->flash('message', "Swal.fire('Success','Blog berhasil ditambah','success')");
        return redirect()->back();
    }

    // edit data
    public function edit($id)
    {
        $data = pengumuman::find($id);
        return view('admin.setup.pengumuman-edit', ['data' => $data]);
    }

    // update
    public function update($id, Request $request)
    {
        $request->validate([
            'pengumuman' => 'required',
            'author' => 'required',
        ]);
        pengumuman::find($id)->update([
            'pengumuman' => $request->pengumuman,
            'author' => $request->author
        ]);
    } 

    // hapus
    public function hapus($id, Request $request)
    {
        pengumuman::find($id)->delete();
    } 
}
