@extends('layouts.front')

@section('content')
    <!-- Page Header End -->
    <div class="container-xxl py-5 page-header position-relative mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white animated slideInDown mb-4">Cuti</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Form Pengajuan Cuti</h1>
                <p>Lengkapi form untuk melakukan pengajuan cuti</p>
            </div>
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <form action="{{ route('leave.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="from_front" value="1">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <select id="id_siswa" name="id_siswa" class="form-select">
                                            <option value="">-- Cari Nama Siswa --</option>
                                        </select>
                                        <div class="invalid-feedback d-block">
                                            @error('id_siswa') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('nama_lengkap') is-invalid @enderror"
                                                id="nama_lengkap"
                                                name="nama_lengkap"
                                                placeholder="Nama Lengkap"
                                                value="{{ old('nama_lengkap') }}"
                                                disabled
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
                                                disabled
                                            >
                                            <label for="nama_panggilan">Nama Panggilan</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('nama_panggilan') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select
                                                class="form-select border-0 @error('jenis_kelamin') is-invalid @enderror"
                                                id="jenis_kelamin"
                                                name="jenis_kelamin"
                                                disabled
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

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="text"
                                                class="form-control border-0 @error('kelas') is-invalid @enderror"
                                                id="kelas"
                                                name="kelas"
                                                placeholder="Kelas"
                                                value="{{ old('kelas') }}"
                                                disabled
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
                                                class="form-control border-0 @error('no_wa') is-invalid @enderror"
                                                id="no_wa"
                                                name="no_wa"
                                                placeholder="No. WhatsApp"
                                                value="{{ old('no_wa') }}"
                                                disabled
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
                                                type="date"
                                                class="form-control border-0 @error('mulai_tanggal') is-invalid @enderror"
                                                id="mulai_tanggal"
                                                name="mulai_tanggal"
                                                placeholder="mulai_tanggal"
                                                value="{{ old('mulai_tanggal') }}"
                                            >
                                            <label for="mulai_tanggal">Mulai Tanggal</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('mulai_tanggal') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input
                                                type="date"
                                                class="form-control border-0 @error('sampai_tanggal') is-invalid @enderror"
                                                id="sampai_tanggal"
                                                name="sampai_tanggal"
                                                placeholder="No. WhatsApp"
                                                value="{{ old('sampai_tanggal') }}"
                                            >
                                            <label for="sampai_tanggal">Sampai Tanggal</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('sampai_tanggal') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0 @error('alasan') is-invalid @enderror" name="alasan" placeholder="alasan" id="alasan" style="height: 100px">{{ old('alasan') }}</textarea>
                                            <label for="alasan">Alasan</label>
                                        </div>
                                        <div class="invalid-feedback d-block">
                                            @error('alasan') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">
                                            Ajukan Cuti
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

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection {
            border-width: 0 !important;
            border-radius: 10px !important;
            height: calc(3.5rem + 2px) !important;
            padding: 1rem .75rem !important;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#id_siswa').select2({
            placeholder: 'Cari Siswa',
            minimumInputLength: 1,
            language: {
                inputTooShort: function () {
                    return 'Ketik minimal 1 huruf untuk mencari siswa';
                },
                noResults: function () {
                    return 'Tidak ditemukan';
                },
                searching: function () {
                    return 'Mencari...';
                }
            },
            ajax: {
                url: '/ajax/siswa-search',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // keyword dari user
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (siswa) {
                            return {
                                id: siswa.id,
                                text: `${siswa.nama_lengkap} (${siswa.nama_panggilan}) - ${siswa.jenis_kelamin} - Kelas ${siswa.kelas}`
                            };
                        })
                    };
                },
                cache: true
            }
        });

    $('#id_siswa').on('change', function () {
        let siswaId = $(this).val();

        if (siswaId) {
            $.get(`/siswa/${siswaId}`, function (res) {
                $('#nama_lengkap').val(res.nama_lengkap);
                $('#nama_panggilan').val(res.nama_panggilan);
                $('#jenis_kelamin').val(res.jenis_kelamin);
                $('#kelas').val(res.kelas);
                $('#no_wa').val(res.no_wa);
            });
        }
    });

    $('b[role="presentation"]').hide();
    </script>
@endpush