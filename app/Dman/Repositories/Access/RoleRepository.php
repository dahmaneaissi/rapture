<?php

namespace Dman\Repositories\Access;

use Dman\Contracts\CrudableInterface;
use Dman\Repositories\BaseRepository;
use App\Models\Access\Role;

Class RoleRepository extends BaseRepository implements RoleRepositoryInterface , CrudableInterface {

    function __construct(Role $model)
    {
        parent::__construct ($model );
    }

}