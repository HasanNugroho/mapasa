@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h5>Pengunjung</h5>
                                <h3>{{$visitor}}</h3>
                            </div>
                            <div class="col-3 text-right align-items-center">
                                <span class="iconify " data-icon="heroicons-solid:presentation-chart-bar"
                                    data-inline="false" data-width="70" data-height="70"></span> </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h5>Kritik & Saran</h5>
                                <h3>{{$feedback}}</h3>
                            </div>
                            <div class="col-3 text-right">
                                <span class="iconify" data-icon="bx:bx-message-square-dots" data-inline="false"
                                    data-width="70" data-height="70"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="card border-primary">
                    <div class="card-body">
                        <h6>Jumlah Agenda</h6>
                        <h4>{{$agenda}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-secondary">
                    <div class="card-body">
                        <h6>Jumlah Kegiatan</h6>
                        <h4>{{$kegiatan}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-success">
                    <div class="card-body">
                        <h6>Jumlah Galeri</h6>
                        <h4>{{$galeri}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-warning">
                    <div class="card-body">
                        <h6>Jumlah Event</h6>
                        <h4>{{$event}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6>Jumlah Blog</h6>
                        <h4>{{$blog}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Jumlah Pengumuman</h6>
                        <h4>{{$pengumuman}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kritik & Saran</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($pesan as $ky => $fb)
                            <tr>
                                <td>1</td>
                                <td>{{$fb->nama}}</td>
                                <td>{{Str::limit($fb->pesan,50,'...')}}</td>
                                <td>
                                    <a href="#" class="btn btn-dark btn-sm btn-see" data-id="{{$fb->id}}"><span
                                            class="iconify" data-icon="ant-design:eye-filled"
                                            data-inline="true"></span></a>
                                    <a href="#" class="btn btn-danger btn-sm btn-hapus delete-confirm"
                                        data-id="{{$fb->id}}"><span class="iconify" data-icon="ant-design:delete-filled"
                                            data-inline="true"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<script>
    $('.btn-see').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/feedback/see/' + id,
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
    $('.btn-hapus').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/feedback/' + id + '/hapus',
            method: "GET",
            success: function (data) {
                location.reload()
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
</script>
@stop
