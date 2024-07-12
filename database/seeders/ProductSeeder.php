<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Assurez-vous d'utiliser le bon namespace pour votre modèle Product
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Créer 10 produits factices
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 1000), // Prix avec 2 décimales, entre 10 et 1000
                'category_id' => $faker->numberBetween(1, 5), // Supposons que vous avez 5 catégories
                'is_promotion' => $faker->boolean, // Valeur booléenne aléatoire
                'promotion_price' => $faker->randomFloat(2, 5, 500), // Prix promotionnel, assurez-vous qu'il est logique par rapport au prix normal
                'image_url' => $faker->imageUrl(), // URL d'image factice
            ]);
        }
    }
}