<?php

namespace App\Listeners;

use App\Guards\GuardsFacade;
use Auth;
use Illuminate\Auth\Events\Login;

class SetAuthGuards
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
    public function handle(Login $event)
    {
        $logGuard= new LogSuccessfulLogin;
        $userGuard = $logGuard->handle($event);

        if (GuardsFacade::hasGuardLogged($userGuard) ||
            !GuardsFacade::hasAuthGuard($userGuard)) {
            return;
        }

        $guards = GuardsFacade::exceptGuard($userGuard);

        foreach ($guards as $guard) {
            $provider = Auth::guard($guard)->getProvider();
            $providerClass = get_class($provider);
            if ($providerClass::userOrNull($event->user)) {
                GuardsFacade::addGuardLogged($guard);
                Auth::guard($guard)->login($event->user);
            }
        }
    }
}
