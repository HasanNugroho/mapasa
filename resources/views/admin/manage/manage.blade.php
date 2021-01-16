@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<div class="d-flex justify-content-between">
    <div class="text2">Admin Manager</div>
    <button type="button" class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#modal-add">
        Tambah Admin
    </button>
</div>
@stop

@section('content')
@if (Auth::user()->role == 'superadmin')
<div class="container">
    <div class="table-responsive">
        <table class="table" id="tableKategori">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $no => $u)
                <tr>
                    <td>{{$user->firstItem()+$no}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->role}}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning btn-sm btn-edit" data-id="{{$u->id}}" href="#">Edit</a>
                        <a class="btn btn-danger btn-sm btn-delete delete-confirm ml-2" data-id="{{$u->id}}" href="#">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="container text-center">
    <div class="text1">
        KAMU BUKAN SUPERADMIN
    </div>
</div>
@endif
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add.admin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nama" placeholder="Ahmad">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-select" aria-label="Pilih role" name="role">
                            <option selected>Open this select menu</option>
                            <option value="superadmin">Superadmin</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" aria-describedby="password">
                        <div class="form-text">Password minimal 8 karakter</div>
                    </div>
                    <div class="form-group">
                        <label for="password" id="message">Konfirmasi password</label>
                        <input type="password" id="confirm_password" class="form-control" aria-describedby="password"
                            name="password">
                        <div class="form-text">Password minimal 8 karakter</div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit-manage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="" id="form-edit">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-update">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    console.log('Hi!');

</script>
<script>
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Password (sama)').css('color', 'green');
        } else
            $('#message').html('Password (beda)').css('color', 'red');

        if ($('#password').val() == $('#confirm_password').val()) {
            $('#password, #confirm_password').css('border', '1px solid green');
        } else
            $('#password, #confirm_password').css('border', '1px solid red');

    });

</script>
<script>
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        // console.log(id)
        $.ajax({
            url: '/dashboard/admin/manage/' + id + '/edit',
            method: "GET",
            success: function (data) {
                // console.log(data)
                $('#modal-edit-manage').modal('show')
                $('#modal-edit-manage').find('.modal-body').html(data)
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
    $('.btn-update').on('click', function (e) {
        e.preventDefault();
        // let id = $('#form-edit').find('#id_data').val()
        let formData = $('#form-edit').serialize()
        // console.log(id)
        console.log(formData)
        $.ajax({
            url: '/dashboard/admin/manage/update',
            method: "POST",
            data: formData,
            success: function (data) {
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/dashboard/admin/manage')
                {!!session()->get('message')!!}
                // Swal.fire('Success','User berhasil diupdate','success')
            },
            error: function (err) {
                console.log(err.responseJSON)
                let err_log = err.responseJSON.errors;
                if (err.status == 422) {
                    // $('#modal-edit').find('[name="foto"]').prev().html('<span style="color: red;">Foto | '+err_log.kontak[0]+'</span>')
                }
            }

        })
    })
    $('.btn-delete').on('click', function () {
        let id = $(this).data('id')
        console.log(id)
        $.ajax({
            url: '/dashboard/admin/manage/' + id + '/delete',
            method: 'GET',
            type: 'DELETE',
            cache: false,
            success: function (data) {
                console.log(data)
                window.location.assign('/dashboard/admin/manage')
                Swal.fire('Success','User berhasil dihapus','success')
            },
            error: function (err) {
                console.log(err.responseJSON)
            }

        })
    })
</script>
@stop
