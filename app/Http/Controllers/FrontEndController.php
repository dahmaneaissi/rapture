<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\User;

use Illuminate\Support\Facades\Config;
use Facebook\FacebookSession;

/*
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookCanvasLoginHelper;
*/

use App\Helpers\LaravelFacebookRedirectLoginHelper;

class FrontEndController extends Controller {

    public $limit = 1;

    public function __construct()
    {
//
    }

    public function getIndex()
    {
        $data['title'] = 'Home';

        FacebookSession::setDefaultApplication(
            Config::get('facebook.appId'),
            Config::get('facebook.secret')
        );

        $helper = new LaravelFacebookRedirectLoginHelper( Config::get('facebook.redirect_url') );

        $data['loginUrl'] = $helper->getLoginUrl(  Config::get('facebook.permissions') );

        return view('frontend/index')->with( $data );
    }

    public function getSignin()
    {
        $data = array();
        $data['title'] = 'inscription';
        $data['willaya'] = getWillaya();
        $data['user'] = new User();
        return view('frontend/inscription/form')->with( $data );
    }

    public function getClassement()
    {
        $user = new User();

        $data['title'] = 'Classement';

        $data['users'] = $user->getClassement()->paginate( $this->limit );

        return view('frontend/classement/table')->with( $data );
    }

    public function getThinks()
    {
        $data['msg'] = 'Merci pour votre participation.';
        return view('frontend/merci')->with( $data );
    }
}