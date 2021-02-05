<?php

namespace App\Http\Controllers;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function see($id)
    {
        $data = feedback::find($id)->first();
        return view('admin.setup.see-feedback', ['data' => $data]);    
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
    public function delete($id)
    {
        $delete = feedback::find($id)->delete();

        session()->flash('message', "Swal.fire('Success','Kegiatan berhasil dihapus','success')");
        return redirect()->back();
    }
}
