<?php

namespace Dman\Traits;

use Illuminate\Http\Request;

trait SorttabeleTrait{

    protected $orderBy;

    protected $sort;

    protected function getParams( Request $request )
    {
        $this->orderBy  = $request->get('sortBy');
        $this->sort     = $request->get('sort');
    }

    protected function getSortRequestParams( Request $request )
    {
        $this->getParams( $request );
        $sortBy = $this->orderBy;
        $sort   = $this->sort;
        return compact( 'sortBy' , 'sort');
    }

}