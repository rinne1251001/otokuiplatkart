@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_ギャラリー_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => '旅の思い出',
    ])

    @include('components.pager-btn')

    <main class="py-20">

        <div class="grid justify-center grid-cols-[14em_4em_2em_14em_2em_2em_16em] grid-rows-[12em_12em_12em_14em_14em_14em_6em_22em_12em_14em_10em] gap-[0.8em] text-[clamp(0.1em,1.5vw,1em)] text-[#262626]">

            @php
                $albums = [
                    [
                        'src'   => 'images/album/5.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[1/3] row-[3/4]',
                    ],
                    [
                        'src'   => 'images/album/6.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[3/6] row-[3/4]',
                    ],
                    [
                        'src'   => 'images/album/17.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[6/8] row-[1/2]',
                    ],
                    [
                        'src'   => 'images/album/7.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[6/8] row-[2/4]',
                    ],
                    [
                        'src'   => 'images/album/13.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[1/4] row-[4/5]',
                    ],
                    [
                        'src'   => 'images/album/12.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[2/5] row-[6/7]',
                    ],
                    [
                        'src'   => 'images/album/14.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[5/8] row-[6/7]',
                    ],
                    [
                        'src'   => 'images/album/11.jpg',
                        'alt'   => 'タルゴの車掌さん',
                        'class' => 'col-[1/2] row-[6/8]',
                    ],
                    [
                        'src'   => 'images/album/8.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[1/2] row-[8/9]',
                    ],
                    [
                        'src'   => 'images/album/16.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[1/3] row-[9/10]',
                    ],
                    [
                        'src'   => 'images/album/15.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[3/6] row-[9/10]',
                    ],
                    [
                        'src'   => 'images/album/9.jpg',
                        'alt'   => '無題',
                        'class' => 'col-[6/8] row-[9/11]',
                    ],
                ]
            @endphp
            @foreach($albums as $album)
                <img class="w-full h-full object-cover {{ $album['class'] }}" src="{{ asset($album['src']) }}" alt="{{ $album['alt'] }}">
            @endforeach

            @php
                $cards = [
                    [
                        'src'     => 'images/album/1.jpg',
                        'alt'     => '無題',
                        'class'   => 'col-[1/6] row-[1/3]',
                        'color'   => 'bg-[#C7CD85]',
                        'cmt'     => '鉱石満載',
                    ],
                    [
                        'src'     => 'images/album/2.jpg',
                        'alt'     => '無題',
                        'class'   => 'col-[4/8] row-[4/6]',
                        'color'   => 'bg-[#F2E5B6]',
                        'cmt'     => 'ソフィアの朝',
                    ],
                    [
                        'src'     => 'images/album/3.jpg',
                        'alt'     => 'アルマータ2駅',
                        'class'   => 'col-[2/8] row-[7/9]',
                        'color'   => 'bg-[#D2B48C]',
                        'cmt'     => <<<HTML
                                    <p class="mb-[2em]">東側の夜行列車</p>
                                    <a class="flex justify-center gap-[0.5em] border-[0.01em] py-2 px-4 duration-200 hover:scale-[1.08]" href="../foreign/uzkz_matome">
                                        <span class="material-symbols-outlined text-[1.5em]! inline-block -rotate-45">link</span>
                                        海外鉄入門１落単まとめ
                                    </a>
                                    HTML,
                    ],
                    [
                        'src'     => 'images/album/4.jpg',
                        'alt'     => '無題',
                        'class'   => 'col-[1/6] row-[10/12]',
                        'color'   => 'bg-[#E8B4B4]',
                        'cmt'     => 'красная звезда',
                    ],
                                        
                ]
            @endphp
            @foreach($cards as $card)
                <div class="card {{ $card['class'] }} relative perspective-[1000px] transform-3d cursor-pointer">
                    <div class="absolute top-0 left-0 w-full h-full transition-transform duration-1000 in-[.is-flipped]:transform-[rotateY(180deg)]"><img class="w-full h-full object-cover" src="{{ asset($card['src']) }}" alt="{{ $card['alt'] }}"></div>
                    <div class="absolute top-0 left-0 w-full h-full backface-hidden grid place-content-center transition-transform duration-1000 transform-[rotateY(180deg)] in-[.is-flipped]:transform-[rotateY(360deg)] {{ $card['color'] }}">{!! $card['cmt'] !!}</div>
                </div>
            @endforeach

            <div class="col-[1/4] row-[5/6]"><a class="cursor-default" href="{{ asset('unko/unko.html') }}"><img class="w-full h-full object-cover" src="{{ asset('images/album/10.jpg') }}"></a></div>
            <div class="w-full h-full object-cover col-[6/8] row-[11/12] bg-[#C5A5A5] grid place-content-center">coming<br>soon ...</div>
        </div>

    </main>

    @include('components.pager-btn')


@endsection
@push('scripts')
  <script>
        //めくれる写真のスクリプト
        const cards = document.querySelectorAll(".card");
        cards.forEach((card) => {
            card.addEventListener("click", () => {
                card.classList.toggle("is-flipped");
            });
        });
  </script>
@endpush