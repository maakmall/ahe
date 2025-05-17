@extends('layouts.front')

@section('content')
    <!-- Page Header End -->
    <div class="container-xxl py-5 page-header position-relative mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white animated slideInDown mb-4">Jadwal</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Jadwal Bimbingan Belajar</h1>
            </div>
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <h3 class="text-center mb-4">Senin Rabu Jumat</h3>
                            <div class="table-responsive mb-5">
                                <table class="table table-bordered">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            @foreach ($srj->keys() as $jam)
                                                <th>{{ $jam }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="text-start align-top">
                                        <tr>
                                            @foreach ($srj as $list)
                                                <td>
                                                    @foreach ($list as $jadwal)
                                                        @foreach ($jadwal->pendaftaranJadwal as $pj)
                                                            @if ($pj->pendaftaran && $pj->pendaftaran->siswa && $pj->pendaftaran->siswa->status === 'Aktif')
                                                                {{ $pj->pendaftaran->siswa->nama_panggilan }}<br>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3 class="text-center mb-4">Selasa Kamis Sabtu</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-success text-center">
                                        <tr>
                                            @foreach ($sks->keys() as $jam)
                                                <th>{{ $jam }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="text-start align-top">
                                        <tr>
                                            @foreach ($sks as $list)
                                                <td>
                                                    @foreach ($list as $jadwal)
                                                        @foreach ($jadwal->pendaftaranJadwal as $pj)
                                                            @if ($pj->pendaftaran && $pj->pendaftaran->siswa && $pj->pendaftaran->siswa->status === 'Aktif')
                                                                {{ $pj->pendaftaran->siswa->nama_panggilan }}<br>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
