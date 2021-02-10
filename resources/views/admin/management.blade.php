@extends('adminlte::page')

@section('title', 'Edit ', $keterangan)

@section('content_header')
<h1 class="m-0 text-dark">Edit {{$keterangan}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{$route}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$data->id}}" name="id">
                    <div class="form-group">
                        <div class="row">
                            @if ($keterangan == 'jumbotron')
                            <div class="form-group">
                                <div class="text-center">
                                    <img src="{{Storage::url($data->gambar)}}" alt="Image Preview" style="max-width: 400px; height: auto;"
                                        id="preview">
                                </div>
                                <div class="custom-file mt-3">
                                    <input id="gambar" class="custom-file-input" type="file" name="gambar"
                                        onchange="loadFile(event)">
                                    <label for="my-input" class="custom-file-label" id="labelimg">{{$data->gambar}}</label>
                                </div>
                            </div>
                            <div class="mb-3 col-mb-12">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" value="{{$data->judul}}" name="judul">
                            </div>
                            <div class="mb-3 col-mb-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3">{{$data->deskripsi}}</textarea>
                            </div>
                            @elseif($keterangan == 'sejarah')
                                <div class="mb-3 col-mb-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Sejarah</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3">{{$data->deskripsi}}</textarea>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Auth::user()->role == "superadmin")
                            <div class="text-5 text-secondary">Author: {{$data->author}}</div>
                        @endif
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>
</div>

{{-- css --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

{{-- script --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

{{-- ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

{{-- script --}}
<script src="{{asset('/vendor/ckeditor/ckeditor.js')}}"></script>
{{-- text editor --}}
<script>
    var konten = document.getElementById("konten");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

</script>

{{-- preview img --}}
<script>
    function loadFile(event) {
        //mengubah gambar
        var reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]);
        reader.onload = function () {
            output.src = reader.result;
        }
        //mengubah label
        var file = document.getElementById('gambar');
        var output = document.getElementById('preview');
        var file = document.getElementById('labelimg').innerHTML = file.files[0].name
    };
</script>
@stop
