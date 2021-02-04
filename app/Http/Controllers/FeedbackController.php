<?php

namespace App\Http\Controllers;
use App\Models\feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        # code...
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
        ]);
        if($request->nama == null){
            $store['nama'] = 'Anonymus';
        }else{
            $request->validate([
                'nama' => 'required',
            ]);
            $store['nama'] = $request->nama;
        }
        $store['pesan'] = $request->pesan;

        feedback::insert($store);
        session()->flash('message', "Swal.fire('Success','Kritik dan saran berhasil ditambahkan','success')");
        return redirect()->back();
    }
}
