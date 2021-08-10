<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use Uuid, Sluggable;

    protected $fillable = ['name', 'slug', 'price', 'price_details', 'description', 'discount', 'icon', 'state_color', 'active'];

    /**
    * Recuperar detalhes do plano
    */
    public function details()
    {
        return $this->hasMany(PlanDetail::class);
    }

    /**
    * Recuperar empresas que contrataram o plano
    */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
    * Recuperar extensions ligadas ao plano
    */
    public function extensions()
    {
        return $this->belongsToMany(Extension::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }
}
