<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Defi;
use App\Models\Admin\Media;

use App\Http\Requests\editDefiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use App\User;
use App\Models\Participation;

class DefiController extends Controller {

    public function __construct()
    {
        $this->middleware('auth.admin' , ['except' => ['getListe','getShow'] ] );
        $this->middleware('facebook.auth' , ['only' => ['getListe','getShow'] ] );
    }

    public function getIndex()
    {
        $data = array();
        $data['defis'] = Defi::orderBy('order','asc')->get();
        return view('admin/defis/liste')->with( $data );
    }

    public function getCreate()
    {
        $data = array();
        $data['title'] = 'Ajouter un defi';
        $data['defi'] = new Defi();

        return view('admin/defis/form')->with( $data );
    }

    public function postSave( editDefiRequest $request )
    {

        $file_name = str_slug( $request->name , '_' ) . '.' . $request->file('photo')->getClientOriginalExtension();

        $request->file('photo')->move(
            Config::get('path.imagesPath') , $file_name
        );

        $media = Media::create(
            [
                'file_name' => $file_name
            ]
        );

        $defi = new Defi();
        $defi->name = $request->name;
        $defi->content = $request->content;
        $defi->status = $request->status;
        $defi->order = $request->order;
        $defi->media()->associate( $media );
        $defi->save();

        return redirect(route('adminDefis'))->with(
            array(
                'message' => 'La defi a bien été enregistrer.',
                'class' => 'success'
            )
        );
    }

    public function getEdit( $id )
    {
        $data['defi'] = Defi::with('media')->find( $id );

        if( is_null( $data['defi'] ) )
        {
            abort('404');
        }

        $data['title'] = 'Editer un defi';
        return view('admin/defis/form')->with( $data );
    }

    public function putUpdate( $id , editDefiRequest $request )
    {
        $defi = Defi::find( $id );

        if( is_null( $defi ) )
        {
            abort('404');
        }

        $defi->name = $request->name;
        $defi->content = $request->content;
        $defi->status = $request->status;
        $defi->order = $request->order;

        if( !is_null( $request->file('photo') ) )
        {
            $file_name = str_slug( $request->name , '_' ) . str_random(6) . '.' . $request->file('photo')->getClientOriginalExtension();

            $request->file('photo')->move(
                Config::get('path.imagesPath') , $file_name
            );

            $media = Media::create(
                [
                    'file_name' => $file_name
                ]
            );

            $defi->media()->associate( $media );
        }

        $defi->update();

        return redirect( route('adminDefis') )->with(
            [
                'message' => 'La defi a été modifié avec succès.',
                'class' => 'success'
            ]
        );
    }

    public function getDestroy( $id )
    {
        Defi::destroy( $id );
        return redirect( route('adminDefis') );
    }

    public function getListe()
    {
        $data['title'] = 'Liste des défis';

        // Recupération de tout les defis
        $data['allDefis'] = Defi::where('status', '=', 1)->orderBy('order')->get();

        // Récupération des defis deja jouer par le user
        $data['defisPlayedByUser'] = Auth::user()->defis;

        return view('frontend/defis/liste')->with( $data );
    }

    public function getShow( $id )
    {
        // On check si le defi a été jouer par le user.
        if( Auth::user()->defis->find( $id ) )
        {
            return redirect( route('defis') );
        }

        // On check si le defi existe et qu'il est jouable
        $defi = Defi::where('status' , '=' , 1 )->find( $id );

        if( is_null( $defi ) )
        {
            return redirect( route('defis') );
        }

        $data['defi'] = $defi;
        $data['participation'] = new Participation();

        return view('frontend/defis/show')->with( $data );
    }
}
