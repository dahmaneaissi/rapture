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

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActived( $query )
    {
        return $query->where('active', '=' , 1 );
    }

    /**
     * @param $query
     * @param $q
     * @return mixed
     */
    public function scopeSearchAll( $query , $q )
    {
        return $query->where( 'firstname' ,'LIKE', '%'.$q.'%')
            ->orWhere( 'lastname' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'facebook' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'twitter' ,'LIKE', '%'.$q.'%' )
            ->orWhere( 'instagram' ,'LIKE', '%'.$q.'%' )
            ->orderBy( 'created_at', 'DESC' );
    }

}
