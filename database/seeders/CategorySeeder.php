<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Assurez-vous d'utiliser le bon namespace pour votre modèle Category
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Créer 10 catégories factices
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
            ]);
        }
    }
}