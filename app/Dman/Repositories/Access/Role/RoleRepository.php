<?php

namespace Dman\Repositories\Access\Role;

use Dman\Contracts\CrudableInterface;
use Dman\Repositories\BaseRepository;
use Dman\Models\Access\Role;

Class RoleRepository extends BaseRepository implements RoleRepositoryInterface , CrudableInterface {

    /**
     * RoleRepository constructor.
     * @param Role $model
     */
    function __construct(Role $model)
    {
        parent::__construct ( $model );
    }

    /**
     * @return mixed
     */
    public function allList()
    {
        return $this->model->all()->pluck('title','id')->toArray();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById( $id )
    {
        return $this->model->with('permissions')->findOrFail( $id );
    }

}