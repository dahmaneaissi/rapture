<?php

namespace Dman\Repositories\Access\Role;

use Dman\Contracts\CrudableInterface;
use Dman\Repositories\BaseRepository;
use Dman\Models\Access\Role;
use App\Events\Access\Roles\RoleUpdated;

Class RoleRepository extends BaseRepository implements RoleRepositoryInterface , CrudableInterface {

    /**
     * RoleRepository constructor.
     * @param Role $model
     */
    function __construct(Role $model )
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
    public function getRoleWithPermisions( $id )
    {
        return $this->model->with('permissions')->findOrFail( $id );
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store( array  $data )
    {
        $this->model->title     = $data['title'];
        $this->model->slug      = $data['slug'];
        if( isset( $data['description'] ) )
        {
            $this->model->description = $data['description'];
        }
        $this->model->save();
        $this->model->permissions()->attach( $data['permissions'] );
        return $this->model;
    }

    /**
     * Update Role and
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id , array $data )
    {
        $this->model = $this->model->findOrFail( $id );
        $this->model->title     = $data['title'];
        $this->model->slug      = $data['slug'];
        if( isset( $data['description'] ) )
        {
            $this->model->description = $data['description'];
        }
        $this->model->update();
        $this->model->permissions()->sync( $data['permissions'] );
        event( new RoleUpdated() );
        return $this->model;
    }
}