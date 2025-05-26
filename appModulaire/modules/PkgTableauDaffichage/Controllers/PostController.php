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
    public function index()
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

    public function postsTable()
    {
        $posts = Post::with('categorie')->latest()->paginate(10); // or ->get() if no pagination
        return view('PkgTableauDaffichage::posts', compact('posts'));
    }
}
