{{-- @extends('layout.dashboard.v2.masterv2Dashboard') --}}
@extends('layout.panel.masterPanel')
@section('konten')

<div class="row">
    <div class="col-sm-12 col-lg-12">
        
        <div class="card  mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Biodata</h3>
                </div>
            </div>
        
            <div id="kt_account_settings_signin_methodd" class="collapse show">
                <div class="card-body border-top p-9">
                    <form action="{{url('update-biodata')}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-10">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama"  name="nama" value="{{auth()->user()->name}}">
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"  name="email" value="{{auth()->user()->email}}" disabled>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">No. telp / WhatsApp</label>
                                    <input type="text" class="form-control" id="phone"  name="phone" value="{{auth()->user()->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-10">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jk" name="jk">
                                        <option value="Pria" @if(auth()->user()->jk == 'Pria') selected @endif>Pria</option>
                                        <option value="Wanita" @if(auth()->user()->jk == 'Wanita') selected @endif>Wanita</option>
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">Asal Institusi</label>
                                    <input type="text" class="form-control" id="institusi_asal"  name="institusi_asal" value="{{auth()->user()->institusi_asal}}">
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">Kategori Pendidikan</label>
                                    <select class="form-select" id="kategori_pendidikan" name="kategori_pendidikan">
                                        <option value="Mahasiswa" @if(auth()->user()->kategori_pendidikan == 'Mahasiswa') selected @endif>Mahasiswa</option>
                                        <option value="Institusi Dalam Negeri" @if(auth()->user()->kategori_pendidikan == 'Institusi Dalam Negeri') selected @endif>Institusi Dalam Negeri</option>
                                        <option value="Institusi Luar Negeri" @if(auth()->user()->kategori_pendidikan == 'Institusi Luar Negeri') selected @endif>Institusi Luar Negeri</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-10">
                                    <input type="password" class="form-control" placeholder="Konfirmasi Password" id="konfirmasipassword" name="konfirmasipassword" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-10">
                                    <button type="submit" class="btn btn-primary">Perbarui Biodata</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">   

    <div class="col-sm-12 col-lg-6">

        <div class="card  mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Ganti Email</h3>
                </div>
            </div>
        
            <div id="kt_account_settings_signin_method" class="collapse show">
                <div class="card-body border-top p-9">
                    <div class="d-flex flex-wrap align-items-center">
                        <div id="kt_signin_email_edit" class="flex-row-fluid">
                            <form method="POST" action="{{url('update-email')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                @csrf
                                @method('patch')
                                <div class="row mb-6">
                                    <div class="col-lg-12">
                                        <div class="fv-row mb-5 fv-plugins-icon-container">
                                            <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Email Baru</label>
                                            <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Support@simrs.com" name="email" value="">
                                        </div>
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Konfirmasi Password</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid" name="konfirmasipassword" id="confirmemailpassword" placeholder="********">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button id="kt_signin_submit" type="submit" class="btn btn-primary  me-2 px-6">Update Email</button>
                                </div>
                            </form>
                        </div>
        
                        <div id="kt_signin_email_button" class="ms-auto d-none">
                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-lg-6">

        <div class="card  mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Keamanan</h3>
                </div>
            </div>
        
            <div id="kt_account_settings_signin_method" class="collapse show">
                <div class="card-body border-top p-9">
                    <div class="d-flex flex-wrap align-items-center">
                        <div id="kt_signin_email_edit" class="flex-row-fluid">
                            <form method="POST" action="{{url('update-security')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                @csrf
                                @method('patch')
                                <div class="row mb-6">
                                    <div class="col-lg-12">
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Aktifkan Authenticator</label>
                                                <div class="rounded border p-10">
                                                    <div class="mb-10">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="1" id="aktifkan" name="g2fa_active" @if(auth()->user()->g2fa_active == 1) checked @endif>
                                                            <label class="form-check-label" for="aktifkan">
                                                                Aktifkan
                                                            </label>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="mb-0">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="0" id="matikan" name="g2fa_active" @if(auth()->user()->g2fa_active == 0) checked @endif>
                                                            <label class="form-check-label" for="matikan">
                                                                Matikan
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button id="kt_signin_submit" type="submit" class="btn btn-primary  me-2 px-6">Submit</button>
                                </div>
                            </form>
                        </div>
        
                        <div id="kt_signin_email_button" class="ms-auto d-none">
                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-lg-6">

        <div class="card  mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Ganti Password</h3>
                </div>
            </div>
        
            <div id="kt_account_settings_signin_method" class="collapse show">
                <div class="card-body border-top p-9">
        
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div id="kt_signin_password" class="d-none">
                            <div class="fs-6 fw-bold mb-1">Password</div>
                            <div class="fw-semibold text-gray-600">************</div>
                        </div>
        
                        <div id="kt_signin_password_edit" class="flex-row-fluid">
                            <form method="POST" action="{{url('update-password')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                @csrf
                                @method('patch')
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <div class="fv-row mb-5 fv-plugins-icon-container">
                                            <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Password Sekarang</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid " name="passwordsekarang" id="currentpassword" placeholder="********">
                                        </div>
        
                                        <div class="fv-row mb-5 fv-plugins-icon-container">
                                            <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Password Baru</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid " name="passwordbaru" id="passwordbaru" placeholder="********">
                                        </div>
                                    
                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                            <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control form-control-lg form-control-solid " name="passwordbaru_confirmation" id="confirmpassword" placeholder="********">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-text mb-5">Password harus minimal 8 karakter, memuat Huruf Besar kecil dan Simbol</div>
        
                                <div class="d-flex">
                                    <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                    {{-- <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
        
                        <div id="kt_signin_password_button" class="ms-auto d-none">
                            <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>

    </div>
</div>




@endsection

@section('js')
    <script src="{{asset('public/tambahan/js/formatrupiah.js')}}"></script>
    <script>
        
    </script>
@endsection