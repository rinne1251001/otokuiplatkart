<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\ArticleComposer;
use App\Services\ArticleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ArticleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            View::composer([
                'layouts.app', 
                'articles.top', 
                'articles.articles'
            ], function ($view) {
                $view->with('navItems', config('nav.items', []));
            });
        }

        // トップページ用のデータをここで渡す
        View::composer('articles.top', function ($view) {
            $repo = app(ArticleRepository::class);
            $all  = $repo->all(); // 1回だけ呼ぶ

            $view->with([
                'slideArticles'  => $all->take(10),
                'latestArticles' => $all->take(2),
            ]);
        });

        View::composers([
            ArticleComposer::class => [
                'components.article-hero',
                'components.pager-btn',
            ],
        ]);
    }
}
