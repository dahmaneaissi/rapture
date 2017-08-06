<?php

namespace App\Listeners\Access;

use App\Events\Access\Roles\RoleUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Session\SessionInterface;

class UpdatePermissionsInSession
{
    protected $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct( SessionInterface $session )
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  RoleUpdated  $event
     * @return void
     */
    public function handle(RoleUpdated $event)
    {
        dd( $this->session->get( config('access.permissions.session_key') ) );
    }
}
