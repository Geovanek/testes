<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function bootUuid()
    {
        static::creating(function ($obj) {
            $obj->uuid = Str::Uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}