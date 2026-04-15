<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>写真一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>
    
    @php
        $sections = [
            ['title' => 'images',               'path' => 'images'],
            ['title' => 'images/album',         'path' => 'images/album'],
            ['title' => 'images/china2026',     'path' => 'images/china2026'],
            ['title' => 'images/mngl2023',      'path' => 'images/mngl2023'],
            ['title' => 'images/uzbkkzqh2023',  'path' => 'images/uzbkkzqh2023'],
        ];
    @endphp

    <nav>
        <ul>
            @foreach($sections as $section)
                <li><a href="#{{ str_replace('/', '-', $section['title']) }}" class="underline">{{ $section['title'] }}</a></li>
            @endforeach
        </ul>
    </nav>

    @foreach($sections as $section)
        @php
            // フォルダ内の画像を取得
            $fullPath = public_path($section['path']);
            $files = \File::exists($fullPath) 
                    ? \File::glob($fullPath . '/*.{jpg,jpeg,png,gif,webp,JPG,ico}', GLOB_BRACE) 
                    : [];
        @endphp

        <section class="max-w-none mb-12" id="{{ str_replace('/', '-', $section['title']) }}">
            <h2 class="font-bold text-2xl mb-4 pb-1">{{ $section['title'] }}</h2>
            
            <div class="grid w-full gap-8 place-content-center grid-cols-[repeat(auto-fit,minmax(min(100%,250px),250px))]">
                @forelse($files as $file)
                    @php $fileName = basename($file); @endphp
                    
                    <figure class="flex flex-col h-full">
                        {{-- フォルダパスとファイル名を結合して表示 --}}
                        <div class="grow flex items-center justify-center">
                            <img src="{{ asset($section['path'] . '/' . $fileName) }}" alt="{{ $fileName }}" class="w-full shadow-md">
                        </div>
                        <figcaption class="break-all py-2">{{ $fileName }}</figcaption>
                    </figure>
                @empty
                    <p>画像が見つかりませんでした。</p>
                @endforelse
            </div>
        </section>
    @endforeach

</body>
</html>