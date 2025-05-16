@extends('layouts.front')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/assets/images/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start mb-5">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">
                                    Asyiknya Belajar Baca Bersama Ahe
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    Bimbel hebat untuk anak hebat
                                </p>
                                <a href="/form-pendaftaran" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/assets/images/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start mb-5">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">
                                    Bimbel Terbaik untuk Masa Depan Anak Anda
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    Belajar Nyaman, Prestasi Gemilang
                                </p>
                                <a href="/form-pendaftaran" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Facilities Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Fasilitas</h1>
                <p>Belajar jadi lebih fokus dan maksimal dengan fasilitas terbaik kami!</p>
            </div>
            <div class="row justify-content-center g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="facility-item">
                        <div class="facility-icon bg-primary">
                            <span class="bg-primary"></span>
                            <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i>
                            <span class="bg-primary"></span>
                        </div>
                        <div class="facility-text bg-primary">
                            <h3 class="text-primary mb-3">Privat</h3>
                            <p class="mb-0">Pelayanan privat 1 Guru untuk 2 Murid</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="facility-item">
                        <div class="facility-icon bg-success">
                            <span class="bg-success"></span>
                            <i class="fas fa-book-open fa-3x text-success"></i>
                            <span class="bg-success"></span>
                        </div>
                        <div class="facility-text bg-success">
                            <h3 class="text-success mb-3">Modul</h3>
                            <p class="mb-0">Modul yang mudah dipahami dan sesuai level</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="facility-item">
                        <div class="facility-icon bg-secondary">
                            <span class="bg-secondary"></span>
                            <i class="far fa-calendar-check fa-3x text-secondary"></i>
                            <span class="bg-secondary"></span>
                        </div>
                        <div class="facility-text bg-secondary">
                            <h3 class="text-secondary mb-3">Pendampingan</h3>
                            <p class="mb-0">Pendampingan belajar sesuai jadwal dan konsisten</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="facility-item">
                        <div class="facility-icon bg-warning">
                            <span class="bg-warning"></span>
                            <i class="fa fa-home fa-3x text-warning"></i>
                            <span class="bg-warning"></span>
                        </div>
                        <div class="facility-text bg-warning">
                            <h3 class="text-warning mb-3">Ruang Nyaman</h3>
                            <p class="mb-0">Ruangan untuk belajar yang nyaman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="facility-item">
                        <div class="facility-icon bg-info">
                            <span class="bg-info"></span>
                            <i class="fas fa-certificate fa-3x text-info"></i>
                            <span class="bg-info"></span>
                        </div>
                        <div class="facility-text bg-info">
                            <h3 class="text-info mb-3">Piagam</h3>
                            <p class="mb-0">Piagam apresiasi bagi peserta yang lulus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4">Mengapa memilih Ahe?</h1>
                    <p>Ahe adalah bimbingan belajar dengan metode pembelajaran yang mudah dimengerti untuk anak usia dini. Kami percaya bahwa setiap anak punya cara unik dalam memahami pelajaran, dan di sinilah Ahe hadir sebagai pendamping terbaik mereka.</p>
                    <p class="mb-4">Didukung oleh pengajar berpengalaman, modul belajar yang menarik, dan suasana kelas yang nyaman, Ahe siap membantu anak mengembangkan potensi sejak dini.</p>
                </div>
                <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid w-75 rounded-circle bg-light p-3" src="/assets/images/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 text-start" style="margin-top: -150px;">
                            <img class="img-fluid w-100 rounded-circle bg-light p-3" src="/assets/images/about-2.jpg" alt="">
                        </div>
                        <div class="col-6 text-end" style="margin-top: -150px;">
                            <img class="img-fluid w-100 rounded-circle bg-light p-3" src="/assets/images/about-3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Prices Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Biaya</h1>
                <p>Investasi Kecil untuk Masa Depan Besar</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="classes-item">
                        <div class="bg-light rounded-circle w-75 mx-auto p-3">
                            <img class="img-fluid rounded-circle" src="/assets/images/classes-2.jpg" alt="">
                        </div>
                        <div class="bg-light rounded p-4 pt-5 mt-n5">
                            <span class="d-block text-center h3 mt-3 mb-4">Pendaftaran</span>
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <span class="bg-primary text-white rounded-pill py-2 px-3">
                                    Rp 50.000
                                </span>
                            </div>
                            <div class="row g-1 justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="border-top border-3 border-success pt-2">
                                        <small>Sudah termasuk Gratis Buku Level 1 Ahe sebagai bahan belajar awal</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="classes-item">
                        <div class="bg-light rounded-circle w-75 mx-auto p-3">
                            <img class="img-fluid rounded-circle" src="/assets/images/classes-1.jpg" alt="">
                        </div>
                        <div class="bg-light rounded p-4 pt-5 mt-n5">
                            <span class="d-block text-center h3 mt-3 mb-4">SPP Bulanan</span>
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <span class="bg-primary text-white rounded-pill py-2 px-3">
                                    Rp 120.000
                                </span>
                            </div>
                            <div class="row g-1 justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="border-top border-3 border-warning pt-2">
                                        <small>Termasuk 12x pertemuan setiap bulan. Jadwal  disesuaikan dengan kebutuhan siswa</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Prices End -->


    <!-- Gallery Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Galeri Kegiatan</h1>
                <p>Dokumentasi kegiatan di Ahe</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card overflow-hidden border-5 p-3">
                        <img class="img-fluid rounded" src="/assets/images/team-1.jpg">
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card overflow-hidden border-5 p-3">
                        <img class="img-fluid rounded" src="/assets/images/team-2.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Gallery End -->
@endsection
