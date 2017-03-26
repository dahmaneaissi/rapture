<?php namespace App\Http\Middleware;

use Closure;

class endAppMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        return response('<center>
                        <p style="
                            color: #555;
                            width: 900px;
                            margin-top: 40px;
                            font-family: arial;
                            font-size: 26px;
                            padding: 10px;
                            border: solid 1px #dddddd;
                            border-bottom: solid 15px #ffcc00;
                            -webkit-box-shadow: 0px 0px 15px -6px rgba(0,0,0,1);
                            -moz-box-shadow: 0px 0px 15px -6px rgba(0,0,0,1);
                            box-shadow: 0px 0px 15px -6px rgba(0,0,0,1);

                        ">Les inscriptions au jeu concours <span style="color: #ffcc00">#RenaultSelfie</span> sont closes.<br>
                        Rendez-vous sur notre <a style="color: #ffcc00" href="http://www.facebook.com/RenaultAlgerie">page Facebook</a> pour connaitre les 3 gagnants.
                        <br>
                        Merci pour votre participation.</p></center>', 403);
	}

}
