<?php

namespace App\Providers;

use App\Models\Cuti;
use App\Models\Pendaftaran;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (app()->environment('production')) {
            app()->useStoragePath('/tmp/storage');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            config([
                'filesystems.disks.local.root' => '/tmp/storage/app',
                'view.compiled' => '/tmp/storage/framework/views',
                'cache.stores.file.path' => '/tmp/storage/framework/cache',
            ]);
    
            File::ensureDirectoryExists('/tmp/storage/framework/cache');
            File::ensureDirectoryExists('/tmp/storage/framework/sessions');
            File::ensureDirectoryExists('/tmp/storage/framework/views');
        }

        $registrations = Pendaftaran::select('daftar_ulang', 'status')->pending()->get();

        View::share(
            'registrationCount',
            $registrations->where('daftar_ulang', false)->count()
        );
        
        View::share(
            'reregistrationCount',
            $registrations->where('daftar_ulang', true)->count()
        );

        View::share(
            'leaveCount',
            Cuti::select('status')->pending()->count()
        );
    }
}
