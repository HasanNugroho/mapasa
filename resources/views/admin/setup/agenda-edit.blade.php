<input type="hidden" value="{{$data->id}}" id="data_id" name="id">
<div class="form-group">
    <label for="kegiatan">Kegiatan</label>
    <input type="text" class="form-control" id="kegiatan" value="{{$data->kegiatan}}" name="kegiatan"
        aria-describedby="con">
</div>
<div class="form-group">
    <div class="mb-3">
        <label for="jam" class="form-label">Jam</label>
        <input type="time" class="form-control" value="{{$data->jam}}" name="jam" id="jam">
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" value="{{$data->tanggal->isoFormat('yyyy-MM-dd')}}" name="tanggal" id="tanggal">
    </div>
</div>
<div class="form-group">
    <label for="tempat">Tempat</label>
    <input type="text" class="form-control" id="tempat" value="{{$data->tempat}}" name="tempat"
        aria-describedby="con">
</div>
