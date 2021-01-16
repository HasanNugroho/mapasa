<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = blog::paginate(6);
        return view('admin.blog', compact('blog'));
    }
    // store data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'artikel' => 'required',
            'foto' => 'required',
        ]);

        if($request->hasfile('foto'))
        {
            $fotoutama = Storage::putFile('public/blog',  $request->foto->path());
        }
        // dd($request);
        blog::create([
            'foto' => $fotoutama,
            'title' => $request->title,
            'author' => $request->author,
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
            'author' => 'required',
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
            Storage::delete($edit_blog->foto);
            
            $fotoutama = Storage::putFile('public/blog',  $request->foto->path());
            $update['foto'] = $fotoutama;
        }

        if ($request->artikel) {
            $update['artikel'] = $request->artikel;
        }

        $update['title'] = $request->title;
        $update['author'] = $request->author;
        $update['slug'] = Str::slug($request->title);

        blog::where('id', $request->id)->update($update);
        
        session()->flash('message', "Swal.fire('Success','Blog berhasil diupdate','success')");
        return redirect('/dashboard/blog');
    }
    public function hapus($id)
    {
        $delete = blog::where('id', $id)->first();
        Storage::delete($delete->foto);
        $delete->delete();

        // return redirect()->back();
    }
}
