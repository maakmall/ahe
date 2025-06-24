<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img">
                <img src="/assets/images/logo.png" width="80" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Beranda</span>
                </li>
                <li class="sidebar-item">
                    <a @class([
                        'sidebar-link text-hover-primary',
                        'active' => request()->routeIs('dashboard'),
                    ]) href="{{ route('dashboard') }}" aria-expanded="false">
                        <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Transaksi</span>
                </li>
                <li class="sidebar-item">
                    <a @class([
                        'sidebar-link text-hover-primary justify-content-between',
                        'active' => request()->routeIs('registration') || request()->routeIs('registration.*'),
                    ]) href="{{ route('registration') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <iconify-icon icon="solar:clipboard-list-line-duotone"></iconify-icon>
                            </span>
                            <span class="hide-menu">Pendaftaran</span>
                        </div>
                        @if ($registrationCount)
                            <span class="hide-menu badge text-bg-success fs-1 py-1">
                                {{ $registrationCount }}
                            </span>
                        @endif
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a @class(["sidebar-link text-hover-primary justify-content-between", "active" => request()->routeIs('reregistration.*')])
                        href="{{ route('reregistration') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <iconify-icon icon="solar:book-bookmark-line-duotone"></iconify-icon>
                            </span>
                            <span class="hide-menu">Daftar Ulang</span>
                        </div>
                        @if ($reregistrationCount)
                            <span class="hide-menu badge text-bg-success fs-1 py-1">
                                {{ $reregistrationCount }}
                            </span>
                        @endif
                    </a>
                </li>
                <li class="sidebar-item">
                    <a @class(["sidebar-link text-hover-primary justify-content-between", "active" => request()->routeIs('leave.*')])
                        href="{{ route('leave') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <iconify-icon icon="solar:user-id-line-duotone"></iconify-icon>
                            </span>
                            <span class="hide-menu">Cuti</span>
                        </div>
                        @if ($leaveCount)
                            <span class="hide-menu badge text-bg-success fs-1 py-1">
                                {{ $leaveCount }}
                            </span>
                        @endif
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a @class([
                        'sidebar-link d-flex justify-content-between align-items-center text-hover-primary',
                        'active' => request()->routeIs('reregistration', 'reregistration.*') || request()->routeIs('leave', 'leave.*'),
                    ]) data-bs-toggle="collapse" href="#submenu-reregistration"
                        role="button"
                        aria-expanded="{{ request()->routeIs('reregistration', 'reregistration.*') || request()->routeIs('leave', 'leave.*') ? 'true' : 'false' }}"
                        aria-controls="submenu-reregistration">

                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <iconify-icon icon="solar:book-bookmark-line-duotone"></iconify-icon>
                            </span>
                            <span class="hide-menu">Daftar Ulang</span>
                        </div>

                        <iconify-icon icon="tabler:chevron-down" @class([
                            'transition-transform',
                            'rotate-180' => request()->routeIs('reregistration', 'reregistration.*'),
                        ])></iconify-icon>
                    </a>

                    <div @class([
                        'collapse',
                        'show' => request()->routeIs('reregistration', 'reregistration.*') || request()->routeIs('leave', 'leave.*'),
                    ]) id="submenu-reregistration">
                        <ul class="sidebar-submenu ps-4">
                            <li class="sidebar-item">
                                <a @class([
                                    'sidebar-link d-flex justify-content-between',
                                    'text-primary' => request()->routeIs('reregistration', 'reregistration.*'),
                                ]) href="{{ route('reregistration') }}">
                                    <span>Pendaftaran Ulang</span>
                                    @if ($reregistrationCount)
                                        <span class="badge text-bg-success fs-1 py-1">{{ $reregistrationCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a @class([
                                    'sidebar-link d-flex justify-content-between',
                                    'text-primary' => request()->routeIs('leave', 'leave.*'),
                                ])
                                    href="{{ route('leave') }}">
                                    <span>Pengajuan Cuti</span>
                                    @if ($leaveCount)
                                        <span class="badge text-bg-success fs-1 py-1">{{ $leaveCount }}</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
