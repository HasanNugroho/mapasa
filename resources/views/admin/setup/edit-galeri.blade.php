<style>
    .images-preview img {
        padding: 10px;
        max-width: 100px;
    }
</style>
<input type="hidden" name="id" value="{{$data->id}}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="tali" class="form-label">Foto Kegiatan</label>
            <div class="form-text">Ulangi input</div>
            <input type="file" name="gambar[]" id="foto" class="form-control" multiple>
            <div class="form-text">Bisa menginput banyak foto (Memasukan foto dengan cara berulang)
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mt-1 text-center">
            <div class="images-preview">
            </div>
        </div>
    </div>
    <div class="mb-3 col-mb-12">
        <label for="role">Kegiatan</label>
        <select class="form-select" aria-label="Pilih kegiatan" value="{{$data->kegiatan}}" name="kegiatan">
            {{-- <option selected>Open this select menu</option> --}}
            @foreach ($kegiatan as $kegiatan)
            <option @if ($kegiatan->kegiatan == $data->kegiatan) selected @endif value="{{$kegiatan->kegiatan}}">{{$kegiatan->kegiatan}}</option>
            @endforeach
        </select>
    </div>
</div>
{{-- preview img --}}
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
        $('#foto').on('change', function () {
            previewImages(this, 'div.images-preview');
        });
    });
</script>
