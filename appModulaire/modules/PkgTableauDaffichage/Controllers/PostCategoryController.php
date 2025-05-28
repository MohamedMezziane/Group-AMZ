<?php

namespace Modules\PkgTableauDaffichage\Controllers;

use Modules\Core\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\PkgTableauDaffichage\Models\PostCategory;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::latest()->get();
        return view('PkgTableauDaffichage::categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        PostCategory::create(['nom' => $request->nom]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès!');
    }

    public function edit(PostCategory $category)
    {
        $categories = PostCategory::latest()->get();
        return view('PkgTableauDaffichage::categories.index', compact('categories', 'category'));
    }

    public function update(Request $request, PostCategory $category)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $category->update(['nom' => $request->nom]);

        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée avec succès!');
    }

    public function destroy(PostCategory $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}
