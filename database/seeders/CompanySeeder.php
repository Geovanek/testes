<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::find(1);
        $plan->companies()->create([
            'name' => 'Race Pace',
            'document_number' => '09797904172',
            'company_type' => Company::COMPANY_TYPE_INDIVIDUAL,
            'email' => 'racepace@email.com',
            'phone' => '00000-0000',
        ]);

        $plan = Plan::find(2);
        $plan->companies()->create([
            'name' => 'Empresa Teste 1',
            'document_number' => '04939296000242',
            'company_type' => Company::COMPANY_TYPE_LEGAL,
            'email' => 'teste@email.com',
            'phone' => '00000-0000',
        ]);

        $plan = Plan::find(1);
        $plan->companies()->create([
            'name' => 'Empresa teste 2',
            'document_number' => '04782610000145',
            'company_type' => Company::COMPANY_TYPE_LEGAL,
            'email' => 'teste2@email.com',
            'phone' => '00000-0000',
        ]);

        $plan = Plan::find(3);
        $plan->companies()->create([
            'name' => 'Empresa teste 3',
            'document_number' => '03506772000198',
            'company_type' => Company::COMPANY_TYPE_LEGAL,
            'email' => 'teste3@email.com',
            'phone' => '00000-0000',
        ]);

        $plan = Plan::find(4);
        $plan->companies()->create([
            'name' => 'Empresa teste 4',
            'document_number' => '61996467115',
            'company_type' => Company::COMPANY_TYPE_INDIVIDUAL,
            'email' => 'teste4@email.com',
            'phone' => '00000-0000',
        ]);
    }
}
