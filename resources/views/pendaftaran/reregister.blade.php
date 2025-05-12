@extends('layouts.main')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0 fw-semibold">Pendaftaran Ulang</h5>
            <a href="{{  }}" class="btn btn-primary">Daftar Ulang</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive" data-simplebar>
                @if ($registrations->isEmpty())
                    <p class="text-center mb-0">Tidak ada data pendaftaran ulang</p>
                @else
                    <table class="table text-nowrap align-middle table-custom mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark fw-normal ps-0">Siswa</th>
                                <th scope="col" class="text-dark fw-normal">No. WhatsApp</th>
                                <th scope="col" class="text-dark fw-normal">Status</th>
                                <th scope="col" class="text-dark fw-normal">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td class="ps-0">
                                        <div class="d-flex align-items-center gap-6">
                                            <div>
                                                <h6 class="mb-0">
                                                    {{ $registration->siswa->nama_lengkap }}
                                                    ({{ $registration->siswa->nama_panggilan }})
                                                </h6>
                                                <span>
                                                    Kelas
                                                    {{ $registration->siswa->kelas }}
                                                    {{ $registration->siswa->sekolah }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ $registration->siswa->no_wa }}</span>
                                    </td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <a href="{{ route('reregistration.show', ['pendaftaran' => $registration]) }}"
                                            class="btn btn-dark">Lihat</s>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endSection
