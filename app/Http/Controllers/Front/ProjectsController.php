<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::where('is_active', true);

        // Search Filter
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('short_description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Category Filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->paginate(6)->withQueryString();

        // Get categories for sidebar
        $categories = Project::where('is_active', true)
            ->select('category', \DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        return view('pages.projects', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        if (!$project->is_active) abort(404);
        
        $others = Project::where('is_active', true)->where('id', '!=', $project->id)->latest()->take(3)->get();
        
        // Get categories for sidebar
        $categories = Project::where('is_active', true)
            ->select('category', \DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        return view('pages.project-detail', [
            'project' => $project,
            'others' => $others,
            'categories' => $categories,
            'settings' => Setting::allKeyed(),
        ]);
    }
}
