<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Crée une nouvelle instance du contrôleur.
     *
     * @return void
     */
    public function __construct()
    {
        // Ce middleware est un exemple; ajustez selon vos besoins.
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Affiche la page d'accueil.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Vous pouvez passer des données supplémentaires à la vue si nécessaire.
        return view('app');
    }
    public function Contact()
    {
        return view('contact');
    }
}
