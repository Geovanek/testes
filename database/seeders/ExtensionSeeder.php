<?php

namespace Database\Seeders;

use App\Models\Extension;
use App\Models\ExtensionDetail;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extension = Extension::create([
            'name' => 'Potência',
            'price' => 9.99,
            'active' => true,
            'icon' => 'i-Bicycle',
            'state_color' => 'success',
        ]);
        $extension->plans()->sync([1, 2, 3]);
        $extension->companies()->sync(4);

        Extension::create([
            'name' => 'Sintomas de Stress',
            'price' => 5.99,
            'active' => true,
            'icon' => 'i-Depression',
            'state_color' => 'danger',
        ])->companies()->sync([2, 4]);

        $extension = Extension::create([
            'name' => 'Cargas de Treinamento',
            'price' => 7.99,
            'active' => true,
            'icon' => 'i-Bar-Chart-2',
            'state_color' => 'info',
        ]);
        $extension->plans()->sync(1);
        $extension->companies()->sync(3);

        Extension::all()->each(function ($extension) {
            $extension->details()->saveMany(ExtensionDetail::factory(3)->make());
        });
    }
}
