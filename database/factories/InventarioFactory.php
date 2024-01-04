<?php

namespace Database\Factories;

use App\Models\Inventario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InventarioFactory extends Factory
{
    protected $model = Inventario::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
			'almacen' => $this->faker->name,
			'claves_id' => $this->faker->name,
			'fuentes_id' => $this->faker->name,
			'bancos_id' => $this->faker->name,
			'empleados_id' => $this->faker->name,
			'costo' => $this->faker->name,
			'cantidad' => $this->faker->name,
        ];
    }
}
