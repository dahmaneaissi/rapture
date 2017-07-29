<?php

namespace Dman\Repositories\Access\Permissions;

use Dman\Contracts\CrudableInterface;
use Dman\Models\Access\Permission;
use Dman\Repositories\BaseRepository;
use Illuminate\Routing\Router;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface , CrudableInterface {

    /**
     * PermissionRepositoru constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAvailablePermissions()
    {
        $permissions    = $this->model->get(['slug'])->pluck('slug');
        $allPermission  = $this->getRoutesNames('backend');
        return $allPermission->diff( $permissions );
    }


    /**
     * @param string $group
     * @return array|\Illuminate\Support\Collection
     */
    private function getRoutesNames($group = 'backend')
    {
        if( !$group )
        {
            return [];
        }

        $routes = app(Router::class)->getRoutes();

        $allRoutesNames = [];

        foreach ($routes as  $route)
        {
            $prefix = $route->getPrefix();

            if( str_contains($prefix , $group ) )
            {
                $routeName = $route->getName();
                if( !is_null( $routeName ) )
                {
                    $allRoutesNames[] = $routeName;
                }
            }

        }

        return collect($allRoutesNames);
    }


}