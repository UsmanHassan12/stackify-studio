<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $stats = [
            'total'      => Post::count(),
            'categories' => Post::distinct('category')->count('category'),
            'published'  => Post::where('published_at', '<=', now())->count(),
        ];

        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts', 'stats'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'required|string',
            'read_time' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($request->title);
        $data['published_at'] = now();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blog'), $filename);
            $data['image_path'] = 'uploads/blog/' . $filename;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'required|string',
            'read_time' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image_path && file_exists(public_path($post->image_path)) && str_contains($post->image_path, 'uploads/')) {
                unlink(public_path($post->image_path));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blog'), $filename);
            $data['image_path'] = 'uploads/blog/' . $filename;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
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
                Post::whereIn('id', $ids)->delete();
                $message = count($ids) . ' posts deleted.';
                break;
            case 'activate':
                Post::whereIn('id', $ids)->update(['is_active' => true]);
                $message = count($ids) . ' posts activated.';
                break;
            case 'deactivate':
                Post::whereIn('id', $ids)->update(['is_active' => false]);
                $message = count($ids) . ' posts deactivated.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
