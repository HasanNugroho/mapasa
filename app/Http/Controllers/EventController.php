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
        if($request->kegiatan){
            foreach ($request->kegiatan as $key => $value) {
                $kegiatan[] = $value;
            }
            $store =['kegiatan' => json_encode($kegiatan)];
        }
        if($request->tempat){
            foreach ($request->tempat as $key => $t) {
                $tempat[] = $t;
            }
            $store =['tempat' => json_encode($tempat)];
        }
        if($request->tanggal){
            foreach ($request->tanggal as $key => $ta) {
                $tanggal[] = $ta;
            }
            $store =['tanggal' => json_encode($tanggal)];
        }
        
        if($request->jam){
            foreach ($request->jam as $key => $jm) {
                // dd($request->jam);
                $jam [] = $jm;
            }
            $store =['jam' => json_encode($jam)];
        }
        // dd($request);
        $store = [
            'pamflet' => $fotoutama,
            'nama_event' => $request->nama_event,
            'slug' => Str::slug($request->nama_event),
            'deskripsi' => $request->deskripsi,
            'author' => Auth::user()->name
        ];
        event::create($store);
        session()->flash('message', "Swal.fire('Success','Event berhasil ditambahkan','success')");
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = event::find($id);
        return view('admin.setup.event-edit', compact('data'));
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
        if($request->kegiatan){
            foreach ($request->kegiatan as $key => $value) {
                $kegiatan[] = $value;
            }
            $update['kegiatan'] = $request->kegiatan;
        }
        if($request->tempat){
            foreach ($request->tempat as $key => $t) {
                $tempat[] = $t;
            }
            $update['tempat'] = $request->tempat;
        }
        if($request->tanggal){
            foreach ($request->tanggal as $key => $ta) {
                $tanggal[] = $ta;
            }
            $update['tanggal'] = $request->tanggal;
        }
        
        if($request->jam){
            foreach ($request->jam as $key => $jm) {
                // dd($request->jam);
                $jam [] = $jm;
            }
            $update['jam'] = $request->jam;
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
