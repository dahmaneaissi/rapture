<?php

namespace App\Http\Controllers;

use App\Dman\Contracts\EntityRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\createEntityRequest;
use App\Http\Requests\updateEntityRequest;


class EntityController extends Controller
{

    /**
     * @var $entity
     */
    protected $entity;

    /**
     * EntityController constructor.
     * @param EntityRepositoryInterface $entity
     */
    public function __construct( EntityRepositoryInterface $entity )
    {
        $this->middleware('auth');
        $this->middleware('permissions');
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $data['items'] = $this->entity->getAll();
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
        $this->entity->store( $request->all() );
        return redirect( route('entities.list'))->with(
            array(
                'message' => 'l\'entité a bien été enregistrer.',
                'class' => 'success'
            )
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit( $id )
    {
        $data['entity'] = $this->entity->findById( $id );
        return view('admin/entities/form')->with( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function putUpdate( $id , updateEntityRequest $request )
    {
        $this->entity->update( $id ,  $request->all() );

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
        $this->entity->delete( $id );
        return redirect( route('entities.list'))->with(
            array(
                'message' => 'L\'entité a bien été supprimer.',
                'class' => 'success'
            )
        );
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getSearch( Request $request )
    {
        $q = $request->input('q');
        $data['items'] = Entity::searchAll( $q )->paginate( Entity::$limit );
        return view('admin.entities.list')->with( $data );
    }


}
