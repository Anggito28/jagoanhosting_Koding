<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header p-4">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}"
            target="_blank">
            <div class="d-flex">
                <img src="{{ asset('assets/img/rumah.png') }}" class="navbar-brand-img justify-alight-center"
                    alt="main_logo">
            </div>
        </a>
    </div>
    <div class="pt-6 d-flex justify-content-center">
        <span class="mr-0 text-sm font-weight-bolder word-break justify-alight-center">Manajement Kontrakan</span>
    </div>
    {{-- <hr class="horizontal dark mt-0"> --}}
    <div class="collapse navbar-collapse w-auto pt-3" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('occupants', 'occupants/*') ? 'active' : '' }}"
                    href="{{ url('occupants') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="fa fa-medkit text-success text-sm opacity-10"></i> --}}
                        <i class="fa-solid fa-person text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Penghuni</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pelayanan', 'pelayanan/*') ? 'active' : '' }}"
                    href="{{ url('pelayanan') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="fa fa-user-md grid-58 text-warning text-sm opacity-10"></i> --}}
                        <i class="fa-solid fa-house grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pelayanan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
