<?php

namespace Database\Seeders;

use App\Models\categorielivre;
use Illuminate\Database\Seeder;

class CategorielivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categorielivre::factory()->create();
        categorielivre::factory()->create(['nom'=>'Psychologie Sociale']);
        categorielivre::factory()->create(['nom'=>"Psychologie de l'education"]);
        categorielivre::factory()->create(['nom'=>'Autres']);
    }
}
