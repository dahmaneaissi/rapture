<?php

namespace Dman\Repositories\Access\Permissions;

use Dman\Contracts\CrudableInterface;
use Dman\Models\Access\Permission;
use Dman\Repositories\BaseRepository;


/**
 * Class PermissionRepository
 * @package Dman\Repositories\Access\Permissions
 */
class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface , CrudableInterface {

    protected $permissionSource;

    /**
     * PermissionRepository constructor.
     * @param Permission $permission
     * @param PermissionSourceInterface $PermissionSource
     */
    public function __construct( Permission $permission , PermissionSourceInterface  $PermissionSource )
    {
        parent::__construct( $permission );
        $this->permissionSource = $PermissionSource;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAvailablePermissions()
    {
        $permissions    = $this->model->get(['slug'])->pluck('slug');
        $allPermission  = collect( $this->permissionSource->getAvailablePermissions('backend') );
        return $allPermission->diff( $permissions );
    }

    /**
     * @return mixed
     */
    public function allList()
    {
        return $this->model->all()->pluck('slug','id')->toArray();
    }
}