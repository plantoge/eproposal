<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../">
    <title>RSPISS - Upanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <meta name="description" content="Ceres admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Ceres theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Ceres HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/products/ceres-html-pro" />
		<meta property="og:site_name" content="Keenthemes | Ceres HTML Free" />
		<link rel="canonical" href="Https://preview.keenthemes.com/ceres-html-free" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="{{ url('Twebsite/v1/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('Twebsite/v1/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('Twebsite/v1/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Twebsite/v1/plugins/custom/toastr/toastr.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('Tdashboard/v2/plugins/custom/fontawesome6/css/all.css') }}" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (auth()->user()->roles->contains('name', 'operator')) 
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2ab52228b86df10b1e11', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');

        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "0",
                "extendedTimeOut": "0",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.info(data.message);
        });
    </script>
    @endif

    @yield('css')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled bg-whit">
    {{-- <body id="kt_body" style="background-image: url({{url('Twebsite/v1/media/patterns/header-bg.png')}})" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled"> --}}
    @include('layout.website.include.notif')
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                @include('layout.panel.include.header')

                <div class="toolbar py-5 py-lg-6" id="kt_toolbar">
                    {{-- <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
							<h3 class="fw-bolder fs-1qx ms-5">User, {{Auth::user()->name}}</h3>
							<div class="d-flex align-items-center flex-wrap py-2">
								<a href="#" class="btn btn-primary my-2" tooltip="New App" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Ajukan Penelitian</a>
							</div>
						</div> --}}
                </div>
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    {{-- khusus wizard pengajuan penelitian visitor --}}
                    @php
                        $segment = request()->segment(1) . '/' . request()->segment(2);
                    @endphp

                    @if ($segment == 'pengajuan-proposal/create' || $segment == 'pengajuan-proposal/progress')
                        <div class="content flex-row-fluid" id="kt_content">
                            @yield('konten')
                            @yield('konten2')
                        </div>
                    @else
                        @include('layout.panel.include.side')
                        <div class="content flex-row-fluid" id="kt_content">
                            @yield('konten')
                            @yield('konten2')
                        </div>
                    @endif


                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div
                        class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">{{date('Y')}} - </span>
                            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">RSPI Sulianti
                                Saroso</a>
                        </div>
                        {{-- <div class="menu menu-gray-600 menu-hover-primary fw-bold order-1 border border-dark w-75">
								<marquee behavior="" direction="right">
									tes
								</marquee>
							</div> --}}
                        {{-- <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="#" target="_blank" class="menu-link px-2">WhatsApp Admin : <span class="fw-bold">0812345678</span></a>
								</li>
							</ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">Invite a Friend</h1>
                        <div class="text-muted fw-bold fs-5">If you need more info, please check out
                            <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                        </div>
                    </div>
                    <div class="btn btn-light-primary fw-bolder w-100 mb-8">
                        <img alt="Logo" src="#" class="h-20px me-3" />Invite Gmail Contacts
                    </div>
                    <div class="separator d-flex flex-center mb-8">
                        <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3">or</span>
                    </div>
                    <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Type or paste emails here"></textarea>
                    <div class="mb-10">
                        <div class="fs-6 fw-bold mb-2">Your Invitations</div>
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                        <div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                            Macy</a>
                                        <div class="fw-bold text-muted">melody@altbox.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                        <div class="fw-bold text-muted">max@kt.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                        <div class="fw-bold text-muted">sean@dellito.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                        <div class="fw-bold text-muted">brian@exchange.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-bold text-muted">mikaela@pexcom.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                            Mitcham</a>
                                        <div class="fw-bold text-muted">f.mitcham@kpmg.com.au</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                            Wild</a>
                                        <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                        <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                        <div class="fw-bold text-muted">dam@consilting.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                        <div class="fw-bold text-muted">emma@intenso.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                        <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                                        <div class="fw-bold text-muted">robert@benko.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                            Miller</a>
                                        <div class="fw-bold text-muted">miller@mapple.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                        <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2" selected="selected">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="#" />
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                            Wilder</a>
                                        <div class="fw-bold text-muted">ethan@loop.com.au</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-stack py-4">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                        <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                    </div>
                                </div>
                                <div class="ms-2 w-100px">
                                    <select class="form-select form-select-solid form-select-sm"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3" selected="selected">Can Edit</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-stack">
                        <div class="me-5 fw-bold">
                            <label class="fs-6">Adding Users by Team Members</label>
                            <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                        </div>
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            <span class="form-check-label fw-bold text-muted">Allowed</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ url('Twebsite/v1/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ url('Twebsite/v1/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ url('Twebsite/v1/js/scripts.bundle.js') }}"></script>
    <script src="{{ url('Twebsite/v1/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ url('Twebsite/v1/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('Twebsite/v1/plugins/custom/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('Twebsite/v1/plugins/custom/toastr/toastrku.js') }}"></script>
    <script src="{{ url('Plugin/moment/moment.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    @yield('js')
    @yield('jsany')

    @if (auth()->user()->roles->contains('name', 'visitor'))
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/660f97441ec1082f04df147a/1hqmedosq';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    @endif

</body>

</html>
