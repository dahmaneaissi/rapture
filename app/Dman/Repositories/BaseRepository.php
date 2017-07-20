<?php

namespace Dman\Repositories;

use App\Models\Entity;

abstract class BaseRepository {

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll( array $params )
    {
        if( $this->isSortable( $params ) )
        {
            $query = $this->model->customOrder( $params );
        }else{
            $query = $this->model->defaultOrder();
        }

        return $query->paginate( 10 );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById( $id )
    {
        return $this->model->findOrFail( $id );
    }

    /**
     * @param array $data
     * @return static
     */
    public function store(array $data )
    {
        return $this->model->create( $data );
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update( $id , array $data )
    {
        return $this->model->findOrFail( $id )->update( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete( $id )
    {
        return $this->model->findOrFail( $id )->delete();
    }

    /**
     * @param array $params
     * @return bool
     */
    protected function isSortable(array $params)
    {
        return $params['sortBy'] && $params['direction'];
    }

}