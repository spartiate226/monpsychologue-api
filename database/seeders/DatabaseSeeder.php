<?php

namespace Database\Seeders;

use App\Models\categorielivre;
use App\Models\role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       role::factory()->create();
        role::factory()->create(['label'=>'psychologue']);
        $this->call(CategorielivreSeeder::class);
        $this->call(SpecialiteSeeder::class);
        $this->call(AbonnementSeeder::class);

    }
}
