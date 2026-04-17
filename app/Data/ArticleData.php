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
            if (!array_key_exists($key, $data)) {
                throw new \InvalidArgumentException("Missing required key: {$key}");
            }
        }

        // hasFormat + createFromFormat で厳密に検証
        if (!Carbon::hasFormat($data['date'], 'Y.m.d')) {
            throw new \InvalidArgumentException(
                "Invalid date format for value '{$data['date']}': expected Y.m.d"
            );
        }

        // try-catchでパース失敗を補足（オーバーフロー対策）
        try {
            $date = Carbon::createFromFormat('Y.m.d', $data['date'])->startOfDay();
        } catch (\Exception $e) {
            throw new \InvalidArgumentException(
                "Failed to parse date '{$data['date']}': {$e->getMessage()}"
            );
        }

        // 文字列型の型チェック追加
        foreach (['title', 'desc', 'category_name', 'category', 'url', 'img'] as $key) {
            if (!is_string($data[$key])) {
                throw new \InvalidArgumentException("Key '{$key}' must be a string.");
            }
        }

        return new self(
            title:        $data['title'],
            desc:         $data['desc'],
            categoryName: $data['category_name'],
            category:     $data['category'],
            subCategory:  array_values(array_filter((array)($data['sub_category'] ?? []), 'is_string')),
            tags:         array_values(array_filter((array)($data['tags'] ?? []), 'is_string')),
            series:       (isset($data['series']) && is_string($data['series']) && $data['series'] !== '') ? $data['series'] : null,
            url:          $data['url'],
            img:          $data['img'],
            date:         $date,
        );
    }
}