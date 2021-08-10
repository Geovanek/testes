<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::create([
            'name' => 'Cortesia',
            'price' => 0.00,
            'price_details' => 'Cortesia',
            'description' => 'Para empresas parceiras',
            'icon' => 'i-Gift-Box',
            'state_color' => 'secondary',
            'active' => false,
        ]);
        $details = [
                [
                    'description' => 'Atletas ilimitados',
                    'plan_package' => 'N',
                    'plan_discount' => 'N',
                ],[
                    'description' => 'Sistema de planejamento e prescrição de treinos',
                    'plan_package' => 'Y',
                    'plan_discount' => 'N',
                ],[
                    'description' => 'Controle das cargas de treinamento',
                    'plan_package' => 'Y',
                    'plan_discount' => 'N',
                ],[
                    'description' => 'Distribuição da intensidade de treinamento',
                    'plan_package' => 'Y',
                    'plan_discount' => 'N',
                ],[
                    'description' => 'Análise de dados de frequência cardíaca (FC)',
                    'plan_package' => 'Y',
                    'plan_discount' => 'N',
                ],[
                    'description' => 'Análise de potência para ciclismo',
                    'plan_package' => 'Y',
                    'plan_discount' => 'N',
                ],[
                    'description' => 'Análise de pace para corrida',
                    'plan_package' => 'Y',
                    'plan_discount' => 'N',
                ]
            ];
        $plan->details()->createMany($details);

        $plan = Plan::create([
            'name' => 'Básico',
            'price' => 29.99,
            'price_details' => 'por mês',
            'description' => 'Limitado a 5 atletas',
            'icon' => 'i-Pie-Chart-2',
            'state_color' => 'warning',
            'active' => true,
        ]);
        $details = [
            [
                'description' => 'Extensões básicas',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Sistema de planejamento e prescrição de treinos',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Controle das cargas de treinamento',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Distribuição da intensidade de treinamento',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de dados de frequência cardíaca (FC)',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de potência para ciclismo',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de pace para corrida',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ]
        ];
        $plan->details()->createMany($details);

        $plan = Plan::create([
            'name' => 'Ilimitado',
            'price' => 89.99,
            'price_details' => 'por mês',
            'description' => 'Atletas ilimitados',
            'icon' => 'i-Bar-Chart-2',
            'state_color' => 'info',
            'active' => true,
        ]);
        $details = [
            [
                'description' => 'Extensões adicionais',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Sistema de planejamento e prescrição de treinos',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Controle das cargas de treinamento',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Distribuição da intensidade de treinamento',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de dados de frequência cardíaca (FC)',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de potência para ciclismo',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de pace para corrida',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ]
        ];
        $plan->details()->createMany($details);

        $plan = Plan::create([
            'name' => 'Especialista',
            'price' => 149.99,
            'price_details' => 'por mês',
            'description' => 'Pacote promo de extensões',
            'icon' => 'i-Medal-3',
            'state_color' => 'success',
            'discount' => '15',
            'active' => true,
        ]);
        $details = [
            [
                'description' => 'Atletas Ilimitados',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Sistema de planejamento e prescrição de treinos',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Controle das cargas de treinamento',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Distribuição da intensidade de treinamento',
                'plan_package' => 'Y',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de dados de frequência cardíaca (FC)',
                'plan_package' => 'Y',
                'plan_discount' => 'Y',
            ],[
                'description' => 'Análise de potência para ciclismo',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ],[
                'description' => 'Análise de pace para corrida',
                'plan_package' => 'N',
                'plan_discount' => 'N',
            ]
        ];
        $plan->details()->createMany($details);
    }
}
