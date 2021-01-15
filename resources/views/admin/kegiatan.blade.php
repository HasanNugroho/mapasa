@extends('adminlte::page')

@section('title', 'Kegiatan')

@section('content_header')
<h1 class="m-0 text-dark">Kegiatan</h1>
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
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $key => $k)
                            <tr>
                                <th scope="row">{{$kegiatan->firstItem()+$key}}</th>
                                <td><img src="{{ Storage::url($k->foto_utama)}}" style="width: 100px; height: 100px; margin: 0 .2rem;" alt=""></td>
                                <td>{{$k->kegiatan}}</td>
                                <td>{{$k->jam}}</td>
                                <td>{{$k->tanggal->isoFormat('dddd, Do MMMM YYYY')}}</td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="{{$k->id}}">Edit</a>
                                    <a href="" class="ml-2 btn btn-danger btn-sm btn-hapus" data-id="{{$k->id}}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{$kegiatan->links('vendor.pagination.simple-bootstrap-4')}}
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
                <form action="{{route('add.kegiatan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-mb-12">
                            <label for="kegiatan" class="form-label">Kegiatan</label>
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                        </div>
                        <div class="mb-3 col-mb-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan Kegiatan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3"></textarea>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="jam" class="form-label">Waktu</label>
                            <input type="time" class="form-control" id="jam" name="jam">
                        </div>
                        <div class="mb-3">
                            <label for="foto-utama" class="form-label">Foto utama</label>
                            <input type="file" class="form-control" id="foto-utama" name="foto_utama">
                        </div>
                        <div class="mb-3">
                            <label for="tali" class="form-label">Foto produk</label>
                            <div class="input-group control-group increment">
                                <input type="file" name="foto[]" class="form-control" multiple>
                                <div class="input-group-btn">
                                    <button class="btn btn-success btn-tambah" type="button"><i
                                            class="glyphicon glyphicon-plus"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="clone visually-hidden">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="foto[]" class="form-control" multiple>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger btn-kurang" type="button"><i
                                                class="glyphicon glyphicon-remove"></i>
                                            Hapus</button>
                                    </div>
                                </div>
                            </div>
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
{{-- ajax --}}
<script>
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/kegiatan/' + id + '/edit',
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
    $('.btn-hapus').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/kegiatan/' + id + '/hapus',
            method: "GET",
            success: function (data) {
                // console.log(data)
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
</script>
@stop
