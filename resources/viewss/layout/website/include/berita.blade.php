<div class="mb-16">
    <div class="text-center mb-12">
        <h3 class="fs-2hx text-dark mb-5">Blog</h3>
        <div class="fs-5 text-muted fw-bold">
            {{$informasi->DESKRIPSI_SINGKAT_BERITA}}
        </div>
    </div>
    <div class="row g-10">
        @foreach ($blog as $blogg)
            
        
        <div class="col-md-4">
            <div class="card-xl-stretch me-md-6">
                <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" href="{{asset('storage/app/gambar_berita/'.$blogg->BERITA_GAMBAR)}}">
                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{asset('storage/app/gambar_berita/'.$blogg->BERITA_GAMBAR)}}')"></div>
                    <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                    </div>
                </a>
                <div class="m-0">
                    <a href="{{url('/blog/'.$blogg->BERITA_SLUG)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base duabaris">{{$blogg->BERITA_TITLE}}</a>
                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 mb-5 empatbaris">
                        {!! $blogg->BERITA_KONTEN !!}
                    </div>
                    <div class="fs-6 fw-bolder">
                        <span class="text-gray-700 text-hover-primary">{{$blogg->name}}</span>
                        <span class="text-muted">on {{\Carbon\Carbon::parse($blogg->BERITA_CREATED_AT)->format('d F Y')}}</span>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>