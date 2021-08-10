<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtensionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'icon', 'state_color'];
    
    public function extension()
    {
        $this->belongsTo(Extension::class);
    }
}
