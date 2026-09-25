<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->latest()->get();
        $posts = Post::where('is_active', true)->latest()->take(3)->get();
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(6)
            ->get();

        return view('pages.home', compact('projects', 'posts', 'services'));
    }
}
