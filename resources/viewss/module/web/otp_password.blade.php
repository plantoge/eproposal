@extends('layout/website/auth/masterPage')

@section('title')
Verifikasi OTP
@endsection

@section('konten')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">     
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            
            <form class="form w-100" action="{{url('verifikasi-regenerate-password')}}" method="post">
                @csrf
                <div class="mb-6 text-left">
                    <h2 class="text-gray-900 mb-5">
                        Google Authenticator    
                    </h2>
                    <span class="fs-5">
                        <b>Generate ulang QR Code</b>
                    </span>
                    <br>
                    <span class="fs-6 text-gray-500">
                        Silahkan ikuti langkah dibawah
                    </span>
                </div>

                <div class="fv-row mb-7">
                    <label for=""><b>Password</b></label>
                    <input class="form-control form-control-lg form-control text-center" type="password"  name="password" value="" autofocus />
                    @error('password')
                        <small class="text-danger"><b>{{$message}}</b></small>
                    @enderror
                    <div class="d-flex justify-content-between">
                    {{-- <small><b class="text-gray-600">kode 6-digit Diperoleh dari Google Authenticator</b></small> --}}
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-success w-100">
                        <span class="indicator-label">
                            <b class="fs-3">Selanjutnya</b>
                        </span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- <p>
    Unduh Aplikasi otentikator (Authy atau sejenisnya) melalui Android Play Store atau iOS App Store, lalu scan QR Code dibawah ini:
    Aplikasi Otentikator (Authy atau sejenisnya) akan selalu diperlukan ketika login ke portal pegawai, pastikan anda tidak menghapus aplikasi otentikator dari perangkat anda.
</p> --}}

@endsection

@section('js')
<script>
    
</script>
@endsection