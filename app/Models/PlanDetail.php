<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanDetail extends Model
{
    protected $fillable = ['description', 'plan_package', 'plan_discount'];
    
    public function plan()
    {
        $this->belongsTo(Plan::class);
    }
}
