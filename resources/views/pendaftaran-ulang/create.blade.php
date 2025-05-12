@extends('layouts.main')

@section('content')
    <form action="{{ route('reregistration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-semibold">Pendaftaran Ulang</h5>
                <button class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                    <label for="id_siswa" class="form-label col-sm-4 col-form-label">
                        Siswa
                    </label>
                    <div class="col-sm-8">
                        <select class="form-select @error('id_siswa') is-invalid @enderror" id="id_siswa" name="id_siswa"
                            value="{{ old('id_siswa') }}">
                            <option value="" disabled selected>-- Pilih Siswa --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" @selected(old('id_siswa') == $student->id)>
                                    {{ $student->nama_lengkap }} ({{ $student->nama_panggilan }})
                                </option>
                            @endforeach
                        </select>
                        @error('id_siswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="metode_pembayaran" class="form-label col-sm-4 col-form-label">
                        Metode Pembayaran
                    </label>
                    <div class="col-sm-8">
                        <select class="form-select @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran"
                            name="metode_pembayaran">
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
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="bukti_pembayaran" class="form-label col-sm-4 col-form-label">
                        Bukti Pembayaran
                    </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                            id="bukti_pembayaran" name="bukti_pembayaran" />
                        @error('bukti_pembayaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="surat_cuti" class="form-label col-sm-4 col-form-label">
                        Surat Cuti
                    </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control @error('surat_cuti') is-invalid @enderror"
                            id="surat_cuti" name="surat_cuti" />
                        @error('surat_cuti')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endSection
