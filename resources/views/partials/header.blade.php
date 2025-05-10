<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link text-hover-primary" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                    <div class="message-body">
                        <a href="javascript:void(0)" class="dropdown-item text-hover-primary">
                            Item 1
                        </a>
                        <a href="javascript:void(0)" class="dropdown-item text-hover-primary">
                            Item 2
                        </a>
                    </div>
                </div>
            </li> --}}
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="/profile" class="d-flex align-items-center gap-2 dropdown-item text-hover-primary">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Profil</p>
                            </a>

                            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Keluar</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->
