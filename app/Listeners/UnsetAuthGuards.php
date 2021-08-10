<?php

namespace App\Listeners;

use App\Guards\GuardsFacade;
use Auth;
use Illuminate\Auth\Events\Logout;

class UnsetAuthGuards
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        if (GuardsFacade::hasGuardLoggedOut($event->guard) ||
            !GuardsFacade::hasAuthGuard($event->guard)) {
            return;
        }

        $guards = GuardsFacade::exceptGuard($event->guard);
        foreach ($guards as $guard) {
            if (Auth::guard($event->guard)->check()) {
                GuardsFacade::addGuardLoggedOut($guard);
                Auth::guard($guard)->logout();
            }
        }
    }
}
