<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(['Bachillerato', 'Primaria', 'Auditorio', 'Coliseo 70 años', 'Cancha externa']),
            'descripcion' => $this->faker->sentence(),
    
        ];
    }
}
