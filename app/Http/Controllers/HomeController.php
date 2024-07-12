<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {

        $promotions = Product::where('is_promotion', true)->get();


        // Récupérer toutes les catégories
        $categories = Category::all();
        
        // Débogage : Afficher les données de $promotions
        // dd($promotions);
        
        // Renvoyer la vue de la page d'accueil avec les données des promotions et des catégories
        return view('home', compact('promotions', 'categories'));
        
    }
}