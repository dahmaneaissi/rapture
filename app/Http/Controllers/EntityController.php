<?php

namespace App\Http\Controllers;

use Dman\Traits\SorttabeleTrait;

use Dman\Contracts\EntityRepositoryInterface;

use App\Http\Requests\createEntityRequest;
use App\Http\Requests\updateEntityRequest;
use Illuminate\View\View;

use Illuminate\Http\Request;


class EntityController extends Controller
{
    use SorttabeleTRait;

    /**
     * @var $entity
     */
    protected $repo;

    /**
     * EntityController constructor.
     * @param EntityRepositoryInterface $entity
     */
    public function __construct( EntityRepositoryInterface $repo , Request $request )
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->repo     = $repo;
        $this->request  = $request;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $params         = $this->getSortRequestParams( $this->request );
        $data['items']  = $this->repo->getAll( $params );
        return view('admin.entities.list')->with( $data );
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return view('admin.entities.form');
    }


    /**
     * @param createEntityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSave(createEntityRequest $request )
    {
        $this->repo->store( $request->all() );
        return redirect( route('entities.list'))->with(
            array(
                'message'   => 'l\'entité a bien été enregistrer.',
                'class'     => 'success'
            )
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit( $id )
    {
        $data['entity'] = $this->repo->findById( $id );
        return view('admin/entities/form')->with( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function putUpdate( $id , updateEntityRequest $request )
    {
        $this->repo->update( $id ,  $request->all() );

        return redirect( route('entities.list'))->with(
            array(
                'message' => 'L\'entité a bien été Mit à jour.',
                'class' => 'success'
            )
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDestroy( $id )
    {
        $this->repo->delete( $id );
        return redirect( route('entities.list'))->with(
            array(
                'message' => 'L\'entité a bien été supprimer.',
                'class' => 'success'
            )
        );
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getSearch()
    {
        $q = $this->request->get('q');
        $data['items'] = $this->repo->search( $q );
        return view('admin.entities.list')->with( $data );
    }

}
