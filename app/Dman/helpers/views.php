<?php

if( !function_exists( 'sort_by' ) )
{

    /**
     * @param $column
     * @param $body
     * @return string
     */
    function sort_by( $column , $body )
    {
        $sort       = Request::get('sort') == 'asc' ? 'desc' : 'asc';
        $routeName  = Request::route()->getName();

        return link_to_route( $routeName , $body  , array_merge( array_except( Request::query() ,'page') , ['sortBy' => $column , 'sort' => $sort ] ) ) ;
    }

}
