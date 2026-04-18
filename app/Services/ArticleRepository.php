<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Data\ArticleData;

class ArticleRepository
{
    private ?Collection $articles = null;
    /** @var array<string, ArticleData>|null */
    private ?array $bySlug = null;
    private ?Collection $series = null;

    public function all(): Collection
    {
        return $this->articles ??= collect(config('articles.list', []))
            ->map(fn($item) => ArticleData::fromArray($item));
    }

    public function findBySlug(string $slug): ?ArticleData
    {
        if ($this->bySlug === null) {
            // 最初の1回だけ辞書（索引）を作る（「遅延初期化」「メモ化」）
            $this->bySlug = $this->all()->keyBy('url')->all();
        }
        return $this->bySlug[$slug] ?? null;
    }

    public function findByCategoryAndSlug(string $category, string $slug): ?ArticleData
    {
        $article = $this->findBySlug($slug); // bySlug キャッシュを活用
        return ($article && $article->category === $category) ? $article : null;
    }

    public function allSeries(): Collection
    {
        return $this->series ??= collect(config('articles.series', []));
    }

    public function findSeriesByName(string $name): ?array
    {
        return $this->allSeries()->firstWhere('name', $name);
    }
}