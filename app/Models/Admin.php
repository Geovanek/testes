<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Uuid;

    protected $fillable = ['uuid'];

    /**
    * Função para criar User e Admin via seeder.
    */
    public static function createUser(array $attributes): Admin
    {
        $admin = self::create([]);

        $admin->users()->create($attributes['user']);

        return $admin;
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
