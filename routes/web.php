<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\ProjectsController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ServicesController;
use App\Http\Controllers\Front\ContactPageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ContactCardController as AdminContactCardController;
use App\Http\Controllers\Admin\SocialLinkController as AdminSocialLinkController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('pages.home');
Route::get('/sitemap.xml', [\App\Http\Controllers\Front\SitemapController::class, 'index'])->name('sitemap');

Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');

Route::get('/services', [ServicesController::class, 'index'])->name('pages.services');
Route::get('/services/{service}', [ServicesController::class, 'show'])->name('pages.services.show');

Route::get('/ai-audit', function () {
    return view('pages.ai-audit');
})->name('pages.ai-audit');

Route::get('/seo-consultation', function () {
    return view('pages.seo-consultation');
})->name('pages.seo-consultation');

Route::get('/seo-audit', function () {
    return redirect()->route('pages.seo-consultation', [], 301);
})->name('pages.seo-audit');

Route::get('/contact', [ContactPageController::class, 'index'])->name('pages.contact');

Route::post('/contact', [\App\Http\Controllers\Front\ContactController::class, 'submit'])
    ->middleware('throttle:12,1')
    ->name('contact.submit');
Route::post('/newsletter/subscribe', [\App\Http\Controllers\Front\NewsletterController::class, 'subscribe'])
    ->middleware('throttle:15,1')
    ->name('newsletter.subscribe');
Route::get('/unsubscribe', [\App\Http\Controllers\Front\NewsletterController::class, 'unsubscribeView'])->name('newsletter.unsubscribe.view');
Route::post('/unsubscribe', [\App\Http\Controllers\Front\NewsletterController::class, 'unsubscribe'])
    ->middleware('throttle:20,1')
    ->name('newsletter.unsubscribe');

Route::get('/blog', [BlogController::class, 'index'])->name('pages.blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('pages.blog.show');

Route::get('/projects', [ProjectsController::class, 'index'])->name('pages.projects');
Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('pages.projects.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login'])
            ->middleware('throttle:8,1')
            ->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [SiteSettingsController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SiteSettingsController::class, 'update'])->name('settings.update');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::prefix('projects')->name('projects.')->group(function () {
            Route::post('/bulk-action', [AdminProjectController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('projects', AdminProjectController::class)->except(['show']);

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::post('/bulk-action', [AdminPostController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('posts', AdminPostController::class)->except(['show']);

        Route::prefix('services')->name('services.')->group(function () {
            Route::post('/bulk-action', [AdminServiceController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('services', AdminServiceController::class)->except(['show']);

        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::post('/bulk-action', [AdminFaqController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('faqs', AdminFaqController::class)->except(['show']);

        Route::prefix('contact-cards')->name('contact-cards.')->group(function () {
            Route::post('/bulk-action', [AdminContactCardController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('contact-cards', AdminContactCardController::class)->except(['show']);

        Route::prefix('social-links')->name('social-links.')->group(function () {
            Route::post('/bulk-action', [AdminSocialLinkController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('social-links', AdminSocialLinkController::class)->except(['show']);

        Route::prefix('leads')->name('leads.')->group(function () {
            Route::post('/bulk-action', [\App\Http\Controllers\Admin\LeadController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('leads', \App\Http\Controllers\Admin\LeadController::class)->only(['index', 'show', 'destroy']);

        Route::prefix('subscribers')->name('subscribers.')->group(function () {
            Route::post('/bulk-action', [AdminSubscriberController::class, 'bulkAction'])->name('bulk');
        });
        Route::resource('subscribers', \App\Http\Controllers\Admin\SubscriberController::class)->only(['index', 'destroy']);
    });
});

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('pages.privacy');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('pages.terms');

Route::get('/cookies', function () {
    return view('pages.cookies');
})->name('pages.cookies');
