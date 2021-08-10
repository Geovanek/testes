<?php

namespace App\Tenant;

use Illuminate\Database\Eloquent\Model;

trait TenantModels
{
    protected static function bootTenantModels()
    {
        static::addGlobalScope(new TenantScope());

        static::creating(function(Model $obj) {
            $tenantObj = TenantFacade::getTenant();
            if ($tenantObj) {
                $obj->{TenantFacade::getTenantField()} = $tenantObj->id;
            }
        });
    }

    public function tenant() //company?? tenant_id
    {
        return $this->belongsTo(TenantFacade::getTenantModel(), TenantFacade::getTenantField());
    }
}