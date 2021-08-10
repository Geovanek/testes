<?php

namespace App\Observers;

use App\Models\Company;
use Str;

class CompanyObserver
{
    /**
     * Handle the company "creating" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function creating(Company $company)
    {
        $company->active = 'Y';
        $company->subscription = now();
        $company->expires_at = now()->addDays(14);
    }

    /**
     * Handle the company "updating" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function updating(Company $company)
    {
        //
    }
}
