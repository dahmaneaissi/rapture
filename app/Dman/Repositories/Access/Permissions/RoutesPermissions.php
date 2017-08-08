<?php
namespace Dman\Repositories\Access\Permissions;
use Illuminate\Routing\Router;
use Dman\Models\Access\Permission;

class RoutesPermissions implements PermissionSourceInterface{

    protected $permission;

    protected $router;

    public function __construct( Router $router , Permission $permission )
    {
        $this->router       = $router;
        $this->permission   = $permission;
    }

    /**
     * @param string $group
     * @return array
     */
    private function getRoutesNames( $group = 'backend')
    {
        if( !$group )
        {
            return [];
        }

        $routes = $this->router->getRoutes();

        $allRoutesNames = [];

        foreach ( $routes as  $route)
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

        return $allRoutesNames;
    }

    /**
     * @param $group
     * @return array
     */
    public function getAvailablePermissions( $group )
    {
        $allPermission      = $this->getRoutesNames( $group );
        $storedPermissions  = $this->getStoredPermissions();
        return array_diff( $allPermission  , $storedPermissions );
    }

    /**
     * @return mixed
     */
    private function getStoredPermissions()
    {
        return $this->permission->get(['slug'])->pluck('slug')->toArray();
    }

}