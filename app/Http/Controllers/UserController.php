<?php namespace App\Http\Controllers;

use App\Http\Requests\Backend\User\createUserRequest;
use App\Http\Requests\Backend\User\updateUserRequest;

use Dman\Repositories\Access\Role\RoleRepositoryInterface;
use Dman\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller {

    /**
     * @var $repository
     */
    protected $repository;
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var RoleRepositoryInterface
     */
    protected $roleRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $repository
     * @param RoleRepositoryInterface $roleRepository
     * @p $this->middleware('auth');
        $this->middleware('acl', ['except' => ['getLogout'] ] );aram Request $request
     */
    public function __construct(UserRepositoryInterface $repository , RoleRepositoryInterface $roleRepository , Request $request )
    {
        $this->middleware('auth');
        $this->middleware('acl', ['except' => ['getLogout'] ] );

        $this->repository       = $repository;
        $this->roleRepository   = $roleRepository;
        $this->request          = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $items = $this->repository->getUsersWithRoles( $this->request->all() );
        return view('admin/users/list' , compact( 'items' ));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        $roles = $this->roleRepository->allList();
        return view('admin/users/form' , compact('roles') );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit( $id )
    {
        $item   = $this->repository->findById( $id );
        $roles  = $this->roleRepository->allList();
        return view('admin.users.form' , compact('item' , 'roles' ) );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDestroy( $id )
    {
        $this->repository->delete( $id );
        return redirect( route('users.index'))->with(
            array(
                'message'   => trans('users.backend.success.delete'),
                'class'     => 'success'
            )
        );
    }

    /**
     * @param createUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSave( createUserRequest $request )
    {
        $this->repository->store( $request->all() );
        return redirect( route('users.index'))->with(
            [
                'message'   => trans('users.backend.success.save'),
                'class'     => 'success'
            ]
        );
    }

    /**
     * @param updateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function putUpdate( $id , updateUserRequest $request )
    {
        $this->repository->update( $id ,  $request->all() );
        return redirect( route('users.index'))->with(
            array(
                'message'   => trans('users.backend.success.update'),
                'class'     => 'success'
            )
        );
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        auth()->logout();
        $this->request->session()->flush();
        return redirect()->guest('/');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSearch()
    {
        $q      = $this->request->get('q');
        $items  = $this->repository->search( $q );
        return view('admin.users.list' , compact( "items" ) );
    }

}
