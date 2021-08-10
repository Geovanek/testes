<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Extension;
use App\Models\Plan;
use App\Observers\CompanyObserver;
use App\Observers\ExtensionObserver;
use App\Observers\PlanObserver;
use App\Tenant\TenantFacade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Model::preventLazyLoading(! app()->isProduction());

        TenantFacade::bluePrintMacros();

        Paginator::useBootstrap();

        Company::observe(CompanyObserver::class);
        Extension::observe(ExtensionObserver::class);
        Plan::observe(PlanObserver::class);
    }
}
