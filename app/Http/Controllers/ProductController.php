<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Affiche la liste de tous les produits
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Affiche le formulaire de création d'un nouveau produit
    public function create()
    {
        return view('products.create');
    }

    // Enregistre un nouveau produit dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Ajoutez d'autres champs de validation selon votre modèle
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Affiche un produit spécifique
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Affiche le formulaire d'édition pour un produit spécifique
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Met à jour un produit dans la base de données
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Ajoutez d'autres champs de validation selon votre modèle
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Supprime un produit de la base de données
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}