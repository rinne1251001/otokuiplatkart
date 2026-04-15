<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class ArticleComposer
{
    public function compose(View $view): void
    {
        $articles = collect(config('articles.list'));
        $currentRoute = Route::currentRouteName();
        $currentIndex = $articles->search(fn($a) => ($a['url'] ?? '') === $currentRoute);
        
        $current = $currentIndex !== false ? $articles[$currentIndex] : null;

        $tags = [];
        if (!empty($current['tags'])) {
            $tags = array_filter(array_map('trim', (array)$current['tags']));
        }

        $view->with([
            'currentArticle' => $current,
            'prevArticle'    => $currentIndex !== false ? $articles->get($currentIndex + 1) : null,
            'nextArticle'    => $currentIndex > 0      ? $articles->get($currentIndex - 1) : null,
            'currentTags'    => $tags,
        ]);
    }
}