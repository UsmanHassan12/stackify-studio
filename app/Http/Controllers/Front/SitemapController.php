<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Post;
use App\Models\Service;

class SitemapController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->latest()->get();
        $posts = Post::where('is_active', true)->latest()->get();
        $services = Service::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();

        if (! $services->contains('slug', 'ai-seo-geo')) {
            $seoService = Service::firstOrCreate(
                ['slug' => 'ai-seo-geo'],
                [
                    'title' => 'AI SEO & GEO',
                    'icon_class' => 'fa fa-search',
                    'summary' => 'Generative Engine Optimization and advanced semantic SEO to dominate Google search and AI answer engines like ChatGPT and Perplexity.',
                    'body' => '<p>Modern search is no longer just keywords and backlinks—it is entity recognition, semantic authority, and citation by Large Language Models. We engineer complete AI SEO and Generative Engine Optimization (GEO) strategies that position your brand as the canonical authority in your niche.</p>',
                    'sort_order' => 6,
                    'is_active' => true,
                ]
            );
            $services = Service::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get();
        }

        return response()->view('sitemap', [
            'projects' => $projects,
            'posts' => $posts,
            'services' => $services,
        ])->header('Content-Type', 'text/xml');
    }
}
