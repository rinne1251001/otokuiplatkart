<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Data\ArticleData;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    private const VALID_CATEGORIES = ['foreign', 'domestic', 'others'];

    /**
     * @param string $category
     * @param string $slug
     * @return View|RedirectResponse
     */
    public function show(string $category, string $slug): View|RedirectResponse
    {
        // 正規化処理
        $normalizedCategory = preg_replace('/_(railway)$/', '', $category);
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
        if (!in_array($normalizedCategory, self::VALID_CATEGORIES, true)) {
            abort(404);
        }

        // DTO変換前に生配列で検索
        $raw = collect(config('articles.list'))
            ->first(fn($item) =>
                ($item['url'] ?? '') === $normalizedSlug &&
                ($item['category'] ?? '') === $normalizedCategory
            );

        if (!$raw) {
            abort(404);
        }

        $viewPath = "articles.{$normalizedCategory}.{$normalizedSlug}";

        if (!view()->exists($viewPath)) {
            abort(404);
        }

        return view($viewPath);
    }
}