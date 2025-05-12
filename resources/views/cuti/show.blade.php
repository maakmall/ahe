@extends('layouts.main')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0 fw-semibold">Detail Pengajuan Cuti</h5>
            <div class="d-flex">
                @if ($leave->status == 'Pending')
                    <form action="{{ route('leave.approve', $leave->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Diterima">
                        <button class="btn btn-success me-2 has-confirmation">
                            Setujui
                        </button>
                    </form>
                    <form action="{{ route('leave.reject', $leave->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak">
                        <button class="btn btn-danger has-confirmation">Tolak</button>
                    </form>
                @endif
                @if ($leave->status !== 'Pending')
                    <a href="{{ route('leave.letter', $leave->id) }}" class="btn btn-dark me-2" target="_blank">
                        <span class="me-1 fs-3">
                            <iconify-icon icon="solar:download-minimalistic-bold"></iconify-icon>
                        </span>
                        <span>Surat Cuti</span>
                    </a>
                    <form action="{{ route('leave.email', $leave->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary has-confirmation">
                            Kirim Email
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-0">
                <div class="card-body">
                    <h5 class="card-title text-center mb-5">Pengajuan Cuti</h5>

                    <div class="row justify-content-center mb-4">
                        <div class="col-9">
                            <table width="100%">
                                <tr>
                                    <td class="text-dark pb-3"><b>Nama Lengkap</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->siswa->nama_lengkap }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark pb-3"><b>Nama Panggilan</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->siswa->nama_panggilan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark pb-3"><b>Jenis Kelamin</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->siswa->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark pb-3"><b>Kelas</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->siswa->kelas }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark pb-3"><b>No. WhatsApp</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->siswa->no_wa }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark pb-3"><b>Alamat</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->siswa->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark pb-3"><b>Alasan</b></td>
                                    <td class="pb-3">
                                        <span class="text-dark fw-bold">:</span>
                                        {{ $leave->alasan }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <p class="mb-5">
                        Dengan ini mengajukan izin cuti sementara dari kegiatan belajar di Bimbingan Belajar Hebat Cabang Warnasari mulai dari tanggal
                        <b>{{ $leave->mulai_tanggal->isoFormat('DD MMM YYYY') }}</b> sampai dengan
                        <b>{{ $leave->sampai_tanggal->isoFormat('DD MMM YYYY') }}</b>.
                    </p>

                    @if ($leave->status !== 'Pending')
                        @php
                            $color = match ($leave->status) {
                                'Pending' => 'info',
                                'Disetujui' => 'success',
                                'Ditolak' => 'danger',
                                default => 'dark',
                            };
                        @endphp
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="badge bg-{{ $color }}-subtle text-{{ $color }} mb-5">
                                {{ $leave->status }}
                            </span>
                        </div>
                    @endif

                    <p class="text-end mb-0">
                        {{ $leave->tanggal_dibuat->translatedFormat('l, d F Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endSection
