<div class="card">
    <div class="card-header text-center">
        <div class="card-title">{{$data->kegiatan}}</div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach (json_decode($data->gambar) as $g) {  ?>
            <div class="col-md-4 col-6 mt-2 mb-2">
                <img src="{{asset('images/galeri')}}/{{$g}}" class="img-fluid" alt="">
            </div>
            <?php } ?>
        </div>
    </div>
</div>