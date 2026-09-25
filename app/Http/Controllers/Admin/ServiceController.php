<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $stats = [
            'total'   => Service::count(),
            'active'  => Service::where('is_active', true)->count(),
        ];

        $services = Service::orderBy('sort_order')->orderBy('id')->paginate(15);

        return view('admin.services.index', compact('services', 'stats'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'icon_class'  => 'required|string|max:255',
            'summary'     => 'required|string',
            'body'        => 'nullable|string',
            'link_url'    => 'nullable|string|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active'   => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service added successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'icon_class'  => 'required|string|max:255',
            'summary'     => 'required|string',
            'body'        => 'nullable|string',
            'link_url'    => 'nullable|string|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active'   => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
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
                Service::whereIn('id', $ids)->delete();
                $message = count($ids).' services deleted.';
                break;
            case 'activate':
                Service::whereIn('id', $ids)->update(['is_active' => true]);
                $message = count($ids).' services activated.';
                break;
            case 'deactivate':
                Service::whereIn('id', $ids)->update(['is_active' => false]);
                $message = count($ids).' services deactivated.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
