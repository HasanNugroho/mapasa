<?php

namespace App\Http\Controllers;
use App\Models\event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "superadmin") {
            $event = event::paginate(8);
        }else{
            $event = event::where('author', Auth::user()->name)->paginate(8);
        }
        return view('admin.event' ,compact('event'));
    }
    // store data
    public function store(Request $request)
    {
        $request->validate([
            'pamflet' => 'required',
            'nama_event' => 'required',
            'deskripsi' => 'required',
        ]);

        if($request->hasfile('pamflet'))
        {
            $fotoutama = Storage::putFile('public/galeri',  $request->pamflet->path());
        }
        // dd($request);
        event::create([
            'pamflet' => $fotoutama,
            'nama_event' => $request->nama_event,
            'slug' => Str::slug($request->event),
            'deskripsi' => $request->deskripsi,
            'author' => Auth::user()->name,
        ]);
        session()->flash('message', "Swal.fire('Success','Event berhasil ditambahkan','success')");
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = event::find($id);
        return view('admin.setup.event-edit', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $validasi = ([
            'event' => 'required',
        ]);

        if ($request->file('pamflet')) {
            $validasi = ['pamflet' => 'required'];
        }
        if ($request->deskripsi) {
            $validasi = ['deskripsi' => 'required'];
        }
        
        $request->validate($validasi);
        
        $edit_event = event::where('id', $request->id)->first();
        // dd($edit_event);
        if ($request->file('pamflet')) {
            Storage::delete($edit_event->pamflet);
            
            $fotoutama = Storage::putFile('public/galeri',  $request->pamflet->path());
            $update['pamflet'] = $fotoutama;
        }

        if ($request->deskripsi) {
            $update['deskripsi'] = $request->deskripsi;
        }

        $update['nama_event'] = $request->nama_event;
        $update['slug'] = Str::slug($request->event);

        event::where('id', $request->id)->update($update);
        
        session()->flash('message', "Swal.fire('Success','Event berhasil diupdate','success')");
        return redirect('/dashboard/event');
    }
    public function hapus($id)
    {
        $delete = event::where('id', $id)->first();
        Storage::delete($delete->pamflet);
        $delete->delete();

        // return redirect()->back();
    }
}
