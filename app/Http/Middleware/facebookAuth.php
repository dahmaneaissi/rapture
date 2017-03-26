<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use App\User;
use Facebook\FacebookSession;
use App\Helpers\LaravelFacebookRedirectLoginHelper;
use Facebook\FacebookRequestException;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

use Config , Session , Response;
use Illuminate\Support\Facades\Redirect;
use spec\PhpSpec\Formatter\Html\ReportPendingItemSpec;

class facebookAuth {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        FacebookSession::setDefaultApplication(
            Config::get('facebook.appId'),
            Config::get('facebook.secret')
        );

        $helper = new LaravelFacebookRedirectLoginHelper( Config::get('facebook.redirect_url') );

        // Check if existing session exists
        if (Session::get('accessToken')) {

            $session = new FacebookSession( Session::get('accessToken'));
            // Validate the access_token to make sure it's still valid

            try {

                if ( ! $session->validate() ) {
                    $session = null;
                    Session::put('accessToken', null);
                }


            } catch ( Exception $e ) {
                // Catch any exceptions
                $session = null;
                Session::put('accessToken', null);
            }
        } else {

            try {
                $session = $helper->getSessionFromRedirect();

            } catch(FacebookRequestException $exception) {
                return Response::json($exception->getMessage(), 401);
            } catch(\Exception $exception) {
                return Response::json($exception->getMessage(), 401);
            }

        }

        // Check if a session exists

        if (isset($session)) {

            // Save the session
            Session::put('accessToken', $session->getToken());

            // Create session using saved token or the new one we generated at login
            $session = new FacebookSession( $session->getToken() );


            Session::put( 'session_fb', $session );

            $me = (new FacebookRequest(
                $session, 'GET', '/me'
            ))->execute()->getGraphObject(GraphUser::className())->asArray();


            $user = User::select('users.*')
                ->where('users.id_fb', '=', $me['id'])
                ->first();

            if($user)
            {
                Auth::login( $user );
                return $next( $request );
            }else{
                $data = [
                    'title' => 'Inscription',
                    'user' => new User(),
                    'willaya' => getWillaya(),
                    'me' => $me
                ];

                return view('frontend/inscription/form')->with( $data );
            }

        } else {
            return Redirect::route('index');
        }

    }

}
