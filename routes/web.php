<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return "設定キャッシュを削除しました！トップページに戻ってください。";
});

Route::view('/otokuiplatkart', 'articles/top')->name('top');
Route::get('/otokuiplatkart/articles/{category?}/{subcategory?}', function ($category = null, $subcategory = null) {
    return view('articles/articles', [
        'targetCategory' => $category,
        'targetSubCategory' => $subcategory
    ]);
})->name('articles');
Route::view('/otokuiplatkart/series', 'articles/series')->name('series');
Route::view('/otokuiplatkart/about', 'articles/about')->name('about');


//海外の記事
Route::view('/otokuiplatkart/foreign_railway/uzkz_matome', 'articles/foreign/uzkz_matome')->name('uzkz_matome');
Route::view('/otokuiplatkart/foreign_railway/uzkz_1', 'articles/foreign/uzkz_1')->name('uzkz_1');
Route::view('/otokuiplatkart/foreign_railway/uzkz_2', 'articles/foreign/uzkz_2')->name('uzkz_2');
Route::view('/otokuiplatkart/foreign_railway/honhol_spot', 'articles/foreign/honhol_spot')->name('honhol_spot');
<<<<<<< HEAD
Route::view('/otokuiplatkart/rujigou_noritetsu', 'articles/foreign/rujigou_noritetsu')->name('rujigou_noritetsu');
=======
Route::view('/otokuiplatkart/rujigou_noritetsu', 'articles/foreign/rujigounoritetsu')->name('rujigou_noritetsu');
>>>>>>> 8215111e878ae8977d33e44f2e2f743775eee9a8

//その他の記事
Route::view('/otokuiplatkart/others/album', 'articles/others/album')->name('album');
Route::view('/otokuiplatkart/others/memorygame', 'articles/others/memorygame')->name('memorygame');
