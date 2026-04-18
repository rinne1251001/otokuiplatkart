@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_記事一覧_отаку_и_плацкарт!!')
@section('content')

<main>

    @php
        // クエリパラメータから tags、series を取得
        $targetTag = request('tags');
        $targetSeries = request('series');

        $seriesConfig = $targetSeries
            ? app(\App\Services\ArticleRepository::class)->findSeriesByName($targetSeries)
            : null;
        $seriesTitle = $seriesConfig['title'] ?? '不明な';

        $targetCategory = $targetCategory ?? null;
        $navKey = match($targetCategory) {
            'foreign'   => '海外の鉄道/旅行記',
            'domestic'  => '国内の鉄道/旅行記',
            'others'    => 'その他のこと',
            default     => '記事一覧',
        };

        $targetSubCategory = $targetSubCategory ?? null;
        $subNameMap = ['travelogue' => '旅行記', 'location' => '撮影地'];

        // --- Heading の決定ロジック ---
        if ($targetTag) {
            // タグがある場合は最優先で #タグ名 を表示
            $heading = '＃' . $targetTag . 'の記事一覧';
        } elseif ($targetSeries) {
            $heading = $seriesTitle . 'シリーズ';
        } elseif (!$targetCategory) {
            $heading = '記事一覧';
        } elseif ($targetSubCategory && isset($subNameMap[$targetSubCategory])) {
            $baseName = str_replace(['の鉄道/旅行記', 'のこと'], '', $navKey);
            $heading = $baseName . 'の' . $subNameMap[$targetSubCategory] . 'の記事一覧';
        } else {
            $heading = $navKey . 'の記事一覧';
        }

        // 説明文とあざらしの色
        $currentItem = $navItems[$navKey] ?? $navItems['記事一覧'];
        $description = match(true) {
            ! empty($targetTag)    => "タグ「＃{$targetTag}」の記事です",
            ! empty($targetSeries) => ($seriesConfig['desc'] ?? $seriesTitle) . 'シリーズの記事です',
            default                => $currentItem['desc'],
        };

        $azarashiColorClass = match($targetCategory) {
            'foreign'  => 'text-foreign',
            'domestic' => 'text-domestic',
            'others'   => 'text-others',
            default    => 'text-font',
        };
    @endphp

    <div class="pt-16 pb-4 px-4 grid place-content-center place-items-center gap-4">
        <div class="flex items-center gap-[1.4em] text-[clamp(0.3em,3vw,1em)]">
            <div><svg class="w-[8em] h-[6.4em] {{ $azarashiColorClass }} [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold {{ $azarashiColorClass }} filter-[url(#shadow)]">{{ $heading }}</h1>
            <div><svg class="w-[8em] h-[6.4em] {{ $azarashiColorClass }} [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
        </div>

        <p>{{ $description }}</p>
    </div>

    @if($filteredArticles->count() > 0)
        <div id="article-grid" class="grid w-full gap-8 p-5 place-content-center place-items-center grid-cols-[repeat(auto-fit,minmax(min(100%,320px),320px))]">
            <div class="col-span-full flex justify-end w-full px-1">
                <button id="sort-button" data-sort="new" 
                        class="flex items-center gap-[0.2em] py-1 px-2 text-sm cursor-pointer border border-font transition-colors duration-300 hover:text-base hover:bg-font">
                    <span class="material-symbols-outlined text-sm!">swap_vert</span>
                    <span id="sort-text">新着順</span>
                </button>
            </div>
            @foreach($filteredArticles as $article)
                <div class="card-wrapper w-full rounded-xl overflow-hidden shadow-[1px_1px_30px_rgba(170,153,138,0.2)] duration-150 hover:scale-102" data-date="{{ $article->date->toDateString() }}">
                    <a href="{{ route('articles', ['category' => $article->category]) }}" class="w-full justify-center text-base inline-flex items-center p-3 hover:brightness-90" style="background-color: var(--color-{{ $article->category }});">{{ $article->categoryName }}</a>
                    <a href="{{ article_route($article->url) }}">
                        <img class="h-50 w-full object-cover" src="{{ asset($article->img) }}" alt="{{ $article->title }}">
                        <div class="flex flex-col justify-between py-8 px-4 h-53 max-[350px]:h-60">
                            <h3 class="text-[1.2em] font-bold">{{ $article->title }}</h3>
                            <p class="my-auto">{{ $article->desc }}</p>
                            <time class="text-[color-mix(in_srgb,var(--color-font),var(--color-base)_40%)] text-sm" datetime="{{ $article->date->toDateString() }}">{{ $article->date->format('Y.m.d') }}</time>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <div class="relative mt-12 mb-8 h-[18em] w-[18em]">
                <svg class="absolute top-0 left-0 w-[9.5em] h-[10em] animate-[kakukaku_1.5s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#cmt" /></svg>
                <svg class="absolute bottom-0 right-0 w-[12.9em] h-[14.7em] animate-[kakukaku_1.5s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashiCry" /></svg>
            </div>
            <p class="font-bold">⚠ 記事はありません ⚠</p>
        </div>
    @endif

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

<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="cmt" viewBox="0 0 19 20">
        <path stroke="var(--color-font)" stroke-width="0.3" stroke-linejoin="round" stroke-miterlimit="10" fill="var(--color-base)" d="M9.6688 17.309C12.0639 17.7826 13.2563 19.2909 14.4697 19.3587 14.5202 18.4614 15.4332 15.794 14.948 12.9366 17.016 10.9292 19.1064 9.63404 18.2426 4.60298 17.3784-0.427758 10.339 1.19552 5.95141 4.06903 2.74158 6.29799-0.24721 13.3438 2.55827 16.0648 5.3634 18.7858 7.49297 18.9792 9.6688 17.309Z" fill-rule="evenodd"/>
        <path stroke-width="0.3" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" d="M2.47162 12.3584C3.63072 11.6843 5.41609 10.9188 6.47209 10.3587" stroke="var(--color-font)"/>
        <path stroke-width="0.3" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" d="M3.47156 9.34636C4.99929 12.8063 6.81181 13.7147 4.00099 15.3466" stroke="var(--color-font)"/>
        <path stroke-width="0.3" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" d="M8.47416 6.32889C8.69794 7.81053 8.94139 8.8107 7.65286 9.32939" stroke="var(--color-font)"/>
        <path stroke-width="0.3" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" d="M8.2978 8.33935C8.99201 9.87541 9.63121 11.6813 10.2979 12.3391" stroke="var(--color-font)"/>
        <path stroke-width="0.3" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" d="M10.4673 5.58589C12.5637 3.49584 13.0268 4.28697 14.2178 6.41464 15.6756 8.74679 16.3072 9.12829 13.5743 10.3621" stroke="var(--color-font)"/>
        <path stroke-width="0.3" stroke-linecap="round" stroke-miterlimit="8" fill="none" fill-rule="evenodd" d="M11.5737 8.4C12.2316 8.00174 12.8455 7.69742 13.5741 7.39997" stroke="var(--color-font)"/>
    </symbol>
</svg>

<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="azarashiCry" viewBox="0 0 86 98">
        <path fill="var(--color-base)" stroke="var(--color-font)" d="M21 50.4c7.4-3.8 28.9-12 35-18.3 6-6.2 7-14.8 3-16.9-4.1-1.9-5-4-6.1-7.4C51.7 4 55.7.2 60.3.7c4.6.5 7 9.2 8.1 12.2-.2-3.6-1.3-8.7 4-10.4C78 1 86 5.3 85.4 10.4c-.6 5-6.3 7.2-10 10.5-3.9 3.2-1.4 6.3-.6 15.6.7 9.4 1.5 12.9-3 27.5-4.6 14.7-26.2 22-37.6 24.4-11.3 2.4-22.8-9.6-22.8-17.7s2.2-16.5 9.6-20.3z" stroke-width="0.7" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/>
        <path fill="var(--color-base)" stroke="var(--color-font)" d="M61.4 70.7c2.3 2.7.1 12.3-1 15.1-1.2 3-4.5 4.2-5.9 1a38 38 0 0 1-.9-13.8" stroke-width="0.7" stroke-linecap="round" stroke-miterlimit="8" fill-rule="evenodd">
            <animate
                attributeName = "d"
                dur = "1.5s"
                repeatCount = "indefinite"
                calcMode="discrete"
                to = "M58.4 66.4c2.5-3 12.4-5.2 16.2-4.6 3.8.5 6.6 4 3.5 6.2-3 2.2-10.8 4-14 3.6"
            />
        </path>

        <path stroke="var(--color-font)" d="M21.8 61.7c1.6 5.4-.2 5-2.4 5 M36.4 69.7c-6.9 0-9.5.6-4 6 M22.4 74.7c-2.2 2.4-3.4 2.8-6 .3 M20.8 76.7c-.9 1.8 0 4.4 1.6 5" stroke-width="0.7" stroke-linecap="round" stroke-miterlimit="8" fill="none"/>

        <g class="animate-[kakukakuTiny_1.5s_steps(1)_infinite]">
            <path fill="var(--color-main)" stroke="var(--color-font)" class="animate-[kakukakuBig_1.5s_steps(1)_infinite]" d="M16.4 65.3c0-.5-.4-2.6-1.5-2.6-1.2 0-2 .7-1.3 2 .7 1.4 2.2 1 2.7.6z" stroke-width="0.7" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/>
            <path fill="var(--color-main)" stroke="var(--color-font)" class="animate-[kakukakuBig_1.5s_steps(1)_infinite]" d="M11.4 61.4c-.1-1-1.6-2.9-2.2-2.7-.6.2-1 0-.7 1.8s2.4 1.1 3 .9z" stroke-width="0.7" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/>
            <path fill="var(--color-main)" stroke="var(--color-font)" class="animate-[kakukakuBig_1.5s_steps(1)_infinite]"  d="M5.4 61c-1.3-.6-3-.2-3.7.6-.7.9 0 2 .7 2 .6.3 2.2-1 3-2.6z" stroke-width="0.7" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/>
            <path fill="var(--color-main)" stroke="var(--color-font)" class="animate-[kakukakuBig_1.5s_steps(1)_infinite]" d="M33.8 77.7c-.8 1.2-.3 3.7.2 4.6.5.8 2.6.3 2.4-1-.2-1.3-1.4-3.9-2.6-3.6z" stroke-width="0.7" stroke-linecap="round" stroke-miterlimit="8" fill-rule="evenodd"/>
            <path fill="var(--color-main)" stroke="var(--color-font)" class="animate-[kakukakuBig_1.5s_steps(1)_infinite]" d="M34 85.7c-.7.7-.8 4.9-.2 5.7.5.9 2.7-.5 2.6-2.2-.1-1.6-1.3-3.7-2.3-3.5z" stroke-width="0.7" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/>
            <path fill="var(--color-main)" stroke="var(--color-font)" class="animate-[kakukakuBig_1.5s_steps(1)_infinite]" d="M33.2 92.7c-.7.6-1 2.3-.7 3.2.2.9 1.6 1 1.8-.1.3-1.3-.3-3-1.1-3.3z" stroke-width="0.7" stroke-linejoin="round" stroke-miterlimit="10" fill-rule="evenodd"/>
        </g>
    </symbol>
</svg>

<script>
const grid = document.getElementById('article-grid');
let ascending = false;
document.getElementById('sort-button').addEventListener('click', () => {
    ascending = !ascending;
    const cards = [...grid.querySelectorAll('[data-date]')];
    cards.sort((a, b) => ascending
        ? a.dataset.date.localeCompare(b.dataset.date)
        : b.dataset.date.localeCompare(a.dataset.date)
    );
    grid.append(...cards);
    document.getElementById('sort-text').textContent = ascending ? '古い順' : '新着順';
});
</script>
@endpush