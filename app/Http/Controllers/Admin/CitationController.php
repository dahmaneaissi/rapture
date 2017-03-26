<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Citation;
use Illuminate\Http\Request;
use App\Http\Requests\editCitationRequest;

class CitationController extends Controller {

    public function getIndex()
    {
        $data = array();
        $data['citations'] = Citation::all();
        return view('admin/citations/liste')->with( $data );
    }

    public function getCreate()
    {
        $data = array();
        $data['title'] = 'Ajouter une citation';
        $data['citation'] = new Citation();

        return view('admin/citations/form')->with( $data );
    }

    public function postSave( editCitationRequest $reqesut )
    {
        $citation = new Citation();
        $citation->name = $reqesut->name;
        $citation->desc = $reqesut->desc;
        $citation->save();

        return redirect(route('citations'))->with(
            array(
                'message' => 'La citation a bien été enregistrer.',
                'class' => 'success'
            )
        );
    }

    public function getEdit( $id )
    {
        $data['citation'] = Citation::find( $id );

        if( is_null( $data['citation'] ) )
        {
            abort('404');
        }

        $data['title'] = 'Editer une citation';
        return view('admin/citations/form')->with( $data );
    }

    public function putUpdate( $id , editCitationRequest $reqesut )
    {
        $citation = Citation::find( $id );

        if( is_null( $citation ) )
        {
            abort('404');
        }

        $citation->update( $reqesut->all() );

        return redirect( route('citations') );
    }

    public function getDestroy( $id )
    {
        Citation::destroy( $id );
        return redirect( route('citations') );
    }
}
