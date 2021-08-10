<?php

namespace App\Providers;

use App\Listeners\AuthEventSubscriber;
use App\Listeners\LogSuccessfulLogin;
use App\Listeners\SetAuthGuards;
use App\Listeners\UnsetAuthGuards;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            'SocialiteProviders\Strava\StravaExtendSocialite@handle',
        ],

        Login::class => [
            LogSuccessfulLogin::class,
            SetAuthGuards::class,
        ],
        Logout::class => [
            UnsetAuthGuards::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
