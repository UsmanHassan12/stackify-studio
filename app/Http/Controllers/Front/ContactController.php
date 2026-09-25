<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:30',
            'service'      => 'nullable|string|max:100',
            'website'      => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:100',
            'message'      => 'required|string',
        ]);

        $message = $request->input('message');
        if ($request->filled('website')) {
            $message = "Website: " . $request->input('website') . "\n\n" . $message;
        }
        if ($request->filled('company_size')) {
            $message = "Company Size: " . $request->input('company_size') . "\n" . $message;
        }

        Lead::create([
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'phone'   => $request->input('phone'),
            'service' => $request->input('service'),
            'message' => $message,
        ]);

        return back()->with('success', 'Thank you! Your message has been sent. We will get back to you shortly.');
    }
}
