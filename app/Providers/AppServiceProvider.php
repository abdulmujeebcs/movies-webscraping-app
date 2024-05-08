<?php

namespace App\Providers;

use App\Interface\ScraperInterface;
use App\Services\ImdbScraperService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ScraperInterface::class, ImdbScraperService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
