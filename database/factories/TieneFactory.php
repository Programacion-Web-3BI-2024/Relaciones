<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TieneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "pizza_id" => rand(1,10),
            "ingrediente_id" => rand(1,20)
        ];
    }
}
