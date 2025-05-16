@extends('layouts.main')
@use('Illuminate\Support\Facades\Storage')

@section('content')
    <div class="card card-body py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0 fw-semibold">{{ $title }}</h4>
                    <div class="d-flex">
                        @if ($registration->status == 'Pending')
                            <form action="{{ route('registration.approve', $registration->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Diterima">
                                <button class="btn btn-success me-2 has-confirmation">
                                    Terima
                                </button>
                            </form>
                            <form action="{{ route('registration.reject', $registration->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Ditolak">
                                <button class="btn btn-danger has-confirmation">Tolak</button>
                            </form>
                        @endif
                        @if ($registration->status !== 'Pending')
                            <form action="{{ route('registration.email', $registration->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-secondary has-confirmation">
                                    Kirim Email
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <p class="text-dark"><b>ID</b></p>
                        <p>{{ $registration->id }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="text-dark"><b>Tanggal</b></p>
                        <p>{{ $registration->tanggal->isoFormat('DD MMM YYYY h:mm') }}</p>
                    </div>

                    @if (!$registration->daftar_ulang)
                        <div class="mb-3">
                            <p class="text-dark"><b>Info</b></p>
                            <p class="mb-0">{{ $registration->info }}</p>
                        </div>
                    @endif

                    <div>
                        <p class="text-dark"><b>Status</b></p>
                        @php
                            $color = match ($registration->status) {
                                'Pending' => 'info',
                                'Diterima' => 'success',
                                'Ditolak' => 'danger',
                                default => 'dark',
                            };
                        @endphp
                        <span class="badge bg-{{ $color }}-subtle text-{{ $color }}">
                            {{ $registration->status }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card mb-md-0">
                <div class="card-body">
                    <div @class(["mb-3" => $registration->surat_cuti])>
                        <p class="text-dark"><b>Metode Pembayaran</b></p>
                        <p @class(["mb-0" => !$registration->bukti_pembayaran && !$registration->surat_cuti ])>{{ $registration->metode_pembayaran }}</p>
                    </div>
                    @if ($registration->daftar_ulang && $registration->surat_cuti)
                        <div class="mb-3">
                            <p class="text-dark"><b>Surat Cuti</b></p>
                            <a href="{{ Storage::url($registration->surat_cuti) }}" target="_blank">
                                Lihat Surat Cuti
                                <iconify-icon icon="solar:arrow-right-up-broken"></iconify-icon>
                            </a>
                        </div>
                    @endif
                    @if ($registration->bukti_pembayaran)
                        <div>
                            <p class="text-dark"><b>Bukti Pembayaran</b></p>
                            <img src="{{ Storage::url($registration->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                                class="img-fluid rounded" style="max-width: 100%; height: auto;"
                                onerror="this.onerror=null; this.src='/assets/images/no-image.png'">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td class="text-dark pb-3"><b>Nama Siswa</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->nama_lengkap }}
                                ({{ $registration->siswa->nama_panggilan }})
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Jenis Kelamin</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->jenis_kelamin }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Tempat, Tanggal Lahir</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->tempat_lahir }},
                                {{ $registration->siswa->tanggal_lahir->isoFormat('DD MMM YYYY') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Nama Orang Tua</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->nama_orang_tua }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Kelas</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->kelas }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Sekolah</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->sekolah }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>No. WhatsApp</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->no_wa }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Email</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->email }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark pb-3"><b>Alamat</b></td>
                            <td class="pb-3">
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-dark"><b>Status Siswa</b></td>
                            <td>
                                <span class="text-dark fw-bold">:</span>
                                {{ $registration->siswa->status }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if ($registration->jadwal->isNotEmpty())
                <div class="card mb-0">
                    <div class="card-body">
                        <h6 class="card-title mb-4 fs-4">{{ $registration->jadwal->first()->hari }}</h6>
                        <ol class="list-group">
                            @foreach ($registration->jadwal as $jadwal)
                                <li class="list-group-item m-0">{{ $jadwal->jam }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
            @if (isset($schedules) && $schedules->jadwal->isNotEmpty())
                <div class="card mb-0">
                    <div class="card-body">
                        <h6 class="card-title mb-4 fs-4">{{ $schedules->jadwal->first()->hari }}</h6>
                        <ol class="list-group">
                            @foreach ($schedules->jadwal as $jadwal)
                                <li class="list-group-item m-0">{{ $jadwal->jam }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
