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


    /**
     * Ordonner par colonne personnalisé
     *
     * @param $query
     * @param array $params
     * @return mixed
     */
    public function scopeCustomOrder($query , array  $params )
    {
        if( in_array( $params['sortBy']  , $this->datatableColumn ) )
        {
            return $query->orderBy( $params['sortBy'] , $params['direction'] );
        }
    }

    /**
     * Ordonner par défaut
     *
     * @param $query
     * @return mixed
     */
    public function scopeDefaultOrder($query )
    {
        return $query->orderBy( 'created_at' , 'desc' );
    }

}
