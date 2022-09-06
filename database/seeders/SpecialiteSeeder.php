<?php

namespace Database\Seeders;

use App\Models\specialite;
use Database\Factories\SpecialiteFactory;
use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        specialite::factory()->create();
        specialite::factory()->create(['nom'=>'Psychologue social']);
        specialite::factory()->create(['nom'=>"Psychologue de l'Education"]);
        specialite::factory()->create(['nom'=>"Coach"]);
        specialite::factory()->create(['nom'=>"Conseiller Conjugal"]);
    }
}
