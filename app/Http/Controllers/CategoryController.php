<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function products(Category $category)
    {
        // Récupère les produits associés à la catégorie
        $products = $category->products;

        // Retourne une vue et passe les produits à cette vue
        return view('category', compact('category', 'products'));
    }

    public function show($id)
    {
        // Récupère la catégorie par son ID et précharge ses produits associés
        $category = Category::with('products')->findOrFail($id);

        // Passe la catégorie et ses produits à la vue
        return view('categories.show', compact('category'));
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

    