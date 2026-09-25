<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactCard;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactCards = ContactCard::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        if ($contactCards->isEmpty() || $contactCards->contains(fn ($c) => str_contains($c->line_primary, 'San Francisco') || str_contains($c->line_primary, 'hello@') || str_contains($c->line_primary, '800 555'))) {
            ContactCard::updateOrCreate(
                ['sort_order' => 1],
                [
                    'title' => 'Visit Our Office',
                    'line_primary' => 'Islamabad, Pakistan',
                    'line_secondary' => 'Engineering & AI Operations HQ',
                    'icon_class' => 'fa fa-map-marker',
                    'sort_order' => 1,
                    'is_active' => true,
                ]
            );
            ContactCard::updateOrCreate(
                ['sort_order' => 2],
                [
                    'title' => 'Call Us',
                    'line_primary' => '+92 312 7535263',
                    'line_secondary' => 'Mon–Fri, 9am – 6pm PKT',
                    'icon_class' => 'fa fa-phone',
                    'sort_order' => 2,
                    'is_active' => true,
                ]
            );
            ContactCard::updateOrCreate(
                ['sort_order' => 3],
                [
                    'title' => 'Email Us',
                    'line_primary' => 'info@stackifystudio.com',
                    'line_secondary' => 'We reply within 24 hours',
                    'icon_class' => 'fa fa-envelope',
                    'sort_order' => 3,
                    'is_active' => true,
                ]
            );
            $contactCards = ContactCard::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
        }

        return view('pages.contact', compact('contactCards'));
    }
}
