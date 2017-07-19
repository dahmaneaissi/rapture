<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
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

    public static $limit = 10;
    /**
     * @param $query
     * @return mixed
     */
    public function scopeActived( $query )
    {
        return $query->where('active', '=' , 1 );
    }

}
