@extends('layouts.main')

@section('content')
    <form action="{{ route('leave.store') }}" method="POST">
        @csrf
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-semibold">Ajukan Cuti</h5>
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
                        <select class="form-select @error('id_siswa') is-invalid @enderror"
                            id="id_siswa" name="id_siswa" value="{{ old('id_siswa') }}">
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
                    <label for="mulai_tanggal" class="form-label col-sm-4 col-form-label">
                        Mulai Tanggal
                    </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control @error('mulai_tanggal') is-invalid @enderror"
                            id="mulai_tanggal" name="mulai_tanggal" value="{{ old('mulai_tanggal') }}" />
                        @error('mulai_tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="sampai_tanggal" class="form-label col-sm-4 col-form-label">
                        Sampai Tanggal
                    </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control @error('sampai_tanggal') is-invalid @enderror"
                            id="sampai_tanggal" name="sampai_tanggal" value="{{ old('sampai_tanggal') }}" />
                        @error('sampai_tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row align-items-center">
                    <label for="alasan" class="form-label col-sm-4 col-form-label">
                        Alasan
                    </label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan" rows="3" placeholder="Apa alasan cutinya?">{{ old('alasan') }}</textarea>
                        @error('alasan')
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
