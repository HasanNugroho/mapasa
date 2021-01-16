<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('id',  Auth::user()->id)->first();
        return view('admin.profile', compact('user'));
    }

    public function update()
    {
        // dd(request());
        request()->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $data = [
            'email' => request('email'),
            'name' => request('name'),
        ];

        if(request('password')){
            request()->validate([
                'old_password' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'password' => bcrypt(request('password')),
            ];
        // dd($data);

        }

        if (request()->file('foto')) {
            request()->validate([
                'foto' => 'file|image|mimes:jpeg,jpg,svg,png,gif'
            ]);

            if (Auth::user()->foto != '') {
                //delete old image
                Storage::delete(Auth::user()->foto);
            }
            $data['foto'] = Storage::putFile('public/admins', request()->file('foto')->path());
        }

        if (request('password')) {
            if (Hash::check(request('old_password'), Auth::user()->password)) {
                $user = [
                    'email' => request('email'),
                    'name' => request('name'),
                ];
                User::where('id', Auth::user()->id)->update($data);
                session()->flash('message', "Swal.fire('Success','Updated profil','success')");
                return back();
            } else {
                session()->flash('message', "Swal.fire('Fail','Wrong password','error')");
                return back();
            }
        }else {
            User::where('id', Auth::user()->id)->update($data);

            session()->flash('message', "Swal.fire('Success','Updated profil','success')");
            return back();
        }
    }
    // 
    // Superadmin
    // 
    public function manage()
    {
        $user = User::paginate(10);
        return view('admin.manage.manage', compact('user'));
    }

    // get to edit
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.setup.user-edit', ['data' => $data]);
    }

    // tambah user
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'password' => 'required|min:8|max:255',
            'email' => 'required',
            'role' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => $request->role,
            'foto' => 'public/admins/profile1.jpg',
        ];
        // dd($data->role);

        User::create($data);

        session()->flash('message', "Swal.fire('Success','New admin added','success')");
        return redirect()->back();
    }

    // update user
    public function update2(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);

        $data = [];
        if($request->role){
            $request->validate([
                'role' => 'required'
            ]);

            $data = [
                'role' => request('role'),
            ];
        }
        if($request->password){
            $request->validate([
                'old_password' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'email' => request('email'),
                'name' => request('name'),
            ];
        }
        $password = User::where('id', $request->id)->first();
        if ($request->password) {
            if (Hash::check(request('old_password'), $password->password)) {
                $data = ['password' => bcrypt(request('password')),];
                User::where('id', $request->id)->update($data);
                // session()->flash('message', "Swal.fire('Success','Updated profil','success')");
                return back()->with("Swal.fire('Success','Updated profil','success')");
            } else {
                // session()->flash('message', "Swal.fire('Fail','Wrong password','error')");
                return back()->with("Swal.fire('Fail','Wrong password','error')");
            }
        }else {
            User::where('id', $request->id)->update($data);

            // session()->flash('message', "Swal.fire('Success','Updated profil','success')");
            return back()->with("Swal.fire('Success','Updated profil','success')");
        }
    }

    // hapus admin
    public function delete($id)
    {
        $delete = User::where('id', $id)->first();
            Storage::delete($delete);
        $delete->delete();
        return json_encode(array('statusCode'=>200));
    }
}
