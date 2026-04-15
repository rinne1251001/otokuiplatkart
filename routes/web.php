<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::view('/otokuiplatkart', 'articles/top')->name('top');
Route::get('/otokuiplatkart/articles/{category?}/{subcategory?}',
    function (string $category = null, string $subcategory = null) {
        return view('articles/articles', [
            'targetCategory' => $category,
            'targetSubCategory' => $subcategory
        ]);
    }
)->whereIn('category', ['foreign', 'domestic', 'others'])->name('articles');
Route::view('/otokuiplatkart/series', 'articles/series')->name('series');
Route::view('/otokuiplatkart/about', 'articles/about')->name('about');


// 記事のリンク（自動生成）
foreach (config('articles.list') as $article) {
    Route::get('/otokuiplatkart/' . $article['category'] . '/' . $article['url'], [ArticleController::class, 'show'])
        ->name($article['url']);
}


Route::middleware(['auth'])->group(function () {
    Route::get('/clear-config', function() {
        Artisan::call('config:cache');
        return "設定キャッシュを削除しました！トップページに戻ってください。";
    });
    Route::view('/gallery', 'articles/gallery')->name('gallery');
});