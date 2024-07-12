<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Assurez-vous d'utiliser le bon namespace pour votre modèle Product
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenir une instance de Faker
        $faker = \Faker\Factory::create();

        // Créer 10 produits factices
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 1000), // Prix avec 2 décimales, entre 10 et 1000
            ]);
        }
    }
}