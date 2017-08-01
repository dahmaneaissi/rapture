<?php namespace App\Http\Controllers;

use App\Http\Requests\Backend\User\createUserRequest;
use App\Http\Requests\Backend\User\updateUserRequest;

use Dman\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    /**
     * @var $repository
     */
    protected $repository;
    /**
     * @var Request
     */
    protected $request;

    public function __construct( UserRepositoryInterface $repository , Request $request )
    {
        $this->repository   = $repository;
        $this->request      = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $items = $this->repository->getAll( $this->request->all() );
        return view('admin/users/list' , compact( 'items' ));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return view('admin/users/form');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit( $id )
    {
        $item = $this->repository->findById( $id );
        return view('admin.users.form' , compact('item') );
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
        Auth::logout();
        session()->flush();
        return redirect()->guest('/');
    }

}
