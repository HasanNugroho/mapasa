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
                            <img src="{{Storage::url($data->pamflet)}}" alt="Image Preview"
                            class="img-fluid" id="preview">
                        </div>
                        <div class="custom-file mt-3">
                            <input id="gambar" class="custom-file-input" type="file" name="pamflet"
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" id="labelimg">{{$data->pamflet}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event">Nama event</label>
                        <input type="text" class="form-control" id="event" value="{{$data->nama_event}}"
                            name="nama_event">
                    </div>
                    <div class="form-group">
                        <label for="diskripsi">Deskripsi</label>
                        <div class="col-md-12">
                            <textarea rows="15" id="konten"
                                class="form-control form-control-line  @error('diskripsi') is-invalid @enderror"
                                name="deskripsi">{{$data->deskripsi}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <label for="jadwal">Jadwal</label>
                            <label id="emailHelp" class="form-text ml-2">(Opsional)</label>
                            <label id="emailHelp" class="form-text text-danger ml-2">Belum tersedia</label>
                        </div>
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>Kegiatan</th>
                                <th>Tempat</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="kegiatan[]" placeholder="Masukan kegiatan"
                                        class="form-control" disabled/></td>
                                <td><input type="text" name="tempat[]" placeholder="Masukan tempat "
                                        class="form-control" disabled/></td>
                                <td><input type="date" name="tanggal[]" placeholder="Masukan tanggal"
                                        class="form-control" disabled/></td>
                                <td><input type="time" name="jam[]" placeholder="Masukan jam" class="form-control" disabled/>
                                </td>
                                <td><button type="button" name="add" id="add" disabled class="btn btn-success">Tambah</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
{{-- script --}}
<script src="{{asset('/vendor/ckeditor/ckeditor.js')}}"></script>
{{-- text editor --}}
<script type="text/javascript">
    var i = 0;
    $("#add").click(function () {
        ++i;
        $("#dynamicTable").append(
            '<tr><td><input type="text" name="kegiatan[]" placeholder="Masukan kegiatan" class="form-control" /></td><td><input type="text" name="tempat[]" placeholder="Masukan tempat" class="form-control" /></td><td><input type="date" name="tanggal[]" placeholder="Masukan tanggal" class="form-control" /></td><td><input type="time" name="jam[]" placeholder="Masukan jam" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Hapus</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
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
