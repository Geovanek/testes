<?php

namespace App\Providers;

use App\Models\Coach;
use Illuminate\Auth\EloquentUserProvider;

class CoachProvider extends EloquentUserProvider
{
    use UserProviders;

    public static function userOrNull($user){
        return $user && $user->containsType(Coach::class) ? $user : null;
    }
}