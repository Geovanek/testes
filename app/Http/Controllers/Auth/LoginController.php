<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Socialite\StravaSocialite;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Athlete;
use App\Models\Coach;
use App\Providers\RouteServiceProvider;
use App\Section\SectionFacade;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, StravaSocialite;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function StravaProvider()
    {
        return $this->StravaRedirect();
    }

    protected function StravaLogin()
    {
        return $this->StravaCallback();
    }

    public function redirectTo()
    {
        if (Auth::user()->containsType(Admin::class)){
            $userableType = Auth::user()->admin->pivot->userable_type;
        } else if (Auth::user()->containsType(Coach::class)){
            $userableType = Auth::user()->coach->pivot->userable_type;
        } else if (Auth::user()->containsType(Athlete::class)){
            $userableType = Auth::user()->athlete->pivot->userable_type;
        } else {
            $userableType = 'App\Models\Athlete';
        }
     
        $userableType = str_replace('\\', '_', $userableType);

        return SectionFacade::get("login.$userableType.redirect");
    }
}
