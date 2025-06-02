<?php

namespace Modules\PkgTableauDaffichage\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Controllers\Controller;
use Modules\PkgTableauDaffichage\Models\Post;
use Illuminate\Support\Facades\DB;
use Modules\PkgTableauDaffichage\Models\PostCategory;
use Illuminate\Support\Facades\Storage;

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

    public function index(Request $request)
    {
        $query = Post::with('categorie')->latest();

        if ($request->filled('search')) {
            $query->where('titre', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('categorie_id', $request->category_id);
        }

        $posts = $query->paginate(10)->withQueryString();

        $categories = PostCategory::all();
        return view('PkgTableauDaffichage::posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = PostCategory::all(); // For the category dropdown
        return view('PkgTableauDaffichage::posts.create', compact('categories'));
    }

    public function publicIndex()
    {
        $posts = Post::with('categorie')->latest()->paginate(9);
        return view('PkgTableauDaffichage::posts.public', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:post_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        }

        Post::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post créé avec succès!');
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
            'description' => 'required|string',
            'categorie_id' => 'required|exists:post_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $post->image_url;

        if ($request->hasFile('image')) {
            // Optionally delete old image
            if ($post->image_url && file_exists(public_path($post->image_url))) {
                unlink(public_path($post->image_url));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        }

        $post->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post mis à jour avec succès !');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post supprimé avec succès !');
    }
}
