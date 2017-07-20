<?php
namespace Dman\Repositories;

use Dman\Contracts\CrudableInterface;
use Dman\Contracts\EntityRepositoryInterface;

use App\Models\Entity;

/**
 * Class EntityRepository
 * @package App\Dman\Repositories
 */
class EntityRepository extends BaseRepository implements EntityRepositoryInterface , CrudableInterface {

    /**
     * @var Entity
     */
    protected $model;


    /**
     * EntityRepository constructor.
     * @param Entity $entity
     */
    function __construct(Entity $entity )
    {
        $this->model = $entity;
    }

    /**
     * @param $q
     * @return mixed
     */
    public function search( $q )
    {
        return $this->model->where( 'firstname' ,'LIKE', '%'.$q.'%')
            ->orWhere( 'lastname' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'facebook' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'twitter' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'instagram' ,'LIKE', '%'.$q.'%' )
            ->orderBy( 'created_at', 'DESC' )->paginate( 10 );
    }

}