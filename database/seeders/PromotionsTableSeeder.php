<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionsTableSeeder extends Seeder
{
    public function run()
    {
        Promotion::create([
            'name' => 'Promotion d\'été',
            'description' => 'Profitez de nos offres spéciales d\'été !',
            'image_url' => 'https://logo-marque.com/wp-content/uploads/2020/09/Google-Logo.png'
        ]);

        // Ajoutez autant de promotions que vous le souhaitez en suivant le même modèle
        Promotion::create([
            'name' => 'Promotion d\'hiver',
            'description' => 'Offres exclusives pour l\'hiver !',
            'image_url' => 'https://logo-marque.com/wp-content/uploads/2020/09/Google-Logo.png'
        ]);
    }
}
