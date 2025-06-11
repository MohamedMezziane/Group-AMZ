<?php

namespace Modules\PkgTableauDaffichage\Controllers;

use Modules\Core\Controllers\Controller;
use Modules\PkgTableauDaffichage\Models\PostCategory;
use Modules\PkgTableauDaffichage\App\requests\StorePostCategoryRequest;
use Modules\PkgTableauDaffichage\App\requests\UpdatePostCategoryRequest;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::latest()->get();
        return view('PkgTableauDaffichage::categories.index', compact('categories'));
    }

    public function store(StorePostCategoryRequest $request)
    {
        PostCategory::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès!');
    }

    public function edit(PostCategory $category)
    {
        $categories = PostCategory::latest()->get();
        return view('PkgTableauDaffichage::categories.index', compact('categories', 'category'));
    }

    public function update(UpdatePostCategoryRequest $request, PostCategory $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée avec succès!');
    }

    public function destroy(PostCategory $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}
