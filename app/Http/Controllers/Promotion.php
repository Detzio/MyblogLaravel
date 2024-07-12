<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Affiche une liste de toutes les promotions.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    /**
     * Montre le formulaire de création d'une nouvelle promotion.
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Stocke une nouvelle promotion créée dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Promotion::create($request->all());
        return redirect()->route('promotions.index')->with('success', 'Promotion créée avec succès.');
    }

    /**
     * Affiche une promotion spécifique.
     */
    public function show(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    /**
     * Montre le formulaire d'édition pour une promotion existante.
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Met à jour une promotion spécifique dans la base de données.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $promotion->update($request->all());
        return redirect()->route('promotions.index')->with('success', 'Promotion mise à jour avec succès.');
    }

    /**
     * Supprime une promotion spécifique de la base de données.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Promotion supprimée avec succès.');
    }
}