<?php
namespace Dman\Repositories\User;

use App\User;
use Dman\Contracts\CrudableInterface;
use Dman\Repositories\BaseRepository;
use App\Events\Access\Roles\RoleUpdated;

Class UserRepository extends BaseRepository implements UserRepositoryInterface, CrudableInterface {

    protected $role;

    function __construct( User $model )
    {
        parent::__construct( $model );
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function getUsersWithRoles(array $params = [] )
    {
        $query = $this->model->with('roles');
        if( $this->isSortable( $params ) )
        {
            $query = $query->customOrder( $params );
        }else{
            $query = $query->defaultOrder();
        }

        return $query->paginate( 10 );
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array  $data)
    {
        $this->model->firstname = $data['firstname'];
        $this->model->lastname  = $data['lastname'];
        $this->model->email     = $data['email'];
        $this->model->password  = bcrypt( $data['password'] );
        $this->model->save();
        $this->model->roles()->attach( $data['roles'] );
        return $this->model;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id , array $data )
    {
        $this->model = $this->model->findOrFail( $id );
        $this->model->firstname = $data['firstname'];
        $this->model->lastname  = $data['lastname'];
        $this->model->email     = $data['email'];
        if( isset( $data['password'] ) )
        {
            $this->model->password = bcrypt( $data['password'] );
        }
        $this->model->update();
        $this->model->roles()->sync( $data['roles'] );
        event(new UserUpdated());
        return $this->model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById( $id )
    {
        return $this->model->with('roles')->findOrFail( $id );
    }
}