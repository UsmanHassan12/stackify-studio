<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $stats = [
            'total'  => Subscriber::count(),
            'month'  => Subscriber::where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        $subscribers = Subscriber::latest()->paginate(10);
        return view('admin.subscribers.index', compact('subscribers', 'stats'));
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
                Subscriber::whereIn('id', $ids)->delete();
                $message = count($ids) . ' subscribers removed.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber removed successfully.');
    }
}
