<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\PlanCompanyController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PlanDetailController;
use App\Http\Controllers\Admin\PlanExtensionController;
use App\Http\Controllers\Company\CoachAthleteController;
use App\Http\Controllers\Company\CompanyAthleteController;
use App\Http\Controllers\Athlete\AthleteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

/** Strava Socialite Routes */
Route::get('/strava-redirect', [LoginController::class, 'StravaRedirect'])->name('strava.redirect');
Route::get('/strava-callback', [LoginController::class, 'StravaCallback'])->name('strava.login');
Route::get('/strava-form', [RegisterController::class, 'StravaRegistrationForm'])->name('strava.form');
Route::post('/strava-register', [RegisterController::class, 'StravaCompleteRegistration'])->name('strava.register');

/**
 * Company Routes
 */
Route::group([
        'prefix' => 'company',
        'middleware' => ['auth:coach_web', 'tenant', 'bindings'],
    ], function() {
        Route::get('/dashboard', [CompanyController::class, 'index'])->name('dashboard');

        Route::put('/athletes/unlink/{athlete}', [CompanyAthleteController::class ,'unlink'])->name('athletes.unlink');
        Route::resource('athletes', CompanyAthleteController::class)->only([
            'index', 'show', 'edit', 'update'
        ]);

        Route::resource('coach', CoachAthleteController::class)->only([
            'index', 'show', 'edit', 'update'
        ]);
});


/**
 * Athlete Routes
 */
Route::group([
        'prefix' => 'athlete',
        'middleware' => ['auth:athlete_web', 'bindings'],
    ], function() {
        Route::get('/dashboard', [AthleteController::class , 'index'])->name('athlete.dashboard');
});


/**
 * Admin Routes
 */
Route::group([
        'prefix' => 'admin',
        'middleware' => ['auth:admin_web', 'bindings']
    ], function() {
        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
        //Route::get('/dashboard', 'AdminController@index')->name('dashboard');

        /** Plans Routes */
        Route::get('plan/{plan:slug}/extensions', [PlanExtensionController::class, 'index'])->name('plans.extensions');
        Route::get('plan/{plan:id}/companies', [PlanCompanyController::class, 'index'])->name('plans.companies');
        Route::resource('plan/{plan:slug}/details', PlanDetailController::class)->except([
            'show'
        ]);
        Route::resource('plans', PlanController::class)->except([
            'show'
        ]);

        /** All Users Routes */
        Route::group(['prefix' => 'users'], function(){
            Route::view('/{id}/profile', 'admin.users.profile')->name('users.profile');
            Route::view('/', 'admin.users.index')->name('users.index');
        });

        /** Athletes Routes */
        Route::group(['prefix' => 'athletes'], function(){
            Route::view('/{uuid}/profile', 'admin.athletes.profile')->name('athletes.profile');
            Route::view('/', 'admin.athletes.index')->name('athletes.index');
        });

        /** Companies Routes */
        Route::group(['prefix' => 'companies'], function(){
            //Route::view('/{id}/companies', 'admin.companies.companies')->name('companies.companies');
            //Route::view('/{url}/plans', 'admin.companies.plans')->name('companies.plans');
            Route::get('/{company}/profile', [CompanyProfileController::class, 'index'])->name('companies.profile');
            Route::view('/', 'admin.companies.index')->name('companies.index');
        });
        
        /** Extensions Routes */
        Route::group(['prefix' => 'extensions'], function(){
            Route::view('/{id}/companies', 'admin.extensions.companies')->name('extensions.companies');
            Route::view('/{slug}/plans', 'admin.extensions.plans')->name('extensions.plans');
            Route::view('/{slug}/details', 'admin.extensions.details')->name('extensions.details');
            Route::view('/', 'admin.extensions.index')->name('extensions.index');
        });

        /** Another Routes */
        Route::view('/icons', 'admin.icons')->name('admin.icons');
});

/**
 * Frontend Routes
 */
Route::get('/subscription/plan/{uuid}', [HomeController::class, 'subscriptionPlan'])->name('subscription.plan');
Route::get('/', [HomeController::class, 'index'])->name('index');