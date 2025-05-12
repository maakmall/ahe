@extends('layouts.main')

@section('content')
    <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title fw-semibold mb-0">Tambah Pendaftaran</h5>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-md-0">
                    <div class="card-body">
                        <div class="mb-4 row align-items-center">
                            <label for="name" class="form-label col-sm-4 col-form-label">
                                Nama Lengkap
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    id="name" name="nama_lengkap" value="{{ old('nama_lengkap') }}" />
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="nama_panggilan" class="form-label col-sm-4 col-form-label">
                                Nama Panggilan
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror"
                                    id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') }}" />
                                @error('nama_panggilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="jenis_kelamin" class="form-label col-sm-4 col-form-label">
                                Jenis Kelamin
                            </label>
                            <div class="col-sm-8">
                                <select type="text" class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                    id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                    <option @selected(old('jenis_kelamin') == 'Laki-Laki')>Laki-Laki</option>
                                    <option @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="tempat_lahir" class="form-label col-sm-4 col-form-label">
                                Tempat, Tanggal Lahir
                            </label>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" />
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" />
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="nama_orang_tua" class="form-label col-sm-4 col-form-label">
                                Nama Orang Tua
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_orang_tua') is-invalid @enderror"
                                    id="nama_orang_tua" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}" />
                                @error('nama_orang_tua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="kelas" class="form-label col-sm-4 col-form-label">
                                Kelas
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                    id="kelas" name="kelas" value="{{ old('kelas') }}" />
                                @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="sekolah" class="form-label col-sm-4 col-form-label">
                                Nama Sekolah
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('sekolah') is-invalid @enderror"
                                    id="sekolah" name="sekolah" value="{{ old('sekolah') }}" />
                                @error('sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="no_wa" class="form-label col-sm-4 col-form-label">
                                No. WhatsApp
                            </label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control @error('no_wa') is-invalid @enderror"
                                    id="no_wa" name="no_wa" value="{{ old('no_wa') }}" />
                                @error('no_wa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="email" class="form-label col-sm-4 col-form-label">
                                Email
                            </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="alamat" class="form-label col-sm-4 col-form-label">
                                Alamat
                            </label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label" for="info">Info</label>
                            <select class="form-select @error('info') is-invalid @enderror" id="info"
                                name="info">
                                <option @selected(old('info') == 'Teman')>Teman</option>
                                <option @selected(old('info') == 'Media Sosial')>Media Sosial</option>
                                <option @selected(old('info') == 'Brosur')>Brosur</option>
                                <option @selected(old('info') == 'Lainnya')>Lainnya</option>
                            </select>
                            @error('info')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="metode_pembayaran">
                                Metode Pembayaran
                            </label>
                            <select class="form-select @error('metode_pembayaran') is-invalid @enderror"
                                id="metode_pembayaran" name="metode_pembayaran">
                                <option @selected(old('metode_pembayaran') == 'Dana')>Dana</option>
                                <option @selected(old('metode_pembayaran') == 'Transfer')>Transfer</option>
                                <option @selected(old('metode_pembayaran') == 'QRIS')>QRIS</option>
                            </select>
                            @error('metode_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                            <input id="bukti_pembayaran"
                                class="form-control  @error('bukti_pembayaran') is-invalid @enderror" type="file"
                                name="bukti_pembayaran" value="{{ old('bukti_pembayaran') }}">
                            <small class="text-muted">*File akan hilang jika terjadi kesalahan, silakan upload
                                ulang</small>

                            @error('bukti_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="hari">Hari</label>
                            <select class="form-select @error('hari') is-invalid @enderror" id="hari"
                                name="hari">
                                <option @selected(old('hari') == 'Senin Rabu Jumat')>Senin Rabu Jumat</option>
                                <option @selected(old('hari') == 'Selasa Kamis Sabtu')>Selasa Kamis Sabtu</option>
                            </select>
                            @error('hari')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                </div>
            </div>
        </div>
    </form>
@endsection
