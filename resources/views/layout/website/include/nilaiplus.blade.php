<div class="mb-18 pt-5">
    <div class="text-center mb-12">
        <h3 class="fs-2hx text-dark mb-5">Akses Dari Manapun</h3>
        <div class="fs-5 text-muted fw-bold">{{$informasi->DESKRIPSI_SINGKAT_POINTPLUS}}</div>
    </div>
    
    <div class="row g-5 g-xl-10">
        @foreach ($pointplus as $data)
            
        <div class="col-sm-6 col-xl-4 mb-xl-10">
            
            <div class="card card-flush border-0 h-lg-100" data-bs-theme="light" style="background-color: #8356e5">
                <div class="card-header pt-2 w-100">
                    <h3 class="card-title">            
                        <span class="text-white fs-3 fw-bold me-2">
                            {{-- <i class="fa-solid fa-star fa-2x text-white"></i> --}}
                            {!!$data->KEUNGGULAN_FONTAWESOME!!}
                            {{$data->KEUNGGULAN_JUDUL}}
                        </span>
                        {{-- <span class="badge badge-success">Active</span> --}}
                    </h3>            
                </div>
                <div class="card-body d-flex justify-content-between flex-column pt-0 px-0 pb-0">  
                    <div class="d-flex flex-wrap px-9 mb-5">
                        <div class="rounde min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2)">
                            {{-- <div class="d-flex align-items-center">                    
                                <div class="text-white fs-3 fw-bold counted" >Deskripsi Keunggulan</div>
                            </div> --}}
                            <div class="fw-semibold fs-6 text-white opacity-50">
                                {!!$data->KEUNGGULAN_DESKRIPSI!!}    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @endforeach
    </div>
</div>