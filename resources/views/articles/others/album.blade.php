@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_ギャラリー_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => '旅の思い出',
    ])

    @include('components.pager-btn')

    <main>

        <div class="grid justify-center grid-cols-[14em_4em_2em_14em_2em_2em_16em] grid-rows-[12em_12em_12em_14em_14em_14em_6em_22em_12em_14em_10em] gap-[0.8em] text-[clamp(0.1em,1.5vw,1em)] text-[#262626]">

            <div class="card col-[1/6] row-[1/3] relative perspective-[1000px] transform-3d cursor-pointer">
                <div class="absolute top-0 left-0 w-full h-full transition-transform duration-1000 in-[.is-flipped]:transform-[rotateY(180deg)]"><img class="w-full h-full object-cover" src="{{ asset('images/album/1.jpg') }}"></div>
                <div class="absolute top-0 left-0 w-full h-full backface-hidden grid place-content-center transition-transform duration-1000 transform-[rotateY(180deg)] in-[.is-flipped]:transform-[rotateY(360deg)] bg-[#C7CD85]">鉱石満載</div>
            </div>
            <img class="w-full h-full object-cover col-[1/3] row-[3/4]" src="{{ asset('images/album/5.jpg') }}">
            <img class="w-full h-full object-cover col-[3/6] row-[3/4]" src="{{ asset('images/album/6.jpg') }}">
            <img class="w-full h-full object-cover col-[6/8] row-[1/2]" src="{{ asset('images/album/17.jpg') }}">
            <img class="w-full h-full object-cover col-[6/8] row-[2/4]" src="{{ asset('images/album/7.jpg') }}">

            <div class="card col-[4/8] row-[4/6] relative perspective-[1000px] transform-3d cursor-pointer">
                <div class="absolute top-0 left-0 w-full h-full transition-transform duration-1000 in-[.is-flipped]:transform-[rotateY(180deg)]"><img class="w-full h-full object-cover" src="{{ asset('images/album/2.jpg') }}"></div>
                <div class="absolute top-0 left-0 w-full h-full backface-hidden grid place-content-center transition-transform duration-1000 transform-[rotateY(180deg)] in-[.is-flipped]:transform-[rotateY(360deg)] bg-[#F2E5B6]">ソフィアの朝</div>
            </div>
            <img class="w-full h-full object-cover col-[1/4] row-[4/5]" src="{{ asset('images/album/13.jpg') }}">
            <div class="col-[1/4] row-[5/6]"><a class="cursor-default" href="{{ asset('unko/unko.html') }}"><img class="w-full h-full object-cover" src="{{ asset('images/album/10.jpg') }}"></a></div>

            <div class="card col-[2/8] row-[7/9] relative perspective-[1000px] transform-3d cursor-pointer">
                <div class="absolute top-0 left-0 w-full h-full transition-transform duration-1000 in-[.is-flipped]:transform-[rotateY(180deg)]"><img class="w-full h-full object-cover" src="{{ asset('images/album/3.jpg') }}" alt="アルマータ2駅"></div>
                <div class="absolute top-0 left-0 w-full h-full backface-hidden grid place-content-center gap-[3em] transition-transform duration-1000 transform-[rotateY(180deg)] in-[.is-flipped]:transform-[rotateY(360deg)] bg-[#D2B48C]"><p>東側の夜行列車</p><a class="flex justify-center gap-[0.5em] border py-2 px-4 duration-200 hover:scale-[1.08]" href="{{ article_route('uzkz_matome') }}"><span class="material-symbols-outlined text-[1.5em]! inline-block -rotate-45">link</span>海外鉄入門１落単まとめ</a></div>
            </div>
            <img class="w-full h-full object-cover col-[2/5] row-[6/7]" src="{{ asset('images/album/12.jpg') }}">
            <img class="w-full h-full object-cover col-[5/8] row-[6/7]" src="{{ asset('images/album/14.jpg') }}">
            <img class="w-full h-full object-cover col-[1/2] row-[6/8]" src="{{ asset('images/album/11.jpg') }}" alt="タルゴの車掌さん">
            <img class="w-full h-full object-cover col-[1/2] row-[8/9]" src="{{ asset('images/album/8.jpg') }}">

            <div class="card col-[1/6] row-[10/12] relative perspective-[1000px] transform-3d cursor-pointer">
                <div class="absolute top-0 left-0 w-full h-full transition-transform duration-1000 in-[.is-flipped]:transform-[rotateY(180deg)]"><img class="w-full h-full object-cover" src="{{ asset('images/album/4.jpg') }}"></div>
                <div class="absolute top-0 left-0 w-full h-full backface-hidden grid place-content-center transition-transform duration-1000 transform-[rotateY(180deg)] in-[.is-flipped]:transform-[rotateY(360deg)] bg-[#E8B4B4]">красная звезда</div>
            </div>
            <img class="w-full h-full object-cover col-[1/3] row-[9/10]" src="{{ asset('images/album/16.jpg') }}">
            <img class="w-full h-full object-cover col-[3/6] row-[9/10]" src="{{ asset('images/album/15.jpg') }}">
            <img class="w-full h-full object-cover col-[6/8] row-[9/11]" src="{{ asset('images/album/9.jpg') }}">
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