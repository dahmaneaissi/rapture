<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use App\Http\Requests\createUserRequest;

use Auth;
use Config;
use Redirect;



class UserController extends Controller {

    public $limit = 10;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['postSave']]);
    }

    public function getIndex()
    {
        $data = array();

        $user = new User();

        $data['title'] = 'Liste des utilisateurs';
        $users = User::orderBy('created_at', 'DESC' );
        $data['count'] = $user->count();
        $data['items'] = $user->paginate( $this->limit );
        //$data['users'] = User::with('medias')->orderBy('created_at','DESC' )->where('role' , '=' , 'player')->paginate( $this->limit );

        return view('admin/users/list')->with( $data );
    }

    public function getDestroy( $id )
    {
        User::destroy( $id );
        return redirect( route('users') );
    }

    public function postSave( createUserRequest $request )
    {

        $file_name = str_slug( $request->name , '_' ) . '-' . str_slug( $request->lastname , '_' ) . '-' . str_random(6) . '.' . $request->file('photo')->getClientOriginalExtension();

        $request->file('photo')->move(
            Config::get('path.imagesPath') , $file_name
        );

        $media = Media::create(
            [
                'file_name' => $file_name
            ]
        );

        $user = new User();

        $user->name      = $request->name;
        $user->lastname  = $request->lastname;
        $user->tel       = $request->tel;
        $user->email     = $request->email;
        $user->willaya   = $request->willaya;
        $user->birthday  = $request->birthday;
        $user->fb_profil  = $request->fb_profil;
        $user->role      = 'player';
        $user->password  = bcrypt( str_random(6) );

        $user->medias()->associate( $media );
        $user->save();

        return redirect( route('merci') );
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->guest('auth/login');
    }

}
