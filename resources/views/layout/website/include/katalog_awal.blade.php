<div class="mb-18 pt-10">
    <div class="text-center mb-12">
        <h3 class="fs-2hx text-dark mb-5">Kelas</h3>
        <div class="fs-5 text-muted fw-bold">{{$informasi->DESKRIPSI_SINGKAT_EVENT_BERANDA}}</div>
    </div>
    <div class="row g-10">
        @foreach ($event as $kelas)
            <div class="col-md-4">
                <div class="card-xl-stretch me-md-6 p-5 shadow-sm border border-transparent rounded">
                    <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{asset('storage/app/gambar_event/'.$kelas->EVENT_GAMBAR)}}">
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px" style="background-image:url('{{asset('storage/app/gambar_event/'.$kelas->EVENT_GAMBAR)}}')"></div>
                        <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
                    </a>
                    <div class="m-0">
                        <a href="{{url('info-kelas/'.$kelas->EVENT_SLUG.'/'.$kelas->EVENT_ID)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base duabaris">{{$kelas->EVENT_JUDUL}}</a>
                        {{-- <div class="fs-6 text-gray-600 text-dark mt-0 mb-5 duabaris">{{$kelas->EVENT_DESKRIPSI_SINGKAT}}</div> --}}

                        <div class="fw-bold w-100 fs-3 text-gray-600 text-dark mt-3 mb-5">
                            @if($kelas->EVENT_DISKON == 0)
                                <span class="dw-bold"> Rp. @matauang($kelas->EVENT_HARGA)</span>
                            @else
                                @php 
                                    $harga_diskon = $kelas->EVENT_HARGA - $kelas->EVENT_DISKON;
                                @endphp
                                <span class="fw-bold blinking-text text-danger"> Rp. @matauang($kelas->EVENT_HARGA)</span>
                                <span class="dw-bold"> Rp. @matauang($harga_diskon)</span>
                            @endif
                        </div>
                        <div class="fs-6 fw-bolder w-100">
                            {{-- <a href="../dist/account/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a> --}}
                            <span class="text-muted">
                                {{\Carbon\Carbon::parse($kelas->EVENT_JADWAL_AWAL)->format('d-M-Y')}} 
                                s/d
                                {{\Carbon\Carbon::parse($kelas->EVENT_JADWAL_AKHIR)->format('d-M-Y')}} 

                            </span>
                        </div>
                        <div class="fs-6 fw-bolder mt-3">
                            <a href="{{url('info-kelas/'.$kelas->EVENT_SLUG.'/'.$kelas->EVENT_ID)}}" class="btn btn-light-primary w-100">Gabung Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        
        @endforeach
        
    </div>

    <div class="row mt-10">
        <div class="col offset-lg-5">
            <a href="{{url('/kelas')}}" class="btn btn-light-primary">Lebih banyak</a>
        </div>
    </div>
</div>