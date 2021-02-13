    <img src="{{asset('images/kegiatan')}}/{{$data->foto_utama}}" class="img-fluid" alt="">

    <div class="bagian-blog">
        <div class="row">
            <div class="col-md-4 col-6">
                <div style="margin: 5px 0">
                    <div class="text-4">Kegiatan:</div>
                    <div class="text-5">{{$data->kegiatan}}</div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div style="margin: 5px 0">
                    <div class="text-4">Jam:</div>
                    <div class="text-5">{{$data->jam->isoformat('HH:mm')}}</div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div style="margin: 5px 0">
                    <div class="text-4">Tanggal:</div>
                    <div class="text-5">{{$data->tanggal->isoformat('dddd, DD MMMM YYYY')}}</div>
                </div>
            </div>
            <div class="col-12 ">
                <div style="margin: 5px 0">
                    <div class="text-4">Tentang kegiatan:</div>
                    <div class="text-5">{{$data->keterangan}}</div>
                </div>
            </div>
        </div>
    </div>
