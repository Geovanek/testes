<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use TenantModels, Uuid;

    protected $fillable = [
        'company_id','coach_id'
    ];
    
    /**
    * Função para criar User e Athlete via seeder.
    */
    public static function createUser(array $attributes): Athlete
    {
        $athlete = self::create([
            'company_id' => $attributes['company_id'],
            'coach_id' => $attributes['coach_id'],
        ]);

        $athlete->users()->create($attributes['user']);

        return $athlete;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
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
