<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $stats = [
            'total'  => Lead::count(),
            'unread' => Lead::where('is_read', false)->count(),
            'today'  => Lead::whereDate('created_at', now()->today())->count(),
        ];

        $leads = Lead::latest()->paginate(10);
        return view('admin.leads.index', compact('leads', 'stats'));
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        
        // Mark as read when viewed
        if (!$lead->is_read) {
            $lead->update(['is_read' => true]);
        }
        
        return view('admin.leads.show', compact('lead'));
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
                Lead::whereIn('id', $ids)->delete();
                $message = count($ids) . ' lead records deleted.';
                break;
            case 'mark_as_read':
                Lead::whereIn('id', $ids)->update(['is_read' => true]);
                $message = count($ids) . ' leads marked as read.';
                break;
            case 'mark_as_unread':
                Lead::whereIn('id', $ids)->update(['is_read' => false]);
                $message = count($ids) . ' leads marked as unread.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        
        return redirect()->route('admin.leads.index')->with('success', 'Lead record deleted successfully.');
    }
}
