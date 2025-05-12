@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card text-white bg-primary" style="min-height: 229px;">
                <div class="card-body">
                    <span class="badge bg-dark d-inline-flex align-items-center gap-2 fs-3">
                        <iconify-icon icon="solar:bell-bing-broken" class="fs-5"></iconify-icon>
                        <span class="fw-normal">
                            Selamat Datang
                        </span>
                    </span>
                    <h4 class="text-white fw-normal mt-5 pt-7 mb-1">
                        Hai,
                        <span class="fw-bolder">{{ auth()->user()->nama }}</span>
                    </h4>
                    <h6 class="opacity-75 fw-normal text-white mb-0">
                        {{ $quote }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-none" style="min-height: 229px;">
                <div class="card-body px-4">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div>
                            <span class="text-dark-light fw-semibold">Siswa</span>
                            <div class="hstack gap-2">
                                <h5 class="card-title fw-semibold mb-0 fs-8">{{ $student }}</h5>
                                <span class="fs-11 text-dark-light fw-semibold">Orang</span>
                            </div>
                        </div>
                        <span class="round-48 d-flex align-items-center justify-content-center bg-dark rounded">
                            <iconify-icon icon="solar:pie-chart-3-line-duotone" class="text-white fs-6"></iconify-icon>
                        </span>
                    </div>
                    <div class="row pt-9">
                        <div class="col-6">
                            <span class="opacity-75">Aktif</span>
                            <h4 class="mb-0 mt-1 text-nowrap fs-13 fw-bolder">
                                {{ $activeStudent }}
                            </h4>
                        </div>
                        <div class="col-6 border-start border-light" style="--bs-border-opacity: .15;">
                            <span class="opacity-75">Non Aktif</span>
                            <h4 class="mb-0 mt-1 text-nowrap fs-13 fw-bolder">
                                {{ $inactiveStudent }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
