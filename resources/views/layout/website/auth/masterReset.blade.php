<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>Reset Password</title>
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
        <link href="{{asset('/Tdashboard/v2/plugins/custom/fontawesome6/css/all.css')}}" rel="stylesheet">
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
                background-image: url({{url('Twebsite/v1/media/illustrations/dozzy-1/14.png')}});
            }

            [data-bs-theme="dark"] .auth-page-bg {
                background-image: url({{url('Twebsite/v1/media/illustrations/dozzy-1/14-dark.png')}});
            }
        </style>

        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">     
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                

                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    
                    <form class="form w-100" action="{{url('auth-reset-password')}}" method="post">
                        @csrf
                        <div class="mb-10 text-center">
                            <h1 class="text-gray-900 mb-3">
                                Lupa Password ?
                            </h1>

                            <div class="text-gray-500 fw-semibold fs-4">
                                Klik tautan disini jika belum punya 
                                <a href="{{url('auth-sign-up')}}" class="link-primary fw-bolder">Daftar Akun</a>
                            </div>

                        </div>

                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">                           
                                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}" />
                            </div>

                        </div>

                        <div class="text-center">
                                    
                            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bold me-4">
                                    <span class="indicator-label">
                                        Reset
                                    </span>
                                </button>
                        
                                <a href="{{url('/')}}" class="btn btn-lg btn-light-primary fw-bold">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>

                @if(session('status'))
                    <div class="alert alert-danger mt-10">
                        <b>{{ session('status') }}</b>
                        <a type="button" class="position-absolute position-sm-relative m-0 m-sm-0 top-0 end-0 ms-sm-auto" data-bs-dismiss="alert">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                @endif

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
    <script src="{{asset('Tdashboard/v2/plugins/custom/toastr/toastr.min.js')}}"></script>
    <script src="{{url('Tdashboard/v2/plugins/custom/toastr/toastrku.js')}}"></script>
        
    </body>
</html>