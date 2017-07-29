<?php

namespace App\Http\Controllers\Admin\Access;

use Dman\Repositories\Access\Permissions\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Roles\createRoleRequest;
use App\Http\Requests\Backend\Access\Roles\updateRoleRequest;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;

class PermissionController extends Controller
{

    /**
     * @var RoleRepositoryInterface
     */
    protected $repository;

    /**
     * @var Request
     */
    protected $request;

    public function __construct( PermissionRepositoryInterface $permissionRepository , Request $request )
    {
        $this->repository   = $permissionRepository;
        $this->request      = $request;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $items = $this->repository->getAll( $this->request->all() );
        return view('admin.access.permissions.list', compact( 'items' ) );
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        $availablePermissions = $this->repository->getAvailablePermissions();
        return view('admin.access.permissions.form' , compact('availablePermissions') );
    }

    /**
     * @param createRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSave(createRoleRequest $request )
    {
        $this->repository->store( $request->all() );
        return redirect( route('permissions.index'))->with(
            [
                'message'   => trans('permissions.backend.success.save'),
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
        $data['item'] = $this->repository->findById( $id );
        $data['item'] = $this->repository->getRoutes();
        return view('admin.access.permissions.form')->with( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function putUpdate( $id , updateRoleRequest $request )
    {
        $this->repository->update( $id ,  $request->all() );

        return redirect( route('permissions.index'))->with(
            array(
                'message'   => trans('permissions.backend.success.update'),
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
        return redirect( route('permissions.index'))->with(
            array(
                'message'   => trans('permissions.backend.success.delete'),
                'class'     => 'success'
            )
        );
    }
}
