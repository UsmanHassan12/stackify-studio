<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactCard;
use Illuminate\Http\Request;

class ContactCardController extends Controller
{
    public function index()
    {
        $stats = [
            'total'  => ContactCard::count(),
            'active' => ContactCard::where('is_active', true)->count(),
        ];

        $contactCards = ContactCard::orderBy('sort_order')->orderBy('id')->paginate(15);

        return view('admin.contact-cards.index', compact('contactCards', 'stats'));
    }

    public function create()
    {
        return view('admin.contact-cards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'line_primary'   => 'required|string',
            'line_secondary' => 'nullable|string',
            'icon_class'     => 'required|string|max:255',
            'sort_order'     => 'nullable|integer|min:0',
            'is_active'      => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        ContactCard::create($validated);

        return redirect()->route('admin.contact-cards.index')->with('success', 'Contact card added successfully.');
    }

    public function edit(ContactCard $contact_card)
    {
        return view('admin.contact-cards.edit', ['card' => $contact_card]);
    }

    public function update(Request $request, ContactCard $contact_card)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'line_primary'   => 'required|string',
            'line_secondary' => 'nullable|string',
            'icon_class'     => 'required|string|max:255',
            'sort_order'     => 'nullable|integer|min:0',
            'is_active'      => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $contact_card->update($validated);

        return redirect()->route('admin.contact-cards.index')->with('success', 'Contact card updated successfully.');
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
                ContactCard::whereIn('id', $ids)->delete();
                $message = count($ids).' contact cards deleted.';
                break;
            case 'activate':
                ContactCard::whereIn('id', $ids)->update(['is_active' => true]);
                $message = count($ids).' contact cards activated.';
                break;
            case 'deactivate':
                ContactCard::whereIn('id', $ids)->update(['is_active' => false]);
                $message = count($ids).' contact cards deactivated.';
                break;
            default:
                return back()->with('error', 'Invalid action selected.');
        }

        return back()->with('success', $message);
    }

    public function destroy(ContactCard $contact_card)
    {
        $contact_card->delete();

        return redirect()->route('admin.contact-cards.index')->with('success', 'Contact card deleted successfully.');
    }
}
