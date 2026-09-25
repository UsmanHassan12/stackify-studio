<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Post;
use App\Models\Lead;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects'    => Project::count(),
            'posts'       => Post::count(),
            'leads'       => Lead::count(),
            'subscribers' => Subscriber::count(),
            'unread_leads' => Lead::where('is_read', false)->count(),
        ];

        $recentLeads = Lead::latest()->take(5)->get();
        $recentPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentLeads', 'recentPosts'));
    }
}
