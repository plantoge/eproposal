@extends('layout.panel.masterPanel')

@section('konten')

<div class="card  mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Setelan</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email" class="d-none">
                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                    <div class="fw-semibold text-gray-600">support@keenthemes.com</div>
                </div>
                <!--end::Label-->

                <!--begin::Edit-->
                <div id="kt_signin_email_edit" class="flex-row-fluid">
                    <!--begin::Form-->
                    <form method="POST" action="{{url('update-email')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                        @csrf
                        @method('patch')
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Email Baru</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Support@simrs-rsjsh.com" name="email" value="">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Konfirmasi Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="konfirmasipassword" id="confirmemailpassword" placeholder="********">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button id="kt_signin_submit" type="submit" class="btn btn-primary  me-2 px-6">Update Email</button>
                            {{-- <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button> --}}
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_email_button" class="ms-auto d-none">
                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Email Address-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->

            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password" class="d-none">
                    <div class="fs-6 fw-bold mb-1">Password</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>
                <!--end::Label-->

                <!--begin::Edit-->
                <div id="kt_signin_password_edit" class="flex-row-fluid">
                    <!--begin::Form-->
                    <form method="POST" action="{{url('update-password')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                        @csrf
                        @method('patch')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Password Sekarang</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid " name="passwordsekarang" id="currentpassword" placeholder="********">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Password Baru</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid " name="passwordbaru" id="passwordbaru" placeholder="********">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid " name="passwordbaru_confirmation" id="confirmpassword" placeholder="********">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            </div>
                        </div>
                        
                        <div class="form-text mb-5">Password harus minimal 8 karakter, memuat Huruf Besar kecil dan Simbol</div>

                        <div class="d-flex">
                            <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                            {{-- <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button> --}}
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto d-none">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->

        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>

@endsection

@section('js')
    <script src="{{asset('public/tambahan/js/formatrupiah.js')}}"></script>
    <script>
        
    </script>
@endsection