@extends('layouts.main')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0 fw-semibold">Cuti</h5>
            <a href="{{ route('leave.create') }}" class="btn btn-primary">
                Ajukan Cuti
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive" data-simplebar>
                @if ($leaves->isEmpty())
                    <p class="text-center mb-0">Tidak ada data cuti</p>
                @else
                    <table class="table text-nowrap align-middle table-custom mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark fw-normal ps-0">Siswa</th>
                                <th scope="col" class="text-dark fw-normal text-center">Tanggal</th>
                                <th scope="col" class="text-dark fw-normal text-center">Status</th>
                                <th scope="col" class="text-dark fw-normal text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td class="ps-0">
                                        <div class="d-flex align-items-center gap-6">
                                            <div>
                                                <h6 class="mb-0">
                                                    {{ $leave->siswa->nama_lengkap }}
                                                    ({{ $leave->siswa->nama_panggilan }})
                                                </h6>
                                                <span>
                                                    Kelas
                                                    {{ $leave->siswa->kelas }}
                                                    {{ $leave->siswa->sekolah }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <span>
                                            {{ $leave->mulai_tanggal->isoFormat('D MMM YYYY') }}
                                            -
                                            {{ $leave->sampai_tanggal->isoFormat('D MMM YYYY') }}
                                        </span>
                                    </td>
                                    <td align="center">
                                        @php
                                            $color = match ($leave->status) {
                                                'Pending' => 'info',
                                                'Disetujui' => 'success',
                                                'Ditolak' => 'danger',
                                                default => 'dark',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $color }}-subtle text-{{ $color }}">
                                            {{ $leave->status }}
                                        </span>
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('leave.show', ['cuti' => $leave]) }}" class="btn btn-dark">
                                            Lihat
                                        </a>
                                        <a href="{{ route('leave.edit', ['cuti' => $leave]) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('leave.destroy', ['cuti' => $leave]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger has-confirmation">
                                                Hapus
                                            </button>
                                        </form>
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
