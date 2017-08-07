<?php

namespace App\Listeners\Access;

use App\Events\Access\Roles\RoleUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class UpdatePermissionsInSession
{
    protected $request;

    /**
     * Create the event listener.
     *
     * @param Request $request
     */
    public function __construct( Request $request )
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        $this->request->session()->forget( config('access.permissions.session_key') );
    }
}
