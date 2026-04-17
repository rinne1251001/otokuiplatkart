<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Data\ArticleData;

class ArticleListController extends Controller
{
    public function index(?string $category = null, ?string $subcategory = null): View
    {
        $targetTag    = request('tags');
        $targetSeries = request('series');

        $articles = collect(config('articles.list'))
            ->map(fn($item) => ArticleData::fromArray($item))
            ->filter(function (ArticleData $article) use ($category, $subcategory, $targetTag, $targetSeries) {
                return (!$category    || $article->category === $category)
                    && (!$subcategory || in_array($subcategory, $article->subCategory, true))
                    && (!$targetTag   || in_array($targetTag, $article->tags, true))
                    && (!$targetSeries || $article->series === $targetSeries);
            })
            ->values();

        return view('articles.articles', [
            'targetCategory'    => $category,
            'targetSubCategory' => $subcategory,
            'filteredArticles'  => $articles,
        ]);
    }
}