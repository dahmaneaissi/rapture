<?php

namespace Dman\Models\Navigation;

use Dman\Models\BaseModel;


/**
 * Class Role
 * @package App\Models\Access
 */
class Menu extends BaseModel
{

    protected $items = [
        [
            'title'     => 'Dashbord',
            'routeName' => 'dashbord.index',
            'icon'      => 'fa fa-dashboard',
        ],
        [
            'title'     => 'Entités',
            'routeName' => 'entities.index',
            'icon'      => 'fa fa-male',
        ],
        [
            'title'     => 'User',
            'routeName' => 'users.list',
            'icon'      => 'fa fa-users',
        ],
        [
            'title'     => 'Roles',
            'routeName' => 'roles.index',
            'icon'      => 'fa fa-graduation-cap',
        ],
    ];

    public function getItems()
    {
        return $this->items;
    }
}
