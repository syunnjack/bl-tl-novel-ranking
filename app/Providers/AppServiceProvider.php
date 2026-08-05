<?php

namespace App\Providers;

use App\Services\DmmClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(DmmClient::class, fn () => new DmmClient(
            config('services.dmm.api_id'),
            config('services.dmm.affiliate_id'),
        ));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
