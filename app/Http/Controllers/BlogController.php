<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Intervention\Image\ImageManagerStatic as Image;
class BlogController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "superadmin") {
            $blog = blog::paginate(6);
        }else{
            $blog = blog::where('author', Auth::user()->name)->paginate(6);
        }
        return view('admin.blog', compact('blog'));
    }
    // store data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artikel' => 'required',
            'foto' => 'required',
        ]);

        if($request->hasfile('foto'))
        {
            $gambar = $request->foto;
            $fotoutama =time()."_".$gambar->getClientOriginalName();
            $img = Image::make($gambar->path());
            $img->resize(750, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(\base_path().'/public/images/blog/'.$fotoutama)->filesize(); 
        }
        // dd($request);
        blog::create([
            'foto' => $fotoutama,
            'title' => $request->title,
            'author' => Auth::user()->name,
            'slug' => Str::slug($request->title),
            'artikel' => $request->artikel,
        ]);
        session()->flash('message', "Swal.fire('Success','Blog berhasil ditambahkan','success')");
        return redirect()->back();
    }
    // get data to update
    public function edit($id)
    {
        $data = blog::where('id', $id)->first();
        return view('admin.setup.blog-edit', ['data' => $data]);
    }
    // update
    public function update(Request $request)
    {
        $validasi = ([
            'title' => 'required',
        ]);

        if ($request->file('foto')) {
            $validasi = ['foto' => 'required'];
        }
        if ($request->artikel) {
            $validasi = ['artikel' => 'required'];
        }
        
        $request->validate($validasi);
        
        $edit_blog = blog::where('id', $request->id)->first();
        if ($request->file('foto')) {
            File::delete(\base_path() .'/public/images/blog/'.$edit_blog->foto);
            
            $gambar = $request->foto;
            $fotoutama =time()."_".$gambar->getClientOriginalName();
            $img = Image::make($gambar->path());
            $img->resize(750, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(\base_path().'/public/images/blog/'.$fotoutama)->filesize(); 

            $update['foto'] = $fotoutama;
        }

        if ($request->artikel) {
            $update['artikel'] = $request->artikel;
        }

        $update['title'] = $request->title;
        $update['slug'] = Str::slug($request->title);

        blog::where('id', $request->id)->update($update);
        
        session()->flash('message', "Swal.fire('Success','Blog berhasil diupdate','success')");
        return redirect('/dashboard/blog');
    }
    public function hapus($id)
    {
        $delete = blog::where('id', $id)->first();
        File::delete(\base_path() .'/public/images/blog/'.$delete->foto);
        $delete->delete();

        // return redirect()->back();
    }
}
