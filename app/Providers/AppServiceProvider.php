<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dman\Repositories\Entity\EntityRepository;
use Dman\Contracts\EntityRepositoryInterface;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;
use Dman\Repositories\Access\Role\RoleRepository;

use App\Http\ViewComposers\Backend\MenuComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            '*', MenuComposer::class
        );

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
