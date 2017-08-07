<?php
namespace Dman\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getUsersWithRoles();
}