<?php

namespace App\Providers;

use App\Domain\AccountRepositoryInterface;
use App\Infrastructure\JsonFileAccountRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AccountRepositoryInterface::class, JsonFileAccountRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
