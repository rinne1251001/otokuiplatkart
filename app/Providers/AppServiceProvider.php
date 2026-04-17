<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\ArticleComposer;

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
        View::share('navItems', config('nav.items', []));

        View::composers([
            ArticleComposer::class => [
                'layouts.app',
                'components.article-hero',
                'components.pager-btn',
            ],
        ]);
    }
}
