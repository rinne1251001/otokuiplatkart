<div class="flex items-center justify-center gap-[3em] text-[clamp(3px,1.2vw,10px)] md:text-[clamp(10px,0.8vw,16px)] py-4">
    @if($nextArticle)
        <a href="{{ $nextArticle->route() }}" class="hover:scale-110">
            <div class="relative">
                <svg class="w-[13em] h-[8em] -scale-x-100 filter-[url(#shadow)]">
                    <use href="#azarashiBtn" />
                </svg>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-0.5em)] -translate-y-[calc(50%-0.35em)] text-[2.5em] text-main [-webkit-text-stroke:0.04em_var(--color-main)]">
                    次
                </div>
            </div>
        </a>
    @endif

    <a href="{{ route('articles') }}" class="hover:scale-105">
        <div class="relative">
            <svg class="w-[27em] h-[12em] filter-[url(#shadow)]">
                <use href="#azarashiBtn2" />
            </svg>
            <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-1.5em)] -translate-y-[calc(50%+0.2em)] text-[2.5em] text-yellow [-webkit-text-stroke:0.04em_var(--color-yellow)]">
                記事一覧
            </div>
        </div>
    </a>

    @if($prevArticle)
        <a href="{{ $prevArticle->route() }}" class="hover:scale-110">
            <div class="relative">
                <svg class="w-[13em] h-[8em] filter-[url(#shadow)]">
                    <use href="#azarashiBtn" />
                </svg>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+0.55em)] -translate-y-[calc(50%-0.35em)] text-[2.5em] text-main [-webkit-text-stroke:0.04em_var(--color-main)]">
                    前
                </div>
            </div>
        </a>
    @endif
</div>