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
                                @if (Auth::user()->role == "superadmin")
                                <th scope="col">Author</th>
                                @endif
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $key => $e)
                            <tr>
                                <th scope="row">{{$event->firstItem()+$key}}</th>
                                <td>{{$e->nama_event}}</td>
                                @if (Auth::user()->role == "superadmin")
                                <td>{{$e->author}}</td>
                                @endif
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/event/{{$e->id}}/edit"
                                            class="btn btn-warning btn-sm btn-edit" data-id="{{$e->id}}">Edit</a>
                                        <a href="#" class="ml-2 btn btn-danger btn-sm btn-hapus"
                                            data-id="{{$e->id}}">Hapus</a>
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
                            <img src="{{ asset('images') }}/image-preview.png" alt="Image Preview"
                            class="img-fluid" id="preview">
                        </div>
                        <div class="custom-file mt-3">
                            <input id="gambar" class="custom-file-input" type="file" name="pamflet" required
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" id="labelimg">Jumbotron(foto header)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event">Nama event</label>
                        <input type="text" class="form-control" id="event" name="nama_event" required>
                    </div>
                    <div class="form-group">
                        <label for="diskripsi">Deskripsi</label>
                        <textarea rows="15" id="konten"
                            class="form-control form-control-line  @error('diskripsi') is-invalid @enderror"
                            name="deskripsi" placeholder="" required></textarea>
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
                                        class="form-control" disabled /></td>
                                <td><input type="text" name="tempat[]" placeholder="Masukan tempat "
                                        class="form-control" disabled /></td>
                                <td><input type="date" name="tanggal[]" placeholder="Masukan tanggal"
                                        class="form-control" disabled /></td>
                                <td><input type="time" name="jam[]" placeholder="Masukan jam" class="form-control"
                                        disabled />
                                </td>
                                <td><button type="button" name="add" id="add" disabled
                                        class="btn btn-success">Tambah</button>
                                </td>
                            </tr>
                        </table>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
{{-- script --}}
{{-- multiple image --}}
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
