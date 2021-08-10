<?php

namespace App\Services;

use App\Models\Coach;
use App\Models\Company;
use App\Models\Plan;
use App\Models\User;

class SubscriptionService
{
    private $plan, $dataCompany = [], $dataUser = [];
    private $repository;


    /* public function getAllCompanys(int $per_page)
    {
        return $this->repository->getAllCompanys($per_page);
    }

    public function getCompanyByUuid(string $uuid)
    {
        return $this->repository->getCompanyByUuid($uuid);
    } */

    public function make(Plan $plan, array $dataCompany, array $dataUser)
    {
        $this->plan = $plan;
        $this->dataCompany = $dataCompany;
        $this->dataUser = $dataUser;

        $company = $this->storeCompany();

        $user = $this->storeUser($company);

        $coach = $this->storeCoach($user, $company);

        $this->storeAthlete($user, $company, $coach);

        return $user;
    }

    public function storeCompany()
    {
        return $this->plan->companies()->create($this->dataCompany);
    }

    public function storeUser(Company $company)
    {
        $user = $company->user()->create($this->dataUser);

        return $user;
    }

    public function storeCoach(User $user, Company $company)
    {
        $coach = $user->coaches()->create([
            'role' => Coach::ROLE_HEAD_COACH,
        ]);

        $coach->company()->associate($company->id);

        $coach->save();

        return $coach;
    }

    public function storeAthlete(User $user, Company $company, Coach $coach)
    {
        $athlete = $user->athletes()->create();

        $athlete->coach()->associate($coach->id);

        $athlete->company()->associate($company->id);

        $athlete->save();

        return $athlete;
    }
}
