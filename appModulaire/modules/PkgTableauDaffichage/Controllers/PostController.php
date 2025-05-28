<?php

namespace Modules\PkgTableauDaffichage\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Controllers\Controller;
use Modules\PkgTableauDaffichage\Models\Post;
use Illuminate\Support\Facades\DB;
use Modules\PkgTableauDaffichage\Models\PostCategory;

class PostController extends Controller
{
    //
    public function dashboard()
    {
        $posts = Post::with('categorie')->latest()->take(5)->get();

        $totalPosts = Post::count();
        $totalCategories = PostCategory::count();

        $postsPerCategory = PostCategory::withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

        $mostUsedCategory = $postsPerCategory->first();

        return view('PkgTableauDaffichage::dashboard', compact(
            'posts',
            'totalPosts',
            'totalCategories',
            'postsPerCategory',
            'mostUsedCategory'
        ));
    }

    public function index()
    {
        $posts = Post::with('categorie')->latest()->paginate(10);
        return view('PkgTableauDaffichage::posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::all(); // For the category dropdown
        return view('PkgTableauDaffichage::posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image_url' => 'nullable|url|max:255',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:post_categories,id',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post créé avec succès !');
    }

    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('PkgTableauDaffichage::posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image_url' => 'nullable|url|max:255',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:post_categories,id',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post mis à jour avec succès !');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post supprimé avec succès !');
    }
}
