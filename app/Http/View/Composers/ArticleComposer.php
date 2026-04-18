<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use App\Services\ArticleRepository;
use App\Data\ArticleData;

class ArticleComposer
{
    public function __construct(private readonly ArticleRepository $repo) {}

    public function compose(View $view): void
    {
        $defaults = [
            'currentTags'    => [],
            'prevArticle'    => null,
            'nextArticle'    => null,
            'currentArticle' => null,
        ];

        $slug = Route::current()?->parameter('slug');
        if (!$slug) {
            $view->with($defaults);
            return;
        }

        $articles     = $this->repo->all()->values();
        $currentIndex = $articles->search(fn(ArticleData $a) => $a->url === $slug);

        if ($currentIndex === false) {
            $view->with($defaults);
            return;
        }

        $current = $articles->get($currentIndex);

        // 新着順: index小=新しい。「次の記事」=より新しい(index-1)、「前の記事」=より古い(index+1)
        $view->with([
            'currentArticle' => $current,
            'nextArticle'    => $currentIndex > 0 ? $articles->get($currentIndex - 1) : null,
            'prevArticle'    => $articles->get($currentIndex + 1),
            'currentTags'    => $current?->tags ?? [],
        ]);
    }
}