@php
    $informasi = DB::table('informasi_kontak')->where('INFO_ID', '001')->first();
@endphp

<div class="bg-grey-100 bg-dark pt-10 pb-13 pt-lg-6 pb-lg-15">
    <div class="app-container container-xxl pt-6">
        <div class="row">
            <div class="col-lg-5 mb-10 mb-lg-0">
                <div class="rounded border border-gray-300 border-dashed p-7 me-lg-15">
                    <div class="mb-5 text-start">
                        <img src="{{ url('/Twebsite/v1/media/logos/logo-desc.png') }}"
                                class="h-40px h-lg-70px logo-sticky">

                        {{-- <div class="fs-5 fw-semibold text-gray-800 mb-0">How about</div>
                        <div class="fs-2 fw-bold text-gray-800">a Custom Project ?</div> --}}
                    </div>

                    <div class="fs-6 fw-semibold text-gray-700 lh-lg mb-6">
                        Jl. Sunter Permai Raya No.2, Papanggo, Kec. Tj. Priok, Jkt Utara, Daerah Khusus Ibukota Jakarta 14340
                    </div>

                    {{-- <div class="text-start">
                        <a href="{{url('/')}}" target="_blank"
                            class="btn btn-primary fw-bold py-3 fs-6">Hire Experts</a>
                    </div> --}}
                </div>
            </div>

            <div class="col-lg-7 ps-lg-10 fs-5 fw-semibold">
                <div class="row">

                    <div class="colsm-12 col-lg-6 offset-lg-6">
                        <div class="ms-lg-15">
                            <h3 class="mb-3 fs-4 fw-bold text-gray-800 ls-sm">Kontak</h3>

                            <div class="d-flex flex-column">
                                <a href="{{url('/')}}"
                                    class="d-flex align-items-center text-center text-gray-700 text-hover-primary py-2 py-lg-3">
                                    <i class="fa-solid fa-phone fa-fw fa-lg lozad w-20px me-3"></i>
                                    {{ $informasi->TELEPON }}
                                </a>
                                <a href="{{url('/')}}"
                                    class="d-flex align-items-center text-center text-gray-700 text-hover-primary py-2 py-lg-3">
                                    <i class="fa-solid fa-envelope fa-fw fa-lg lozad w-20x me-3"></i>
                                    {{ $informasi->EMAIL }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
