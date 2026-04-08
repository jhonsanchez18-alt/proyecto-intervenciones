<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Tipo;
use App\Models\Seccion;
use App\Models\Ubicacion;
use App\Models\Marca;
use App\Models\Responsable;  
use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activo>
 */
class ActivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->word(),
            'categoria_id' => Categoria::all()->random()->id,
            'tipo_id' =>  Tipo::all()->random()->id,
            'descripcion' => $this->faker->sentence(),
            'seccion_id' => Seccion::all()->random()->id,
            'ubicacion_id' => Ubicacion::all()->random()->id,
            'marca_id' => Marca::all()->random()->id,
            'modelo' => $this->faker->word(),
            'numerodeserie' => $this->faker->unique()->bothify('SN-#####'),
            'fechacompra' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'valorcompra' => $this->faker->randomFloat(2, 100, 10000),
            'estado_id' => Estado::all()->random()->id,
            'responsable_id' => Responsable::all()->random()->id,
            'identificadorunico' => $this->faker->unique()->uuid(),
            'fecharegistro' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'observaciones' => $this->faker->sentence(),
        ];
    }
}
