@php
    // 1. configからリストを取得
    $articles = config('articles.list');

    // 2. 現在のURLの末尾を取得
    $currentRouteName = Route::currentRouteName();

    // 3. 現在の記事がリストの何番目にあるか探す
    $currentIndex = collect($articles)->search(fn($item) => $item['url'] === $currentRouteName);

    // 4. 前後の記事データを取得（配列の並び順に基づき、+1が過去、-1が未来）
    $prevArticle = $currentIndex !== false && isset($articles[$currentIndex + 1]) ? $articles[$currentIndex + 1] : null;
    $nextArticle = $currentIndex !== false && isset($articles[$currentIndex - 1]) ? $articles[$currentIndex - 1] : null;
@endphp

<div class="flex items-center justify-center gap-[3em] text-[clamp(3px,1.2vw,10px)] md:text-[clamp(10px,0.8vw,16px)] py-4">
    @if($prevArticle)
        <a href="{{ route($prevArticle['url']) }}" class="hover:scale-110">
            <div class="relative">
                <div class="relative">
                    <svg class="w-[13em] h-[8em] filter-[url(#shadow)]">
                        <use xlink:href="#azarashiBtn" />
                    </svg>
                </div>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+0.55em)] -translate-y-[calc(50%-0.35em)] text-[2.5em] text-main] [-webkit-text-stroke:0.04em_var(--color-main)]">
                    前
                </div>
            </div>
        </a>
    @endif

    <a href="{{ route('articles') }}" class="hover:scale-105">
        <div class="relative">
            <div class="relative">
                <svg class="w-[27em] h-[12em] filter-[url(#shadow)]">
                    <use xlink:href="#azarashiBtn2" />
                </svg>
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-1.5em)] -translate-y-[calc(50%+0.2em)] text-[2.5em] text-yellow)] [-webkit-text-stroke:0.04em_var(--color-yellow)]">
                記事一覧
            </div>
        </div>
    </a>

    @if($nextArticle)
        <a href="{{ route($nextArticle['url']) }}" class="hover:scale-110">
            <div class="relative">
                <div class="relative">
                    <svg class="w-[13em] h-[8em] filter-[url(#shadow)]">
                        <use xlink:href="#azarashiBtn" />
                    </svg>
                </div>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+0.55em)] -translate-y-[calc(50%-0.35em)] text-[2.5em] text-main] [-webkit-text-stroke:0.04em_var(--color-main)]">
                    次
                </div>
            </div>
        </a>
    @endif
</div>

