<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Dman\Repositories\Access\Permissions\PermissionRepository;
use Dman\Repositories\Access\Permissions\PermissionRepositoryInterface;

use Dman\Repositories\User\UserRepositoryInterface;
use Dman\Repositories\User\UserRepository;

use Dman\Repositories\Entity\EntityRepository;
use Dman\Repositories\Entity\EntityRepositoryInterface;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;
use Dman\Repositories\Access\Role\RoleRepository;

use Dman\Repositories\Access\Permissions\RoutesPermissions;
use Dman\Repositories\Access\Permissions\PermissionSourceInterface;

class InterfacesServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
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

        $this->app->bind(
            PermissionSourceInterface::class,
            RoutesPermissions::class
        );

    }
}
