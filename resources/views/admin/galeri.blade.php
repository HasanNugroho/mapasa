@extends('adminlte::page')

@section('title', 'Galeri')

@section('content_header')
<h1 class="m-0 text-dark">Galeri</h1>
@stop

@section('content')
<style>
    .images-preview-div img {
        padding: 10px;
        max-width: 100px;
    }
</style>
<?php
use Illuminate\Support\Arr;
?>
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
                <div class="row">
                    @foreach ($galeri as $g)
                    <?php $gambar = Arr::first(json_decode($g->gambar))?>
                    <div class="col-md-3 col-6">
                        <div class="card">
                            <img src="{{asset('images/galeri')}}/{{$gambar}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-text">{{$g->kegiatan}}</h5>
                                @if (Auth::user()->role == "superadmin")
                                <td>author : {{$g->author}}</td>
                                @endif
                                <div class="row mr-1 ml-1 mt-2 mb-2">
                                    <a href="#" class="col btn btn-dark btn-sm btn-see" data-id="{{$g->id}}"><span class="iconify" data-icon="ant-design:eye-filled" data-inline="true"></span></a>
                                    <a href="#" class="col ml-2 mr-2 btn btn-warning btn-edit btn-sm" data-id="{{$g->id}}"><span class="iconify" data-icon="bx:bx-edit" data-inline="true"></span></a>
                                    <a href="#" class="col btn btn-danger btn-sm btn-hapus delete-confirm" data-id="{{$g->id}}"><span class="iconify" data-icon="ant-design:delete-filled" data-inline="true"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.galeri')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tali" class="form-label">Foto Kegiatan</label>{{-- <small class="text-right">(Usahakan compress foto terlebih dahulu!)</small> --}}
                                <input type="file" name="gambar[]" id="images" class="form-control" multiple>
                                <div class="form-text">Bisa menginput banyak foto (Memasukan foto dengan memblok foto yang akan di upload) <small class="text-danger">(max: 5)</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-1 text-center">
                                <div class="images-preview-div">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-mb-12">
                            <label for="kegiatan" class="form-label">Kegiatan</label>
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Rapat rutin">
                        </div>
                        <div class="mb-3 col-mb-12">
                            <label for="link" class="form-label">Link Foto <small>(optional)</small></label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="https://youtube.com">
                            <div id="emailHelp" class="form-text">Link foto (Google Drive atau could storage lainnya)</div>
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
{{-- modal see --}}
<div class="modal fade" id="modal-see" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="">
                @csrf
                <div class="modal-body">

                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal see end --}}
{{-- modal edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update.galeri')}}" method="post" enctype="multipart/form-data">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">{{-- preview img --}}
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

<script>
    $(function () {
        // Multiple images preview with JavaScript
        var previewImages = function (input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                            imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function () {
            previewImages(this, 'div.images-preview-div');
        });
    });
</script>
{{-- ajax --}}
<script>
    $('.btn-see').on('click', function () {
        let id = $(this).data('id')
        // console.log(id)
        $.ajax({
            url: '/dashboard/galeri/see/' + id,
            method: "GET",
            success: function (data) {
                $('#modal-see').find('.modal-body').html(data)
                $('#modal-see').modal('show')
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/galeri/' + id + '/edit',
            method: "GET",
            success: function (data) {
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('show')
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
    // $('.btn-update').on('click', function (e) {
    //     e.preventDefault();
    //     let id = $('#form-edit').find('#data_id').val()
    //     let formData = $('#form-edit').serialize()
    //     // console.log(id)
    //     console.log(formData)
    //     $.ajax({
    //         url: '/dashboard/galeri/' + id + '/update',
    //         method: "POST",
    //         data: formData,
    //         success: function (data) {
    //             // console.log(success)
    //             $('#modal-edit').find('.modal-body').html(data)
    //             $('#modal-edit').modal('hide')
    //             window.location.assign('/dashboard/galeri')
    //             Swal.fire('Success','Agenda berhasil ditambahkan','success')
    //         },
    //         error: function (err) {
    //             console.log(err.responseJSON)
    //             let err_log = err.responseJSON.errors;
    //             if(err.status == 422){
    //                 $('#modal-edit').find('[name="kontak"]').prev().html('<span style="color: red;">Kontak | '+err_log.kontak[0]+'</span>')
    //             }
    //         }

    //     })
    // })
    $('.btn-hapus').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/galeri/' + id + '/hapus',
            method: "GET",
            success: function (data) {
                window.location.assign('/dashboard/galeri')
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
</script>
@stop
