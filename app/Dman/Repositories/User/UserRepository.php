<?php
namespace Dman\Repositories\User;

use App\User;
use Dman\Contracts\CrudableInterface;
use Dman\Repositories\BaseRepository;

Class UserRepository extends BaseRepository implements UserRepositoryInterface, CrudableInterface {

    function __construct( User $model )
    {
        parent::__construct ( $model );
    }

    public function store( array  $data)
    {
        $this->model->firstname = $data['firstname'];
        $this->model->lastname  = $data['lastname'];
        $this->model->email     = $data['email'];
        $this->model->password  = bcrypt( $data['password'] );
        $this->model->save();
    }

}