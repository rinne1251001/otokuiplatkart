<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="takumi kanazawa">
    <title>@yield('title', 'отаку и плацкарт!!')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/hamburger.js',])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yomogi&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=link,swap_vert,train&display=swap" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>
    <header class="overflow-x-hidden z-50 relative">
        <div class="bg-main text-base flex items-center justify-between pt-[clamp(15px,2vw,25px)] px-[clamp(15px,4vw,40px)] pb-[clamp(0px,40px-4vw,40px)] font-bold">
            <div class="text-[clamp(1em,2vw,1.2em)]">
                <a href="{{ route('top') }}" class="flex flex-col items-center gap-1" aria-label="トップページへ">
                    <span class="text-[1em] tracking-tighter leading-tight text-center">отаку и<br>плац<wbr>карт!!</span>
                    <span class="text-[0.6em] pl-2">おとくい！！プラッツカルト！！</span>
                </a>
            </div>

            <div class="relative">
                <button id="hamb_btn" class="text-[clamp(1em,2vw,1.2em)] relative z-150 cursor-pointer group focus:outline-none" data-target="#acc_wrapper" aria-label="メニューを開く" aria-expanded="false" aria-controls="acc_wrapper">
                    <div class="hamb_line w-[2.5em] h-[2em] relative">
                        <span class="absolute left-0 w-full h-0.5 bg-base rounded-sm transition-all duration-300 top-1 group-[.active]:top-1/2 group-[.active]:-translate-y-1/2 group-[.active]:rotate-45 group-[.active]:bg-base"></span>
                        <span class="absolute left-0 w-full h-0.5 bg-base rounded-sm transition-all duration-300 top-1/2 -translate-y-1/2 group-[.active]:opacity-0"></span>
                        <span class="absolute left-0 w-full h-0.5 bg-base rounded-sm transition-all duration-300 bottom-1 group-[.active]:top-1/2 group-[.active]:-translate-y-1/2 group-[.active]:-rotate-45 group-[.active]:bg-base"></span>
                    </div>
                    <div class="text-[0.6em] group-[.active]:hidden">めにゅー</div>
                    <div class="text-[0.6em] hidden group-[.active]:block">くろーず</div>
                </button>

                <div class="overlay fixed inset-0 bg-black/50 z-90 opacity-0 invisible transition-all duration-300 [&.show]:opacity-100 [&.show]:visible"></div>

                <nav id="acc_wrapper" class="fixed top-0 right-0 w-75 h-screen bg-main z-100 pt-[clamp(4em,8vw,6em)] px-7.5 translate-x-full transition-transform duration-300 [&.open]:translate-x-0">
                    <ul class="text-base">
                        @foreach($navItems as $label => $info)
                        @if($loop->first) @continue @endif
                            <li class="border-t border-base first:border-none">
                                <a href="{{ route($info['route'], $info['params'] ?? []) }}" class="block py-3.75 pl-6 transition-transform hover:scale-105">{{ $label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div><svg class="w-screen h-auto aspect-301/16 filter-[url(#shadow)]"><use href="#headerWave" /></svg></div>
    </header>

    @yield('content')

    <footer class="mt-20 mb-12">
        <div class="relative h-[5em] w-screen overflow-hidden">
            <div class="absolute bottom-0 left-0 animate-[trainGo_15s_linear_infinite] text-[clamp(0.3em,1.8vw,1em)]"><svg class="w-[14.5em] h-[4.5em] animate-[kakukakuTiny_1.4s_steps(1)_infinite] filter-[url(#shadow)]"><use href="#train1" /></svg></div>
            <div class="absolute bottom-0 left-0 w-full h-px bg-[color-mix(in_srgb,var(--color-font),var(--color-base)_50%)]"></div>
        </div>

        @if(!empty($currentTags))
        <div class="container mt-6 px-[clamp(16px,4vw,32px)]">
            <h3 class="text-2xl font-bold my-2">TAG</h3>
            <ul class="flex flex-wrap gap-2">
                @foreach($currentTags as $tag)
                    <li>
                        <a class="bg-[color-mix(in_srgb,var(--color-font),var(--color-base)_40%)] px-3 py-1 rounded text-sm text-base hover:brightness-90" 
                        href="{{ route('articles', ['tags' => $tag]) }}">
                            #{{ $tag }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </footer>


    <svg width="0" height="0">
        <defs>
            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                <feDropShadow dx="0" dy="4" stdDeviation="5" flood-color="rgba(170,153,138,0.3)"/>
            </filter>
        </defs>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
        <symbol id="headerWave" viewBox="0 0 301 16">
            <path d="M0 0h301v9.41l-3.23-1.28c-4.7-1.8-10.01-3.45-15.86-3.25-15.6.54-39.44 8.85-59.86 8.95-20.42.1-40.39-7.64-62.65-8.35-22.27-.7-49.82 3.26-70.95 4.08-21.14.83-42.69-.49-55.85.88l-26.18 3.6C1 14.95 2.14 15.33 0 16z" fill="color-mix(in srgb, var(--color-main), var(--color-base) 40%)" fill-rule="evenodd"/>
            <path d="M0 0h301v7.58l-3 .91c-1.13.37-2.3.78-3.5 1.24-19.13 7.22-48.92-4.98-69.07-6.2-20.15-1.22-34.91-5.56-51.8-1.11-16.9 4.45-40.3 5.87-65.74 3.16-25.43-2.71-43.37 4.78-72.74 5.24C24.13 11 11.9 10.1.18 8.8L0 8.77z" fill="var(--color-main)" fill-rule="evenodd"/>
        </symbol>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
        <symbol id="train1" viewBox="0 0 29 9">
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
        <symbol id="azarashiBtn" viewBox="0 0 13 8">
            <path fill="var(--color-yellow)" d="M5 0h.35c3.04-.08 4.59 2.53 4.93 4.6.06.23.41-.04.53-.22.12-.18.06-.66.19-.85.13-.2.4-.31.6-.31.2 0 .5.13.63.3.15.17.1.53.23.73.13.2.5.23.53.5.03.27.01.87-.32 1.13-.33.26-1.09.2-1.66.43-.58.21-.67.22-1.8.87a8.15 8.15 0 0 1-3.9.82h-.27C3.31 8.04 0 7.54 0 5.44 0 3.34 1.53-.1 5 0z" fill-rule="evenodd"/>
            <path fill="var(--color-main)" d="M6.33.9c.14-.03.4.11.51.2.15.13.37.46.27.62-.09.16-.37.05-.6-.13-.22-.18-.32-.44-.28-.62.01-.05.05-.07.1-.08zM4.15.9c.05 0 .08.02.1.07.04.18-.06.44-.3.62-.22.18-.5.29-.59.13-.1-.16.12-.49.27-.62.11-.09.37-.23.52-.2z" fill-rule="evenodd"/>
            <path stroke="var(--color-main)" d="M3.922 2.1093c.303.1525.5902.1486.8252.0556.2351-.093.4971-.266.5851-.6133-.0143-.0825-.1266-.269-.1209-.252.0058.0168.1013.2977.1553.3538-.0286.2452.0127.264.1434.3738.1306.1099.4012.3413.6404.285.2041.0065.3391-.066.5468-.212 M8.01 1.74c.2-.33.54-.47.88-.59 M8.16 2.23c.24-.16.77.1 1.17.1h0 M8.01 2.76c.17.28.32.55.58.73 M1.44 1.16c.48.1.94.31 1.31.58 M1.44 2.18c.08.2.14.13.22.07.08-.05.34-.22.66-.23 M2.6 2.47c-.4.2-.67.49-1.01.73" stroke-width="0.275961" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="scale(1 1.03338)"/>
        </symbol>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="display: none;">
        <symbol id="azarashiBtn2" viewBox="0 0 18 8">
            <path fill="var(--body-color, var(--color-main))" d="M7.46.25C5.68.51 4.11.9 3.17 1.85c-.93.93-1.08 1.5-1.4 2.34-.53.77-1.87 2.04-.2 2.82 1.78.47 3.9 0 4.9.16-.13.36.08.98 1.1.79s4.06-1.7 5.03-1.9c-.18 1.15.64.78.95.66.3-.13.68-.72 1.16-.54.33.24.18 2.03 1.52 1.72 1.46-.79.14-1.8.81-2.14.68-.34.81-.64.95-1.98.14-1.34-1.6-3.03-4.14-3.45A20.6 20.6 0 0 0 7.46.25z" fill-rule="evenodd"/>
            <path fill="var(--parts-color, var(--color-yellow))" d="M2.62 3.8c0-.26.15-.48.34-.48.18 0 .33.22.33.48 0 .27-.15.48-.33.48-.19 0-.34-.21-.34-.48z M4.58 3.72c-.03-.28.09-.52.25-.54.17-.02.33.19.36.46.04.28-.08.53-.25.55-.16.02-.33-.2-.36-.47z" fill-rule="evenodd"/>
            <path stroke="var(--parts-color, var(--color-yellow))" d="M31.22 15.84c.74.1.77-.72.95-.86.03-.04.1-.06.13-.02.05.16.24.75.74.63 M33.99 14.27c.32-.16.62-.26 1-.33 M34.13 14.99c.26.05.53-.03.77.04 M34.32 15.46c.3.29.04.05.1.12 M28.64 15.04c.36-.28 1.08-.1 1.53.04 M29.5 14.5c.36.2.67.33 1.05.44 M29.98 13.94c.44.15.8.31 1 .66" stroke-width="0.268303" stroke-linecap="round" stroke-miterlimit="8" fill="none" transform="matrix(1 0 0 1.00937 -28.504 -9.9759)"/>
        </symbol>
    </svg>
    @stack('scripts')
</body>
</html>