<?php

namespace App\Models;

use Dman\Models\BaseModel;

class Entity extends BaseModel
{
    protected $fillable = array(
        'name',
        'lastname',
        'firstname',
        'facebook',
        'twitter',
        'instagram',
        'active'
    );

    protected $datatableColumn = [
        'name',
        'lastname',
        'firstname',
        'facebook',
        'twitter',
        'instagram',
        'active'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActived( $query )
    {
        return $query->where('active', '=' , 1 );
    }

}
