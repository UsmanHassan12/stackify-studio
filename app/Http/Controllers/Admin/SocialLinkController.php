<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $stats = [
            'total'  => SocialLink::count(),
            'active' => SocialLink::where('is_active', true)->count(),
        ];

        $socialLinks = SocialLink::orderBy('sort_order')->orderBy('id')->paginate(15);

        return view('admin.social-links.index', compact('socialLinks', 'stats'));
    }

    public function create()
    {
        return view('admin.social-links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label'      => 'required|string|max:100',
            'url'        => 'nullable|string|max:2048',
            'icon_class' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link added successfully.');
    }

    public function edit(SocialLink $social_link)
    {
        return view('admin.social-links.edit', ['link' => $social_link]);
    }

    public function update(Request $request, SocialLink $social_link)
    {
        $validated = $request->validate([
            'label'      => 'required|string|max:100',
            'url'        => 'nullable|string|max:2048',
            'icon_class' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $social_link->update($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link updated successfully.');
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
                SocialLink::whereIn('id', $ids)->delete();
                $message = count($ids).' social links deleted.';
                break;
            case 'activate':
                SocialLink::whereIn('id', $ids)->update(['is_active' => true]);
                $message = count($ids).' social links activated.';
                break;
            case 'deactivate':
                SocialLink::whereIn('id', $ids)->update(['is_active' => false]);
                $message = count($ids).' social links deactivated.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy(SocialLink $social_link)
    {
        $social_link->delete();

        return redirect()->route('admin.social-links.index')->with('success', 'Social link deleted successfully.');
    }
}
