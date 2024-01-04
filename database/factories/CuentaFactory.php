<?php

namespace Database\Factories;

use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CuentaFactory extends Factory
{
    protected $model = Cuenta::class;

    public function definition()
    {
        return [
			'bancos_id' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
