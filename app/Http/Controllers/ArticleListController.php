<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Data\ArticleData;
use App\Services\ArticleRepository;
use App\Enums\ArticleCategory;
use App\Enums\ArticleSubCategory;

class ArticleListController extends Controller
{
    public function __construct(private readonly ArticleRepository $repo) {}

    public function index(?string $category = null, ?string $subcategory = null): View
    {
        $targetTag    = is_string(request('tags'))   ? mb_substr(request('tags'),   0, 100) : null;
        $targetSeries = is_string(request('series')) ? mb_substr(request('series'), 0, 100) : null;

        // subcategoryのホワイトリスト検証（ルートでカバーされていない）
        if ($subcategory !== null && !in_array($subcategory, ArticleSubCategory::values(), true)) {
            abort(404);
        }
        
        $articles = $this->repo->all()
            ->filter(function (ArticleData $article) use ($category, $subcategory, $targetTag, $targetSeries) {
                return (!$category     || $article->category === $category)
                    && (!$subcategory  || in_array($subcategory, $article->subCategory, true))
                    && (!$targetTag    || in_array($targetTag, $article->tags, true))
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