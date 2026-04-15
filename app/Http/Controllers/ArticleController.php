<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class ArticleController extends Controller
{
    public function show(): View
    {
        // 現在動いているルートの名前（uzkz_1など）を取得
        $routeName = Route::currentRouteName();

        // 1. 設定ファイルからこの記事のデータを取得
        $article = collect(config('articles.list'))->firstWhere('url', $routeName);

        // 2. データが見つからない場合の安全策
        if (!$article) {
            abort(404);
        }

        // 3. 表示するBladeファイルのパスを組み立て
        // articles.foreign.uzkz_1 のような形
        $viewPath = "articles.{$article['category']}.{$routeName}";

        // 4. ファイルが物理的に存在するかチェック
        if (!view()->exists($viewPath)) {
            abort(404);
        }

        // 5. 既存の404ページがあれば、ここまでのチェックに漏れたら自動で404へ飛びます
        return view($viewPath, [
            'currentArticle' => $article
        ]);
    }
}