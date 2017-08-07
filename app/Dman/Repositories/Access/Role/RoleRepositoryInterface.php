<?php

namespace Dman\Repositories\Access\Role;

interface RoleRepositoryInterface {
    /**
     * @param $id
     * @return mixed
     */
    public function getRoleWithPermisions($id );
}