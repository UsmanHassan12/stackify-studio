<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $stats = [
            'total'     => Project::count(),
            'with_live' => Project::whereNotNull('live_url')->count(),
            'named'     => Project::whereNotNull('client_name')->count(),
        ];

        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects', 'stats'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description'  => 'nullable|string',
            'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'client_name'       => 'nullable|string|max:255',
            'live_url'          => 'nullable|url',
            'is_active'         => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $validated['image_path'] = 'uploads/projects/' . $filename;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description'  => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'client_name'       => 'nullable|string|max:255',
            'live_url'          => 'nullable|url',
            'is_active'         => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists and it's in the uploads folder
            if ($project->image_path && file_exists(public_path($project->image_path)) && str_contains($project->image_path, 'uploads/')) {
                unlink(public_path($project->image_path));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $validated['image_path'] = 'uploads/projects/' . $filename;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function bulkAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return back()->with('error', 'No items selected for bulk action.');
        }

        switch ($action) {
            case 'delete':
                Project::whereIn('id', $ids)->delete();
                $message = count($ids) . ' projects deleted.';
                break;
            case 'activate':
                Project::whereIn('id', $ids)->update(['is_active' => true]);
                $message = count($ids) . ' projects activated.';
                break;
            case 'deactivate':
                Project::whereIn('id', $ids)->update(['is_active' => false]);
                $message = count($ids) . ' projects deactivated.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
