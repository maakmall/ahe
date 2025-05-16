@extends('layouts.front')

@section('content')
    <!-- Page Header End -->
    <div class="container-xxl py-5 page-header position-relative mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white animated slideInDown mb-4">Pendaftaran</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Form Pendaftaran</h1>
                <p>Lengkapi form untuk melakukan pendaftaran</p>
            </div>
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="from_front" value="1">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('nama_lengkap') is-invalid @enderror"
                                                id="nama_lengkap"
                                                name="nama_lengkap"
                                                placeholder="Nama Lengkap"
                                                value="{{ old('nama_lengkap') }}"
                                            >
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('nama_lengkap') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('nama_panggilan') is-invalid @enderror"
                                                id="nama_panggilan"
                                                name="nama_panggilan"
                                                placeholder="Nama Panggilan"
                                                value="{{ old('nama_panggilan') }}"
                                            >
                                            <label for="nama_panggilan">Nama Panggilan</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('nama_panggilan') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-floating">
                                            <select
                                                class="form-select border-0 @error('jenis_kelamin') is-invalid @enderror"
                                                id="jenis_kelamin"
                                                name="jenis_kelamin"
                                            >
                                                <option value="" disabled selected>-- Pilih --</option>
                                                <option @selected(old('jenis_kelamin') == 'Laki-Laki')>Laki-Laki</option>
                                                <option @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                                            </select>
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('jenis_kelamin') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir"
                                                name="tempat_lahir"
                                                placeholder="Tempat Lahir"
                                                value="{{ old('tempat_lahir') }}"
                                            >
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('tempat_lahir') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-floating">
                                            <input
                                                type="date"
                                                class="form-control border-0 @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir"
                                                name="tanggal_lahir"
                                                placeholder="Tanggal Lahir"
                                                value="{{ old('tanggal_lahir') }}"
                                            >
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('tanggal_lahir') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('nama_orang_tua') is-invalid @enderror"
                                                id="nama_orang_tua"
                                                name="nama_orang_tua"
                                                placeholder="Nama Orang Tua"
                                                value="{{ old('nama_orang_tua') }}"
                                            >
                                            <label for="nama_orang_tua">Nama Orang Tua</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('nama_orang_tua') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('kelas') is-invalid @enderror"
                                                id="kelas"
                                                name="kelas"
                                                placeholder="Kelas"
                                                value="{{ old('kelas') }}"
                                            >
                                            <label for="kelas">Kelas</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('kelas') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('sekolah') is-invalid @enderror"
                                                id="sekolah"
                                                name="sekolah"
                                                placeholder="Sekolah"
                                                value="{{ old('sekolah') }}"
                                            >
                                            <label for="sekolah">Sekolah</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('sekolah') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('no_wa') is-invalid @enderror"
                                                id="no_wa"
                                                name="no_wa"
                                                placeholder="No. WhatsApp"
                                                value="{{ old('no_wa') }}"
                                            >
                                            <label for="no_wa">No. WhatsApp</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('no_wa') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="email"
                                                class="form-control border-0 @error('email') is-invalid @enderror"
                                                id="email"
                                                name="email"
                                                placeholder="Email"
                                                value="{{ old('email') }}"
                                            >
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('email') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0 @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" id="alamat" style="height: 100px">{{ old('alamat') }}</textarea>
                                            <label for="alamat">Alamat</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('alamat') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-5">
                                        <div class="form-floating">
                                            <select
                                                class="form-select border-0 @error('hari') is-invalid @enderror"
                                                id="hari"
                                                name="hari"
                                            >
                                                <option value="" disabled selected>-- Pilih --</option>
                                                <option @selected(old('hari') == 'Senin Rabu Jumat')>Senin Rabu Jumat</option>
                                                <option @selected(old('hari') == 'Selasa Kamis Sabtu')>Selasa Kamis Sabtu</option>
                                            </select>
                                            <label for="hari">Hari</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('hari') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        @foreach ($hours as $hour)
                                            <div class="form-check py-2">
                                                <input class="form-check-input" type="checkbox" name="jam[]"
                                                    value="{{ $hour->jam }}" id="{{ $hour->jam }}"
                                                    {{ in_array($hour->jam, old('jam', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="{{ $hour->jam }}">
                                                    {{ $hour->jam }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-12 mt-5">
                                        <div class="form-floating">
                                            <select
                                                class="form-select border-0 @error('info') is-invalid @enderror"
                                                id="info"
                                                name="info"
                                            >
                                                <option value="" disabled selected>-- Pilih --</option>
                                                <option @selected(old('info') == 'Media Sosial')>Media Sosial</option>
                                                <option @selected(old('info') == 'Brosur')>Brosur</option>
                                                <option @selected(old('info') == 'Teman')>Teman</option>
                                                <option @selected(old('info') == 'Lainnya')>Lainnya</option>
                                            </select>
                                            <label for="info">Sumber Informasi</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('info') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <select
                                                class="form-select border-0 @error('metode_pembayaran') is-invalid @enderror"
                                                id="metode_pembayaran"
                                                name="metode_pembayaran"
                                            >
                                                <option value="" disabled selected>-- Pilih --</option>
                                                <option @selected(old('metode_pembayaran') == 'Dana')>Dana</option>
                                                <option @selected(old('metode_pembayaran') == 'Transfer')>Transfer</option>
                                                <option @selected(old('metode_pembayaran') == 'QRIS')>QRIS</option>
                                            </select>
                                            <label for="metode_pembayaran">Metode Pembayaran</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('metode_pembayaran') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="file"
                                                class="form-control border-0 @error('bukti_pembayaran') is-invalid @enderror"
                                                id="bukti_pembayaran"
                                                name="bukti_pembayaran"
                                                placeholder="Bukti Pembayaran"
                                                value="{{ old('bukti_pembayaran') }}"
                                            >
                                            <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('bukti_pembayaran') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">
                                            Daftar
                                        </button>
                                    </div>
                                    {{-- @dd($errors->all()) --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection