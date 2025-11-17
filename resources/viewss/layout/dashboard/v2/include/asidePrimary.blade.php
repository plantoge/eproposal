<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
    <!--begin::Logo-->
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
        <a href="{{url('/')}}">
            <img alt="Logo" src="{{url('/images/default.png')}}" class="h-70px" />
            {{-- <img alt="Logo" src="{{url('/Tdashboard/v2/media/logos/logo-default.svg')}}" class="h-50px" /> --}}
        </a>
    </div>
    <!--end::Logo-->
    <!--begin::Nav-->
    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
        <!--begin::Wrapper-->
        <div class="hover-scroll-y mb-10" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="0px">
            <!--begin::Nav-->
            <ul class="nav flex-column">
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Menu">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon active" data-bs-toggle="tab" href="#kt_aside_nav_tab_menu">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                
                {{-- <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Notifications">
                    <a class="nav-link btn btn-custom btn-icon" data-bs-toggle="tab" href="#kt_aside_nav_tab_notifications">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                            </svg>
                        </span>
                    </a>
                </li> --}}

                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Authors">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon" data-bs-toggle="tab" href="#kt_aside_nav_tab_authors">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                                <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
            </ul>
            <!--end::Tabs-->
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Nav-->
    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
        <!--begin::Activities-->
        <div class="d-flex align-items-center mb-3">
            <!--begin::Drawer toggle-->
            <div class="btn btn-icon btn-custom" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Activity Logs" id="kt_activities_toggle">
                <span class="svg-icon svg-icon-2 svg-icon-lg-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                    </svg>
                </span>
            </div>
            <!--end::drawer toggle-->
        </div>
        <!--end::Activities-->
        <!--begin::User-->
        <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
            <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="{{auth()->user()->name}}">
                <img src="{{url('public/Tdashboard/v2/media/avatars/blank.png')}}" alt="image" />
                {{-- <img src="{{url('public/Tdashboard/v2/media/avatars/150-26.jpg')}}" alt="image" /> --}}
            </div>
            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img alt="Logo" src="{{url('public/Tdashboard/v2/media/avatars/blank.png')}}" />
                            {{-- <img alt="Logo" src="{{url('public/Tdashboard/v2/media/avatars/150-26.jpg')}}" /> --}}
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bolder d-flex align-items-center fs-5">
                                {{auth()->user()->name}}
                                {{-- <span class="badge badge-light-warning fw-bolder fs-8 px-2 py-1 ms-2">Pro</span> --}}
                            </div>
                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <a href="{{url('setelan')}}" class="menu-link px-5">Setelan</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->

                {{-- <div class="menu-item px-5 my-1">
                    <a href="#" class="menu-link px-5">Account Settings</a>
                </div> --}}
                
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <a href="{{url('logout')}}" class="menu-link px-5">Keluar</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <!-- <div class="separator my-2"></div> -->
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <!-- <div class="menu-item px-5">
                    <div class="menu-content px-5">
                        <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="../dist/index.html" />
                            <span class="pulse-ring ms-n1"></span>
                            <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                        </label>
                    </div>
                </div> -->
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
            <!--end::Menu wrapper-->
        </div>
        <!--end::User-->
    </div>
    <!--end::Footer-->
</div>