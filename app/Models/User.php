<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'cpf', 'sex', 'height', 'weight', 'avatar', 'strava_id', 'strava_access_token', 'strava_refresh_token', 'strava_access_token_expires_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fill(array $attributes)
    {
        !isset($attributes['password']) ?: $attributes['password'] = bcrypt($attributes['password']);
        return parent::fill($attributes);
    }

    public function containsType($typeClass): bool
    {
        return self
                ::query()
                ->join('userables', 'userables.user_id', '=', 'users.id')
                ->where('userable_type', $typeClass)
                ->where('users.id', $this->id)
                ->count() == 1;
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_owner_id');
    }

    public function getAdminAttribute()
    {
        return $this->admins->first();
    }

    public function admins()
    {
        return $this->morphedByMany(Admin::class, 'userable');
    }

    public function getCoachAttribute() //permite pegar o $user->coach direto (encapsulamento)
    {
        return $this->coaches->first();
    }

    public function coaches()
    {
        return $this->morphedByMany(Coach::class, 'userable');
    }

    public function getAthleteAttribute()
    {
        return $this->athletes->first();
    }

    public function athletes()
    {
        return $this->morphedByMany(Athlete::class, 'userable');
    }
}
