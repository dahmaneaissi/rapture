<?php

namespace App\Http\Controllers\Admin\Access;

use Dman\Repositories\Access\Permissions\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Roles\createRoleRequest;
use App\Http\Requests\Backend\Access\Roles\updateRoleRequest;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin\Access
 */
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

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    public function __construct( RoleRepositoryInterface $roleRepository , PermissionRepository $permissionRepository , Request $request )
    {
        $this->repository               = $roleRepository;
        $this->permissionRepository     = $permissionRepository;
        $this->request                  = $request;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $items = $this->repository->getAll( $this->request->all() );
        return view('admin.access.roles.list', compact( 'items' ) );
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return view('admin.access.roles.form');
    }

    /**
     * @param createRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSave(createRoleRequest $request )
    {
        $this->repository->store( $request->all() );
        return redirect( route('roles.index'))->with(
            [
                'message'   => trans('roles.backend.success.save'),
                'class'     => 'success'
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit( $id )
    {
        $item = $this->repository->findById( $id );
        $permissions = $this->permissionRepository->allList();
        return view('admin.access.roles.form' , compact( 'item') ) ;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function putUpdate( $id , updateRoleRequest $request )
    {
        $this->repository->update( $id ,  $request->all() );

        return redirect( route('roles.index'))->with(
            array(
                'message'   => trans('roles.backend.success.update'),
                'class'     => 'success'
            )
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDestroy( $id )
    {
        $this->repository->delete( $id );
        return redirect( route('roles.index'))->with(
            array(
                'message'   => trans('roles.backend.success.delete'),
                'class'     => 'success'
            )
        );
    }
}
