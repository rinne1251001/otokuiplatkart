@php
    $title    = $currentArticle['title'] ?? '無題';
    $image    = $currentArticle['img']   ?? '';
    $date     = $currentArticle['date']  ?? '';
    $datetime = $date
        ? (\Carbon\Carbon::createFromFormat('Y.m.d', $date)?->toDateString() ?? '')
        : '';
    $desc     = $currentArticle['desc']  ?? '';
@endphp

<div class="flex flex-col items-center text-center pt-20 pb-10">
    <div class="relative w-[22em] h-[16em] text-[clamp(0.7em,3.5vw,2.5em)] filter-[url(#shadow)]">
        <img class="w-full h-full object-cover [clip-path:url(#wavyPhoto)]" src="{{ asset($image) }}" alt="{{ $title }}">
        <svg width="0" height="0" class="absolute">
            <defs>
                <clipPath id="wavyPhoto" clipPathUnits="objectBoundingBox">
                    <path transform="scale(0.0454, 0.0625)" d="M12.85.57c.74.46 1.16-.23 1.95.02.8.24 1.9.82 2.79 1.42.89.6 1.96.6 2.55 1.18.6.58.67 1.45.98 2.3.3.87.82 1.66.88 2.85.06 1.2-.69 1.64-1.23 3.08-.54 1.45-.12 1.04-.9 1.63-.79.6-1.23.11-1.91.74-.69.62-1.05.9-2.2 1.32-1.14.42-1.96-.38-2.86.19-.9.57-1.58.74-2.53.7-.94-.05-2.2-.98-3.14-.98-.94 0-1.6-.03-2.64-.23-1.04-.2-1.63-1.4-2.25-2.19-.62-.78-1.3-.24-1.98-1.15-.67-.91.08-2.18-.23-3.13-.3-.94 0-1.76.07-2.53s.35-.72.86-1.07c.52-.36.73-1.47 1.39-2.25.66-.78 1.53-.56 2.4-.74C5.73 1.55 5.94 1 6.7.56 7.46.12 8.15.24 9.1.26c.93.03.78-.25 1.93-.26 1.15 0 1.09.1 1.82.57z" />
                </clipPath>
            </defs>
        </svg>
    </div>

    <div class="py-8 px-[clamp(5px,5vw,50px)] leading-loose">
        <h2 class="font-bold text-[clamp(1.5rem,5vw,2rem)] mb-1">{{ $title }}</h2>
        <time datetime="{{ $datetime }}">投稿：{{ $date }}</time>
        <p class="text-lg mt-4 max-w-[46em] mx-auto">{!! nl2br($desc) !!}</p>
    </div>
</div>