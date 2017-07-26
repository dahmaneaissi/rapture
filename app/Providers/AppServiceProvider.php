<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dman\Repositories\Entity\EntityRepository;
use Dman\Contracts\EntityRepositoryInterface;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;
use Dman\Repositories\Access\Role\RoleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EntityRepositoryInterface::class,
            EntityRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
    }
}
