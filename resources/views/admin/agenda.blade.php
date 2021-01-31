@extends('adminlte::page')

@section('title', 'Agenda')

@section('content_header')
<h1 class="m-0 text-dark">Agenda Mendatang</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-header">
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
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($agenda as $key => $a)
                            <tr>
                                <th scope="row">{{$agenda->firstItem()+$key}}</th>
                                <td>{{$a->kegiatan}}</td>
                                <td>{{$a->jam}}</td>
                                <td>{{$a->tanggal->isoFormat('dddd, Do MMMM YYYY')}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="{{$a->id}}">Edit</a>
                                        <a href="#" class="ml-2 btn btn-danger btn-sm btn-hapus" data-id="{{$a->id}}">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{$agenda->links('vendor.pagination.simple-bootstrap-4')}}
                  </table>
                </div>
            </div>
        </div>
{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.agenda')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kegiatan</label>
                        <input type="text" class="form-control" name="kegiatan" id="exampleFormControlInput1"
                            placeholder="rapat">
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam</label>
                        <input type="time" class="form-control" name="jam" id="jam">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- modal end --}}
{{-- modal edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kontak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="" id="form-edit">
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
<script>
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/agenda/' + id + '/edit',
            method: "GET",
            success: function (data) {
                // console.log(data)
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('show')
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
    $('.btn-update').on('click', function (e) {
        e.preventDefault();
        let id = $('#form-edit').find('#data_id').val()
        let formData = $('#form-edit').serialize()
        // console.log(id)
        console.log(formData)
        $.ajax({
            url: '/dashboard/agenda/' + id + '/update',
            method: "POST",
            data: formData,
            success: function (data) {
                // console.log(success)
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/dashboard/agenda')
                Swal.fire('Success','Agenda berhasil diupdate','success')
            },
            error: function (err) {
                console.log(err.responseJSON)
            }

        })
    })
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
                    url: '/dashboard/agenda/' + id + '/hapus',
                    method: "GET",
                    success: function (data) {
                        window.location.assign('/dashboard/agenda')
                        Swal.fire('Success', 'Agenda berhasil dihapus', 'success')
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
