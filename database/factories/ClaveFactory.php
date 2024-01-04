<?php

namespace Database\Factories;

use App\Models\Clave;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClaveFactory extends Factory
{
    protected $model = Clave::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
