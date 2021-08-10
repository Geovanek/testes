<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\Athlete;
use App\Models\Coach;

class LogSuccessfulLogin
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user->containsType(Admin::class)){
            $guard = 'admin_web';
        } else if ($event->user->containsType(Coach::class)){
            $guard = 'coach_web';
        } else if ($event->user->containsType(Athlete::class)){
            $guard = 'athlete_web';
        } else {
            $guard = 'athlete_web';;
        }

        return $guard;
    }
}
