<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use TenantModels, Uuid;

    const ROLE_HEAD_COACH = 1;
    const ROLE_COACH = 2;

    protected $fillable = [
        'company_id', 'role'
    ];

    /**
    * Função para criar User, Coach e Athlete via seeder.
    */
    public static function createUserAndAthlete(array $attributes)
    {
        $coach = self::create([
            'company_id' => $attributes['company_id'],
            'role' => $attributes['role'],
        ]);

        $coach->users()->create($attributes['user']);

        $athlete = Athlete::create([
            'company_id' => $attributes['company_id'],
            'coach_id' => $coach->id,
        ]);

        $athlete->users()->sync($coach->user->id); //getUserAttribute()

        return ['coach' => $coach, 'athlete' => $athlete];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    public function getUserAttribute()
    {
        return $this->users->first();
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
