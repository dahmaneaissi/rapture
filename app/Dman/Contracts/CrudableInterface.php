<?php

namespace Dman\Contracts;

/**
 * Interface Crudable
 */
interface CrudableInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function findById( $id );

    /**
     * @param array $data
     * @return mixed
     */
    public function store( array $data );

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update( $id , array $data );

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}