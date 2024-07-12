<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Exemple de données à insérer
        DB::table('carts')->insert([
            [
                'user_id' => 1, // Assurez-vous que cet utilisateur existe dans votre table users
                'product_id' => 1, // Assurez-vous que ce produit existe dans votre table products
                'quantity' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 2, // Assurez-vous que ce produit existe
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Ajoutez plus d'entrées selon vos besoins
        ]);
    }
}