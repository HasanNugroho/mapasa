<input type="hidden" value="{{$data->id}}" id="data_id" name="id">
<div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control" id="author" value="{{$data->author}}" name="author">
</div>
<div class="form-group">
    <label for="pengumuman">Pengumuman</label>
    <textarea class="form-control" name="pengumuman" id="pengumuman" rows="5">{{$data->pengumuman}}</textarea>
</div>