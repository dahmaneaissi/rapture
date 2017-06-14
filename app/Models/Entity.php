<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = array(
        'name',
        'lastname',
        'facebook',
        'twitter',
        'instagram',
        'active'
    );

    public function scopeActived( $query )
    {
        return $query->where('active', '=' , 1 );
    }
}
