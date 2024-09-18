<?php

namespace App\Providers;

use App\Interfaces\IContactRepository;
use App\Interfaces\IContactService;
use App\Repository\ContactRepository;
use App\Services\ContactService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IContactService::class, ContactService::class);
        $this->app->singleton(IContactRepository::class, ContactRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
