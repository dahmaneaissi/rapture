<?php
namespace Dman\Repositories\User;

use App\User;
use Dman\Contracts\CrudableInterface;
use Dman\Repositories\BaseRepository;

Class UserRepository extends BaseRepository implements UserRepositoryInterface, CrudableInterface {

    protected $role;

    function __construct( User $model )
    {
        parent::__construct( $model );
    }

    public function store( array  $data)
    {
        $this->model->firstname = $data['firstname'];
        $this->model->lastname  = $data['lastname'];
        $this->model->email     = $data['email'];
        $this->model->password  = bcrypt( $data['password'] );
        $this->model->save();
        $this->model->roles()->attach( $data['roles'] );
    }

    public function update( $id , array $data )
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
        return $this->model;
    }
}