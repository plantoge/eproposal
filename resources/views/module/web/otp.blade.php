@extends('layout/website/auth/masterPage')

@section('title')
Verifikasi OTP
@endsection

@section('konten')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">     
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            
            <form class="form w-100" action="{{url('verifikasi-otp')}}" method="post">
                @csrf
                <div class="mb-6 text-left">
                    <h2 class="text-gray-900 mb-5">
                        Google Authenticator    
                    </h2>
                    <span class="fs-5">
                        <b>Masuk ke akun anda</b>
                    </span>
                    <br>
                    <span class="fs-6 text-gray-600">
                        kode 6-digit Diperoleh dari Google Authenticator
                    </span>
                </div>

                <div class="fv-row mb-7">
                    <input class="form-control form-control-lg form-control border-dark text-center mb-3" type="text"  name="otp" value="" autofocus placeholder="x x x x x x" />
                    <div class="d-flex justify-content-center">
                        <small>
                            <b>Gagal OTP?</b>
                            <a href="{{url('/regenerate-qrcode-password')}}">
                                <b>generate ulang</b>
                            </a>
                        </small>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <a href="{{url('/tutup-otp')}}" class="btn btn-lg mb-sm-2 btn-dark w-100">
                            <span class="indicator-label">
                                <b>Tutup</b>
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-9">
                        <button type="submit" class="btn btn-lg btn-success w-100">
                            <span class="indicator-label">
                                <b>Submit</b>
                            </span>
                        </button>
                    </div>
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