@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_神経衰弱_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => '同じ写真のカードを探そう',
    ])

    @include('components.pager-btn')


    <main class="py-20">

        <p id="countmessage" class="text-3xl">目指せ！１５枚以内！</p>

        <div id="trumptable" class="grid w-full gap-[3em] py-16 px-5 place-content-center place-items-center grid-cols-[repeat(auto-fit,minmax(min(100%,15em),15em))] text-[clamp(0.1em,1.5vw,1em)]">
            @php
                $photos = ['memory_dog.jpg', 'memory_train.jpg', 'memory_vase.jpg', 'memory_sophia.jpg', 'memory_Thalgo.jpg', 'memory_train2.jpg']
            @endphp
            @foreach($photos as $photo)
                <div class="trump relative w-full aspect-3/4 perspective-[1000px] transform-3d">
                    <div class="absolute inset-0 w-full h-full backface-hidden rounded-lg shadow-md transition-transform duration-1000 in-[.is-flipped]:transform-[rotateY(180deg)] cursor-pointer bg-[color-mix(in_srgb,var(--color-main),var(--color-base)_80%)] grid place-content-center gap-[1em]">
                        <span class="material-symbols-outlined text-[1.5em]!">train</span><span><br>отаку<br>и<br>плацкарт</span>
                    </div>
                    <div class="absolute inset-0 w-full h-full overflow-hidden backface-hidden rounded-lg shadow-md transition-transform duration-1000 transform-[rotateY(180deg)] in-[.is-flipped]:transform-[rotateY(360deg)]">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . $photo) }}">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cursor-pointer text-2xl">
            <p id="reset">reset</p>
        </div>

    </main>

    @include('components.pager-btn')


@endsection
@push('scripts')
  <script>
    window.onload =function() {
      const trumps = document.querySelectorAll('.trump')
			for (let i = 0 ; i < trumps.length ; i++) {
				let trump_clone = trumps[i].cloneNode(true);
        trump_clone.classList.add('trump');
				document.getElementById('trumptable').appendChild(trump_clone);
			}

      const allTrumps = document.querySelectorAll('.trump');
      let selections = [];
      let cnt = 0;
      let clearcnt = 0;
      let isProcessing = false;

      shuffle(allTrumps);

        allTrumps.forEach((card) => {
            card.addEventListener("click", () => {
            if (isProcessing) return;
            if (card.classList.contains("is-flipped")) return;
            if ( selections.length === 0 ) {
                card.classList.add("is-flipped");
                selections.push(card);
                cnt++;
            } else {
                card.classList.add("is-flipped");
                selections.push(card);
                cnt += 1;
                if ( selections[0].querySelector("img").src === selections[1].querySelector("img").src ) {
                selections = [];
                clearcnt += 2;
                } else {
                isProcessing = true;
                setTimeout(() => {
                    selections[0].classList.remove("is-flipped");
                    selections[1].classList.remove("is-flipped");
                    selections = [];
                    isProcessing = false;
                }, 700);
                }
            }
            if (clearcnt === allTrumps.length) {
                document.getElementById('countmessage').textContent = cnt + "枚目でクリア！";
            } else {
                document.getElementById('countmessage').textContent = cnt + "枚目";
            }
            });
        });

        const reset = document.getElementById('reset');
        reset.addEventListener("click", () => {
            allTrumps.forEach(card => {
                card.classList.remove('is-flipped');
            });
            document.getElementById('countmessage').textContent = "目指せ！１５枚以内！";
            selections = [];
            cnt = 0;
            clearcnt = 0;
            isProcessing = false;
            shuffle(allTrumps);
        })

        function shuffle(allTrumps) {
            const list = document.getElementById('trumptable');
            const shuffleitems = Array.from(allTrumps);
            for (let i = shuffleitems.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffleitems[i], shuffleitems[j]] = [shuffleitems[j], shuffleitems[i]];
            }
            shuffleitems.forEach(item => list.appendChild(item));
		}
    }
  </script>
@endpush