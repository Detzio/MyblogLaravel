<?php
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Assurez-vous d'utiliser le bon namespace pour votre modèle Category
use Faker\Factory as Faker;
use Illuminate\Support\Str;

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
            $name = $faker->unique()->word;
            Category::create([
                'name' => $name,
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(),
                'slug' => Str::slug($name), // Génère un slug à partir du nom
                'active' => $faker->boolean, // Génère une valeur booléenne aléatoire
            ]);
        }
    }
}