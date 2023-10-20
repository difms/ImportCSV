<?php

namespace App\Providers;

use App\Contracts\iImportCsvContract;
use App\Services\ImportCsvService;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(iImportCsvContract::class, ImportCsvService::class);
    }
}
