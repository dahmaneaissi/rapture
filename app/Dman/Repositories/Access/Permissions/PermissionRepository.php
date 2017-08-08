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
     * @return array
     */
    public function getAvailablePermissions()
    {
       return $this->permissionSource->getAvailablePermissions('backend') ;
    }

    /**
     * @return mixed
     */
    public function allList()
    {
        return $this->model->all()->pluck('slug','id')->toArray();
    }

    /**
     * @param $q
     * @return mixed
     */
    public function search( $q )
    {
        return $this->model->where( 'title' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'slug' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'description' ,'LIKE', '%'.$q.'%' )
            ->orderBy( 'created_at', 'DESC' )->paginate( 10 );
    }

}