<?php

namespace Database\Factories;

use App\Models\Clafe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClafeFactory extends Factory
{
    protected $model = Clafe::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
