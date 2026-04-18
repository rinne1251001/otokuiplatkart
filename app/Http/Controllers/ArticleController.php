<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Data\ArticleData;
use Illuminate\Http\RedirectResponse;
use App\Services\ArticleRepository;
use App\Enums\ArticleCategory;

class ArticleController extends Controller
{
    public function __construct(private readonly ArticleRepository $repo) {}

    public function show(string $category, string $slug): View|RedirectResponse
    {
        // 正規化処理
        $normalizedCategory = preg_replace('/_(railway)$/', '', $category) ?? $category;
        $normalizedSlug     = str_replace('.html', '', $slug);

        // リダイレクト処理
        if ($category !== $normalizedCategory || $slug !== $normalizedSlug) {
            return redirect()->route('article.show', [
                'category' => $normalizedCategory,
                'slug'     => $normalizedSlug,
            ], 301);
        }

        // 正規表現バリデーション
        if (!preg_match('/^[a-z0-9_-]+$/', $normalizedSlug)) {
            abort(404);
        }

        // ホワイトリスト検証を明示的に追加
        if (!in_array($normalizedCategory, ArticleCategory::values(), true)) {
            abort(404);
        }

        $article = $this->repo->findByCategoryAndSlug($normalizedCategory, $normalizedSlug);
        if (!$article) {
            abort(404);
        }

        $viewPath = "articles.{$normalizedCategory}.{$normalizedSlug}";

        if (!view()->exists($viewPath)) {
            abort(404);
        }

        return view($viewPath);
    }
}