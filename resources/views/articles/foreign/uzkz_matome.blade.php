@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_海外鉄入門１落単まとめ_отаку_и_плацкарт!!')
@section('content')

<main>
    <div style="width: 100dvw; height: auto; aspect-ratio: 3 / 2; margin-top: calc(-100dvw / 301 * 16); overflow-x: hidden; z-index: -1;">
        <img src="{{ asset('images/uzbkkzqh2023/mdm_004783_1.jpg') }}" class="w-full h-full object-cover">
    </div>

    <div style="margin-top: calc(-100dvw / 301 * 16); filter: url(#shadow);">
        <div><svg style="width: 100dvw; height: auto; aspect-ratio: 301 / 16; color: var(--color-main); transform: scale(-1,-1); overflow-x-hidden;"><use xlink:href="#headerWave" /></svg></div>
        <div class="relative bg-[color-mix(in_srgb,var(--color-main),var(--color-base)_60%)] flex flex-col items-center justify-center text-center">

            <div class="absolute top-0 left-0 h-[10em] w-full bg-[linear-gradient(var(--color-main)_0%_5%,transparent_90%_100%)]"></div>
            <div class="absolute bottom-0 left-0 h-[10em] w-full bg-[linear-gradient(transparent_0%_10%,var(--color-main)_95%_100%)]"></div>
            
            <div class="absolute top-0 left-0 h-full w-full bg-[color-mix(in_srgb,var(--color-main),transparent_70%)]"></div>
            
            <div class="py-[10em] w-full">
                <div class="grid grid-cols-1 place-content-center min-[700px]:grid-cols-[21em_21em] min-[1030px]:grid-cols-[21em_21em_21em] px-2 py-3 mt-10">
                    <div class="relative flex justify-center">
                        <svg class="text-base w-[21em] h-[15em] filter-[url(#shadow)]"><use xlink:href="#wavyFrame" /></svg>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[calc(50%+2em)] font-bold text-[1.5em]">訪問国</div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-2.5em)] -translate-y-[calc(50%-1.6em)]">ウズベキスタン<br>カザフスタン</div>
                    </div>

                    <div class="relative flex justify-center">
                        <svg class="text-base w-[21em] h-[15em] filter-[url(#shadow)]"><use xlink:href="#wavyFrame" /></svg>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[calc(50%+2em)] font-bold text-[1.5em]">旅行期間</div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-2.5em)] -translate-y-[calc(50%-1.6em)]">2023/03/08<br><span class="-rotate-90 inline-block translate-x-[0.1em]">～</span><br>2023/03/25</div>
                    </div>

                    <div class="min-[700px]:max-[1040px]:col-span-2 relative flex justify-center">
                        <svg class="text-base w-[21em] h-[15em] filter-[url(#shadow)]"><use xlink:href="#wavyFrame" /></svg>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[calc(50%+2em)] font-bold text-[1.5em]">撮影機材</div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-3em)] -translate-y-[calc(50%-1.2em)] whitespace-nowrap">Mamiya645DF+ Mamiya DM22<br>PENTAX K-1 改<br>xperia xz3</div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+5.6em)] -translate-y-[calc(50%-4.2em)]"><svg class="w-[7.4em] h-[7.2em] filter-[url(#shadow)]"><use xlink:href="#camera" /></svg></div>
                    </div>
                </div>

                <div class="relative py-3 flex justify-center min-h-[clamp(66em,150vw,70em)] min-[530px]:min-h-[clamp(80em,50vw,90em)] min-[970px]:min-h-[72em] w-full overflow-hidden">
                    <div class="absolute top-[15em] sm:top-[8em] left-[-28em] md:left-[-25em] text-[clamp(0.4em,2vw,1em)] z-10">
                        <svg class="relative w-[160em] h-[72em] filter-[url(#shadow)]"><use xlink:href="#map" /></svg>
                        <@php
                            $dots = [
                                ['pin' => 'top-[25em] left-[35em]',     'spot' => 'Miskin'],
                                ['pin' => 'top-[26em] left-[36em]',     'spot' => 'Bukhara'],
                                ['pin' => 'top-[26em] left-[37.5em]',   'spot' => 'Samarkand'],
                                ['pin' => 'top-[25em] left-[38.5em]',   'spot' => 'Tashkent'],
                                ['pin' => 'top-[24em] left-[39.5em]',   'spot' => 'Taraz'],
                                ['pin' => 'top-[24em] left-[41.5em]',   'spot' => 'Almaty'],
                                ['pin' => 'top-[29em] left-[58em]',     'spot' => 'Incheon'],
                                ['pin' => 'top-[26.5em] left-[71.5em]', 'spot' => 'Japan'],
                            ];
                        @endphp
                        @foreach($dots as $dot)
                            <div class="absolute rounded-full bg-yellow w-[clamp(4px,1.5vw,12px)] h-[clamp(4px,1.5vw,12px)] cursor-pointer {{ $dot['pin'] }}"></div>
                        @endforeach
                    </div>

                    <svg class="absolute top top-1/2 left-1/2 -translate-x-[calc(50%+clamp(0em,5vw,10em))] min-[970px]:-translate-x-[calc(50%-26em)] -translate-y-[calc(50%-clamp(4em,40vw,14em))] min-[970px]:-translate-y-[calc(50%-3em)] text-main w-[25em] h-[40em] blur-[30px] z-9"><use xlink:href="#wavyFrame2" /></svg>
                    <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+clamp(0em,5vw,10em))] min-[970px]:-translate-x-[calc(50%-clamp(23.5em,40vw,26em))] -translate-y-[calc(50%-clamp(5em,40vw,15em))] min-[970px]:-translate-y-[calc(50%-4em)]! z-20">
                        <ul>
                            @php
                                $spots = ['成田', '仁川', 'タシケント', 'サマルカンド', 'ミスキン', 'ブハラ',
                                        'サマルカンド', 'タシケント', 'アルマータ', 'タラズ', 'タシケント', '仁川', '羽田']
                            @endphp
                            @foreach($spots as $spot)
                            <li class="flex gap-4">
                                <div class="flex flex-col items-center shrink-0 w-5">
                                    <div class="size-5 rounded-full bg-yellow z-10"></div>
                                    @if (!$loop->last)
                                        <div class="flex-1 w-0.75 bg-yellow -mt-1"></div>
                                    @endif
                                </div>
                                <div class="pb-4 leading-tight font-bold text-base text-lg">{{ $spot }}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="absolute top-[23em] sm:top-[15em] left-[6em] [850px]:left-[10em] text-[clamp(0.4em,2vw,1em)] md:text-[1em] z-20">
                        <svg class="relative w-[36em] h-[10em] filter-[url(#shadow)]"><use xlink:href="#title" /></svg>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[calc(50%+1.01em)] [-webkit-text-stroke:0.06em] text-[2.2em]">ルート</div>
                    </div>
                </div>

                <div class="relative py-3 mb-10 flex justify-center">
                    <svg class="block text-base w-[clamp(21em,80vw,40em)] h-[clamp(20em,70vw,30em)] filter-[url(#shadow)]"><use xlink:href="#wavyFrame" /></svg>
                    <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%-0.5em)] -translate-y-1/2 w-[clamp(21em,80vw,40em)] px-15">
                        <p>
                            初めての海外旅行。ホームシック、モチベーション消失、<span class="whitespace-nowrap">コロナ感染。</span>素晴らしい出会いと体験。<br>
                            撮り鉄としては０点。旅としては１２０点。
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div><svg class="overflow-x-hidden" style="width: 100dvw; height: auto; aspect-ratio: 301 / 16; color: var(--color-main);"><use xlink:href="#headerWave" /></svg></div>
    </div>

    @include('components.pager-btn')

    <section>
        <div class="flex items-center gap-[1.2em] text-[clamp(0.3em,3vw,1em)] mb-4">
            <div><svg class="w-[8em] h-[6.4em] text-font [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold filter-[url(#shadow)]">ギャラリー</h1>
            <div><svg class="w-[8em] h-[6.4em] text-font [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
        </div>
        <div style="display: grid; justify-content: center; grid-template-columns: 18em 15em 6em 21em; grid-template-rows: 12em 12em 12em; gap: 0.7em; font-size: clamp(3px, 1.2vw, 16px);">
            @php
                $galleryImages = [
                    [
                        'src'   => 'images/album/3.jpg',
                        'alt'   => 'アルマータ2駅',
                        'class' => 'col-[2/4] row-[1/2]',
                        'style' => ''
                    ],
                    [
                        'src'   => 'images/album/11.jpg',
                        'alt'   => 'タルゴの車掌さん',
                        'class' => 'col-[1/2] row-[1/3]',
                        'style' => ''
                    ],
                    [
                        'src'   => 'images/uzbkkzqh2023/mdm_003902_s.jpg',
                        'alt'   => 'そにぃ',
                        'class' => 'col-[1/2] row-[3/4]',
                        'style' => ''
                    ],
                    [
                        'src'   => 'images/uzbkkzqh2023/mdm_004072_s.jpg',
                        'alt'   => '陶器を持つおばちゃん',
                        'class' => 'col-[4/5] row-[1/2]',
                        'style' => ''
                    ],
                    [
                        'src'   => 'images/uzbkkzqh2023/mdm_004652_s.jpg',
                        'alt'   => 'わんちゃん',
                        'class' => 'col-[2/3] row-[2/4]',
                        'style' => ''
                    ],
                    [
                        'src'   => 'images/uzbkkzqh2023/mdm_004719_1_s.jpg',
                        'alt'   => 'アルマリクGMK',
                        'class' => 'col-[3/5] row-[2/4]',
                        'style' => 'object-position: 5% center;'
                    ],
                ];
            @endphp
            @foreach($galleryImages as $image)
                <img src="{{ asset($image['src']) }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover {{ $image['class'] }}" @if($image['style']) style="{{ $image['style'] }}" @endif>
            @endforeach
        </div>
    </section>

    <section class="md:px-[clamp(0px,10px-0.1vw,10px)]">
        <div class="flex items-center gap-[1.2em] text-[clamp(0.3em,3vw,1em)] mb-4">
            <div><svg class="w-[8em] h-[6.4em] text-font [--parts-color:var(--color-base)] animate-[kakukakuMirror_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
            <h1 class="text-[2.5em] font-bold filter-[url(#shadow)]">利用した宿</h1>
            <div><svg class="w-[8em] h-[6.4em] text-font [--parts-color:var(--color-base)] animate-[kakukaku_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use xlink:href="#azarashi" /></svg></div>
        </div>

        @php
            $hotels = [
                'Hotel & Hostel Gallery' => [
                    'link'    => 'https://www.booking.com/hotel/uz/amp-hostel-gallery.ja.html',
                    'map'     => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d4423.310318811124!2d69.26341180468974!3d41.2937242234847!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDE3JzMwLjkiTiA2OcKwMTUnNTcuMiJF!5e1!3m2!1sja!2sjp!4v1759463741753!5m2!1sja!2sjp',
                    'address' => 'улица Минглар 10 , Тошкент, 100015, ウズベキスタン',
                    'phone'   => '+998 88 976 04 21',
                    'GPS'     => 'N 041° 17.515, E 69° 15.954',
                    'desc'    => 'オーナーが少し日本語できる。親切。<br>タシケント地下鉄oubek駅が最寄。国鉄駅も徒歩圏内',
                ],
                'Amir Hostel' => [
                    'link'    => 'https://www.booking.com/hotel/uz/amir-hostel.ja.html',
                    'map'     => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d4147.6646344595165!2d66.94966773765681!3d39.65657244846791!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMznCsDM5JzE3LjMiTiA2NsKwNTcnMTMuNiJF!5e1!3m2!1sja!2sjp!4v1759463773238!5m2!1sja!2sjp',
                    'address' => 'A.Jomiy 45, Самарканд, 140100, ウズベキスタン',
                    'phone'   => '+998 97 916 88 99',
                    'GPS'     => 'N 039° 39.289, E 66° 57.226',
                    'desc'    => '人生初外人と下ネタ。<br>国鉄駅からは歩けるが距離はある、yandexが楽',
                ],
                'Payrabiy' => [
                    'link'    => 'https://www.booking.com/hotel/uz/payraviy.ja.html',
                    'map'     => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d1960.99437444679!2d64.41718959932525!3d39.777288376334816!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMznCsDQ2JzM2LjIiTiA2NMKwMjUnMDguNSJF!5e1!3m2!1sja!2sjp!4v1759464081280!5m2!1sja!2sjp',
                    'address' => 'M.Payraviy 38, Buxoro, 200100, ウズベキスタン',
                    'phone'   => '+998 91 446 72 55',
                    'GPS'     => 'N 039° 46.603, E 64° 25.142',
                    'desc'    => '旧市街にあるのでバスかyandex推奨。<br>駅に夜着の場合はオーナーにyandexをお願いしよう。',
                ],
                'DA Hostel Almaty' => [
                    'link'    => null,
                    'map'     => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d3201.9252523381865!2d76.95996545264396!3d43.27123829276687!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDPCsDE2JzExLjgiTiA3NsKwNTcnNDcuMiJF!5e1!3m2!1sja!2sjp!4v1759464124892!5m2!1sja!2sjp',
                    'address' => 'Mukhamedzhanova Street 33, Almaty, 050002, カザフスタン',
                    'phone'   => '+7 7273975332',
                    'GPS'     => 'N 043° 16.197, E 76° 57.786',
                    'desc'    => null,
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center">
        @foreach($hotels as $name => $hotel)
            <div class="bg-base flex flex-col max-w-sm h-full shadow-[1px_1px_30px_rgba(170,153,138,0.2)]">
                <iframe src="{{ $hotel['map'] }}" class="sepia-40 saturate-120 contrast-80 brightness-110 h-48 w-full border-0" allowfullscreen="" loading="lazy"></iframe>
                <div class="py-5 px-8 flex flex-col flex-1 gap-6">
                    <h2 class="text-[1.5em] font-bold text-center leading-tight">{{ $name }}</h2>
                    <ul class="space-y-3">
                        <li class="flex gap-3 items-baseline">
                            <div class="size-4 rounded-full shrink-0 translate-y-[0.1em] bg-yellow"></div><div class="flex-1 text-left">住所: {{ $hotel['address'] }}</div>
                        </li>
                        <li class="flex gap-3 items-center">
                            <div class="size-4 rounded-full shrink-0 bg-yellow"></div><div class="flex-1 text-left">電話: {{ $hotel['phone'] }}</div>
                        </li>
                        <li class="flex gap-3 items-center">
                            <div class="size-4 rounded-full shrink-0 bg-yellow"></div><div class="flex-1 text-left">GPS： {{ $hotel['GPS'] }}</div>
                        </li>
                    </ul>
                    <div class="flex-1"><p class="text-left leading-relaxed">{!! $hotel['desc'] ?? '' !!}</p></div>
                    <div class="flex justify-center mt-auto pt-2">
                        @if(!empty($hotel['link']))
                            <a class="bg-main text-base inline-flex items-center gap-2 py-3 px-5 transition hover:brightness-90" href="{{ $hotel['link'] }}" target="_blank" rel="noopener noreferrer"><span class="material-symbols-outlined inline-block -rotate-45">link</span><span>{{ $name }}</span></a>
                        @else
                            <span class="bg-main text-base inline-flex items-center py-3 px-8">廃業済み</span>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
        </div>
    </section>

    @include('components.pager-btn')
</main>

@endsection
@push('scripts')
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="wavyFrame" viewBox="0 0 7 5" preserveAspectRatio="none">
        <path fill="currentColor" d="M1.41.52c.34-.15.48.01.8-.05.34-.05.77-.3 1.17-.3.4.02.9.39 1.26.35.34-.02.59-.02.85.13.26.15.49.66.7.78.21.12.52.12.72.5.2.37.02.8-.08 1.07-.12.28-.08.22-.11.7-.04.48-.57.5-.86.7-.27.18-.47.47-.82.44-.36-.03-.37-.1-.69-.07-.3.03-.84.25-1.15.23-.31-.02-.42-.23-.71-.33-.3-.09-.78-.06-1.05-.22-.29-.16-.39-.54-.64-.73-.27-.19-.36-.08-.56-.4-.2-.31.1-.64.04-.95-.07-.3-.2-.56-.04-.84.15-.27.47-.31.66-.48.2-.17.17-.38.52-.53z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="wavyFrame2" viewBox="0 0 16 23" preserveAspectRatio="none">
        <path fill="currentColor" d="M.56 9.56c.47-.76-.21-1.2.02-2.04.25-.82.83-1.97 1.43-2.9.6-.93.6-2.06 1.18-2.67.57-.62 1.45-.7 2.3-1.03C6.37.6 7.16.07 8.35 0c1.2-.06 1.64.73 3.08 1.29 1.45.56 1.04.13 1.63.94.6.82.11 1.28.74 2a5.63 5.63 0 0 1 1.32 2.3c.42 1.2-.38 2.04.18 2.98.58.94.75 1.66.7 2.65-.05.99-.97 2.3-.97 3.29 0 .97-.03 1.68-.23 2.76s-1.4 1.7-2.2 2.35c-.77.64-.23 1.36-1.14 2.06-.91.7-2.19-.07-3.13.24-.94.32-1.76 0-2.53-.06-.77-.08-.72-.37-1.07-.91-.36-.53-1.47-.76-2.25-1.45-.79-.69-.57-1.6-.74-2.52C1.56 17.02 1 16.8.56 16c-.44-.8-.32-1.52-.3-2.5.03-.99-.25-.83-.26-2.03 0-1.2.1-1.14.56-1.9z" fill-rule="evenodd"/>
    </symbol>
</svg>
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
    <symbol id="camera" viewBox="0 0 37 36">
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" stroke="var(--color-font)" d="M18.5.5c1.3 0 7 2 12 4.6A73.2 73.2 0 0 1 31.9 32c-3.5.6-4.6.8-7 1.5C21 29.2 19.3 6 18.5.5z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 30%)" stroke="var(--color-font)" d="M29.4 8.4c0-.5-.9-2-.2-2.5.7-.6 5.2-.6 5.8-.2.6.3.1 1.5.1 2 .3-.1.4 0 .6 0 .3 0 .2.7 0 1 .2.2.7-.4.9.2 0 3.4 0 15.9-.4 19.7-1 3-1 3-2.2 3.5-1.3.6-4 .1-5.3 0 2-3 1.7-8.5 1.2-12.5-.6-3.9-.5-8.7-.4-10.5 0-.2.4-.2.4-.4 0 0-.2.1-.3-.4z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" stroke="var(--color-font)" d="M10.7 6.8c-1-.4-3-.4-3.6-.2-.3.3 0 1-.2 1.3-.4.1-1-.3-2.2.2-1.3.7-3.4 2.3-4 4.4-.5 2 .8 3 .9 4.6 0 1.7-1 2.2-.4 5.5.8 3.4.5 6.7 1.9 8.4 1.7 1.3 5.2-.5 9-1.6 1.3-4.1-.5-18.8-1.3-22.6z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 25%)" stroke="var(--color-font)" d="M18.1.5c-.8-.1-3 1.8-6.6 4.2a55.7 55.7 0 0 0 1 24.4c2 5 9.1 4 11.7 4.5 1.6-1.3 1-.4 2.4-2.7 0-3.5.4-11.8-.3-17.1C24.3 8.4 20.7 2 18.2.5z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 25%)" stroke="var(--color-font)" d="M9.5 16c.4-1.5 1-2 2.4-3 1.4 0 3.4-.3 5.6-.5 3 .9 5 3.3 6.3 5.2 1.2 1.9 1.3 3.2 1.5 6 .2 2.7-.6 4-2.2 6a21 21 0 0 1-7.8 4.8c-1.7-.3-1 0-2.8-1-1-3-3-14.1-3.2-17.5z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 20%)" stroke="var(--color-font)" d="M12 32.5c-2.6 0-6.4-5.7-6.5-9 0-3.4 1.8-7.9 4.6-8.8 2.9-1 7.2 1.9 8.3 4.3 1.4 2.3 1.8 7 .1 9.4-1.6 2.4-3.7 4.1-6.3 4z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 15%)" stroke="var(--color-font)" d="M13.5 27.5c-2.1-.1-3-2.4-3-3.7s.9-3.8 2.7-4.3c1.8-.4 4.7 2.4 4.3 4.4-.5 2-1.9 3.6-4 3.5z" stroke-width="0.915223" stroke-miterlimit="8" fill-rule="evenodd"/>
        <path stroke="var(--color-font)" d="M12.5 3.8c1.7 0 3.6-.5 8.8-.2M10.8 8.9c4.2-.6 9-.5 13.6-.4M9.1 8.5c-1.8 1.3-3.3 4-3.5 4.9-.2 1 .6 2 .7 2.6 0 .7.2.8 0 1.5m22.9-9.9 2.2-.2c1 0 3 0 4 .3m-5.9.6c2.8 0 5.3.3 7.2 0m-3.4.2c0 2.7.3 3.8 0 7.1-.2 3.4 0 10.1-.4 13.1-.4 2.4-1.1 2.6-2.3 3.8m4.5-23.7c.2 1.1-.3 2.1-.3 3.8v6.5c0 3.1-.7 9.1-.4 10.4.5 1.3 0 2.4-.6 3" stroke-width="0.915223" stroke-linecap="round" stroke-miterlimit="8" fill="none"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="map" viewBox="0 0 40 18">
        <path fill="var(--color-domestic)" d="M7.52 11.98c.12-.02.22.04.24.2.02.26-.1.9-.32 1.07-.13.17-.46.1-.48-.07-.03-.17-.01-.3 0-.52 0-.22.18-.48.35-.6a.47.47 0 0 1 .21-.08zm9.21-.25h.16c.33.03.66.13.86.16.06-.06.2-.24.46-.08.25.17.7.66 1.06 1.08.2.49.02 1.14-.24 1.52s-.97.31-1.17.2c-.2-.13-.2-.24-.37-.37a1.84 1.84 0 0 0-.94.03c-.3.1-.49.23-.9.22a.97.97 0 0 1-.87-.55c-.14-.3-.38-.59-.15-1 .23-.4.73-.43 1.05-.63.24-.24.5-.52.9-.57l.15-.01zm.52-1.25c.3-.01.7.1.94.23.37.2.96.54.85.83-.11.28-.83.16-1.23-.06-.4-.23-1-.52-.9-.83.03-.12.16-.17.34-.17zm-1.84-.68c.06 0 .1.02.14.05.12.15-.03.44.04.53.12 0 .2-.04.38-.02.18.02.3.16.22.52.1.2.63.57.37.67-.26.1-1.33.09-1.94-.09-.6-.17-1.2-.63-1.66-.97-.46-.34-.34-.62-.02-.52.32.1.86.52 1.08.65.1.01.1-.05.24-.11.01-.15.23-.53.5-.57.2-.04.47-.15.65-.14zm.44-1.33c.13 0 .25.06.24.18 0 .24.27.5.42.77.14.26-.03.47-.2.55-.18.09-.38.06-.43-.12-.16-.12-.45-.16-.5-.35-.06-.2.06-.58.15-.83.05-.13.2-.2.32-.2zm1.13-1.7c.04 0 .08 0 .11.03.13.1.13.3.03.41-.1.1-.3.12-.37.03-.07-.09-.08-.14-.05-.26.01-.08.15-.2.28-.2zM18.02 6c.04-.01.1.01.15.07.15.15.05.68-.23.79-.28.1-.48.19-.62.1-.14-.1-.17-.25.08-.37.25-.13.37-.05.43-.3.04-.17.1-.27.19-.29zm.31-.57c.15 0 .27.1.27.24 0 .13-.12.23-.27.23s-.27-.1-.27-.23.12-.24.27-.24zM7.53 5.4c-.1.01-.2.13-.14.3.09.23.4.69.52.84.13.14.2-.03.18-.22a2.62 2.62 0 0 0-.46-.88.13.13 0 0 0-.1-.04zM1 4c.18-.02.21.2.18.4-.03.2-.15.4-.29.33-.13-.07-.2-.21-.19-.38.02-.18.12-.33.3-.35zm.36-.48c.05 0 .1.03.16.08.24.2.11.5.27.62.15.13.23.13.25.28.03.14-.53.51-.73.35-.2-.17-.01-.33-.04-.51-.03-.19-.12-.46-.13-.6-.01-.1.07-.24.22-.22zm31.07-2.16a.9.9 0 0 1 .64.36c.96-.18.8.73.36.85-.43.13-.97.7-.94.97.03.26.86.43 1.1.62.24.19.25.49.33.51.1-.09.16-.02.21-.45.05-.43-.22-.95.57-1.13.79-.17 1.95.49 1.92 1.23-.02.74-.42.32-.66.57-.23.25-.23.83-.75.95-.52.1-.55.31-.96.96-.42.65-1.64.7-2.03.75-.16.33-.06.77.03.89.08.12.23.07.47-.16.24-.24.7.13.5.47.13.05.18-.04.34.1.16.15-.07.75.35.66.42-.1.96-.34 1.55-.24.6.1 1.51.21 1.92 1.06.69.39 1.14.38 1.47.78.32.4.16.83-.26 1.47-.42.63-1.74 1.64-2.26 2.36-.52.73-.63 1.7-.87 1.99-.23.28-1.09-.28-1.19-.88-.1-.6.57-1.94.59-2.73.02-.8-.68-1.2-.94-1.76-.25-.55-.26-.91.06-1.69-.12-.1-.16.12-.52-.1-.36-.23-1.15-.84-1.93-1.03-.77-.18-.94-.96-1.06-1 .04.3.1.63-.2.48a5.09 5.09 0 0 1-1.01-1.55c-.27-.53-.34-1-.57-1.61a2.9 2.9 0 0 0-1.46-1.58c-1.3-.28-1.29.31-2.36.12-1.37-.47-1.13-1.75-.4-2.07.72-.32 1.28.1 1.8.12.52.02.55 0 1.3-.03.75-.03 2.4.26 3.18.5.22-.22.82-.04 1.21-.12-.2-.42.1-.66.47-.64zM14.28 0c.41 0 .97.2.45.82 1.03 0 2.93.01 4.3.22 1.37.2 2.87.58 3.94 1 1.07.43.38.67.1.65a5.36 5.36 0 0 0-1.93.65c-.41.3-.22.83-.52 1.14-.3.31-.74.41-.9-.03-.17-.44.23-.87.25-1.04-.76.16-2.32.39-2.42.71.32.23.49.34.52.55.03.2-.1.56-.3.83-.23.27-.62.22-.86.27-.03.4-.17 1.16-.47.97-.31-.18-.15-.36-.23-.52-.1-.02-.3-.05-.4 0-.06.12-.28.29-.15.59.12.3.24.54.01.93-.23.39-1.06.6-1.49.55.2.32.51.69.23 1.1-.29.4-.65.02-.86-.03.05.2.12.34.32.7.2.36-.05.35-.23.18-.19-.17-.39-.49-.5-.94a2.2 2.2 0 0 0-.76-.99c-.26.06-.31.02-.6.22-.36.74-.77 1.18-1.17 1-.4-.16-.82-1.4-1.27-1.71-.8.07-1.18-.21-1.44-.24l-.11.04c.09.12.67.43.66.7-.01.27-.8.78-1.27.7-.48-.08-1.03-1.24-1.13-1.77-.08.13-.12.02-.24.37.13.4.89 1.32 1.27 1.74.67.08.67.44.19 1.01-.23.76-1.04 3.03-1.64 3.57-.6.54-1.62.45-1.97-.3-.34-.75-.45-2.78-.53-3.45-.55-.06-1.14.04-1.71.02a1.54 1.54 0 0 1-1.3-.83c-.25-.48 0-1.53.41-1.99.42-.46.68-.63 1.63-.79.95-.16 1.11.35 1.52.47.4.12 1.15.05 1.58.06.43 0 .8-.25.82-.43-.76.17-1.36-.47-.7-.65.65-.17 1.2-.02 1.28-.08.01-.08.07-.08-.13-.16-.12-.19-.6-.61-1.03-.33-.43.28-.48.66-.57.82-.1.16-.5.2-.67.12-.17-.08-.24-.4-.35-.58-.12-.17-.4-.22-.4-.18-.01.03.16.28.36.38.2.1.22.52-.16.32-.38-.2-.46-.45-.82-.66-.43.18-1.15.87-1.75.8-.6-.07-.46-.65-.29-.83.17-.19.49-.09.74-.1.02-.08-.03-.25.08-.49.1-.23.84-.6 1.02-.96.18-.37.36-.47.6.08.26-.04.58 0 .77-.03s.16-.25.32-.37c.16-.13.62-.3.65-.37.04-.07-.31.06-.44-.02-.12-.07-.32-.28-.3-.42.02-.15.46-.46.42-.44-.03.02-.5.37-.62.57-.12.2.09.36-.1.6-.19.25-.81.34-.82-.16-.33.29-.64.02-.7-.22-.06-.24.27-.6.68-.9.3-.31.72-.78 1.49-.92.77-.13 1.7.46 1.8.5.27.2-.3.54-.57.45-.02.05.02.06.02.09.14.05 1.89-.75 2.8-.68.52-.02.71-.37 1.31-.62.6-.24 2.63-.68 3.12-.85.5-.17.74-.4 1.16-.4z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
    <symbol id="airplane" viewBox="0 0 25 16">
        <path fill="var(--color-base)" d="M10.5 13c.8.1 4-.8 5-1.3.7-.5.7-1.7-.1-1.7-.9 0-4 .2-4.8.8-.6.6-1 2-.1 2.2z" fill-rule="evenodd"/>
        <path fill="var(--color-base)" d="M10.7 11c-.4 0-.6.5-.7.9 0 .2 0 1 .3 1s.5-.5.6-.8c0-.3 0-1.1-.3-1.2z" fill-rule="evenodd"/>
        <path fill="var(--color-base)" d="m15 0-1 4.1 2.4.2c1.1 0 3.3.2 4.4 0 0-.1 1.3-3 1.5-3l.7-.8c.2-.2 1.5 0 1.7 0 .1.1-.1.4-.3 1.1l-.7 3.1c2 .8.5 1.7.2 2 0 1 1 2.9 1 3.6-.1.7-1.3.8-1.7.8-.4 0-1.6-2.7-1.9-3.2-1.4.8-5.6 1.2-7.9 1.1.9 1.3 1.9 3.4 2.8 5.1.6 1.4.8 1.8.6 1.9-.4-.1-1.4.2-2-.2-.7-.4-1.1-.8-2-2-1-1-2.8-4-3.5-4.8H4.7C1.4 9 .7 8.5 0 7.8-.3 7.1 1.5 5.4 2.5 5c1.1-.4 2.5-.6 3.8-.8 1.3-.1 3.1-.2 4-.1l1-1.8c.4-.7 1.8-2.1 2-2.2h1.9z" fill-rule="evenodd"/>
        <path fill="var(--color-main)" d="M19.6 6.2c.2 0 .3.2.4.3 0 .2 0 .5-.3.5s-.6-.3-.6-.4c.1-.2.2-.3.5-.4zm-2.1 0c.2 0 .4.2.5.3 0 .2 0 .5-.4.5-.3 0-.5-.2-.5-.4.1-.2.2-.4.4-.4zm-7 0c.3 0 .5.1.5.3 0 .3-.4.4-.5.4-.2 0-.6-.2-.5-.5 0-.3.2-.3.5-.3zm-1.9 0c.2 0 .3.1.4.3 0 0 .2.4-.1.4-.4 0-.6-.2-.6-.4s0-.4.2-.4zm7.3 0 .3.3c0 .2-.1.4-.4.4a.4.4 0 0 1-.5-.5c0-.2.3-.3.4-.3zm-8.5 0c.2 0 .3.2.3.4 0 .1-.3.4-.6.4C7 7 7 6.7 7 6.5c0-.2.2-.4.5-.3zm-1.8 0c.3 0 .5.2.5.3 0 .1-.2.4-.4.4-.2-.1-.5-.3-.4-.4 0-.2 0-.4.3-.4zm6.5 0c.3 0 .5.2.4.4 0 .2 0 .3-.4.4-.3 0-.4-.3-.4-.5 0-.2 0-.4.4-.4zm1.7 0c.2-.1.4.2.3.3 0 .2 0 .5-.4.5s-.6-.3-.6-.5c0-.2.2-.4.5-.4zM1.6 6c.2 0 .5 0 .6.2 0 0 0 .4-.2.4h-.8c.1-.2.2-.5.4-.5h.1zm-.5 0c.2 0 0 .4 0 .5-.2.1-1.2 0-1.2 0S.5 6 .7 6h.5z" fill-rule="evenodd"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="position: absolute; width: 0; height: 0; overflow: hidden;">
    <defs>
        <radialGradient id="left-tail" cx="100%" cy="35%" r="53%" fx="100%" fy="50%">
            <stop offset="0%" style="stop-color: color-mix(in srgb, var(--color-font), var(--color-base) 30%);" />
            <stop offset="50%" style="stop-color: color-mix(in srgb, var(--color-font), var(--color-base) 30%);" />
            <stop offset="100%" style="stop-color: var(--color-base);" />
        </radialGradient>
        <radialGradient id="right-tail" cx="0%" cy="35%" r="55%" fx="0%" fy="50%">
            <stop offset="0%" style="stop-color: color-mix(in srgb, var(--color-font), var(--color-base) 30%);" />
            <stop offset="50%" style="stop-color: color-mix(in srgb, var(--color-font), var(--color-base) 30%);" />
            <stop offset="100%" style="stop-color: var(--color-base);" />
        </radialGradient>
    </defs>
    <symbol id="title" viewBox="0 0 18 5">
        <path fill="url(#left-tail)" d="M3.764 1.658c-.82-.133-3.698.148-3.764.919.546.262 1.107.325 1.365.521C.983 3.491.723 4.58.928 4.74c.174-.1.879-.673 1.457-.683.579-.01 1.407.016 1.83-.098.422-.115.754-.202.704-.585-.05-.384-.336-1.584-1.156-1.717z" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 30%)" d="M4.606 2.594c.088-.161.664 1.087.009 1.239-.01-.341.025-.455-.247-.473-.271-.017-1.103.226-1.147-.057-.042-.284 1.163-.714 1.386-.709z" fill-rule="evenodd"/>
        <path fill="url(#right-tail)" d="M13.677 2.088c-.439.64-.912 1.178-.49 1.726.423.548 2.304-.075 3.84 1.186.336-.591-.116-1.093-.361-1.683.312-.276.864-.294 1.334-.448-.365-1.016-3.333-1.06-4.323-.782z" fill-rule="evenodd"/>
        <path fill="color-mix(in srgb, var(--color-font), var(--color-base) 30%)" d="M13.352 3.938c.094-.339-.045-.337.2-.413.244-.075 1.317.083 1.264-.04-.053-.123-.989-.895-1.584-.698-.162.183-.23.4-.21.592.02.19.082.48.33.558z" fill-rule="evenodd"/>
        <path fill="var(--color-base)" d="M4.606 3.615c.197-.055.278-.23-.085-.308-.363-.077-1.74.267-1.087-.24.653-.506 3.531-.48 5.385-.444 1.854.036 4.933.196 5.611.49 1.035.75-.618.307-.954.288-.336-.019-.309.348-.097.41.05-.303.278-.216 1.37-.04.399-.085.38-.905.434-1.379.054-.473.855-1.066-.109-1.464C14.111.53 11.38.055 9.4.006 7.42-.043 4.28.21 3.197.634c-1.084.426-.37 1.424-.3 1.924.071.5.068 1.064.444 1.083.426-.037 1.357-.333 1.266-.025z" fill-rule="evenodd"/>
    </symbol>
</svg>
@endpush