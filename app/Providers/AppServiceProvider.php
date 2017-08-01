<?php

namespace App\Providers;

use Dman\Repositories\Access\Permissions\PermissionRepository;
use Dman\Repositories\Access\Permissions\PermissionRepositoryInterface;

use Dman\Repositories\User\UserRepositoryInterface;
use Dman\Repositories\User\UserRepository;

use Illuminate\Support\ServiceProvider;
use Dman\Repositories\Entity\EntityRepository;
use Dman\Contracts\EntityRepositoryInterface;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;
use Dman\Repositories\Access\Role\RoleRepository;

use App\Http\ViewComposers\Backend\MenuComposer;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Views Composers
         */
        view()->composer(
            'admin.global.main-sidebar', MenuComposer::class
        );

        /**
         * Carbon Setup
         */
        app( Carbon::class )->setLocale( config('app.locale') );

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            EntityRepositoryInterface::class,
            EntityRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );
    }
}
