<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = agenda::paginate(5);
        return view('admin.agenda', compact('agenda'));
    }
    // tambah agenda
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kegiatan' => 'required',
            'jam' => 'required',
            'tanggal' => 'required',
        ]);
        agenda::insert([
            'kegiatan' => $request->kegiatan,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);
        session()->flash('message', "Swal.fire('Success','Agenda berhasil ditambahkan','success')");
        return redirect()->back();
    }
    // get data to edit
    public function agenda_edit($id)
    {
        $data = agenda::find($id);
        return view('admin.setup.agenda-edit', ['data' => $data]);
    }
    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required',
            'jam' => 'required',
            'tanggal' => 'required',
        ]);
        agenda::where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);
        
    }
    // hapus data
    public function hapus($id)
    {
        agenda::where('id', $id)->delete();
    }
}
