<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Uuid, Sluggable;

    const COMPANY_TYPE_INDIVIDUAL = 'cpf';
    const COMPANY_TYPE_LEGAL = 'cnpj';
    
    protected $fillable = [
        'name', 'document_number', 'company_type', 'email', 'phone', 'whatsapp', 'privacy_policy', 'terms_of_use', 'slug', 'logo', 'active', 'subscription', 'expires_at', 'subscription_id', 'subscription_active', 'subscription_suspended',
    ];

    /**
    * Recuperar o dono/responsável pelo cadastro da empresa
    */
    public function user()
    {
        return $this->hasOne(User::class, 'company_owner_id');
    }

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    /**
    * Recuperar o plano contratado
    */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
    * Recuperar extensões contratadas
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
