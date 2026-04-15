<?php

return [
    'items' => [
        'トップページ' => ['route' => 'top', 'desc' => 'トップページです'],
        '記事一覧' => ['route' => 'articles', 'desc' => '電車乗ったり電車撮ったり旅行したりカメラで遊んだりします。'],
        '海外の鉄道/旅行記' => ['route' => 'articles','params' => ['category' => 'foreign'], 'desc' => '海外の鉄道です'],
        '国内の鉄道/旅行記' => ['route' => 'articles','params' => ['category' => 'domestic'], 'desc' => '国内の鉄道です'],
        'その他のこと' => ['route' => 'articles','params' => ['category' => 'others'], 'desc' => '鉄道以外の記事になります'],
        'シリーズ' => ['route' => 'series', 'desc' => 'シリーズまとめ'],
        'このサイトについて' => ['route' => 'about', 'desc' => 'このさいとについてのこと'],
    ],
];