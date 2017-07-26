<?php

namespace Dman\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{

    protected $datatableColumn;

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
            return $query->orderBy( $paramskhNPqKrSKdfm['sortBy'] , $params['sort'] );
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