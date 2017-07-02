<?php
namespace App\Dman\Repositories;

use App\Dman\Contracts\CrudableInterface;
use App\Dman\Contracts\EntityRepositoryInterface;

use App\Models\Entity;

/**
 * Class EntityRepository
 * @package App\Dman\Repositories
 */
class EntityRepository extends BaseRepository implements EntityRepositoryInterface , CrudableInterface {

    /**
     * @var Entity
     */
    private $model;


    /**
     * EntityRepository constructor.
     * @param Entity $entity
     */
    public function __construct(Entity $entity )
    {
        $this->model = $entity;
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