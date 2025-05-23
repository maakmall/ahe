<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendaftaranUlangController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', fn(): View => view('welcome'));

Route::controller(AuthenticationController::class)
    ->middleware('guest')
    ->group(function (): void {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'login')->name('auth');
        Route::get('logout', 'logout')
            ->name('logout')
            ->withoutMiddleware('guest')
            ->middleware('auth');
    });

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'saveProfile')->name('profile.update');
    });

    Route::controller(PendaftaranController::class)->group(function () {
        Route::get('pendaftaran', 'index')->name('registration');
        Route::get('pendaftaran/tambah', 'create')->name('registration.create');
        Route::get('pendaftaran/{pendaftaran}', 'show')->name('registration.show');
        Route::post('pendaftaran', 'store')->name('registration.store')->withoutMiddleware('auth');
        Route::put('pendaftaran/{pendaftaran}', 'update')->name('registration.update');
        Route::delete('pendaftaran/{pendaftaran}', 'destroy')->name('registration.destroy');
        Route::get('pendaftaran/{pendaftaran}/edit', 'edit')->name('registration.edit');
        Route::put('pendaftaran/{pendaftaran}/terima', 'approve')->name('registration.approve');
        Route::put('pendaftaran/{pendaftaran}/tolak', 'reject')->name('registration.reject');
        Route::post('pendaftaran/{pendaftaran}/email', 'sendEmail')->name('registration.email');
    });

    Route::controller(PendaftaranUlangController::class)->group(function () {    
        Route::get('pendaftaran-ulang', 'index')->name('reregistration');
        Route::get('pendaftaran-ulang/tambah', 'create')->name('reregistration.create');
        Route::get('pendaftaran-ulang/{pendaftaran}', 'show')->name('reregistration.show');
        Route::get('pendaftaran-ulang/{pendaftaran}/edit', 'edit')->name('reregistration.edit');
        Route::put('pendaftaran-ulang/{pendaftaran}', 'update')->name('reregistration.update');
        Route::post('pendaftaran-ulang', 'store')->name('reregistration.store')->withoutMiddleware('auth');
        Route::delete('pendaftaran-ulang/{pendaftaran}', 'destroy')->name('reregistration.destroy');
    });

    Route::controller(CutiController::class)->group(function () {    
        Route::get('cuti', 'index')->name('leave');
        Route::get('cuti/tambah', 'create')->name('leave.create');
        Route::get('cuti/{cuti}', 'show')->name('leave.show');
        Route::delete('cuti/{cuti}', 'destroy')->name('leave.destroy');
        Route::post('cuti', 'store')->name('leave.store')->withoutMiddleware('auth');
        Route::get('cuti/{cuti}/edit', 'edit')->name('leave.edit');
        Route::put('cuti/{cuti}', 'update')->name('leave.update');
        Route::put('cuti/{cuti}/terima', 'approve')->name('leave.approve');
        Route::put('cuti/{cuti}/tolak', 'reject')->name('leave.reject');
        Route::get('cuti/{cuti}/surat-cuti', 'letter')->name('leave.letter');
        Route::post('cuti/{cuti}/email', 'sendEmail')->name('leave.email');
    });
});

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/form-pendaftaran', 'register')->name('home.register');
    Route::get('/form-pendaftaran-ulang', 'reregister')->name('home.reregister');
    Route::get('/pengajuan-cuti', 'leave')->name('home.leave');
    Route::get('/siswa/{id}', 'getStudent');
    Route::get('/ajax/siswa-search', 'searchStudent');
    Route::get('/jadwal', 'schedule')->name('home.schedule');
});
