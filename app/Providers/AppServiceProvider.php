<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryImple;
use App\Repository\UserData\UserDataRepository;
use App\Repository\UserData\UserDataRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserDataRepositoryInterface::class, UserDataRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
