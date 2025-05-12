@extends('layouts.main')
@use('Illuminate\Support\Facades\Storage')

@section('content')
    <form action="{{ route('reregistration.update', $registration->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-semibold">Edit Pendaftaran Ulang</h5>
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
                                <option value="{{ $student->id }}" @selected(old('id_siswa', $registration->id_siswa) == $student->id)>
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
                            <option @selected(old('metode_pembayaran', $registration->metode_pembayaran) == 'Dana')>Dana</option>
                            <option @selected(old('metode_pembayaran', $registration->metode_pembayaran) == 'Transfer')>Transfer</option>
                            <option @selected(old('metode_pembayaran', $registration->metode_pembayaran) == 'QRIS')>QRIS</option>
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
                        @if ($registration->bukti_pembayaran)
                            <a href="{{ Storage::url($registration->bukti_pembayaran) }}" target="_blank" title="Lihat Bukti Pembayaran">
                                <iconify-icon icon="solar:arrow-right-up-broken"></iconify-icon>
                            </a>
                        @endif
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
                        @if ($registration->surat_cuti)
                            <a href="{{ Storage::url($registration->surat_cuti) }}" target="_blank" title="Lihat Surat Cuti">
                                <iconify-icon icon="solar:arrow-right-up-broken"></iconify-icon>
                            </a>
                        @endif
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
