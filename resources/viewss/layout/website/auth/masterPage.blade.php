<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>@yield('title')</title>
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
    </head>

    <body  id="kt_body"  class="auth-bg" >
    @include('layout.website.include.notif')
	<div class="d-flex flex-column flex-root">
        <style>
            .auth-page-bg {
                /* background-image: url({{url('Twebsite/v1/media/illustrations/dozzy-1/14.png')}}); */
            }

            [data-bs-theme="dark"] .auth-page-bg {
                /* background-image: url({{url('Twebsite/v1/media/illustrations/dozzy-1/14-dark.png')}}); */
            }
        </style>

        @yield('konten')
    </div>

    <script src="{{url('Tdashboard/v2/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{url('Twebsite/v1/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{url('Twebsite/v1/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('Tdashboard/v2/plugins/custom/toastr/toastr.min.js')}}"></script>
    <script src="{{url('Tdashboard/v2/plugins/custom/toastr/toastrku.js')}}"></script>
    {{-- <script>
        $(document).ready(function(){
            $(window).on('beforeunload', function(){
                return "Anda yakin ingin meninggalkan halaman ini?";
            });
        });
    </script> --}}
    @yield('js')
    </body>
</html>