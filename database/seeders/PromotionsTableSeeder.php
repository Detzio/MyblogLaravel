<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promotion;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB; // Importez cette ligne si vous utilisez DB:: directement

class PromotionsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Promotion::create([
                'name' => $faker->name,
                'description' => $faker->sentence, // Utilisez sentence ou text pour la description
            ]);
        }
    }
}