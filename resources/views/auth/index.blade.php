@extends('layouts.auth')

@section('content')
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-7 col-lg-5 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="/assets/images/logo.png" width="120" alt="logo" />
                        </a>
                        <p class="text-center">Asyiknya Belajar Baca</p>
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password"
                                    required>
                                <div class="invalid-feedback">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
