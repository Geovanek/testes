<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Models\User;
use Socialite;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait StravaSocialite
{
    public function StravaRedirect()
    {
        return Socialite::driver('strava')
                            ->setScopes(['profile:read_all', 'activity:read_all'])
                            ->redirect();
    }

    public function StravaCallback()
    {

        try {
            $userProvider = Socialite::driver('strava')->stateless()->user();
        } catch (Exception $e) {
            $code = $e->getCode();
            switch ($code) {
                case '429':
                    $error = 'strava-rate-limit'; 
                    $msg = 'Limite de comunicação com o STRAVA atingido. Por favor, tente novamente amanhã.';
                    break;
                default :
                    $error = 'error-strava';
                    $msg = 'Estamos passando por alguma instabilidade. Por favor, tente novamente ou contato o suporte.';
                    break;
                }
            return redirect('/login')->with($error, $msg);
        }


        if ($userProvider->user['sex'] == null) {
            return redirect('/login')->with('strava-sex', 'O campo sexo em seu STRAVA não está preenchido, esse campo é obritório para o cadastro no site.');
        }

        $user = User::where('strava_id', $userProvider->getId())->first();

        if(!$user){
            //return view('auth.strava', compact('userProvider'));
            return redirect()->route('strava.form')->with('userProvider', $userProvider);
        }

        Auth::login($user, true);

        return redirect()->intended($this->redirectPath());
    }

    public function showStravaRegistrationForm()
    {
        return view('auth.strava');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function StravaCreate($data)
    {
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                return User::updateOrCreate(
                    [
                    'email' => $data['email']
                    ], [
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'cpf' => $data['cpf'],
                    'sex' => $data['sex'],
                    'weight' => $data['weight'],
                    'avatar' => $data['avatar'],
                    'strava_id' => $data['strava_id'],
                    'strava_access_token' => $data['strava_access_token'],
                    'strava_refresh_token' => $data['strava_refresh_token'],
                    'strava_expires_at' => $data['strava_expires_at'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                ]);
            } else {
                $validator = Validator::make($data, [
                    'email' => ['unique:users'],
                ]);

                if ($validator->fails()) {
                   dd($validator);
                }
            }
        } else {
            return User::create(
                [
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'name' => $data['name'],
                'phone' => $data['phone'],
                'cpf' => $data['cpf'],
                'sex' => $data['sex'],
                'weight' => $data['weight'],
                'avatar' => $data['avatar'],
                'strava_id' => $data['strava_id'],
                'strava_access_token' => $data['strava_access_token'],
                'strava_refresh_token' => $data['strava_refresh_token'],
                'strava_expires_at' => $data['strava_expires_at'],
                'city' => $data['city'],
                'state' => $data['state'],
            ]);
        }
    }

    public function StravaRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->StravaCreate($request->all())));

        if (method_exists($user, 'validate')) {
            return $user->validate();
        }

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'celular_com_ddd'],
            'cpf' => ['required', 'cpf'],
            'sex' => ['string', 'max:1', 'nullable'],
            'weight' => ['numeric', 'nullable'],
            'avatar' => ['string', 'nullable'],
            'strava_id' => ['numeric', 'nullable'],
            'strava_access_token' => ['string', 'nullable'],
            'strava_refresh_token' => ['string', 'nullable'],
            'strava_expires_at' => ['numeric', 'nullable'],
            'city' => ['string', 'nullable'],
            'state' => ['string', 'nullable'],
        ]);
    }
}