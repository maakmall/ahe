<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
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
        Route::post('pendaftaran', 'store')->name('registration.store');
        Route::put('pendaftaran/{pendaftaran}', 'update')->name('registration.update');
        Route::delete('pendaftaran/{pendaftaran}', 'destroy')->name('registration.destroy');
        Route::get('pendaftaran/{pendaftaran}/edit', 'edit')->name('registration.edit');
        Route::put('pendaftaran/{pendaftaran}/terima', 'approve')->name('registration.approve');
        Route::put('pendaftaran/{pendaftaran}/tolak', 'reject')->name('registration.reject');
        Route::post('pendaftaran/{pendaftaran}/email', 'sendEmail')->name('registration.email');
        
        Route::get('pendaftaran-ulang', 'reregister')->name('reregistration');
        Route::get('pendaftaran-ulang/tambah', 'create')->name('reregistration.create');
        Route::get('pendaftaran-ulang/{pendaftaran}', 'show')->name('reregistration.show');
        Route::post('pendaftaran-ulang', 'doReregister')->name('reregistration.store');
    });
});
