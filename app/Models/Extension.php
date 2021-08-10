<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use Uuid;
    use Sluggable;

    protected $fillable = ['name', 'slug', 'price', 'icon', 'state_color', 'active'];

    /**
     * Get Extension Details
     */
    public function details()
    {
        return $this->hasMany(ExtensionDetail::class);
    }

    /**
     * Get Companies
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    /**
     * Get Plans
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
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
