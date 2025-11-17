@extends('layout/website/auth/masterPage')

@section('title')
Set Authenticator
@endsection

@section('konten')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">     
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            
            <form class="form w-100" action="{{url('selesaikan-pendaftaran')}}" method="post">
                @csrf
                <div class="mb-10 text-center">
                    <h2 class="text-gray-900 mb-3">
                        Google Authenticator    
                    </h2>

                    <div class="text-gray-600 fw-semibold fs-5">
                        Untuk masalah keamanan, kamu di haruskan install aplikasi "Google Authenticator" di Play store (Android) atau Apps Store (IOS). <br> lakukan "Scan a QR code" di aplikasi tersebut
                    </div>
                </div>

                <div class="w-100 text-center">
                    {!! $QR_Image !!}
                </div>
                <div class="w-100 fs-7 text-center">
                    <b>Alternatif lain : {{$secret}}</b>
                </div>
                
                <div class="mb-10 text-center">
                    <div class="text-gray-600 fw-bold fs-5 mt-6">
                        Ketika login, akan di minta kode 6-digit di Google Authenticator
                        <br>
                        <b>Pastikan hanya kamu yang scan QR Code di atas</b>
                    </div>
                </div>
                
                {{-- <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control-solid" type="text"  name="name" value="" hidden />
                </div>
                <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control-solid" type="email"  name="email" value="" hidden />
                </div>
                <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control-solid" type="password"  name="password" value="" hidden />
                </div>
                <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="phone" value="" hidden />
                </div>
                <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="jk" value="" hidden />
                </div>
                <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="institusi_asal" value="" hidden />
                </div> --}}

                <div class="text-center">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-success w-100" onclick="return confirm('Yakin sudah di scan QR code ?')">
                        <span class="indicator-label">
                            Selesaikan Pendaftaran
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="d-flex flex-center flex-column-auto p-10">
        <div class="d-flex align-items-center fw-semibold fs-6">
            <a href="#" class="text-muted text-hover-primary px-2">About</a>

            <a href="#" class="text-muted text-hover-primary px-2">Contact</a>
            
            <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
        </div>
    </div> --}}
</div>
@endsection