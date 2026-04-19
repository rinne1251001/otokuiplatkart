<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan; // ← 追加：Artisanを使うため
use App\Enums\ArticleCategory;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleListController;

Route::view('/otokuiplatkart', 'articles/top')->name('top');

Route::get('/otokuiplatkart/articles/{category?}/{subcategory?}', [ArticleListController::class, 'index'])
    ->whereIn('category', ArticleCategory::values())
    ->name('articles');

Route::view('/otokuiplatkart/series', 'articles/series')->name('series');

Route::view('/otokuiplatkart/about', 'articles/about')->name('about');

// 記事のリンク（自動生成）
Route::get('/otokuiplatkart/{category}/{slug}', [ArticleController::class, 'show'])
    ->whereIn('category', array_merge(ArticleCategory::values(), ['foreign_railway']))
    ->where('slug', '^[a-z0-9_-]+$')
    ->name('article.show');


// ログイン済み
Route::middleware(['auth'])->group(function () {

    Route::get('/clear-cache', function() {
        Artisan::call('config:cache'); // ← ここは今のまま
        return "アプリケーションの保存データ。計算結果を最新の状態に更新するため";
    });

    Route::get('/config-cache', function() {
        Artisan::call('config:cache');
        return "設定の合体メモ。設定（環境変数など）の変更を反映するため";
    });

    Route::get('/route-cache', function() {
        Artisan::call('route:cache');
        return "ルートのキャッシュを消して作り直す（高速化）";
    });

    Route::view('/gallery', 'articles/gallery')->name('gallery');
});