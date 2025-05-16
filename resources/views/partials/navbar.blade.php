<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="index.html" class="navbar-brand">
        <h1 class="m-0 text-primary">
            <i class="fa fa-book-reader me-3"></i>
            {{ config('app.name') }}
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="/" @class(['nav-item', 'nav-link', 'active' => request()->is('/')])>Profil</a>
            <a href="/jadwal" @class(['nav-item', 'nav-link', 'active' => request()->is('jadwal')])>Jadwal</a>
            <a href="/form-pendaftaran" @class(['nav-item', 'nav-link', 'active' => request()->is('form-pendaftaran')])>Pendaftaran</a>
            <div class="nav-item dropdown">
                <a href="#" @class(["nav-link", "dropdown-toggle", "active" => request()->is('form-pendaftaran-ulang') || request()->is('pengajuan-cuti')]) data-bs-toggle="dropdown">
                    Daftar Ulang
                </a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="/form-pendaftaran-ulang" @class(["dropdown-item", "active" => request()->is('form-pendaftaran-ulang')])>Pendaftaran Ulang</a>
                    <a href="/pengajuan-cuti" @class(["dropdown-item", "active" => request()->is('pengajuan-cuti')])>Pengajuan Cuti</a>
                </div>
            </div>
        </div>
        <a href="/login" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">
            Admin<i class="fa fa-arrow-right ms-3"></i>
        </a>
    </div>
</nav>
<!-- Navbar End -->
