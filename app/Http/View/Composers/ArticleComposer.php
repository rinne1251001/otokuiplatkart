<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Data\ArticleData;

class ArticleComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'currentTags'    => [],
            'prevArticle'    => null,
            'nextArticle'    => null,
            'currentArticle' => null,
        ]);

        $slug = Route::current()?->parameter('slug');
        if (!$slug) return;

        $rawList = Cache::remember('otokuiplatkart.article_list', 3600,
            fn() => config('articles.list', [])
        );

        $articles = collect($rawList)->map(fn($item) => ArticleData::fromArray($item));

        $currentIndex = $articles->search(fn(ArticleData $a) => $a->url === $slug);

        if ($currentIndex === false) return;

        $current = $articles->get($currentIndex);

        $view->with([
            'currentArticle' => $current,
            'nextArticle'    => $currentIndex > 0 ? $articles->get($currentIndex - 1) : null,
            'prevArticle'    => $articles->get($currentIndex + 1),
            'currentTags'    => $current?->tags ?? [],
        ]);
    }
}