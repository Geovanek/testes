<?php

namespace Database\Factories;

use App\Models\ExtensionDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExtensionDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExtensionDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(5),
            'icon' => $this->faker->randomElement([
                'i-Medal-3', 'i-Idea-2', 'i-Firewall', 'i-Pulse', 'i-Key', 'i-Map2', 'i-Big-Data', 'i-Bar-Chart', 'i-Pie-Chart-3', 'i-File-Horizontal-Text', 'i-Speach-Bubble-Asking'
                ]),
            'state_color' => $this->faker->randomElement([
                'primary', 'secondary', 'success', 'danger', 'warning', 'info'
                ]),
        ];
    }
}
