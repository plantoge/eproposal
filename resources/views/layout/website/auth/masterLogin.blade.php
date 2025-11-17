<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>Login</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        {{-- <meta name="description" content="Ceres admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
        <meta name="keywords" content="Ceres theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard"/>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Ceres HTML Pro- Bootstrap 5 HTML Multipurpose Admin Dashboard Theme - Ceres HTML Pro by KeenThemes" />
        <meta property="og:url" content="https://keenthemes.com/products/ceres-html-pro"/>
        <meta property="og:site_name" content="Ceres HTML Pro by Keenthemes" />
        <link rel="canonical" href="https://preview.keenthemes.com/ceres-html-pro"/>
        <link rel="shortcut icon" href="/ceres-html-pro/assets/media/logos/favicon.ico"/> --}}
        <link href="{{url('Twebsite/v1/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('Twebsite/v1/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('Tdashboard/v2/plugins/custom/toastr/toastr.min.css')}}" rel="stylesheet">
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-37564768-1');
        </script>
        <script>
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
    </head>

    <body  id="kt_body"  class="auth-bg" >
    @include('layout.website.include.notif')
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if ( document.documentElement ) {
            if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if ( localStorage.getItem("data-bs-theme") !== null ) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }			
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }            
    </script>
	<div class="d-flex flex-column flex-root">
        <style>
            .auth-page-bg {
                /* background-image: url({{url('Twebsite/v1/media/illustrations/dozzy-1/14.png')}}); */
            }

            [data-bs-theme="dark"] .auth-page-bg {
                /* background-image: url({{url('Twebsite/v1/media/illustrations/dozzy-1/14-dark.png')}}); */
            }
        </style>

        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">     
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    
                    <form class="form w-100" action="{{url('verifikasi-login')}}" method="post">
                        @csrf
                        <div class="mb-10 text-center">
                            <h1 class="text-gray-900 mb-3">
                                MASUK
                            </h1>

                            <div class="text-gray-500 fw-semibold fs-4">
                                Klik tautan disini jika belum punya 
                                <a href="{{url('registrasi-ulang')}}" class="link-primary fw-bolder">DAFTAR</a>
                            </div>
                        </div>

                        {{-- <button type="button" class="btn btn-light-primary fw-bold w-100 mb-10">
                            <img alt="Logo" src="{{url('Twebsite/v1/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3"/>     
                            Sign in with Google
                        </button> --}}

                        {{-- <div class="d-flex align-items-center mb-10">
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            <span class="fw-semibold text-gray-500 fs-7 mx-2">OR</span>
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        </div> --}}
                        
                        {{-- {{old('email')}}
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}

                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">                           
                                {{-- <label class="form-label fw-bold text-gray-900 fs-6">Nama</label> --}}
                                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}" />
                            </div>

                        </div>

                        <div class="fv-row mb-7">
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" />
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary w-100">
                                <span class="indicator-label">
                                    Login
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
    </div>

    <script>
        var hostUrl = {{url('/')}};        
    </script>
    <script src="{{url('Twebsite/v1/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{url('Twebsite/v1/js/scripts.bundle.js')}}"></script>
    {{-- <script src="{{url('Twebsite/v1/js/custom/authentication/sign-up/general.js')}}"></script> --}}
    <script src="{{asset('public/Tdashboard/v2/plugins/custom/toastr/toastr.min.js')}}"></script>
    <script src="{{url('Tdashboard/v2/plugins/custom/toastr/toastrku.js')}}"></script>
        
    </body>
</html>