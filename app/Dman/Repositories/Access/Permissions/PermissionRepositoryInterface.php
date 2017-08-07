<?php
namespace Dman\Repositories\Access\Permissions;

interface PermissionRepositoryInterface{
    public function getAll( array $params );
    function getAvailablePermissions();
}