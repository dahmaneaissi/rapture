<?php

namespace App\Http\Controllers\Admin\Access;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Dman\Repositories\Access\RoleRepositoryInterface;

class RoleController extends Controller
{

    /**
     * @var RoleRepositoryInterface
     */
    protected $repository;

    /**
     * @var Request
     */
    protected $request;

    public function __construct( RoleRepositoryInterface $roleRepository , Request $request )
    {
        $this->repository   = $roleRepository;
        $this->request      = $request;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $items = $this->repository->getAll( $this->request->all() );
        return view('admin.access.roles.list', compact( 'items' ) );
    }

}
