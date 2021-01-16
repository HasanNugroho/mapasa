@extends('adminlte::page')

@section('title', 'Edit Kegiatan')

@section('content_header')
<h1 class="m-0 text-dark">Edit kegiatan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('update.kegiatan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$data->id}}" id="data_id" name="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="mb-3 col-mb-12">
                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                <input type="text" class="form-control" id="kegiatan" value="{{$data->kegiatan}}" name="kegiatan">
                            </div>
                            <div class="mb-3 col-mb-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Kegiatan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" value="{{$data->keterangan}}" name="keterangan"
                                    rows="3">{{$data->keterangan}}</textarea>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="{{$data->tanggal}}" name="tanggal" id="tanggal">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="jam" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="jam" value="{{$data->jam}}" name="jam">
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <img src="{{Storage::url($data->foto_utama)}}" alt="Image Preview" style="max-width: 400px; height: auto;"
                                        id="preview">
                                </div>
                                <div class="custom-file mt-3">
                                    <input id="gambar" class="custom-file-input" type="file" name="foto_utama"
                                        onchange="loadFile(event)">
                                    <label for="my-input" class="custom-file-label" id="labelimg">{{$data->foto_utama}}</label>
                                </div>
                            </div>
                            <div class="mb-3 col-mb-12">
                                <label for="link" class="form-label">Link Foto</label>
                                <input type="text" class="form-control" id="link" value="{{$data->link}}" name="link">
                                <div id="emailHelp" class="form-text">Link foto (Google Drive atau could storage lainnya)</div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
