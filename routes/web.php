<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
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

Route::controller(DashboardController::class)
    ->middleware('auth')
    ->group(function (): void {
        Route::get('dashboard', 'index')->name('dashboard');
    });