<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class roleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label'=>'visiteur'
        ];
    }
}
