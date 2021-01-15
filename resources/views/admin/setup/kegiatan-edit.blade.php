<input type="hidden" value="{{$data->id}}" id="data_id" name="id">
<div class="form-group">
    <div class="row">
        <div class="mb-3 col-mb-12">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <input type="text" class="form-control" id="kegiatan" value="{{$data->kegiatan}}" name="kegiatan">
        </div>
        <div class="mb-3 col-mb-12">
            <label for="exampleFormControlTextarea1" class="form-label">Keterangan Kegiatan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" value="{{$data->keterangan}}" name="keterangan"
                rows="3">{{$data->keterangan}}</textarea>
        </div>
        <div class="mb-3 col-6">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" value="{{$data->tanggal}}" id="tanggal" name="tanggal">
        </div>
        <div class="mb-3 col-6">
            <label for="jam" class="form-label">Waktu</label>
            <input type="time" class="form-control" id="jam" value="{{$data->jam}}" name="jam">
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
