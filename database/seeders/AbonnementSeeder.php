<?php

namespace Database\Seeders;

use App\Models\abonnement;
use Illuminate\Database\Seeder;

class AbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        abonnement::factory()->create();
        abonnement::factory()->create( [
            'nom'=>'Standard',
            'prix'=>5000,
            'options'=>json_encode([
                '3 Consultations',
                'Acces gratuit au livres payants Mon psychologue',
                'Dure : 30 jour',
                'Acces pour 1 compte'
            ]),
            'dure'=>30,
        ]);

        abonnement::factory()->create( [
            'nom'=>'Business',
            'prix'=>30000,
            'options'=>json_encode([
                'Consultation illimite',
                'Acces gratuit au livres payant Mon psychologue',
                'Dure : 30 jour',
                'Acces pour compte illimite'
            ]),
            'dure'=>30,
        ]);
    }
}
