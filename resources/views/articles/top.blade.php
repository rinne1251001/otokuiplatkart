@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_トップページ_отаку_и_плацкарт!!')
@section('content')

<main>

    <div id="slideshow" class="w-screen h-auto aspect-3/2 mt-[calc(-100dvw/301*16)] relative overflow-hidden">
        @foreach(collect(config('articles.list'))->take(10)->map(fn($item) => \App\Data\ArticleData::fromArray($item)) as $index => $article)
            <div class="slide absolute inset-0 transition-opacity duration-4000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" style="z-index: {{ $index === 0 ? '0' : '-10' }};">
                <img src="{{ asset($article->img) }}" class="w-full h-full object-cover bg-main">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="absolute text-base text-center flex flex-col gap-2 lg:gap-8 px-8 w-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h2 class="text-lg min-[400px]:text-2xl lg:text-4xl font-bold">{{ $article->title }}</h2>
                    <p class="text-sm min-[400px]:text-lg lg:text-2xl max-w-[46em] mx-auto">{{ $article->desc }}</p>
                    <a href="{{ $article->route() }}" class="self-center text-xs min-[400px]:text-[1rem] mt-1 min-[400px]:mt-4 sm:mt-8 px-6 py-2 border border-base hover:bg-base hover:text-black transition-colors duration-300">
                    この投稿を見る
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-[calc(-100dvw/301*16)] filter-[url(#shadow)]">
        <div><svg class="w-screen h-auto aspect-301/16 text-main transform-[scale(-1,-1)] overflow-x-hidden"><use href="#headerWave" /></svg></div>
        <div class="relative h-[clamp(200vh,150vw,300vh)] w-screen bg-[color-mix(in_srgb,var(--color-main),var(--color-base)_60%)]">
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="relative w-full h-full max-w-screen text-[clamp(20px,8vw,200px)] overflow-x-hidden">
                    <div class="absolute top-0 left-0 w-full h-full" style="background: linear-gradient(transparent 0% 5%, color-mix(in srgb, var(--color-main), transparent 85%) 15% 17%, transparent 20% 22%, color-mix(in srgb, var(--color-main), transparent 80%) 40% 41%, transparent 50% 53%, color-mix(in srgb, var(--color-main), transparent 65%) 65% 66%, transparent 75% 78%, color-mix(in srgb, var(--color-main), transparent 70%) 85% 87%, transparent 90% 91%, color-mix(in srgb, var(--color-main), transparent 70%) 95% 96%, transparent 99% 100%); filter: blur(20px);"></div>

                    <div class="absolute top-0 left-0 h-[3em] w-full" style="background: linear-gradient(var(--color-main) 0% 5%, transparent 90% 100%);"></div>
                    <div class="absolute bottom-0 left-0 h-[3em] w-full" style="background: linear-gradient(transparent 0% 5%, color-mix(in srgb, var(--color-main), transparent 60%) 20% 35%, transparent 50% 55%, var(--color-main)) 95% 100%, radial-gradient(50% 100% ellipse at top -4em right 2em, transparent 0% 40%, color-mix(in srgb, var(--color-base), transparent 40%) 40% 55%, transparent) 70% 100%;"></div>

                    <div class="absolute animate-[sakanaGo_30s_linear_infinite]"><svg class="w-[4.6em] h-[1.6em] filter-[url(#shadow)]"><use href="#sakana" /></svg></div>
                    <div class="absolute animate-[sakanaGo_30s_linear_-17s_infinite]"><svg class="w-[4.6em] h-[1.6em] filter-[url(#shadow)]"><use href="#sakana" /></svg></div>
                    <div class="absolute top-[40vh] right-[1.5em]"><svg class="w-[clamp(200px,25vw,600px)] h-auto aspect-6/11 text-base [--parts-color:var(--color-font)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi2" /></svg></div>
                    <div class="absolute top-[130vh] left-[1em] max-[800px]:top-[115vh] max-[450px]:left-[-2.5em]"><svg class="w-[clamp(250px,30vw,600px)] h-auto aspect-5/4 text-base [--parts-color:var(--color-font)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
                        
                    <div class="absolute bottom-[2em] right-0"><svg class="w-[8.3em] h-[5.1em] filter-[url(#shadow)]"><use href="#rockBehind" /></svg></div>
                    <div class="absolute bottom-[3em] right-[3em]"><svg class="w-[2.7em] h-[3.8em] filter-[url(#shadow)]" style="transform-origin: bottom center; animation: yurayura 10s ease-in-out infinite;"><use href="#wakame" /></svg></div>
                    <div class="absolute bottom-[1.8em] left-[1.5em]"><svg class="w-[8.8em] h-[3.5em] filter-[url(#shadow)]"><use href="#rockRight" /></svg></div>
                    <div class="absolute animate-[submarineGo_10s_linear_infinite]"><svg class="w-[2.9em] h-[0.9em] animate-[kakukakuTiny_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#submarine" /></svg></div>
                    <div class="absolute bottom-[1em] left-0"><svg class="w-[7.2em] h-[2.6em] filter-[url(#shadow)]"><use href="#rockLeft" /></svg></div>
                    <div class="absolute bottom-[1.15em] left-[2.6em]"><svg class="w-[0.8em] h-[0.8em] filter-[url(#shadow)]"><use href="#ekitai" /></svg></div>
                    <div class="absolute bottom-[0.9em] right-0"><svg class="w-[2.7em] h-[3.8em] filter-[url(#shadow)]" style="transform-origin: bottom center; animation: yurayura 10s ease-in-out infinite;"><use href="#wakame" /></svg></div>

                    <div class="absolute top-0 left-0 w-full h-full"
                        style="background: radial-gradient(circle at 10% 10%, color-mix(in srgb, var(--color-main), transparent 20%), transparent 40%),
                                        radial-gradient(circle at 80% 30%, color-mix(in srgb, var(--color-main), transparent 70%), transparent 40%),
                                        radial-gradient(circle at 70% 15%, color-mix(in srgb, var(--color-yellow), transparent 70%), transparent 20%),
                                        radial-gradient(circle at 30% 40%, color-mix(in srgb, var(--color-main), transparent 70%), transparent 40%),
                                        radial-gradient(circle at 60% 60%, color-mix(in srgb, var(--color-main), transparent 70%), transparent 30%),
                                        radial-gradient(circle at 50% 50%, color-mix(in srgb, var(--color-base), transparent 90%), transparent 40%),
                                        radial-gradient(circle at 30% 80%, color-mix(in srgb, var(--color-main), transparent 60%), transparent 40%),
                                        radial-gradient(circle at 80% 95%, color-mix(in srgb, var(--color-main), transparent 80%), transparent 30%); filter: blur(20px);"></div>
                </div>
            </div>

            <div class="absolute top-0 left-0 w-full h-full">
                <div class="sticky top-[8vh] left-0 py-50 px-3.75 cursor-default filter-[url(#shadow)]">
                    <h1 class="text-[3rem] text-white [-webkit-text-stroke:2px_#FFF]">отаку и плац<wbr>карт!!</h1>
                    <p class="text-[1.2em] text-white font-bold mt-3.75">海外鉄諸氏に倣って作りました。<br>鉄道、カメラ、模型などを掲載するサイトです。</p>
                </div>
            </div>

        </div>
        <div><svg class="w-screen h-auto aspect-301/16 text-main overflow-x-hidden"><use href="#headerWave" /></svg></div>
    </div>

    <section>
        <div class="flex items-center gap-[1.2em] text-[clamp(0.3em,3vw,1em)] mb-2">
            <div><svg class="w-[8em] h-[6.4em] text-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold text-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_45%)] filter-[url(#shadow)]">ページまとめ</h1>
            <div><svg class="w-[8em] h-[6.4em] text-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
        </div>

        <table class="filter-[url(#shadow)]">
            <thead>
                <tr> <th>なまえ</th><th>せつめい</th></tr>
            </thead>
            <tbody>
                @foreach($navItems as $label => $info)
                    <tr>
                        <td><a class="inline-block hover:scale-110" href="{{ route($info['route'], $info['params'] ?? []) }}">{{ $label }}</a></td>
                        <td>{{ $info['desc'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section class="w-full max-w-none">
        <div class="flex items-center gap-[1.2em] text-[clamp(0.3em,3vw,1em)]">
            <div><svg class="w-[8em] h-[6.4em] text-[color-mix(in_srgb,var(--color-foreign),var(--color-font)_50%)] [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold text-[color-mix(in_srgb,var(--color-foreign),var(--color-font)_50%)] filter-[url(#shadow)]">新着記事</h1>
            <div><svg class="w-[8em] h-[6.4em] text-[color-mix(in_srgb,var(--color-foreign),var(--color-font)_50%)] [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
        </div>

        <div class="grid w-full gap-8 p-5 place-content-center place-items-center grid-cols-[repeat(auto-fit,minmax(min(100%,320px),320px))]">
            @foreach(collect(config('articles.list'))->take(2)->map(fn($item) => \App\Data\ArticleData::fromArray($item)) as $article)
                <div class="w-full rounded-xl overflow-hidden shadow-[1px_1px_30px_rgba(170,153,138,0.2)] duration-150 hover:scale-102">
                    <a href="{{ route('articles', ['category' => $article->category ]) }}" class="w-full justify-center text-base inline-flex items-center p-3" style="background-color: var(--color-{{ $article->category }});">{{ $article->categoryName }}</a>
                    <a href="{{ $article->route() }}">
                        <img class="h-50 w-full object-cover" src="{{ asset($article->img) }}" alt="{{ $article->title }}">
                        <div class="flex flex-col justify-between py-8 px-4 h-53 max-[350px]:h-60">
                            <h3 class="text-[1.2em] font-bold">{{ $article->title }}</h3>
                            <p class="my-auto">{{ $article->desc }}</p>
                            <time class="text-[color-mix(in_srgb,var(--color-font),var(--color-base)_40%)] text-sm" datetime="{{ $article->date->toDateString() }}">{{ $article->date->format('Y.m.d') }}</time>
                        </div>
                    </a>
                </div>
            @endforeach
            <a href="{{ route('articles') }}" class="md:col-span-2 xl:col-span-1 justify-self-center hover:scale-105">
                <div class="relative">
                    <div class="relative pt-4"><svg class="w-[clamp(120px,50vw,200px)] h-auto aspect-9/4 [--body-color:color-mix(in_srgb,var(--color-foreign),var(--color-font)_50%)] [--parts-color:var(--color-base)] filter-[url(#shadow)]"><use href="#azarashiBtn2" /></svg></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-0.9em)] -translate-y-[calc(50%-0.1em)] text-[1.3em] text-base font-bold">more</div>
                </div>
            </a>
        </div>
    </section>

    {{--
    <section>
        <div class="flex items-center gap-[1.2em] text-[clamp(0.3em,3vw,1em)] mb-2">
            <div><svg class="w-[8em] h-[6.4em] text-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold text-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] filter-[url(#shadow)]">カウンター</h1>
            <div><svg class="w-[8em] h-[6.4em] text-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#azarashi" /></svg></div>
        </div>
        <p class="text-xl bg-base text-[color-mix(in_srgb,var(--color-foreign),var(--color-font)_50%)] border-6 border-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] p-5 rounded-2xl filter-[url(#shadow)]">
            あなたは<span class="font-bold text-3xl">???</span><span class="font-bold">人目</span>のお客様です
        </p>
    </section>
    --}}

    <section class="px-2">
        <div class="relative">
            <svg class="w-[clamp(21em,85vw,35em)] sm:w-[35em] h-[clamp(20em,85vw,25em)] sm:h-[25em] filter-[url(#shadow)]"><use href="#wavyFrame" /></svg>
            <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+clamp(5em,20vw,8em))] sm:-translate-x-[calc(50%+8em)] -translate-y-[calc(50%-0.1em)]">
                <svg class="w-[7.2em] h-[13.2em] filter-[url(#shadow)]"><use href="#author" /></svg>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+0.1em)] -translate-y-[calc(50%+1.6em)] bg-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] w-2 h-2 rounded-full blur-[2px]"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+1.9em)] -translate-y-[calc(50%+3.2em)] bg-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] w-3 h-2 rounded-full blur-[2px]"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-1em)] -translate-y-[calc(50%+5em)] bg-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] w-3 h-2 rounded-full blur-[2px]"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+0.6em)] -translate-y-[calc(50%+4em)] bg-[color-mix(in_srgb,var(--color-foreign),var(--color-base)_50%)] w-3 h-2 rounded-full -rotate-45 blur-[2px]"></div>
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-clamp(3.5em,15vw,5em))] sm:-translate-x-[calc(50%-5em)] -translate-y-[calc(50%+clamp(0.1em,10vw,0.5em))] grid gap-5">
                <div>
                    <h3>author</h3>
                    <h2 class="font-bold text-2xl">たくさん</h2>
                </div>
                <p>乗って撮って<span class="whitespace-nowrap">模型にする人</span><br>機材とっかえ<span class="whitespace-nowrap">ひっかえ病</span></p>
            </div>
        </div>
    </section>
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
    <symbol id="azarashi2" viewBox="0 0 6 11">
        <path fill="currentColor" d="M9.33-2.62c.64 0 .65.32.6.62-.06.3-1.17.58-1.03.94.14.37 1.77 1.07 1.85 1.25.18.27-.16.53-.67.74C9.88.82 8.71-.22 6.44.9c-.66.58.02 2 .42 2.88.4.89 2.25 1.9 2.91 2.7.39.93.15 1.53-.68 1.66-.21.04-.5.03-.83-.02l-.2-.04L8 8.2a.43.43 0 0 1-.08.1c-.15.12-.23.1-.3-.08a.68.68 0 0 1-.06-.27l-.37-.12c-.73-.28-1.44-.73-1.76-1.38-.64-1.28-.77-3.96.02-5.37C6.25-.33 8.14-1 8.7-1.62c.57-.63.5-.81.62-1z" fill-rule="evenodd" transform="matrix(1.01753 0 0 1 -4.98845 2.62488)"/>
        <path fill="currentColor" d="M6.33 6.57c-.14-.06-.25-.01-.44.05a.87.87 0 0 0-.44.34c-.07.13-.02.28.27.3.28.02.75-.05.95-.1.2-.06-.2-.54-.34-.6z" fill-rule="evenodd" transform="matrix(1.01753 0 0 1 -4.98845 2.62488)"/>
        <path fill="var(--parts-color, var(--color-font))" d="m7.79 7.4-.07.04-.12.02a.4.4 0 0 1 .19-.06zm1.35-.1a.2.2 0 0 1 .06 0c.04 0 .05.03.06.05l-.02.07.03.02c.08.08.21.21.3.21.15 0 .32 0 .43-.04.1-.04.1 0 .02.02-.08.04-.31.07-.46.06-.11-.01-.25-.15-.32-.23v-.02l-.02.02c-.01.02-.03 0-.08 0h-.02v.01a.3.3 0 0 1-.21.1c-.11 0-.34-.1-.43-.17-.05-.03-.06-.07-.03-.06l.06.03c.09.06.3.14.4.15.05 0 .1-.02.15-.05h.01l-.05-.03c-.04-.01-.07-.04-.06-.07.02-.04.1-.07.18-.07zm-1.5-.16.17.05c.08.03.13.08.14.1 0 .03-.09-.04-.15-.08l-.15-.07zm.2-.4c.08 0 .21.06.25.09.05.03.17.24.13.27-.03 0-.1-.2-.15-.23-.05-.03-.25-.07-.28-.13 0 0 .03-.01.05 0zm.49-.6c.1 0 .18.02.22.04.08.04.09.18.03.25-.05.06-.1.09-.22.09-.13 0-.23-.08-.3-.14-.08-.06-.09-.16.02-.2a.79.79 0 0 1 .25-.03z" fill-rule="evenodd" transform="matrix(1.01753 0 0 1 -4.98845 2.62488)"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="submarine" viewBox="0 0 29 9">
        <path fill="var(--color-base)" d="M17.37 1.87c1.2-.02 2.95.06 4.22.06 2.05.02 6.52-.18 6.65.17.82.91 1.15 4.9.12 5.65-.47.42-4.18.12-6.21.1-2.03-.02-4.89.24-5.97-.23-.48-.32-.2-1.68-.23-2.61-.03-.94-.35-3.12.03-3 .13-.1.66-.13 1.39-.14zM2.47 1.5c.38 0 1.05.37 1.12.48 1.15-.09 9.67-.16 11.24.21 1.05.57.28 4.75.38 5.31-1.23.37-3.96.22-6.36.2-.6-.01-1.33 0-2.1.03l-1.07.04-.03.13c-.08.24-.26.46-.43.56-.73.38-1.16.55-2.18.54-.98.03-1.95-.35-2.12-1.22v-.2l-.26-.09c-.81-1.02-.01-4.1.84-4.91-.01-.86.5-.92.83-1.05a.38.38 0 0 1 .14-.03z" fill-rule="evenodd"/>
        <path fill="var(--color-font)" d="M26.5 7.98c.37.05.4.34.35.52-.05.18-.28.28-.45.32-.17.05-.4.08-.56-.06s-.11-.42 0-.57c.37-.15.42-.19.66-.2zm1.3-.06a.2.2 0 0 1 .14.05c.08.07.26.1.22.38-.03.14-.28.38-.43.44a.54.54 0 0 1-.49-.11c-.09-.1-.13-.35-.07-.47.07-.12.32-.21.45-.25a.65.65 0 0 1 .18-.04zm-9.2-.06c.43.01.49.32.47.47-.02.15-.41.38-.59.42-.18.05-.28 0-.47-.13-.2-.13-.14-.4-.05-.53.1-.12.2-.23.63-.23zm-5.28-.01c.17 0 .45.12.51.32.06.2-.23.48-.39.6a.53.53 0 0 1-.54.06c-.23-.09-.19-.45-.12-.61a.79.79 0 0 1 .54-.37zm-5.6-.03c.19-.02.76.11.7.42-.04.32-.42.46-.6.48a.44.44 0 0 1-.52-.37c-.02-.15.23-.51.42-.53zm7.01-.02c.05 0 .08.03.12.07.1.08.25.14.18.44-.02.27-.3.33-.44.37-.14.05-.22.08-.42-.12a.44.44 0 0 1-.1-.51c.04-.13.1-.2.4-.23.14-.02.21-.03.26-.02zM2.9 7.7l.23.02c.22.02.24.17.27.24.11.21-.18.35-.4.35-.21 0-.28-.14-.31-.23-.04-.1.03-.28.1-.34a.15.15 0 0 1 .11-.04zm14.36-.03c.38-.05.52.44.44.6-.08.16-.53.41-.74.43-.2.02-.47-.18-.52-.31-.04-.14.11-.36.25-.48.13-.12.19-.2.57-.24zM6.36 7.66c.22.01.69.44.68.63 0 .19-.5.5-.73.48-.23 0-.72-.25-.56-.58.16-.32.4-.55.61-.53zM22.98.7h.4c.2.37.15.71.1 1.04l-.02.17h-.5c-.51.02-.98.02-1.36.02-.64 0-1.4-.03-2.14-.04h-.36l-.05-.16c-.06-.35.03-.73.26-.81-.27-.15 2.49-.22 3.67-.22zM9.62.59a7.2 7.2 0 0 1 1.95.15c.13.32.27.81.22 1.17l-.01.06h-.02c-1.12-.04-2.4-.05-3.62-.05h-.07V1.9c-.19-.37-.16-1-.04-1.15.06-.09.8-.16 1.6-.17z" fill-rule="evenodd"/>
        <path fill="var(--color-main)" d="M21.95 3.93c.1 0 .18.04.24.07.11.08.18.28.13.42-.05.14-.25.4-.44.41-.2 0-.73-.08-.72-.55.17-.3.29-.2.49-.3.1-.04.2-.06.3-.05zM6.2 3.67c.2-.01.26.04.25.01.4.18.37.6.28.75-.1.14-.42.3-.85.11-.06-.02-.22-.23-.18-.46-.01-.23 0-.3.26-.38l.24-.03zm3.56-.18c.4 0 .49.1.5.25.08.33-.17.57-.4.68-.24.1-.62-.14-.64-.3-.02-.15.13-.63.54-.63zm-7.4-.14c.26.03.69.17.66.6-.03.44-.06.54-.34.68-.23.14-.85.38-1.12.23-.27-.16-.2-.9-.1-1.1.3-.24.64-.44.9-.4zm1.85-.17c.34 0 .67.07.7.21.1.27.13.96-.16 1.12-.3.17-1.16.14-1.46-.02-.3-.17-.05-.94.07-1.18.14-.09.5-.14.85-.13zm23.14-.3c.14 0 .27.02.35.03.15.03.47.95.5 1.2.03.26-.06.34-.23.43-.19.03-.76.27-.92.02-.16-.26-.2-1.35-.05-1.54.08-.1.22-.13.35-.14z" fill-rule="evenodd"/>
        <path fill="var(--color-foreign)" d="M4.88 6.2c.13.03.18.16-.04.21-.28.07-1.24.2-1.82.22a9 9 0 0 1-1.65-.17c-.22-.03-.43-.14-.16-.14.26 0 1.16.15 1.77.14a19.25 19.25 0 0 0 1.9-.25zm-3.55-.53c.11 0 .14.13.14.18 0 .05-.11.14-.16.13-.05 0-.15-.09-.14-.14 0-.05.05-.17.16-.17zm3.22-.08c.06-.01.13.03.16.06.04.03.03.16 0 .2-.04.04-.17.05-.2.01-.04-.04-.1-.15-.02-.23a.12.12 0 0 1 .06-.04zm-1.8-.31c.13 0 .49.08.47.42-.05.29-.34.3-.47.3-.14 0-.25-.12-.33-.3-.07-.17.2-.42.33-.42zm.8-.39c.56.01 1.2.07 1.44.1.34.05.43.26.08.2a13.5 13.5 0 0 0-2.02-.1c-.63.02-1.22.21-1.55.29-.32.07-.41-.03-.09-.15a6.9 6.9 0 0 1 2.14-.34zM26.48.67c-.34.14-.64.4-.79.58.17.12.8.43 1.12.48.19-.15.52-.46.79-.57-.35-.17-.76-.49-1.12-.49zM5.1.41c-.27.01-.66.35-.74.48-.08.13.84.62 1.05.77.13-.12.66-.5.84-.75A3.84 3.84 0 0 0 5.1.41zM26.73.28c.28-.02.63.04.86.1.1.2-.08.17-.22.18-.14.02-.4-.08-.61-.08h-.06l.07.02c.4.11.93.4 1.03.6.1.18-.3.5-.64.72l-.13.1h.41c.47.04.78.1.81.18.1.12.2.28.28.48l.04.09-.05.07c-.1.1-.31.13-.86.16-.72.04-2.23-.04-3.4-.06-1.21-.03-2.18.02-3.64-.1-1.49.01-3.75.34-4.51.28a.88.88 0 0 1-.23-.05l-.07-.04v-.27c-.01-.41.03-.69.18-.64.13-.1.66-.14 1.39-.15 1.2-.02 2.95.06 4.22.06 1.02.01 2.65-.04 4.04-.04h.84L26 1.75c-.31-.12-.59-.25-.63-.38-.05-.2.36-.58.72-.78l.1-.05-.12.01c-.14 0-.05.06-.16-.07.01-.19.53-.18.82-.2zM5.13 0c.33 0 .87.03.98.09.1.1.03.2-.12.22a3.36 3.36 0 0 0-.61-.09h-.04l.16.04c.48.15.96.37 1.02.56.05.28-.46.79-.89 1.04l-.13.07h.12c2.96-.04 8.04-.02 9.22.26.2.1.33.34.41.66l.05.21-.19-.02h-.31c-1.78.04-4.1.23-5.33.12 0 0-5.39.14-6.77.07-1.2-.06-1.01-.05-1.35-.35l-.06-.05.06-.08.15-.17c0-.86.51-.92.84-1.05a.38.38 0 0 1 .14-.03c.38 0 1.05.37 1.12.48.21-.02.69-.03 1.33-.05h.49l-.27-.15a3.5 3.5 0 0 1-1.04-.75C4 .84 4.23.55 4.52.36l.15-.1-.15.01h-.15C4.2.3 4.04.18 4.16.13 4.27.1 4.8.01 5.14 0z" fill-rule="evenodd"/>
        <path fill="var(--color-foreign)" d="M10.59 1.94h.3c1.19.03 2.28.07 3.05.13l.31.04.02.17c.04.82-.06 2.03-.32 2.13-.25.32-1.87.3-2.43.27-.56-.03-.75-.2-.92-.45-.17-.26-.07-.7-.07-1.1 0-.32.03-.8.05-1.12zM7.24 1.9h1.9l.05.1c.22.47.11 1.36-.3 1.6-.51.09-1.95.11-2.44.01s-.41-.2-.49-.6a2.9 2.9 0 0 1-.02-1l.03-.1zm18.4-.02h.31l.08.15c.21.5.17 1.28-.09 1.53-.37.24-1.33.2-1.88.21-.55 0-1.2.12-1.41-.2-.16-.25-.25-1.04-.07-1.56l.05-.09.84-.01 2.16-.03zm-8.27-.02c.6 0 1.34 0 2.08.02l.87.02.03.09c.13.39.11.88.14 1.2-.07.48-.1 1.03-.56 1.17-.55.05-3.05.44-3.08-.18-.02-.54-.16-.85.07-1.96l.08-.35z" fill-rule="evenodd"/>
        <path fill="var(--color-yellow)" style="animation: pikapika 3s ease-in-out infinite;" d="M1.81 5.55c.09 0 .15.07.18.12.05.07.09.29 0 .33-.06.04-.2.06-.32-.1-.12-.15-.07-.28.06-.33a.2.2 0 0 1 .08-.02zm2.16-.27c.2-.04.35.2.35.4 0 .21-.02.35-.27.39-.18.03-.3-.07-.4-.3-.08-.24.12-.44.32-.49zM.8 2.63c.05 0 .09 0 .1.02.1.07.03.3-.18.42-.1.1-.38.23-.5.24-.12 0-.2-.09-.23-.2-.02-.12.07-.2.29-.31.16-.1.38-.17.52-.17zM2.51 2c.16-.02.4.07.47.19.08.11.07.38 0 .5-.04.1-.19.19-.32.23h-.01v.01l-.07.01-.04.01H2.5a.57.57 0 0 1-.13-.01h-.01l-.08-.02a.4.4 0 0 1-.2-.12l-.03-.1-.04-.08a.37.37 0 0 1 0-.17l.05-.1v-.03c.08-.25.3-.3.45-.32zM.37 1.85c.19 0 .91.04.9.24-.04.23-.66.24-.85.24a.3.3 0 0 1-.3-.24c0-.08.06-.24.25-.24zm.5-.83c.14.02.3.14.44.23.18.11.28.47.13.46-.15 0-.57-.24-.69-.36-.11-.11-.09-.3 0-.32a.2.2 0 0 1 .12-.01z" fill-rule="evenodd"/>
        <path d="M.9 7.59h.01c.07.01-.24 0 .49.03 1.31 0 2.58.04 3.86.12l.4.03-.03.13c-.09.24-.26.46-.43.56-.73.38-1.16.55-2.17.54-.98.03-1.95-.35-2.12-1.22v-.2z" fill="url(#fill1)" fill-rule="evenodd"/>
    </symbol>
</svg>

<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="rockLeft" viewBox="0 0 72 26">
        <path fill="color-mix(in srgb, color-mix(in srgb, var(--color-main), var(--color-yellow) 30%), var(--color-font) 35%)" d="M15.7 0c4.6 0 7 4.6 11.7 6 4.7 1.6 10.9 1.3 16.4 3 5.6 1.7 14.8 2.2 16.9 7.4.5 2.2 3.4 4.4-1.4 4.5-8 .4-36.5-1-47-1.2-6.8 0-9.7.1-12.1.3H0V5.8l.8-.2C5.4 4.5 11.4 0 15.7 0z" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-main), var(--color-base) 50%)" d="M32 20.5A70 70 0 0 1 43.3 7.3C48.5 3 52 6 55.1 5.8c3.3-.2 5-1 7.3 0 2.4 1 5.3 3.2 6.9 5.9 1.6 2.6 3.2 8 2.7 10s-2 1.4-5.4 2.1c-3.4.7-9.3 2.4-14.9 2.2-5.5-.2-15-1.7-18.3-3.3-1.8-1-1.3-1.5-1.4-2.2z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="rockRight" viewBox="0 0 88 35">
        <path fill="color-mix(in srgb, var(--color-yellow), var(--color-base) 30%)" d="M7.4 14.7C8.8 9.9 13.3.6 17 0c3.6-.4 3.1 2.2 4.4 2 1.3 0 7.8 2.4 10.3 4.7 2.6 2.4 4 7.4 4.8 9.4.9 2.2-.8 1 .3 3 1 2.2 10.2 7.7 6.2 9.7S19.9 31.1 12.8 31c-7.5-.4-14.2-.3-12.5-3C.8 24 2 20.8 7.4 14.8z" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-main), var(--color-base) 20%)" d="M37 32.2a43.8 43.8 0 0 1 11-13.8c4.6-3 13.3-4.2 17-4.4 3.7-.2 2.3 2.2 5 3.4 2.6 1.2 8.4 1.8 11 3.6 2.8 2 4.2 5 5.1 7.6 1.4 3.8 3 5 1 6-4.5 1-20.8-.1-28.7-.4h-10c-2.9-.5-4-.3-8.1-.4-2.3-.2-3 0-3.2-1.6z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="rockBehind" viewBox="0 0 83 51">
        <path fill="color-mix(in srgb, var(--color-font), var(--color-main) 50%)" d="M74.1 0a26 26 0 0 1 7.3 1.3l.7.3v48.3h-.8a717 717 0 0 1-57-1.2C8.5 47.4 1.5 44.4-.7 41.2c-2.3-3.3 6-9.3 11.3-11.8S22.5 27 27 24.2c4.7-3 4.7-8.8 11.2-12.7A139 139 0 0 1 66 1.1c3.4-.7 6-1 8.1-1z" fill-rule="evenodd"/>
        <path fill="var(--color-main)" d="M69.4 22h1.1c3.1.3 7.2 2 10.6 4.3l1 .7v24L80 51c-3.6-.4-7-.7-9.9-.7-7.4 0-19 2-22-1-3.1-2.9 2-13 3.4-16.8 1.3-3.7 2.7-4.3 4.5-5.7 1.8-1.3 4.1-1.5 6.6-2.3 2-.7 4.2-2.3 6.8-2.5z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="wakame" viewBox="0 0 27 38">
        <path fill="var(--color-domestic)" d="M19.82 0c2.17.25 2.56 4.96 2.5 5.96-.07 1.15-1.22 4.72-2.04 6.53-1.64 1.7-3.32 4.36-3.41 6.53-.1 2.18 2.55 4.4 2.84 6.52.31 2-.92 4.7-.96 5.49l.69-.74c1.1-1.44 2.22-3.65 2.09-5.16-.04-1.89-.14-3.85-.45-4.5-.3-.65-1.74-4.87.1-8.08 1.83-3.2 2.68-4.51 4.16-4.02.81-.02 1.94.37 1.6 2.14-.35 1.78-3.08 5.72-3.65 8.51-.21 2.73 1.04 6.2.04 8.26-1 2.06-1.92 2.46-2.78 4.19-.87 1.72-2.3 5.07-2.4 6.19-.1.25-.28.27-.58-.13-.8-1.06-2.49-6.25-4.44-8.75s-5.38-4.78-7.28-6.25c-1.89-1.47-2.92-.6-4.07-2.56-1.15-1.96-2.69-8.55-1.1-9.7.7-.93 3.75-.09 5.23 1.91 1.47 2 2.35 7.35 3.6 10.09 2.18 1.52 4.68 3.5 6.01 5.67.33.54.63 1.16.9 1.81l.58 1.67.2-.2c.19-.24.3-.62.13-1.26-.43-1.71-2.6-5.86-3.42-8.43a12.56 12.56 0 0 1-.18-7.6c.75-2.53 2.76-5.6 3.18-7.89.42-2.29-.96-5.17 1.86-6 .4-.17.74-.22 1.05-.2z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="ekitai" viewBox="0 0 5 5">
        <path fill="color-mix(in srgb, var(--color-main), var(--color-base) 90%)" d="M13 9.5c-.1-.03-.12.03-.22.03-.1-.08-.34 0-.55.1-.27.08-.38.34-.37.43.01.1.24.18.45.14.12.11.27.19.46.28.2.04.6.06.77-.03.17-.1.25-.35.22-.52-.07-.17-.15-.19-.28-.26a1.99 1.99 0 0 0-.47-.17z" fill-rule="evenodd" transform="matrix(1.07283 0 0 1 -12.7215 -5.51376)"/>
        <path fill="color-mix(in srgb, var(--color-main), var(--color-base) 90%)" d="M13.51 6.66c.05.04.79.26 1.25.27.47 0 1.26-.08 1.54-.25.28-.16.24-.6.15-.74-.08-.13-.42-.4-.96-.43-.76.07-2.13.18-2.37.56-.29.28-.25 2.56-.21 3.27.06.62.55.73.65.28.1-.45-.03-2.66-.05-2.96z" fill-rule="evenodd" transform="matrix(1.07283 0 0 1 -12.7215 -5.51376)"/>
        <path fill="color-mix(in srgb, var(--color-others), var(--color-base) 40%)" d="M13.49 6.64c.22-.02 1.07.26 1.53.26.46 0 .98-.24 1.22-.25.07.03.09.54.1.82-.03.57-.08 1.57-.12 2.04-.16.38-.47.64-.91.72-.45.08-1.6 0-1.77-.22-.2 0 .02-2.84-.05-3.37z" fill-rule="evenodd" transform="matrix(1.07283 0 0 1 -12.7215 -5.51376)"/>
        <path fill="var(--color-font)" d="M14.71 9.07c.08.01.25.11.34.11.2-.05.17.05.12.08-.05.03-.14.02-.26 0-.13-.04-.34-.1-.23-.19h.03zm1.14-.34a.1.1 0 0 1 .03.01c.05.03-.03.1-.13.13-.1.02-.18.05-.19-.03.01-.05.06-.05.16-.06a.52.52 0 0 1 .1-.05.07.07 0 0 1 .03 0zm-.02-.28h.02c.03.02.01.1-.1.16-.13.06-.2.03-.2-.02 0-.06.04-.05.15-.06.04-.05.1-.07.13-.08zm-1.58-.06c.03 0 .07.04.05.1a.96.96 0 0 1-.14.26c.02.06.1.09.13.1.04 0 .03-.03.1-.04.07 0 .05.07.03.1a.17.17 0 0 1-.16.05.57.57 0 0 1-.2-.13c-.04.02-.05.05-.1.09-.1.03-.14-.04-.11-.1.03-.04.1-.09.18-.11.07-.07.1-.1.12-.15-.03-.03-.26 0-.33-.05-.07-.04-.04-.08 0-.1l.3.03c.08 0 .1-.06.13-.05zm1.67-.29c.02 0 .05.02.06.05.02.07 0 .13.02.2.02.08.06.12.05.15 0 .04-.09.11-.12.02-.03-.1-.06-.3-.06-.37 0-.03.02-.05.05-.05zm-.5 0c.05 0 .08.1.07.14.04.01.15-.06.19-.05.06-.02.13.02.02.1-.03.03-.13.04-.22.08-.01.14.02.48-.07.53-.09.06-.07-.07-.05-.2l.01-.33c-.04-.01-.1 0-.1-.07 0-.06.07-.03.11-.04 0-.04-.04-.12.02-.16h.02zm-.58-.02c.02 0 .04.02.05.07.02.11 0 .13 0 .2.04.04.14-.04.17-.03.08 0 .04.06.02.08-.04.04-.1.05-.17.06.02.1.03.19.05.23.03.04.09-.04.13-.05.08-.08.11 0 .1.03-.01.08-.15.12-.22.14.04.08.04.13.09.2-.01.04-.07.08-.13.01l-.05-.2c-.05.02-.1.02-.12 0-.04-.01-.03-.06-.01-.08s.1 0 .1-.04c-.02-.06-.01-.18-.04-.22-.02-.03-.04 0-.1.01-.05-.02-.06-.08-.02-.12.04 0 .1 0 .1.02.03-.04 0-.13 0-.24 0-.04.03-.06.05-.07zm-.92-.07c.02 0 .05.03.07.08.03.07.04.11 0 .14-.05.02-.06-.03-.08-.08-.03-.04-.06-.1-.02-.13h.03zm2.2-.03h.01c.04.02.06.09.07.12.01.05-.03.09-.09.06-.05-.03-.08-.13-.02-.17h.02zm-2.36-1.63c.04.01.1.06.02.1a.47.47 0 0 1-.28.02.36.36 0 0 1-.15.18c-.06.02-.1-.01-.07-.07.09-.07.1-.16.18-.2.06 0 .22 0 .3-.03zm-.52-.14c.05 0 .1.04.1.07.02.03.03.1-.02.12-.06.04-.1-.01-.13-.04-.02-.03-.04-.1.01-.14a.05.05 0 0 1 .04-.01zm.54-.24c.04 0 .08.05.09.07.02.03.01.1-.03.12-.07.04-.11-.03-.13-.05a.1.1 0 0 1 .03-.13.05.05 0 0 1 .04-.01z" fill-rule="evenodd" transform="matrix(1.07283 0 0 1 -12.7215 -5.51376)"/>
    </symbol>
</svg>

<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="author" viewBox="0 0 6 11">
        <path fill="var(--color-base)" d="M5.93-1.03c.14 0 .28 0 .41.03.54.1 1.32.7 1.68 1.1.22.26.2.71.08 1.1v.02l.3.19c.3.22.54.51.72.88.25.48.46.77.6 1.59.09.85.13 2.6-.28 3.34-.52.61-2.14.52-2.8.55-.64.03-.79.2-1.1-.37a7.73 7.73 0 0 1-.75-3.05c.17-.83.16-1.78.52-2.36l.02-.02-.15-.16c-.32-.35-.67-.73-.71-1.04-.07-.4.04-1.2.38-1.46.26-.2.67-.33 1.08-.34z" fill-rule="evenodd" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path fill="var(--color-font)" d="M5.51 1h.04c.08-.01.15.11.14.2-.02.1-.22.21-.3.19-.09-.03-.13-.16-.1-.22.02-.06.12-.18.22-.18zM6.98.2c.07-.01.17.04.19.12.01.06 0 .15-.13.17-.13.02-.21-.09-.22-.14C6.8.3 6.9.2 6.98.2z" fill-rule="evenodd" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path fill="var(--color-base)" d="M5.4 1.2c.03 0 .04.03.02.06s-.05.03-.06 0c-.02-.02.03-.07.04-.07zM6.94.3h.02c0 .01 0 .04-.03.05 0 0-.03-.01-.02-.03l.03-.02z" fill-rule="evenodd" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path fill="color-mix(in srgb, var(--color-main), var(--color-base) 40%)" d="M4.83 8.87c0-.24.52-.08.8-.59-.02-.64-1.01-2.4-.89-3.49.13-1.1.94-2.95 1.52-2.95.95-.01 1.53.45 1.81 1.8.04 1.82-.24 2.61-.6 3.9.08.84 1.1 1.52 1.04 2.03 0 .36-.64.4-.97.35-.32-.05-.64-.66-.97-.67-.31-.03-.5.36-.83.36-.33 0-.8-.52-.9-.74z" fill-rule="evenodd" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path fill="var(--color-base)" d="M9.08 2.3h.02c.2.36.4.74.5 1.25-.12.52-.3 1.44-.81 1.81-.51.38-1.95.54-2.58.5a1.32 1.32 0 0 1-1.15-.74c.03-.32.67-.88 1.16-.9.82-.05.85.63 1.37.6a3.4 3.4 0 0 0 1.36-1.57c.09-.39.04-.92.13-.95zm-4.13-.73c.24.23.45.29.3.49-.22.15-.75.66-.63.98.11.33.76.69 1.24.56.5-.14.78-.32 1.13-.38.36-.07.83-.07 1-.01.17.06.22.22 0 .4-.22.16-.74.3-1.4.36-.65.07-1.4.52-1.83.5-.43-.02-.5-.6-.58-.97-.06-.36.02-.95.18-1.19.16-.24.35-.56.59-.74z" fill-rule="evenodd" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path stroke="var(--color-font)" d="M5.32 1.5c-.05-.11-.09-.12-.06-.28.02-.16.33-.49.51-.4.19.1.22.46.2.6-.01.14-.2.22-.3.26-.11.03-.29-.05-.35-.06m1-1.43c.07-.18.35-.4.55-.4.2 0 .64.26.67.42.04.16-.23.52-.46.53a.77.77 0 0 1-.5-.15C6.47.5 6.46.4 6.45.27m-.77 2c-.47-.5-1-.87-1.14-1.34-.14-.48.03-1.2.27-1.52.24-.33.72-.38 1.28-.4.55-.03 1.52.66 1.84 1.05.33.39.2.95.09 1.3-.12.35-.45.6-.68.8M5.13 3.49c.13-.38.57-1.53 1.1-1.6.53-.07.87.12 1.15.34.29.22.4.59.55.97m-3.25-.58c-.14.15-.11.48.06.66.17.17.56.38.96.37.4-.01 1.05-.38 1.44-.44.4-.07.79-.03.9.05.12.09.12.3-.2.44-.33.13-1.21.26-1.75.38-.54.12-1.15.47-1.48.35-.32-.11-.41-.7-.43-1.07-.01-.36.05-.99.19-1.03m3.65 1.27c.04.35.06.57 0 .95m.07-3.3c.33.14.6.36.87.83.27.46.66 1.2.76 1.95.1.74 0 1.88-.03 2.42-.04.53-.18.75-.27.73m-.33-4.95c-.06.36-.03.7-.17 1.13-.13.43-.91 1.4-1.37 1.48-.34-.02-.77-.72-1.42-.6-.52.1-1.06.62-1.07.9.27.4.62.75 1.25.75.64 0 1.9-.13 2.5-.52.47-.54.6-1.05.88-2.15m-1.8 2.53c0 .2-.04.34-.13.66-.09.32-.21.7-.32 1.19.01.47.6 1.1.86 1.46.26.37.26.56.1.7-.18.16-.57.18-.87.12-.3-.07-.62-.6-.92-.66-.3-.06-.57.36-.86.35-.29 0-.79-.42-.87-.7.03-.16.54-.15.78-.51 0-.65-.7-2.09-.84-2.74-.14-.65 0-.9 0-1.16" stroke-width="0.105291" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path fill="var(--color-font)" d="M7.06 2.85c-.02-.05-.01-.15.02-.18.03-.03.11-.04.15 0 .04.03.01.13-.03.18-.04.05-.13.05-.14 0z" fill-rule="evenodd" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
        <path stroke="var(--color-font)" d="M5.86 2.86a.5.5 0 0 0-.11-.24.48.48 0 0 0-.25-.13m.27.55c-.11-.05-.17-.06-.32-.04m.34.12-.25.2c-.06.04-.06.04-.07.02" stroke-width="0.105291" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1.05386 0 0 1 -4.3497 1.04525)"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="wavyFrame" viewBox="0 0 7.05 5.05" preserveAspectRatio="none">
        <path fill="var(--color-yellow)" stroke="var(--color-base)" stroke-width="0.1" d="M1.41.52c.34-.15.48.01.8-.05.34-.05.77-.3 1.17-.3.4.02.9.39 1.26.35.34-.02.59-.02.85.13.26.15.49.66.7.78.21.12.52.12.72.5.2.37.02.8-.08 1.07-.12.28-.08.22-.11.7-.04.48-.57.5-.86.7-.27.18-.47.47-.82.44-.36-.03-.37-.1-.69-.07-.3.03-.84.25-1.15.23-.31-.02-.42-.23-.71-.33-.3-.09-.78-.06-1.05-.22-.29-.16-.39-.54-.64-.73-.27-.19-.36-.08-.56-.4-.2-.31.1-.64.04-.95-.07-.3-.2-.56-.04-.84.15-.27.47-.31.66-.48.2-.17.17-.38.52-.53z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="sakana" viewBox="0 0 46 16">
        <g>
            <path d="M3.06 6.72c-.1-.28-.81-.57-1.32-.62-.5-.06-1.58-.17-1.72.3-.13.46.95.66 1.46.76.5.1 1.3.03 1.61-.17.22.33.09.38.41.57.33.19.84-1.14.42-1.27-.43-.12-.79.22-.86.43z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M1.88 6.53c-.16-.03-.52.24-.48.32.12.32.74.19.79.03.04-.15-.15-.32-.3-.35z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M.83 6.4c.1 0 .11.04.15.07" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M3.55 4.9c-.17-.25-1.27-.34-1.68-.3-.42.05-.77.22-.82.56-.05.35.46.52.88.52.41 0 1-.23 1.7-.5.23.37.45.47.7.44.25-.02.04-1.45-.4-1.3-.45.16-.4.36-.38.58z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M2.3 4.97c-.1.07-.35.36-.3.43.36.25.78-.08.83-.15.05-.07-.42-.35-.53-.28z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M1.57 5.05h.03" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M3.75 9.6c-.24-.3-.48-.62-.81-.93-.34-.32-1.2-.94-1.5-.63-.28.32.46.93.82 1.24.35.3.98.58 1.3.59.23.36.13.34.4.54.29.2.64-.45.45-.67-.19-.22-.5-.25-.66-.14z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M2.89 9c-.11-.1-.5-.08-.51-.01-.06.28.48.47.58.39.1-.08.04-.3-.07-.39z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M1.95 8.4c.09 0 .09.01.12.04" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M4.94 2.14c-.18-.22-.9-.4-1.34-.21-.44.19-.97.61-.89.83.09.23.67.26 1.12.1s.82-.28 1.12-.53c.62.13.56-.01.79-.1.23-.1.1-.68-.1-.8-.2-.11-.78.5-.7.71z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M3.77 2.32c-.08.05-.06.3 0 .36.25.2.31-.1.27-.22-.04-.13-.2-.19-.27-.14z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M3.25 2.5c-.03.1.01-.03 0 .02" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M8 3.31c-.1-.27-.9-.6-1.64-.56-.74.05-1.54.08-1.61.63-.07.55 1.07.6 1.67.6.6 0 1.44-.06 1.62-.33.3.33.46.66.66.49.2-.18.54-1.45.07-1.63-.47-.19-.8.58-.77.8z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 5%)" fill-rule="evenodd"/>
            <path d="M6.27 3.16c-.19.07-.27.26-.23.33.18.27.5.14.57-.01.06-.15-.15-.39-.34-.32z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M5.33 3.18c-.07.09.02-.03-.01.02" stroke="var(--color-base)" stroke-width="0.205669" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M8.14 5.85c-.1-.27-1.03-.55-1.58-.58-.55-.04-1.4.17-1.5.6-.1.44 1.01.46 1.55.5.54.05 1.5.05 1.67-.22.54.11.68.1.78 0 .1-.08.04-.5-.17-.54-.22-.05-.77.02-.75.24z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M6.6 5.76c-.08-.02-.3.19-.27.26.18.26.43.19.48.09.06-.1-.13-.34-.21-.35z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M5.89 5.64c-.03.1.01-.02 0 .03" stroke="var(--color-base)" stroke-width="0.0457059" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M6.57 6.76c-.15-.14-.63-.1-.97.15-.34.24-.65.46-.56.7.1.24.45.2.73.11.28-.08.8-.28.96-.62.16.06.58.1.57-.1-.01-.2-.31-.58-.47-.59-.15 0-.26.17-.26.35z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M5.88 7.11c-.08.06-.07.25-.01.28.3.08.32-.11.33-.16 0-.05-.23-.18-.32-.12z" fill="var(--color-font)" fill-rule="evenodd"/>
            <path d="M5.45 7.37c.1-.02-.03 0 .02-.01" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <g>
            <path d="M7.09 9.2c-.32-.1-.78-.85-1.24-.97-.47-.12-1.43-.01-1.55.25-.12.26.4.31.5.37.1.05-.3 0-.47.18.04.25.54.38 1 .47.45.08 1.38-.04 1.72.05.06.4-.02.32.3.53.31.22.7-1.12.38-1.3-.31-.17-.47.09-.64.42z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
            <path d="M5.18 8.58c.07-.02-.01-.01.02-.02" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        </g>
        <path d="M5.97 8.76c-.17-.04-.33.18-.34.27 0 .08.14.19.31.25.17.06.2-.48.03-.52z" fill="var(--color-font)" fill-rule="evenodd"/><path d="M10.49 1.64c-.2-.21-.88-.77-1.52-.73-.63.04-1.34.35-1.45.72-.12.37.73.33 1.23.35.5.03 1.4.03 1.75-.22.12.28.42.56.7.54.26-.01.52-1.23.15-1.24-.36-.02-.79.41-.86.58z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M9.07 1.45c-.11.06-.23.13-.22.27.22.24.5.05.54-.07.03-.13-.21-.27-.32-.2z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M8.28 1.45c.06.02-.01-.01.02 0" stroke="var(--color-base)" stroke-width="0.205669" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M9.79 7.72c-.3-.17-.6-.62-1-.68-.4-.05-1.33-.03-1.39.34-.05.36.75.52 1.14.6.4.1.97.07 1.24-.06.16.15.1.26.31.23.34-.05.51-.81.3-.81-.22 0-.52.2-.6.38z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M8.9 7.44c-.1.03-.29.14-.26.2.1.24.17.2.28.2.1 0 .1-.43-.01-.4z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M8.01 7.36c.08 0 .08 0 .12.02" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M11.47 4.92c-.23-.2-.68-.36-1-.33-.33.03-1.05.18-.97.5.08.32.6.26.97.25.36-.02.68.01 1.09-.17.17.13.3.25.42.14.13-.1.1-.67-.07-.77-.18-.1-.37.2-.44.38z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M10.64 4.84c-.1.03-.2.16-.18.3.2.18.38.08.45-.05.06-.14-.17-.29-.27-.25z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M10 4.97c.04.06 0-.02.02.01" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M14.03 6.57c-.17-.37-.86-.76-1.63-.87-.78-.1-2.2.17-2.42.55-.23.39 1.4.74 2.09.83.68.1 1.67.12 1.98-.25.19.29.76.97.89.83.08-.24.67-1.23-.11-1.64-.37-.16-.73.38-.8.55z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M12.03 6.1c-.27.12-.25.29-.28.44.22.25.3.32.46.28.16-.03.09-.82-.18-.71z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M10.88 6.18c.1.02-.02-.01.02 0" stroke="var(--color-base)" stroke-width="0.22852" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M11.86 9.96c-.1-.39-.51-.63-.88-.76-.36-.13-1.11-.14-1.3.28-.18.43.42.65.8.74.39.08 1 .25 1.23.06.09.38.67.39.94.13.27-.25.33-.73.03-.76-.3-.04-.72.16-.82.31z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M11 9.7c-.1 0-.34.04-.36.15-.03.11.43.38.6.2.15-.2-.14-.34-.23-.35z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M10.16 9.52c.1 0 .03.01.08.01" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M9.58 11.68c-.37-.2-.87-.56-1.26-.69-.4-.13-1.1-.2-1.25.17-.17.35.58.6 1.05.66.46.08 1 .18 1.4.14.26.36.22.47.7.53.47.07.63-.7.37-.83a1.1 1.1 0 0 0-1.01.02z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M8.48 11.35c-.06-.03-.3.14-.3.22.09.3.32.19.37.15.05-.03 0-.35-.07-.37z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="m7.68 11.28-.02.02" stroke="var(--color-base)" stroke-width="0.205669" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M14.88.4c-.32-.22-1.2-.4-1.67-.4-.48 0-.92.28-1.08.56-.16.27.92.52 1.53.54.61.03.95-.24 1.2-.44.1.2.44.56.59.46.16-.09.52-.9.33-1.02-.19-.13-.83.13-.9.3z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M13.52.43c-.1.04-.19.17-.18.3.22.21.34.13.4 0 .06-.14-.12-.33-.22-.3z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M12.77.4V.4" stroke="var(--color-base)" stroke-width="0.205669" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M15.47 4.37a1.1 1.1 0 0 0-.6-.37c-.32-.07-.91.2-1.3-.03-.4-.23-.69-.72-1-.82-.33-.1-.88-.15-.92.2-.03.33.37.56 1 .77.64.22 2.16.7 2.82.51.3.32.41.58.62.47.57-.16.76-1.09.46-1.16-.3-.07-.77-.06-1.08.43z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd">
            <animate
                attributeName = "d"
                dur = "5s"
                repeatCount = "indefinite"
                values = "M15.47 4.37a1.1 1.1 0 0 0-.6-.37c-.32-.07-.91.2-1.3-.03-.4-.23-.69-.72-1-.82-.33-.1-.88-.15-.92.2-.03.33.37.56 1 .77.64.22 2.16.7 2.82.51.3.32.41.58.62.47.57-.16.76-1.09.46-1.16-.3-.07-.77-.06-1.08.43z;
                        M15.46 4.37a1.1 1.1 0 0 0-.6-.37c-.32-.07-.95.13-1.3-.03-.37-.16-.6-.76-.87-.94-.26-.18-.62-.36-.73-.12-.11.24.1.93.68 1.21.59.29 2.17.7 2.82.51.3.32.41.57.61.47.58-.16.77-1.09.47-1.16-.3-.07-.77-.06-1.08.43z;
                        M15.47 4.37a1.1 1.1 0 0 0-.6-.37c-.32-.07-.91.2-1.3-.03-.4-.23-.69-.72-1-.82-.33-.1-.88-.15-.92.2-.03.33.37.56 1 .77.64.22 2.16.7 2.82.51.3.32.41.58.62.47.57-.16.76-1.09.46-1.16-.3-.07-.77-.06-1.08.43z"
            />
        </path>
        <path d="M14.48 4.18c-.15.05-.19.11-.17.26.2.17.33-.04.36-.08.03-.04-.04-.22-.19-.18z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M12.2 3.5c.06.02-.01-.02.02 0" stroke="var(--color-base)" stroke-width="0.22852" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M15.4 8.98c-.1-.4-1.13-.62-1.6-.77-.46-.14-1.16-.17-1.4.12-.25.3.64.66 1.14.81.51.16 1.68.31 1.9.11.15.31.33.55.48.44.08-.24.17-.66.15-1-.33-.23-.57.14-.67.3z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M14.26 8.57c-.1-.05-.43.11-.43.25s.49.46.55.26c.07-.2 0-.45-.12-.5z" fill="var(--color-font)" fill-rule="evenodd"/><path d="M13.12 8.5c-.07-.05-.01-.03-.05-.06" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M15.7 10.26c-.37-.2-.64-.26-.87-.26-.23 0-.41.04-.53.27-.12.23.4.53.6.59.22.05.75 0 .85-.43.17.24.36.56.47.49.12-.07.29-.79.23-.9-.06-.13-.77.02-.75.24z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M14.59 10.33c-.1 0 .03.02-.02.01" stroke="var(--color-base)" stroke-width="0.0914071" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M16.26 11.74c-.3-.34-1.2-.58-1.79-.57-.58.02-1.73.23-1.72.65.01.43.61.67 1.6.63.98-.04 1.76-.2 1.94-.44.06.26.33.65.45.5.37-.17.64-1 .55-1.34-.37-.15-1 .3-1.03.57z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M14.97 11.6c-.05-.04-.4.32-.43.43-.03.12.18.35.29.28.1-.08.19-.66.14-.7z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M13.65 11.68c-.08.03-.03-.02-.07 0" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M18.33 2.38c-.18-.4-1-.68-1.66-.68-.66 0-1.29.04-1.45.48-.16.43.89.76 1.5.77.6 0 1.43.05 1.6-.22.27.3.43.52.74.58.3.07.38-1.64.16-1.69-.22-.04-.91.54-.9.76z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M17.13 2.22c-.18.03-.38.22-.35.29.19.26.35.33.52.26.17-.06 0-.6-.17-.55z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M15.9 2.08c-.03.06.01-.01 0 .02" stroke="var(--color-base)" stroke-width="0.137113" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M20.78 4.55c-.04-.45-1.56-.47-2.31-.21s-1.36 1-1.18 1.39c.18.38 1.58.24 2.24.06.67-.18 1.36-.7 1.43-1.05.7.36.74.28.95.26.2-.02-.29-1.45-.48-1.53-.18-.07-.72.76-.65 1.08z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/><path d="M19.3 4.55c-.1-.02-.4.57-.36.65.12.32.57.26.63.15.06-.1-.16-.77-.26-.8z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M17.83 5.07c.06-.07.1-.07.15-.08" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M18 7.13a1.3 1.3 0 0 0-.94-.39c-.35 0-1.08.04-1.18.34-.1.3.76.44 1.07.43.32-.02.65.02 1.05-.2.17.25.39.45.54.41.15-.03.2-.6.11-.75-.24.03-.44.04-.66.16z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/><path d="M17.12 7.02c-.07-.02-.3.17-.27.24.18.27.27.14.3.09.04-.05.05-.31-.03-.33z" fill="var(--color-font)" fill-rule="evenodd"/><path d="M16.36 7.06c-.1-.03.03.02-.02 0" stroke="var(--color-base)" stroke-width="0.0914071" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M19 8.9a1.47 1.47 0 0 0-1.07-.36c-.32.03-.82.24-.86.54-.05.29.59.43.96.37.38-.07.97-.06 1.3-.27.25.24.51.37.6.25.08-.11.02-.86-.1-.94-.25.02-.65.25-.83.41z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M18.27 8.77c-.09 0-.27.25-.22.32.27.23.32.07.34 0 .03-.05-.03-.33-.12-.32z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M17.46 8.92c-.1-.03.03.02-.02 0" stroke="var(--color-base)" stroke-width="0.0914071" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M21.28 10.37c-.27-.27-1.3-.48-1.84-.4-.54.1-1.51.5-1.39.94.12.45 1.12.22 1.66.17a4.42 4.42 0 0 0 1.6-.45c.36.18.7.63.7.44 0-.2-.06-1.2-.15-1.37-.25.03-.55.38-.58.67z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/><path d="M20.04 10.33c-.1 0-.39.37-.36.45.2.3.53.06.61.02.09-.03-.15-.46-.25-.47z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M18.66 10.55c-.06-.03.02.01-.01 0" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M20.6 11.91c-.14-.3-.74-.24-1.17-.2-.42.03-1.24.2-1.2.6.05.4.95.17 1.34.14.4-.03.64-.09 1.02-.3.39.2.7.51.8.36 0-.25.04-.72-.05-1.06-.39-.03-.5.34-.74.46z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/><path d="M18.81 12.06c-.05.07-.02.02-.05.05" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M24.14 2.4a3.55 3.55 0 0 0-1.2-.28c-.35-.04-1.33-.04-1.48.28-.16.33.89.46 1.33.5.45.04.94-.05 1.33-.25.26.2.56.2.73.14.18-.07.26-.82.18-.97a1.7 1.7 0 0 0-.89.57z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M21.98 2.44c-.06-.04.02.01-.01 0" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M26.24 4.3a5.93 5.93 0 0 0-1.98-.35c-.44.16-.64.33-.85.4-.21 0-.31 0-.4.03-.08.02-.08.17.04.2.12.04.52.01.68 0 .1.11.28.25.52.26.25.02.56.07.9.03a7.1 7.1 0 0 0 1.15-.28c.28.03.58.19.66.08.09-.1-.01-.6-.14-.67-.12-.06-.46.12-.58.3z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd">
            <animate
                attributeName = "d"
                dur = "5s"
                repeatCount = "indefinite"
                values = "M26.24 4.3a5.93 5.93 0 0 0-1.98-.35c-.44.16-.64.33-.85.4-.21 0-.31 0-.4.03-.08.02-.08.17.04.2.12.04.52.01.68 0 .1.11.28.25.52.26.25.02.56.07.9.03a7.1 7.1 0 0 0 1.15-.28c.28.03.58.19.66.08.09-.1-.01-.6-.14-.67-.12-.06-.46.12-.58.3z;
                        M26.24 4.3a5.93 5.93 0 0 0-1.98-.35c-.44.16-.64.33-.85.4-.21 0-.32-.14-.38-.12-.06.01-.09.16.03.21.12.06.51.15.68.14.09.11.27.25.51.26.25.02.56.07.9.03a7.1 7.1 0 0 0 1.15-.28c.29.03.58.19.66.08.1-.1-.01-.6-.13-.67-.13-.06-.47.12-.6.3z;
                        M26.24 4.3a5.93 5.93 0 0 0-1.98-.35c-.44.16-.64.33-.85.4-.21 0-.31 0-.4.03-.08.02-.08.17.04.2.12.04.52.01.68 0 .1.11.28.25.52.26.25.02.56.07.9.03a7.1 7.1 0 0 0 1.15-.28c.28.03.58.19.66.08.09-.1-.01-.6-.14-.67-.12-.06-.46.12-.58.3z"
            />
        </path>
        <path d="M24.9 4.35c-.1-.02-.25.17-.2.23.06.14.37.11.41.03.05-.09-.1-.23-.2-.26z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M23.98 4.28v.03" stroke="var(--color-base)" stroke-width="0.0685564" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M25.84 6.48c-.57-.21-2.25-.68-3.26-.64-1 .05-2.83.46-2.8.9.37.3.44.16.5.24.06.08-.02-.03-.13.25.23.25 2.12.25 3.06.17.94-.08 2.07-.4 2.6-.65.6.25.97.55 1.13.4.11-.22-.04-1.03-.1-1.25-.05-.23-.62.17-1 .58z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd">
            <animate
                attributeName = "d"
                dur = "5s"
                repeatCount = "indefinite"
                values = "M25.84 6.48c-.57-.21-2.25-.68-3.26-.64-1 .05-2.83.46-2.8.9.37.3.44.16.5.24.06.08-.02-.03-.13.25.23.25 2.12.25 3.06.17.94-.08 2.07-.4 2.6-.65.6.25.97.55 1.13.4.11-.22-.04-1.03-.1-1.25-.05-.23-.62.17-1 .58z;
                        M25.84 6.48c-.57-.22-2.25-.68-3.26-.64-1 .05-2.83.46-2.8.9.37.3.47.16.5.24.03.07-.07.07-.3.2.23.26 2.26.3 3.23.22a8.5 8.5 0 0 0 2.6-.65c.6.25.97.55 1.14.4.1-.22-.04-1.03-.1-1.25-.06-.23-.63.17-1.01.58z;
                        M25.84 6.48c-.57-.21-2.25-.68-3.26-.64-1 .05-2.83.46-2.8.9.37.3.44.16.5.24.06.08-.02-.03-.13.25.23.25 2.12.25 3.06.17.94-.08 2.07-.4 2.6-.65.6.25.97.55 1.13.4.11-.22-.04-1.03-.1-1.25-.05-.23-.62.17-1 .58z"
            />
        </path>
        <path d="M23.36 6.67c-.16 0-.76.26-.71.32-.03.17.82.07.93.01.12-.05-.07-.33-.22-.33z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="m20.84 6.53-.01.01" stroke="var(--color-base)" stroke-width="0.274226" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M23.61 8.24c-.27-.27-1.05-.33-1.6-.22-.57.12-1.2.4-1.17.76.02.36.96.3 1.42.25a3.6 3.6 0 0 0 1.35-.54c.22.28.82.27 1.03.21.22-.06-.1-.87-.35-.92-.25.02-.54.27-.68.46z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M22.43 8.35c-.08 0-.33.24-.28.3.27.24.42.08.46.03.05-.05-.1-.33-.18-.33z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="m21.55 8.52-.01-.02" stroke="var(--color-base)" stroke-width="0.0685564" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M25 9.49c-.58.04-1.07.08-1.4.26-.34.18-.77.62-.59.82.18.2.96.17 1.34.03.38-.14.87-.5.95-.88.21.28.94.53.9.37-.05-.16-.2-1.25-.43-1.34-.23.06-.64.55-.77.74z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M23.37 10.19c-.03-.1 0 .03-.01-.02" stroke="var(--color-base)" stroke-width="0.0685564" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M29.33 3.12c.05-.09-.54-.47-.9-.57-.36-.09-.93-.26-1.14.09-.22.35.34.74.78.83.45.09.83.13 1.19-.06.27.29.31.44.46.39.14-.06.41-.55.4-.72-.25-.06-.51-.02-.79.04z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M27.55 2.9c-.06-.06.02.03-.02 0" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M30.59 4.56c-.17-.1-.67-.42-1.04-.41-.37 0-1.14.14-1.2.45-.05.3.78.48 1.16.51.38.04.82-.02 1.12-.3.23.25.36.64.43.52.06-.12.3-.7.35-.94-.25 0-.56.05-.82.17z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M28.75 4.57c-.1.02.03 0-.02.01" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M29.2 5.53c-.25-.15-.75-.29-1.07-.41-.33-.12-1.12-.06-1.22.3-.1.35.64.42 1.02.48.39.06.99.11 1.3-.14.38.2.37.26.47.23.1-.03.2-.42.18-.6-.24-.05-.53-.03-.67.14z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M27.18 5.38c-.06-.03.02.01-.01 0" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/><path d="M27.35 7.5c-.3 0-.75.18-.89.45-.13.28-.2.93.05 1.22.25.28.52-.41.7-.65.17-.25.23-.4.38-.8.4-.02.8-.3.8-.4 0-.1-.57-.24-.81-.2-.18.16-.2.16-.23.39z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M26.32 8.49c-.02.06.01-.02 0 .01" stroke="var(--color-base)" stroke-width="0.205669" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M29.12 8.65c-.1-.12-.64-.15-.97-.04-.34.11-.97.7-.8.98.16.28.75.06 1.06-.04.31-.1.65-.3.8-.54.3 0 .5-.03.62-.12.04-.16.05-.57-.11-.67-.25.03-.47.24-.6.43z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M28.45 8.93c-.06.03-.14.27-.09.34.27.24.37-.06.37-.16 0-.1-.22-.2-.28-.18z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="m27.63 9.18-.01-.03" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M31.41 6.61c-.27-.27-1.02-.45-1.56-.47-.54-.02-1.32.2-1.34.55-.02.35.8.35 1.3.34.49 0 1.27.03 1.6-.17.21.28.42.45.57.36.15-.09.42-1.01.18-1.06-.25.03-.61.26-.75.45z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M30.13 6.45c-.12.01-.36.17-.32.24.21.29.33.15.38.11.06-.04.06-.36-.06-.35z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M28.88 6.6c.06 0-.02-.02.01-.01" stroke="var(--color-base)" stroke-width="0.0685564" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M32.12 8.25c-.03-.15-.42-.3-.76-.28-.33.04-.8.01-.87.34-.07.32.6.4.88.4.29-.02.4.02.72-.2.17.3.4.24.5.2.1-.05.04-.48-.1-.51-.14-.04-.18 0-.37.05z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/><path d="M30.57 8.34c.07.01-.01-.02.02 0" stroke="var(--color-base)" stroke-width="0.137113" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M35.26 4.82c-.2-.28-1.1-.41-1.63-.4-.53 0-1.55.14-1.55.46-.01.32.99.3 1.5.33.52.02 1.2-.1 1.6-.18.2.28.4.43.48.33.08-.1.17-.8.01-.93-.21.1-.27.2-.41.4z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M33.91 4.66c-.07-.02-.35.19-.32.26.22.28.38.13.43.09.06-.05-.03-.34-.1-.35z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M32.64 4.76c0 .06.02-.02.01.01" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M35.13 6.56c-.36-.25-.7-.4-1.11-.45-.41-.06-1.15.06-1.2.42-.07.35.6.32 1.05.32.44 0 .84-.04 1.23-.04.42.14.68.18.71.01a2 2 0 0 0-.09-.86c-.22.1-.5.38-.6.6z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M33.14 6.4c-.09-.03.03.02-.02 0" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M33.99 7.58a.88.88 0 0 0-.61-.12c-.23.02-.72.23-.64.4.08.16.43.19.68.14.25-.06.32-.07.57-.2.34.07.28.03.43.06.15.02.06-.52-.01-.57-.08-.04-.33.14-.42.29z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M34.57 8.7a1.14 1.14 0 0 0-.53-.23c-.25-.06-.8-.1-.95.16-.16.27.43.56.7.58.28.02.43.03.81-.04.07.2.26.4.4.36.1-.12.15-.72-.05-.85-.08-.06-.07-.02-.38.02z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M34.08 8.77c-.07 0-.26.1-.24.18.11.26.43.1.44.04.02-.08-.12-.22-.2-.22z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M33.15 8.82c-.06-.06.02.03-.01 0" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M37.8 4.12c-.24-.18-.83-.03-1.4.16-.57.2-.76 1.02-.57 1.25.2.22.93-.1 1.3-.27.35-.16.69-.4.88-.73.48.05.87-.14.92-.3.04-.16-.47-.66-.66-.67-.18-.02-.41.3-.47.56z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M37.1 4.53c-.17.06-.11.35-.04.4.25.18.39-.26.4-.33 0-.07-.2-.13-.36-.07z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M35.87 4.95c.05-.08.09-.08.14-.1" stroke="var(--color-base)" stroke-width="0.22852" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M38.74 6.68a2.32 2.32 0 0 0-.9-.35c-.38-.06-1.03 0-1.09.34-.06.35.53.5.89.55.36.03.9.03 1.19-.15.32.28.6.42.76.33.15-.1.28-.78.14-.9-.14-.12-.8.05-.99.18z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="m36.86 6.65-.02.02" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M37.86 8.2c-.07-.14-.4-.27-.72-.39-.32-.1-.97-.02-.92.25.06.28.53.45.93.48.41.03.36.08.77.07.32.27.78.55.81.41.04-.13.13-.66 0-.83-.12-.16-.68 0-.87 0z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="m36.3 8.09.01.01" stroke="var(--color-base)" stroke-width="0.0914071" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/><path d="M36.81 9.95c.03-.15-.23-.5-.37-.78-.15-.28-.49-.83-.9-.72-.42.12-.25 1.1 0 1.47s.82.42 1.06.39c-.09.35-.18.57-.02.6.15.02.9-.29.95-.44.04-.16-.57-.4-.72-.52z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M35.3 9v.02" stroke="var(--color-base)" stroke-width="0.159963" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M41.84 2.28c-.9-.03-.92.02-1.39.22-.46.2-.73.64-.78.78-.06.14.31.1.45.08-.04.2-.22.37.01.43.23.06.89-.36 1.18-.58.3-.22.51-.38.7-.65.3-.04.75.04.79-.12.04-.15-.24-.84-.4-.87-.16-.03-.44.51-.56.7z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="m40 2.9.01.01" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M40.96 3.04c.03.11.2.1.27.04.19-.19-.04-.3-.14-.32-.1-.02-.16.17-.13.28z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M45 6.14a4.94 4.94 0 0 0-2.4-1.56c-.88-.22-2.4.31-2.94.22-.25.16-.2.15-.35.28.02.11.36.33.46.4-.13 0-.4-.05-.08.24.3.28 1.5.76 2.37.94.87.17 2.22.07 2.76-.28.24.37.43 1 .6.88.3.08.53-1.46.46-1.65-.07-.2-.67.38-.89.53z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd">
	        <animate
                attributeName = "d"
                dur = "5s"
                repeatCount = "indefinite"
                values = "M45 6.14a4.94 4.94 0 0 0-2.4-1.56c-.88-.22-2.4.31-2.94.22-.25.16-.2.15-.35.28.02.11.36.33.46.4-.13 0-.4-.05-.08.24.3.28 1.5.76 2.37.94.87.17 2.22.07 2.76-.28.24.37.43 1 .6.88.3.08.53-1.46.46-1.65-.07-.2-.67.38-.89.53z;
                        M45 6.14a4.67 4.67 0 0 0-2.4-1.55c-.92-.2-2.56.3-3.12.35-.14.19-.09.16-.24.3.02.1.42.17.53.24-.13 0-.4-.05-.1.24.32.28 1.5.76 2.38.94.88.17 2.23.07 2.77-.28.24.37.43 1 .6.87.3.1.54-1.45.46-1.64-.07-.19-.67.39-.89.53z;
                        M45 6.14a4.94 4.94 0 0 0-2.4-1.56c-.88-.22-2.4.31-2.94.22-.25.16-.2.15-.35.28.02.11.36.33.46.4-.13 0-.4-.05-.08.24.3.28 1.5.76 2.37.94.87.17 2.22.07 2.76-.28.24.37.43 1 .6.88.3.08.53-1.46.46-1.65-.07-.2-.67.38-.89.53z"
            />
        </path>
        <path d="m40.66 5.27.02.01" stroke="var(--color-base)" stroke-width="0.22852" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M42.17 5.73c-.14.24.5.5.63.5.35.02.3-.54.13-.61-.17-.08-.63-.13-.76.1z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M44.5 3.12c-.2-.3-.76-.36-1.23-.35-.47.01-1.25.22-1.22.52.03.3.66.33 1.08.34.42.01.98-.1 1.37-.19.22.28.58.54.66.43.08-.1.1-.92-.1-.9-.2 0-.29.02-.56.15z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M43.67 3.11c-.16.01-.3.18-.27.25.22.28.36.1.39.07.03-.03.04-.33-.12-.32z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M42.3 3.22c.1 0-.03 0 .03-.01" stroke="var(--color-base)" stroke-width="0.114262" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M45.06 4.4c-.14-.08-.29-.18-.53-.23-.23-.06-.7-.17-.81.04-.12.2.33.57.6.6.28.05.35.13.74.04.21.28.4.5.5.44.11-.07.25-.68.17-.83-.08-.15-.4-.2-.67-.07z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M43.66 4.46c-.04.1 0-.03 0 .02" stroke="var(--color-base)" stroke-width="0.0685564" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M42.07 9.4a2.1 2.1 0 0 0-.87-.7c-.35-.13-1.05-.3-1.26-.1-.22.2.22.36.29.42-.13.05-.33.13-.23.25.1.11.47.34.8.44.33.09.9.1 1.18.11.09.22.28.52.5.49.22-.04.43-.76.36-.9-.07-.16-.57-.04-.77-.02z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd">
            <animate
                attributeName = "d"
                dur = "5s"
                repeatCount = "indefinite"
                values = "M42.07 9.4a2.1 2.1 0 0 0-.87-.7c-.35-.13-1.05-.3-1.26-.1-.22.2.22.36.29.42-.13.05-.33.13-.23.25.1.11.47.34.8.44.33.09.9.1 1.18.11.09.22.28.52.5.49.22-.04.43-.76.36-.9-.07-.16-.57-.04-.77-.02z;
                        M42.06 9.39c-.11-.19-.5-.6-.86-.69-.35-.1-1.1-.1-1.27.13-.12.2.23.12.3.18-.13.06-.38-.03-.28.08.1.12.5.5.85.61.33.13.9.11 1.17.12.1.22.28.52.5.48.22-.03.43-.75.36-.9-.07-.15-.57-.04-.77-.01z;
                        M42.07 9.4a2.1 2.1 0 0 0-.87-.7c-.35-.13-1.05-.3-1.26-.1-.22.2.22.36.29.42-.13.05-.33.13-.23.25.1.11.47.34.8.44.33.09.9.1 1.18.11.09.22.28.52.5.49.22-.04.43-.76.36-.9-.07-.16-.57-.04-.77-.02z"
            />
        </path>
        <path d="M40.14 8.95c-.04.06.01-.02 0 .02" stroke="var(--color-base)" stroke-width="0.114262" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M41.24 9.22c-.04-.05-.25-.1-.3.06a.2.2 0 0 0 .2.28c.15-.01.14-.3.1-.34z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M42.32 11a4.11 4.11 0 0 0-1.66-.87c-.58-.15-2.03-.3-2.11.27-.08.58 1.05.76 1.65.94s1.55.23 1.94.14c.15.36.92.57 1.13.5.21-.08.29-.79.13-.96-.15-.18-.88-.27-1.08-.03z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M40.6 10.72c-.1-.03-.44.08-.4.15.08.17.3.37.45.3.15-.07.04-.43-.06-.45z" fill="var(--color-font)" fill-rule="evenodd"/>
        <path d="M38.94 10.46c.1.03-.02-.01.03 0" stroke="var(--color-base)" stroke-width="0.205669" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M39.7 12.17c-.1-.21-.63-.56-1.1-.61-.49-.05-1.7-.04-1.77.29-.07.32.38.6.84.72.47.13 1.8.23 1.95.02.35.34.57.37.69.28.12-.1.24-.77.04-.84-.2-.08-.54 0-.66.14z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M37.16 11.97c-.02.1.01-.03 0 .02" stroke="var(--color-base)" stroke-width="0.22852" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M41.35 13.94c-.4-.14-.99-.5-1.47-.58-.49-.09-1.35-.24-1.44.06-.09.3.05.53.48.69a9.7 9.7 0 0 0 2.1.26c.15.32.51.52.7.43.2-.09.54-.82.43-.97-.1-.16-.68-.02-.8.11z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M38.4 13.61c-.02.1.01-.03 0 .02" stroke="var(--color-base)" stroke-width="0.182819" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M43.64 13.33a9.91 9.91 0 0 0-.66-.48c-.32-.22-1.16-.25-1.25.01-.08.27.62.66.94.72.33.06.66.1.92.12.11.24.28.23.38.15.1-.08.3-.54.23-.63-.05-.09-.39 0-.56.1z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="m41.7 13 .01.01" stroke="var(--color-base)" stroke-width="0.114262" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M42.2 15.4c-.17-.13-.36-.32-.62-.36-.26-.03-.83-.18-.94.13-.12.31.45.43.73.5.28.06.45.06.74.04.25.24.37.22.47.11.1-.1.31-.7.12-.75-.2-.05-.44.2-.5.34z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M40.54 15.23c.1.03-.03-.01.02 0" stroke="var(--color-base)" stroke-width="0.0457059" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M44.95 11.62c-.19-.12-.26-.17-.45-.22-.18-.05-.63-.05-.67.13-.04.2.28.33.47.4.19.07.47.13.66.02.16.24.2.3.28.25.07-.05.13-.44.14-.58.02-.13-.22-.07-.43 0z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M43.7 11.6c-.02.1.02-.02 0 .03" stroke="var(--color-base)" stroke-width="0.114262" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M44.96 12.52c-.09-.05-.3-.28-.5-.33-.21-.05-.66-.05-.72.02-.06.07.1.17.17.21-.09.04-.22.08-.16.14.07.06.37.19.56.22.19.04.47.02.6-.02.1.08.2.25.27.2.07-.06.12-.42.09-.5-.04-.07-.26-.02-.3.06z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M43.69 12.48c.1.02-.03-.02.02 0" stroke="var(--color-base)" stroke-width="0.0457059" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/>
        <path d="M44.27 14.87c-.09-.05-.4-.46-.61-.56-.22-.1-.57-.1-.7-.04-.12.06-.06.23.02.28-.08.04-.17.1-.1.17.07.08.29.22.5.29.22.07.67.15.79.1.1.09.2.32.27.26.18.01.45-.59.3-.7-.17-.1-.3.1-.47.2z" fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" fill-rule="evenodd"/>
        <path d="M42.87 14.56c-.07.06.02-.02-.01.02" stroke="var(--color-base)" stroke-width="0.0457059" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1.01447 1)"/></svg>
    </symbol>
</svg>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('#slideshow .slide');
    if (slides.length <= 1) return;
    let currentIndex = 0;
    function showNextSlide() {
        const previousSlide = slides[currentIndex];
        currentIndex = (currentIndex + 1) % slides.length;
        const nextSlide = slides[currentIndex];
        nextSlide.style.zIndex = "0"; 
        nextSlide.classList.replace('opacity-0', 'opacity-100');
        previousSlide.classList.replace('opacity-100', 'opacity-0');
        setTimeout(() => {
            previousSlide.style.zIndex = "-10";
        }, 4000);
    }
    setInterval(showNextSlide, 6500);
});
</script>
@endpush