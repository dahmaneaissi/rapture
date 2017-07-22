<?php

namespace Dman\Traits;

use App\Http\Requests\Request;

trait SorttabeleTRait{

    protected $orderBy;

    protected $sort;

    function __construct( Request $request )
    {
        $this->orderBy  = $request->get('prderBy');
        $this->sort     = $request->get('direction');
    }

    protected function getSortRequestParams()
    {
        dd($this->orderBy);
    }

}