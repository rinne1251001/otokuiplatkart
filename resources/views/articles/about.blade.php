<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="takumi kanazawa">
    <title>おとくい！プラッツカルト！_このサイトについて_отаку_и_плацкарт!!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>

    <main class="absolute top-[50vh] left-[50vw] w-full" style="transform: translate(-50%, -50%);">
        <section class="leading-loose">
            <h1 class="text-2xl [-webkit-text-stroke:1.5px] mb-4">このサイトについて(2024/11/13)</h1>
            <ul>
                <li>海外鉄諸氏に倣って作りました。鉄道、カメラ、模型などを掲載するサイトです。</li>
                <li>飽きるorお金が無くなったらやめます。</li>
                <li>当サイトに掲載する画像、文章などすべてのコンテンツにおいて無断転載を禁じます。</li>
                <li>ご連絡は筆者のTwitter(X) @dentaku0128のDMまで</li>
            </ul>

            <div class="flex gap-6 mt-12">
                <a href="https://twitter.com/dentaku0128" class="hover:scale-110" target="_blank" rel="noopener">
                    <div class="bg-main text-base rounded-full w-[4em] h-[4em] grid place-content-center filter-[url(#shadow)]"><span class="text-[1.8em]">𝕏</span></div>
                </a>
                <a href="{{ route('top') }}" class="hover:scale-110">
                    <div class="relative">
                        <div class="relative">
                            <svg class="w-[6.5em] h-[4em] filter-[url(#shadow)]">
                                <use xlink:href="#azarashiBtn" />
                            </svg>
                        </div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-[calc(50%+0.5em)] -translate-y-[calc(50%-0.35em)] text-[1.2em] text-main] [-webkit-text-stroke:0.04em_var(--color-main)]">
                            top
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </main>


    <svg width="0" height="0">
        <defs>
            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                <feDropShadow dx="0" dy="4" stdDeviation="5" flood-color="rgba(170,153,138,0.3)"/>
            </filter>
        </defs>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
        <symbol id="azarashiBtn" viewBox="0 0 13 8">
            <path fill="var(--color-yellow)" d="M5 0h.35c3.04-.08 4.59 2.53 4.93 4.6.06.23.41-.04.53-.22.12-.18.06-.66.19-.85.13-.2.4-.31.6-.31.2 0 .5.13.63.3.15.17.1.53.23.73.13.2.5.23.53.5.03.27.01.87-.32 1.13-.33.26-1.09.2-1.66.43-.58.21-.67.22-1.8.87a8.15 8.15 0 0 1-3.9.82h-.27C3.31 8.04 0 7.54 0 5.44 0 3.34 1.53-.1 5 0z" fill-rule="evenodd"/>
            <path fill="var(--color-main)" d="M6.33.9c.14-.03.4.11.51.2.15.13.37.46.27.62-.09.16-.37.05-.6-.13-.22-.18-.32-.44-.28-.62.01-.05.05-.07.1-.08zM4.15.9c.05 0 .08.02.1.07.04.18-.06.44-.3.62-.22.18-.5.29-.59.13-.1-.16.12-.49.27-.62.11-.09.37-.23.52-.2z" fill-rule="evenodd"/>
            <path stroke="var(--color-main)" d="M3.922 2.1093c.303.1525.5902.1486.8252.0556.2351-.093.4971-.266.5851-.6133-.0143-.0825-.1266-.269-.1209-.252.0058.0168.1013.2977.1553.3538-.0286.2452.0127.264.1434.3738.1306.1099.4012.3413.6404.285.2041.0065.3391-.066.5468-.212 M8.01 1.74c.2-.33.54-.47.88-.59 M8.16 2.23c.24-.16.77.1 1.17.1h0 M8.01 2.76c.17.28.32.55.58.73 M1.44 1.16c.48.1.94.31 1.31.58 M1.44 2.18c.08.2.14.13.22.07.08-.05.34-.22.66-.23 M2.6 2.47c-.4.2-.67.49-1.01.73" stroke-width="0.275961" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1 1.03338)"/>
        </symbol>
    </svg>
</body>
</html>