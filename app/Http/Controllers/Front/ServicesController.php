<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('pages.services', compact('services', 'faqs'));
    }

    public function show($service)
    {
        if (is_string($service)) {
            $serviceModel = Service::where('slug', $service)->first();
            if (! $serviceModel && $service === 'ai-seo-geo') {
                $serviceModel = Service::firstOrCreate(
                    ['slug' => 'ai-seo-geo'],
                    [
                        'title' => 'AI SEO & GEO',
                        'icon_class' => 'fa fa-search',
                        'summary' => 'Generative Engine Optimization and advanced semantic SEO to dominate Google search and AI answer engines like ChatGPT and Perplexity.',
                        'body' => '<p>Modern search is no longer just keywords and backlinks—it is entity recognition, semantic authority, and citation by Large Language Models. We engineer complete AI SEO and Generative Engine Optimization (GEO) strategies that position your brand as the canonical authority in your niche.</p><h3>Core Focus Areas</h3><ul><li><strong>Entity-Based Semantic Architecture:</strong> Structuring content clusters so AI search engines and Google Knowledge Graph recognize your topical mastery.</li><li><strong>Generative Engine Optimization (GEO):</strong> Optimizing brand visibility and source citations across Perplexity, ChatGPT Search, Gemini, and Claude.</li><li><strong>Technical & Speed Optimization:</strong> Schema markup, sub-second TTFB, and spotless Core Web Vitals for maximum crawl efficiency.</li><li><strong>High-Authority Digital PR & Citations:</strong> Earning authoritative backlinks and mentions that train both search algorithms and LLM training sets.</li></ul>',
                        'sort_order' => 6,
                        'is_active' => true,
                    ]
                );
            }
            $service = $serviceModel;
        }

        if (! $service || ! $service->is_active) {
            abort(404);
        }

        $others = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(8)
            ->get();

        return view('pages.service-detail', compact('service', 'others'));
    }
}
