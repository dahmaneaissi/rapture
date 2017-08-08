<?php
namespace Dman\Repositories\Access\Permissions;

interface PermissionSourceInterface{

    /**
     * @param $group
     * @return array
     */
    public function getAvailablePermissions( $group );
}