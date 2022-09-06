<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AbonnementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>'Evaluation',
            'prix'=>0,
            'options'=>json_encode([
                '1 Consultation test',
                'acces gratuit au livres payant Mon psychologue',
                'Dure : 1 jour',
                'Acces pour 1 compte'
            ]),
            'dure'=>1,
        ];
    }
}
