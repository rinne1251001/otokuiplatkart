<?php

if (!function_exists('article_route')) {
    function article_route(string $slug): string
    {
        /** @var \App\Services\ArticleRepository $repo */
        $repo    = app(\App\Services\ArticleRepository::class);
        $article = $repo->findBySlug($slug);

        if (!$article) {
            report(new \RuntimeException(
                "article_route: config/articles.phpのurlに '{$slug}' がありません"
            ));
            return route('top');
        }

        return $article->route(); // ArticleData::route() に委譲
    }
}