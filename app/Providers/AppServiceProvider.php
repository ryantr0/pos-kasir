<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File; // Tambahkan ini
use Carbon\Carbon;

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
        // 1. Atur bahasa Indonesia & Waktu
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        // 2. PAKSA HTTPS (Biar aset CSS/JS/Gambar gak blokir di Railway)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // 3. JEMBATAN FOTO OTOMATIS (Storage Link)
        // Kode ini bakal otomatis bikin 'public/storage' kalau belum ada di server
        if (!file_exists(public_path('storage'))) {
            try {
                $this->app->make('files')->link(
                    storage_path('app/public'), 
                    public_path('storage')
                );
            } catch (\Exception $e) {
                // Kalau gagal, sistem gak bakal crash, cuma log aja
                logger("Gagal membuat storage:link otomatis: " . $e->getMessage());
            }
        }
    }
}