@extends('adminlte::page')

@section('title', $keterangan)

@section('content_header')
    <h1 class="m-0 text-dark">{{$keterangan}}</h1>
@stop

@section('content')
@if ($keterangan = 'jumbotron')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <button type="button" class="btn btn-success btn-md" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($jumbotron as $key => $j)
                            <tr>
                                <th scope="row">{{$jumbotron->firstItem()+$key}}</th>
                                <td><img src="{{ Storage::url($j->gambar)}}" style="width: 100px; height: 100px; margin: 0 .2rem;" alt=""></td>
                                <td>{{$j->judul}}</td>
                                <td>{{$j->keterangan}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{$route_edit}}/{{$j->id}}" class="btn btn-warning btn-sm btn-edit" data-id="{{$j->id}}">Edit</a>
                                        <a href="{{$route_delete}}/{{$j->id}}" class="ml-2 btn btn-danger btn-sm btn-hapus delete-confirm" data-id="{{$j->id}}">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- {{$jumbotron->links('vendor.pagination.simple-bootstrap-4')}} --}}
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{$route_add}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{ asset('images') }}/image-preview.png" alt="Image Preview" style="max-width: 400px; height: auto;"
                                    id="preview">
                            </div>
                            <div class="custom-file mt-3">
                                <input id="gambar" class="custom-file-input" type="file" name="gambar"
                                    onchange="loadFile(event)">
                                <label for="my-input" class="custom-file-label" id="labelimg">Gambar</label>
                            </div>
                        </div>
                        <div class="mb-3 col-mb-12">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                        <div class="mb-3 col-mb-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
    </div>
</div>
{{-- modal end --}}

{{-- script --}}
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
@else
    
@endif
@stop