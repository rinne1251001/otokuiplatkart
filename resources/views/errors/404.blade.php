@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_404NotFound_отаку_и_плацкарт!!')
@section('content')
<main class="mt-20">

    <div id="slide_wrap" class="w-[calc(100%-100px)] h-[min(100vh,100vw)] mx-auto relative overflow-hidden bg-foreign">

        <img id="img1" class="absolute inset-0 w-full h-full object-cover transition-all duration-3000 ease-in-out opacity-100 scale-105">
        <img id="img2" class="absolute inset-0 w-full h-full object-cover transition-all duration-3000ms ease-in-out opacity-0 scale-100">
        
        <div class="absolute inset-0 bg-black/50 z-0"></div>

        <div class="absolute z-10 text-base text-[clamp(0.3em,1.8vw,1em)] text-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 [text-shadow:2px_2px_10px_rgba(0,0,0,0.8)]">
            <h1 class="font-['takumifont',system-ui] text-[15em] leading-none mb-8">404</h1>
            <p class="text-[1.3em] font-bold">お探しのページは見つかりませんでした</p>
            <p class="mt-8">
                <a href="{{ route('top') }}" class="px-6 py-2 border hover:bg-base hover:text-black transition-colors duration-300">
                    トップページに戻る
                </a>
            </p>
        </div>
    </div>

    <div class="py-20 w-full">
        <div class="flex items-center gap-[1.8em] text-[clamp(0.3em,3vw,1em)] mx-auto w-fit">
            <div><svg class="w-[8em] h-[6.4em] text-font [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold" style="filter: url(#shadow);">for you</h1>
            <div><svg class="w-[8em] h-[6.4em] text-font [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
        </div>

        <div class="grid gap-8 p-5 place-content-center place-items-center grid-cols-[repeat(auto-fit,minmax(min(100%,320px),320px))]">
            @php
                $currentPath = request()->path(); 
                $lastSegment = basename($currentPath, '.html');
                $allArticles = collect(config('articles.list'));
                $baseArticle = $allArticles->firstWhere('url', $lastSegment);
                
                $baseTags = ($baseArticle && !empty($baseArticle['tags'])) 
                            ? explode(',', $baseArticle['tags']) 
                            : [];

                $sortedArticles = $allArticles->map(function($article) use ($lastSegment, $baseArticle, $baseTags, $currentPath) {
                    $score = 0;
                    $currentTags = !empty($article['tags']) ? explode(',', $article['tags']) : [];

                    // URL一致(10000点)、カテゴリ一致（500点）
                    $targetCategory = $baseArticle ? $baseArticle['category'] : '';
                    if ($article['url'] === $lastSegment) {
                        $score += 10000;
                    } elseif (($targetCategory && $article['category'] === $targetCategory) || 
                            (!$targetCategory && str_contains($currentPath, $article['category']))) {
                        $score += 500;
                    }

                    // タグ一致（3000点）
                    if (!empty($baseTags) && !empty($currentTags)) {
                        $matchCount = count(array_intersect($baseTags, $currentTags));
                        $score += $matchCount * 3000;
                    }

                    // シリーズ一致（1000点）
                    if ($baseArticle && !empty($article['series']) && $article['series'] === $baseArticle['series']) {
                        $score += 1000;
                    }

                    // 日付順（2025年1月1日は0.1735686点）
                    $score += (strtotime(str_replace('.', '-', $article['date'])) / 10000000000);

                    $article['calc_score'] = $score;
                    return $article;
                })
                ->sortByDesc('calc_score')
                ->take(3);
            @endphp

            @foreach($sortedArticles as $article)
                @php
                    extract($article);
                    $urlParam = $category === 'foreign' ? 'foreign_railway' : 
                                ($category === 'domestic' ? 'domestic_railway' : $category);
                @endphp
                <div class="w-full rounded-xl overflow-hidden shadow-[1px_1px_30px_rgba(170,153,138,0.2)] duration-150 hover:scale-102">
                    <a href="{{ route('articles', ['category' => $urlParam]) }}" class="w-full justify-center text-base inline-flex items-center p-3" style="background-color: var(--color-{{ $category }});">{{ $category_name }}</a>
                    <a href="{{ Route::has($url) ? route($url) : '#' }}">
                        <img class="h-50 w-full object-cover" src="{{ asset($img) }}" alt="{{ $title }}">
                        <div class="flex flex-col justify-between py-8 px-4 h-53 max-[350px]:h-60">
                            <h3 class="text-[1.2em] font-bold">{{ $title }}</h3>
                            <p class="my-auto">{{ $desc }}</p>
                            <time class="text-[color-mix(in_srgb,var(--color-font),var(--color-base)_40%)] text-sm" datetime="{{ str_replace('.', '-', $date) }}">{{ $date }}</time>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</main>
@endsection

@push('scripts')
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="azarashi" viewBox="0 0 10 8">
        <path fill="currentColor" d="M11.9 2.96h.13c.32.06.64.56.74.8.1.23-.23.46-.13.62.1.15.53.12.73.32.13.3.23.78.07 1.07-.16.29-.61.58-1.04.66-1.05.17-1.11-.13-1.84.21-.45.22-.86.8-1.31 1.32l-.19.2.05.07c.14.21.24.56.3.85.1.4 0 .86-.34 1.04-.34.18-.74-.39-.93-.63a.94.94 0 0 1-.17-.42l-.02-.17-.2.06c-.66.16-1.36.13-1.88.1-.69-.03-2.27-.73-2.28-1.46 0-.74.76-1.96 1.28-2.49.58-.46 1.3-.65 1.87-.83.57-.18 1.5.13 2 .44.51.3 1.13.45 1.53.45.48-.03.62-.1.86-.42.16-.4-.38-.99-.23-1.29.13-.26.66-.48 1-.5z" fill-rule="evenodd" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path fill="var(--parts-color, var(--color-font))" d="M6.12 6.65c0-.17.07-.3.16-.3.09 0 .16.13.16.3 0 .17-.05.28-.16.31-.11.03-.16-.14-.16-.3z" fill-rule="evenodd" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path fill="var(--parts-color, var(--color-font))" d="M4.72 6.25c.05-.08.22-.24.27-.16.05.08.04.22-.04.34-.08.12-.2.21-.27.15-.07-.06-.01-.25.04-.33z" fill-rule="evenodd" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M4.31403 7.41784C4.40001 7.55561 4.51842 7.62952 4.63767 7.65571 4.75693 7.68185 4.90714 7.68451 5.02956 7.57491 5.04419 7.53959 5.04472 7.43891 5.04284 7.4469 5.04096 7.45488 5.01014 7.58722 5.01827 7.62285 4.94558 7.70902 4.95778 7.72707 4.98388 7.80329 5.00998 7.87955 5.06305 8.03902 5.17487 8.08023 5.25675 8.13636 5.33005 8.14403 5.45123 8.14283" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M6.16 7.58c.15-.09.33-.07.5-.04" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M6.33 7.97c.15-.03.31.22.48.3h0" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M6.47 8.48c.01.15.01.3.08.42" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M4.11 6.53c.19.15.34.36.43.58" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M4 7.05c.01.08.04.07.09.07a.9.9 0 0 1 .32.08" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
        <path stroke="var(--parts-color, var(--color-font))" d="M4.07 7.34c-.2.13-.32.3-.48.44" stroke-width="0.143453" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.11211 -3.52113 -3.29514)"/>
    </symbol>
</svg>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const slides = [
        ['{{ asset("images/uzbkkzqh2023/DSC_0961.jpg") }}', '写真1'],
        ['{{ asset("images/uzbkkzqh2023/DSC_0980.jpg") }}', '写真2'],
        ['{{ asset("images/uzbkkzqh2023/DSC_0982.jpg") }}', '写真3'],
        ['{{ asset("images/uzbkkzqh2023/DSC_0985.jpg") }}', '写真4'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5128_s.jpg") }}', '写真5'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5138_s.jpg") }}', '写真6'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5139_s.jpg") }}', '写真7'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5143_s.jpg") }}', '写真8'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5147_s.jpg") }}', '写真9'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5148_s.jpg") }}', '写真10'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5150_s.jpg") }}', '写真11'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5206_s.jpg") }}', '写真12'],
        ['{{ asset("images/uzbkkzqh2023/KIIP5263.jpg") }}', '写真13']
    ];

    let index = Math.floor(Math.random() * slides.length);
    const img1 = document.getElementById("img1");
    const img2 = document.getElementById("img2");

    // 初期化：最初の画像セット
    img1.src = slides[index][0];
    img1.alt = slides[index][1];

    let showingImg1 = true;

    // スライドショー開始
    setInterval(() => {
        index = (index + 1) % slides.length;
        
        const nextImg = showingImg1 ? img2 : img1;
        const prevImg = showingImg1 ? img1 : img2;

        // 次の画像を準備してフェードイン
        nextImg.src = slides[index][0];
        nextImg.alt = slides[index][1];
        
        // アニメーション適用
        nextImg.style.opacity = 1;
        nextImg.style.transform = "scale(1.05)";
        
        prevImg.style.opacity = 0;
        prevImg.style.transform = "scale(1)";
        
        showingImg1 = !showingImg1;
    }, 6000);
});
</script>
@endpush