<?php

namespace App\Http\Controllers;

use App\Models\Entity;

use App\Http\Requests\createEntityRequest;
use App\Http\Requests\updateEntityRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EntityController extends Controller
{

    protected $limit = 10;

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $data['title'] = 'Entities';
        $data['items'] = Entity::orderBy( 'created_at', 'DESC' )->paginate( $this->limit );
        return view('admin.entities.list')->with( $data );
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        $data['title'] = 'Nouvelle entité';
        $data['entity'] = new Entity();

        return view('admin.entities.form')->with( $data );
    }

    /**
     * @param createEntityRequest $request
     */
    public function postSave( createEntityRequest $request )
    {
        $entity = new Entity();
        $entity->firstname  = $request->firstname;
        $entity->lastname   = $request->lastname;
        $entity->facebook   = $request->facebook;
        $entity->twitter    = $request->twitter;
        $entity->instagram  = $request->instagram;
        $entity->active     = $request->active;
        $entity->save();

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
        $data['entity'] = Entity::find( $id );

        if( is_null( $data['entity'] ) )
        {
            abort('404');
        }

        $data['title'] = 'Editer une entité';
        return view('admin/entities/form')->with( $data );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function putUpdate( $id , updateEntityRequest $request )
    {
        $entity = Entity::find( $id );

        if( is_null( $entity ) )
        {
            abort('404');
        }

        $entity->firstname  = $request->firstname;
        $entity->lastname   = $request->lastname;
        $entity->facebook   = $request->facebook;
        $entity->twitter    = $request->twitter;
        $entity->instagram  = $request->instagram;
        $entity->active     = $request->active;
        $entity->update();

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
        $entity = Entity::find( $id );

        if( is_null( $entity ) )
        {
            abort('404');
        }

        $entity->delete();
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
        $data['title'] = 'Recherche';
        $data['items'] = Entity::searchAll( $q )->paginate( $this->limit );
        return view('admin.entities.list')->with( $data );
    }


}
