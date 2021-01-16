@extends('adminlte::page')

@section('title', 'Edit event')

@section('content_header')
<h1 class="m-0 text-dark">Edit event</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('update.event')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="text-center">
                            <img src="{{Storage::url($data->pamflet)}}" alt="Image Preview" style="max-width: 400px; height: auto;"
                                id="preview">
                        </div>
                        <div class="custom-file mt-3">
                            <input id="gambar" class="custom-file-input" type="file" name="pamflet"
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" id="labelimg">{{$data->pamflet}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="text" class="form-control" id="event" value="{{$data->event}}" name="event">
                    </div>
                    <div class="form-group">
                        <label for="diskripsi">Deskripsi</label>
                        <div class="col-md-12">
                            <textarea rows="15" id="konten"
                                class="form-control form-control-line  @error('diskripsi') is-invalid @enderror"
                                name="deskripsi">{{$data->deskripsi}}</textarea>
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
