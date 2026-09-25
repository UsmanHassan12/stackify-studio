<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Purge compiled view cache in local environment so changes reflect immediately
        $viewFiles = glob(storage_path('framework/views/*.php'));
        if ($viewFiles && count($viewFiles) > 10) {
            foreach ($viewFiles as $file) {
                @unlink($file);
            }
        }

        $shareSettings = function ($view) {
            $view->with('settings', Setting::allKeyed());
        };

        View::composer('layouts.app', function ($view) use ($shareSettings) {
            $shareSettings($view);
            $view->with(
                'socialLinks',
                SocialLink::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get()
            );
        });

        View::composer('admin.layouts.app', $shareSettings);

        View::composer('admin.auth.login', $shareSettings);
    }
}
