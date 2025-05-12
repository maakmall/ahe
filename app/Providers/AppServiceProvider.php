<?php

namespace App\Providers;

use App\Models\Pendaftaran;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $registrations = Pendaftaran::select('daftar_ulang', 'status')->pending()->get();

        View::share(
            'registrationCount',
            $registrations->where('daftar_ulang', false)->count()
        );
        
        View::share(
            'reregistrationCount',
            $registrations->where('daftar_ulang', true)->count()
        );
    }
}
