<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('article_route')) {
    function article_route(string $slug): string
    {
        /** @var array<string, array> $index */
        $index = Cache::rememberForever('article_url_map', fn() =>
            collect(config('articles.list'))->keyBy('url')->all()
        );

        $article = $index[$slug] ?? null;

        if (!$article || !isset($article['category'], $article['url'])) {
            return route('top');
        }

        // 共通ルート 'article.show' にカテゴリとスラグを渡す
        return route('article.show', [
            'category' => $article['category'],
            'slug'     => $article['url'],
        ]);
    }
}