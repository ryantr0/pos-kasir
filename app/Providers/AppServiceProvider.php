<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
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
        // 1. Atur bahasa Indonesia
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // 2. PAKSA HTTPS (Ini obat tampilan berantakan di Railway)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}