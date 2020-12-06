<?php

namespace App\Providers;

use App\Repositories\User\Eloquent\Repository as UserRepository;
use App\Repositories\Contracts\RepositoryInterface as UserRepositoryInterface;
use App\Services\User\Eloquent\CrudService as UserCrudService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton('userCrudService', UserCrudService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
