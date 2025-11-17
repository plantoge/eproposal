<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>App</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        {{-- <meta name="description" content="Seven admin dashboard live demo. Check out all the features of the admin panel. Light & dark skins. A large number of settings, additional services and widgets."/>
        <meta name="keywords" content="Seven, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard"/>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Seven HTML Pro - Bootstrap 5 HTML Multipurpose Light/Dark Admin Dashboard Theme" />
        <meta property="og:url" content="https://keenthemes.com/products/seven-html-pro"/>
        <meta property="og:site_name" content="Keenthemes | Seven HTML Pro" />
        <link rel="canonical" href="https://preview.keenthemes.com/seven-html-pro"/>
        <link rel="shortcut icon" href="/seven-html-pro/assets/media/logos/favicon.ico"/> --}}

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <link href="{{url('public/Tdashboard/v2/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('public/Tdashboard/v2/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/Tdashboard/v2/plugins/custom/toastr/toastr.min.css')}}" rel="stylesheet">
        
    </head>

    <body  id="kt_body"  class="auth-bg" >
	<div class="d-flex flex-column flex-root">
        <style>
            .auth-page-bg {
                background-image: url({{url('/Tdashboard/v2/media/illustrations/sigma-1/14.png')}});
            }

            [data-bs-theme="dark"] .auth-page-bg {
                background-image: url({{url('/Tdashboard/v2/media/illustrations/sigma-1/14-dark.png')}});
            }
        </style>

        <div class="flash-data" data-keyword="{{ session()->get('keyword') }}" data-pesan="{{ session()->get('pesan') }}">
            <!-- DIV HANYA UNTUK MENAMPILKAN PESAN ERROR DLM BENTUK SWEET ALERT 2 -->
        </div>

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">    
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="{{url('/')}}" class="mb-5">
                    <img alt="Logo" src="{{url('public/images/default.png')}}" class="h-100px"/>
                </a>     
                <h2 class="text-center mb-5">Apps</h2>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    
                    <form class="form w-100" action="{{url('/postlogin')}}" method="POST">
                        @csrf
                        {{-- <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">
                                Autenti
                            </h1>
                        </div> --}}
                        <div class="fv-row mb-4">
                            {{-- <label class="form-label fs-6 fw-bold text-dark"><b>Username</b></label> --}}
                            <input class="form-control form-control-lg form-control-solid" type="text" name="username" placeholder="Username" autocomplete="off"/>
                        </div>
                        <div class="fv-row mb-10">
                            {{-- <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bold text-dark fs-6 mb-0"><b>Password</b></label>
                            </div> --}}
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" placeholder="Password" autocomplete="off"/>
                        </div>
                        <div class="fv-row mb-1">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-1">
                                <span class="indicator-label">
                                    <b>Login</b>
                                </span>
                            </button>
                        </div>

                        
                    </form>
                </div>
            </div>

        </div>
    </div>

        {{-- <script> var hostUrl = "/seven-html-pro/assets/"; </script> --}}
        <script src="{{url('public/Tdashboard/v2/js/jquery-3.6.3.min.js')}}"></script>
		<script src="{{url('public/Tdashboard/v2/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{url('public/Tdashboard/v2/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('public/Tdashboard/v2/plugins/custom/toastr/toastr.min.js')}}"></script>
		<script src="{{url('public/Tdashboard/v2/plugins/custom/toastr/toastrku.js')}}"></script>

    </body>
</html>