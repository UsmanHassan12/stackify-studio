<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Setting;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('is_active', true);

        // Search Filter
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('summary', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Category Filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $posts = $query->latest()->paginate(6)->withQueryString();
        $recent_posts = Post::where('is_active', true)->latest()->take(3)->get();

        return view('pages.blog', compact('posts', 'recent_posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $recent_posts = Post::where('is_active', true)->latest()->take(3)->get();
        return view('pages.blog-detail', [
            'post' => $post,
            'recent_posts' => $recent_posts,
            'settings' => Setting::allKeyed(),
        ]);
    }
}
