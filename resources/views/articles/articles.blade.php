@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_記事一覧_отаку_и_плацкарт!!')
@section('content')

<main>

    @php
        // クエリパラメータから tags を取得
        $targetTag = request('tags');

        $navKey = match($targetCategory) {
            'foreign_railway'  => '海外の鉄道/旅行記',
            'domestic_railway' => '国内の鉄道/旅行記',
            'others'           => 'その他のこと',
            default            => '記事一覧',
        };

        $subNameMap = ['travelogue' => '旅行記', 'location' => '撮影地'];

        // --- Heading の決定ロジック ---
        if ($targetTag) {
            // タグがある場合は最優先で #タグ名 を表示
            $heading = '＃' . $targetTag . 'の記事一覧';
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
        $description = $targetTag ? "「＃{$targetTag}」の記事です" : $currentItem['desc'];

        $currentFilter = match($targetCategory) {
            'foreign_railway'  => 'foreign',
            'domestic_railway' => 'domestic',
            'others'           => 'others',
            default            => $targetCategory,
        };

        $azarashiColorClass = match($currentFilter) {
            'foreign'  => 'text-foreign',
            'domestic' => 'text-domestic',
            'others'   => 'text-others',
            default    => 'text-font',
        };
    @endphp

    <div class="pt-16 pb-4 px-4 grid place-content-center place-items-center gap-4">
        <div class="flex items-center gap-[1.4em] text-[clamp(0.3em,3vw,1em)]">
            <div><svg class="w-[8em] h-[6.4em] {{ $azarashiColorClass }} [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold {{ $azarashiColorClass }} filter-[url(#shadow)]">{{ $heading }}</h1>
            <div><svg class="w-[8em] h-[6.4em] {{ $azarashiColorClass }} [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
        </div>

        <p>{{ $description }}</p>
    </div>

    <div class="grid w-full gap-8 p-5 place-content-center place-items-center grid-cols-[repeat(auto-fit,minmax(min(100%,320px),320px))]">
        <div class="col-span-full flex justify-end w-full px-1">
            <button id="sort-button" data-sort="new" 
                    class="flex items-center gap-[0.2em] py-1 px-2 text-sm cursor-pointer border border-font">
                <span class="material-symbols-outlined" style="font-size: 0.9em;">swap_vert</span>
                <span id="sort-text">新着順</span>
            </button>
        </div>
        @foreach(config('articles.list') as $article)
            @php
                extract($article);
            
                // 判定条件を整理
                $isCategoryMatch = !$currentFilter || $category === $currentFilter;
                $isSubCategoryMatch = !$targetSubCategory || ($sub_category && str_contains($sub_category, $targetSubCategory));
                
                // タグの絞り込み：tagパラメータがある場合、記事のtags文字列に含まれているか
                $isTagMatch = !$targetTag || (isset($tags) && str_contains($tags, $targetTag));

                $urlParam = match($category) {
                    'foreign'  => 'foreign_railway',
                    'domestic' => 'domestic_railway',
                    default    => $category,
                };
            @endphp
            @if($isCategoryMatch && $isSubCategoryMatch && $isTagMatch)
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
            @endif
        @endforeach
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
document.getElementById('sort-button').onclick = function() {
    const c = document.querySelector('.grid.w-full');
    const label = document.getElementById('sort-text');
    const isNew = label.textContent === '新着順';
    const cards = [...c.children].filter(n => n.querySelector('time'));
    cards.sort((a, b) => {
        const t = (el) => el.querySelector('time').dateTime;
        return isNew ? t(a).localeCompare(t(b)) : t(b).localeCompare(t(a));
    });
    c.append(...cards);
    label.textContent = isNew ? '古い順' : '新着順';
};
</script>
@endpush