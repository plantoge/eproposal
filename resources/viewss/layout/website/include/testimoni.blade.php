<div class="mb-10 pt-5">
    <div class="text-center mb-12">
        <h3 class="fs-2hx text-dark mb-5">Testimoni</h3>
        <div class="fs-5 text-muted fw-bold">{{$informasi->DESKRIPSI_SINGKAT_TESTIMONY}}</div>
    </div>
    <div class="tns tns-default mb-10">
        <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
            @foreach ($testimony as $testimony)
                
            
            <div class="text-center p-10">
                <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('storage/app/gambar_testimony/'.$testimony->TESTIMONY_GAMBAR)}}')"></div>
                <div class="mb-0">
                    <a class="text-dark fw-bolder text-hover-primary fs-3">{{$testimony->TESTIMONY_NAMA}}</a>
                    <div class="text-muted fs-6 fw-bold mt-1" style="text-align: justify !important;">
                        {!! $testimony->TESTIMONY_DESKRIPSI !!}
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
            <span class="svg-icon svg-icon-3x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
                </svg>
            </span>
        </button>
        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
            <span class="svg-icon svg-icon-3x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                </svg>
            </span>
        </button>
    </div>
</div>