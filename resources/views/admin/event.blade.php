@extends('adminlte::page')

@section('title', 'Event')

@section('content_header')
<h1 class="m-0 text-dark">Event</h1>
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
                        <th scope="col">Event</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($event as $key => $e)
                            <tr>
                                <th scope="row">{{$event->firstItem()+$key}}</th>
                                <td>{{$e->event}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/event/{{$e->id}}/edit" class="btn btn-warning btn-sm btn-edit" data-id="{{$e->id}}">Edit</a>
                                        <a href="#" class="ml-2 btn btn-danger btn-sm btn-hapus" data-id="{{$e->id}}">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{$event->links('vendor.pagination.simple-bootstrap-4')}}
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.event')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ asset('images') }}/image-preview.png" alt="Image Preview" style="max-width: 400px; height: auto;"
                                id="preview">
                        </div>
                        <div class="custom-file mt-3">
                            <input id="gambar" class="custom-file-input" type="file" name="pamflet"
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" id="labelimg">Pamflet</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="text" class="form-control" id="event" name="event">
                    </div>
                    <div class="form-group">
                        <label for="diskripsi">Deskripsi</label>
                        <div class="col-md-12">
                            <textarea rows="15" id="konten"
                                class="form-control form-control-line  @error('diskripsi') is-invalid @enderror"
                                name="deskripsi" placeholder=""></textarea>
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
{{-- modal edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update.kegiatan')}}" method="POST" id="form-edit">
                @csrf
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal edit end --}}

{{-- script --}}
{{-- multiple image --}}
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-tambah").click(function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("form").on("click", ".btn-kurang", function () {
            $(this).parents(".control-group").remove();
        });
    });
</script>

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
                    url: '/dashboard/event/' + id + '/hapus',
                    method: "GET",
                    success: function (data) {
                        window.location.assign('/dashboard/event')
                        Swal.fire('Success', 'Event berhasil dihapus', 'success')
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
