<?php

namespace Database\Factories;

use App\Models\Taches;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taches>
 */
class TachesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Taches::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->setence,
            'difficulte' => $this->faker->paragraph,
            'created_at' => now()
        ];
    }
}
