@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
<h1 class="m-0 text-dark">Blog</h1>
@stop

@section('content')
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
                        <th scope="col">Foto</th>
                        <th scope="col">Judul</th>
                        @if (Auth::user()->role == "superadmin")
                        <th scope="col">Author</th>
                        @endif
                        <th scope="col">Visitor</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $key => $e)
                            <tr>
                                <th scope="row">{{$blog->firstItem()+$key}}</th>
                                <td><img src="{{ Storage::url($e->foto)}}" style="max-width: 100px; height: auto; margin: 0 .2rem;" alt=""></td>
                                <td>{{$e->title}}</td>
                                @if (Auth::user()->role == "superadmin")
                                <td>{{$e->author}}</td>
                                @endif
                                <td>{{$e->visitor}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/blog/{{$e->id}}/edit" class="btn btn-warning btn-sm btn-edit" data-id="{{$e->id}}">Edit</a>
                                        <a href="#" class="ml-2 btn btn-danger btn-sm btn-hapus" data-id="{{$e->id}}">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{$blog->links('vendor.pagination.simple-bootstrap-4')}}
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ asset('images') }}/image-preview.png" alt="Image Preview" style="max-width: 400px; height: auto;"
                                id="preview">
                        </div>
                        <div class="custom-file mt-3">
                            <input id="gambar" class="custom-file-input" type="file" name="foto"
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" id="labelimg">Foto terkait</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="title">
                    </div>
                    <div class="form-group">
                        <label for="diskripsi">Artikel</label>
                        <div class="col-md-12">
                            <textarea rows="15" id="konten"
                                class="form-control form-control-line  @error('diskripsi') is-invalid @enderror"
                                name="artikel" placeholder=""></textarea>
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

<script src="{{asset('/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
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
        function loadFile(event){
        //mengubah gambar
        var reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]);
        reader.onload = function(){
        output.src = reader.result;
        }
        //mengubah label
        var file = document.getElementById('gambar');
        var output = document.getElementById('preview');
        var file = document.getElementById('labelimg').innerHTML = file.files[0].name
  };
</script>
{{-- ajax --}}
<script>
    $('.btn-hapus').on('click', function () {
        let id = $(this).data('id')
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/dashboard/blog/' + id + '/hapus',
                    method: "GET",
                    success: function (data) {
                        window.location.assign('/dashboard/blog')
                        Swal.fire('Success', 'Blog berhasil dihapus', 'success')
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            }
        })
    })
</script>
@stop
