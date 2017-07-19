<?php

namespace  App\Dman\Repositories;

abstract class BaseRepository {

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->orderBy( 'created_at', 'DESC' )->paginate( 10 );
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
}