<?php

namespace App\Http\Requests\Backend\Access\Roles;

use App\Http\Requests\Request;

class RoleRequest extends Request
{
    /**
     * @return array
     */
    public function all()
    {
        $data = parent::all();
        $slug = isset( $data['slug'] ) && $data['slug'] ? $data['slug']  : ( isset( $data['title']  ) ? $data['title']  : '' );
        $data['slug'] = str_slug( $slug , '.' );
        return $data;
    }
}