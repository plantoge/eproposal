<div class="menu-item mb-1">
    <a class="menu-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{url('/')}}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
                {{-- <i class="fa-solid fa-house"></i> --}}
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>

@can('Manage All User Plus Role Permission')
<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1 {{ Request::is('users*','role*','permission*', 'assignrole*', 'givepermission*', 'struktur-organisasi*') ? 'here show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-shield-alt fa-lg"></i>
        </span>
        <span class="menu-title">Manage Account</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ Request::is('users*') ? 'active' : '' }}" href="{{url('/users')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">User</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ Request::is('role*') ? 'active' : '' }}" href="{{url('/role')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Roles</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ Request::is('permission*') ? 'active' : '' }}" href="{{url('/permission')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Permission</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ Request::is('assignrole*') ? 'active' : '' }}" href="{{url('/assignrole')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">User <-> Role</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ Request::is('givepermission*') ? 'active' : '' }}" href="{{url('/givepermission')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Role <-> Permission</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ Request::is('struktur-organisasi*') ? 'active' : '' }}" href="{{url('/struktur-organisasi')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Struktur Organisasi</span>
            </a>
        </div>
    </div>
</div>
@endcan

{{-- MODULE BENDAHARA PENERIMAAN ----------------------------------------------------------------------------------------- --}}
{{-- --------------------------------------------------------------------------------------------------------------------- --}}
{{-- @can('Bendahara Penerimaan - Uraian Kegiatan') --}}
{{-- <div class="menu-item">
    <a class="menu-link {{ Request::is('report-tindakan*') ? 'active' : '' }}" href="{{url('report-tindakan')}}">
        <span class="menu-icon">
            <i class="far fa-calendar-plus fa-lg"></i>
        </span>
        <span class="menu-title">Laporan Tindakan</span>
    </a>
</div> --}}
{{-- @endcan --}}
