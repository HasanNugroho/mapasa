@extends('adminlte::page')

@section('title', 'Pengumuman')

@section('content_header')
<h1 class="m-0 text-dark">Pengumuman</h1>
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
                        <th scope="col">Pengumuman</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumuman as $key => $p)
                            <tr>
                                <th scope="row">{{$pengumuman->firstItem()+$key}}</th>
                                <td>{{$p->pengumuman}}</td>
                                <td>{{$p->author}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="{{$p->id}}">Edit</a>
                                        <a href="" class="ml-2 btn btn-danger btn-sm btn-hapus delete-confirm" data-id="{{$p->id}}">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{$pengumuman->links('vendor.pagination.simple-bootstrap-4')}}
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah pengumuman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('pengumuman.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <div class="form-group">
                        <label for="pengumuman">Pengumuman</label>
                        <textarea class="form-control" name="pengumuman" id="pengumuman" rows="5"></textarea>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pengumuman</h5>
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

{{-- ajax --}}
<script>
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/pengumuman/' + id + '/edit',
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
            url: '/dashboard/pengumuman/' + id + '/update',
            method: "POST",
            data: formData,
            success: function (data) {
                // console.log(success)
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/dashboard/pengumuman')
                Swal.fire('Success','Blog berhasil diupdate','success')
            },
            error: function (err) {
                console.log(err.responseJSON)
            }

        })
    })
    $('.btn-hapus').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/pengumuman/' + id + '/hapus',
            method: "GET",
            success: function (data) {
                Swal.fire('Success','Blog berhasil dihapus','success')
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
</script>
@stop
