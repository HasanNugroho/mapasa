@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1 class="m-0 text-dark">Hallo {{$user->name}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="text3">Edit profile</div>
            </div>
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                value="{{$user->email}}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-md-12">
                            <fieldset disabled>
                                <label for="disabledTextInput" class="form-label">Role</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="{{$user->role}}">
                            </fieldset>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="old_password">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label d-flex">Password
                                Baru</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
                <div class="card-body text-center">
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ Storage::url($user->foto)}}" alt="Image Preview" style="width: 80%; height: auto;border-radius: 150px; padding:1rem;"
                                id="preview">
                        </div>
                        <div class="custom-file mt-3 text-left">
                            <input id="foto" class="custom-file-input" type="file" name="foto"
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" style="overflow: hidden" id="labelimg">{{$user->foto}}</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function loadFile(event){
        //mengubah foto
        var reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]);
        reader.onload = function(){
        output.src = reader.result;
        }
        //mengubah label
        var file = document.getElementById('foto');
        var output = document.getElementById('preview');
        var file = document.getElementById('labelimg').innerHTML = file.files[0].name
    };
</script>
@stop
