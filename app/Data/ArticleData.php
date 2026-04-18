<?php

namespace App\Data;

use Illuminate\Support\Carbon;

final readonly class ArticleData
{
    public function __construct(
        public string $title,
        public string $desc,
        public string $categoryName,
        public string $category,
        /** @var string[] */
        public array $subCategory,
        /** @var string[] */
        public array $tags,
        public ?string $series,
        public string $url,
        public string $img,
        public Carbon $date,
    ) {}

    public function route(): string
    {
        return route('article.show', [
            'category' => $this->category,
            'slug'     => $this->url
        ]);
    }
    
    public static function fromArray(array $data): self
    {
        // 必須キーの存在確認
        foreach (['title', 'desc', 'category_name', 'category', 'url', 'img', 'date'] as $key) {
            if (!array_key_exists($key, $data) || !is_string($data[$key]) || $data[$key] === '') {
                throw new \InvalidArgumentException("Missing required key: config/articles.phpに{$key}が足りないか文字列ではないか空文字です");
            }
        }

        // カテゴリのホワイトリスト検証
        if (!in_array($data['category'], \App\Enums\ArticleCategory::values(), true)) {
            throw new \InvalidArgumentException(
                "config/articles.phpのcategoryが間違っています: '{$data['category']}'。有効な値は [" . implode(', ', \App\Enums\ArticleCategory::values()) . "] です。"
            );
        }

        $subCategories = (array)($data['sub_category'] ?? []);
        foreach ($subCategories as $sub) {
            if (!is_string($sub) || !in_array($sub, \App\Enums\ArticleSubCategory::values(), true)) {
                throw new \InvalidArgumentException(
                    "config/articles.phpのsub_categoryが間違っています: '{$sub}'。有効な値は [" . implode(', ', \App\Enums\ArticleSubCategory::values()) . "] です。"
                );
            }
        }

        // 画像のホワイトリスト検証
        if (!str_starts_with($data['img'], 'images/')) {
            throw new \InvalidArgumentException(
                "config/articles.phpのimgパスは 'images/' で始まる必要があります（入力値: '{$data['img']}'）"
            );
        }
        if (str_contains($data['img'], '..')) {
            throw new \InvalidArgumentException("imgパスにパストラバーサルが含まれています: '{$data['img']}'");
        }

        // オーバーフロー対策: パース後に文字列が一致するか照合する
        try {
            $parsed = Carbon::createFromFormat('Y.m.d', $data['date']);
        } catch (\Throwable) {
            $parsed = false;
        }
        if (!$parsed || $parsed->format('Y.m.d') !== $data['date']) {
            throw new \InvalidArgumentException(
                "日付が不正または存在しない日付です: '{$data['date']}'"
            );
        }
        $date = $parsed->startOfDay();

        return new self(
            title:        $data['title'],
            desc:         $data['desc'],
            categoryName: $data['category_name'],
            category:     $data['category'],
            subCategory:  $subCategories,
            tags:         array_values(array_filter((array)($data['tags'] ?? []), 'is_string')),
            series:       (isset($data['series']) && is_string($data['series']) && $data['series'] !== '')
                            ? $data['series']
                            : null,
            url:          $data['url'],
            img:          $data['img'],
            date:         $date,
        );
    }
}