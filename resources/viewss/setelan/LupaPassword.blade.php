@extends('layout/website/masterWebsite')

@section('konten')
    <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto pb-5">

        <form method="post" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="formreset">
            @csrf
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">
                    Siapkan Password baru
                </h1>
                {{-- <div class="text-gray-400 fw-semibold fs-4">
                    Already have reset your password ?

                    <a href="#" class="link-primary fw-bold">
                        Sign in here
                    </a>
                </div> --}}
            </div>

            <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                <div class="mb-1">
                    <label class="form-label fw-bold text-dark fs-6">
                        Password
                    </label>

                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                            name="password" autocomplete="off">
                        <input type="text" name="token" value="{{$token}}" hidden>
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                            data-kt-password-meter-control="visibility">
                            <i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <small id="passwordError" class="text-danger"></small>
                    {{-- <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div> --}}
                </div>

                <div class="text-muted">
                    Gunakan minimal 8 karakter, memuat Huruf Besar kecil dan Simbol.
                </div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>

            <div class="fv-row mb-10 fv-plugins-icon-container">
                <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>

                <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                    name="confirmpassword" autocomplete="off">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                <small id="confirmPasswordError" class="text-danger"></small>
            </div>

            {{-- <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="form-check form-check-custom form-check-solid form-check-inline">
                    <input class="form-check-input" type="checkbox" name="toc" value="1">

                    <label class="form-check-label fw-semibold text-gray-700 fs-6">
                        I Agree &amp;

                        <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                    </label>
                </div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div> --}}

            <div class="text-center">
                <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bold">
                    <span class="indicator-label">
                        Submit
                    </span>

                </button>
            </div>
        </form>
    </div>
@endsection

@section('js')
<script>
    $('#formreset').submit(function(e) {
        e.preventDefault();
        let csrfToken = $('input[name="_token"]').val();
        let file      = new FormData($('#formreset')[0]);
        // let deskripsi = tinymce.get('deskripsi').getContent()
        // file.append('deskripsi', deskripsi)

        $.ajax({
            type: 'POST',
            url: `{{url('/reset-password/store')}}`,
            data: file,

            dataType: 'json',
            contentType: false,
            processData: false,
            headers: {
                // 'X-HTTP-Method-Override': 'PATCH|DELETE', //only route patch and delete
                'X-CSRF-TOKEN': csrfToken
            },
            beforeSend: function() {
                swal.fire({
                    title: 'Mohon Tunggu!',
                    html: 'Sedang proses data ke server',
                    didOpen: () => {
                        swal.showLoading()
                    }
                })
            },
            success:function(res){
                swal.close();
                console.log(res);
                
                Swal.fire({
                        text: res.meta.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-success"
                        }
                }).then((result) => {
                    window.location.href = `{{url('/')}}`
                })
            },
            error: function(error) {
                swal.close()                
                let res = error.responseJSON

                if(res.meta.code == 422){
                    let password = res.data.error.password
                    let confirmpassword = res.data.error.confirmpassword
                                            
                    password        ? $('#passwordError').html('<b>'+password+'</b>') : $('#passwordError').html('<b></b>') 
                    confirmpassword ? $('#confirmPasswordError').html('<b>'+confirmpassword+'</b>') : $('#confirmPasswordError').html('<b></b>') 
                }else if(res.meta.code == 404){
                    Swal.fire({
                        text: res.meta.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-info"
                        }
                    });
                }else if(res.meta.code == 400){
                    Swal.fire({
                        text: res.meta.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-info"
                        }
                    });

                }

                
            },
        });

    });
</script>
@endsection
