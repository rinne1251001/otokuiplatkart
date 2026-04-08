@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_ホンホルオメガカーブ撮影地（モンゴル国鉄）_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => 'モンゴルで一番有名な撮影地、ホンホルΩカーブへのアクセス<br>２０２３年当時のアクセス方法です。訪問前に必ず自分で調べましょう。',
    ])

    @include('components.pager-btn')

    <main class="article">

        <section>
            <h2>ホンホルΩカーブ</h2>
            <p>
                全国一億二千万のﾃﾞﾝｼｬｵﾀｸ全員が一生に一度は訪れる聖地的な撮影地だ。当然必修科目なのでﾃﾞﾝｼｬｵﾀｸなら必ず履修しよう。<br>
                壮大なオメガカーブを行く客レや長大な貨物を撮影できる。<br>
                今回は筆者が訪れた2023年時点でのアクセスを示す
            </p>
            <p>
                <strong>※2025/04/13現在Googlemap上でバス系統の変更が確認できる。本記事はあくまで参考程度にとどめてほしい。</strong>
                <span class="text-[color-mix(in_srgb,var(--color-font),var(--color-base)_30%)]"> (最近訪問した方がいたらぜひ情報ください。（他力本願）)</span>
            </p>

            <iframe class="mt-8 mb-2 w-full" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d5030.767942217032!2d107.14477337377798!3d47.8007741256163!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sja!2sjp!4v1744478335766!5m2!1sja!2sjp" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p>
                47.799844, 107.146266<br>
                ちなみに場所はここ。ちゃんとΩなカーブだ。<br>
                ホンホルの街まではバスで行ける。残りはお馬さんでも眺めながら歩こう。
            </p>
        </section>
        
        <section>
            <h3>結論：БОТАНИКИЙН ЭЦЭСからX11バスかX5バスに乗れ。（2025年はX12バス？）</h3>
            <div>
                <img src="{{ asset('images/mngl2023/honhol.png') }}" alt="2ZAGAL">
            </div>
        </section>
            
        <section>
            <h3>とっても簡単。行き方。</h3>
            <iframe class="my-2 w-full" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1055.3124300289455!2d107.00144231925205!3d47.91249027113803!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d9691b5f015d421%3A0x504764c3c2bd28cf!2z0JHQntCi0JDQndCY0JrQmNCZ0J0g0K3QptCt0KE!5e1!3m2!1sja!2sjp!4v1744479881959!5m2!1sja!2sjp" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p>
                1.何らかの方法で"БОТАНИКИЙН ЭЦЭС"バス停に行く。バスを使うなら渋滞するので早起きした方が良い。<br>
                早起きすれば朝のウランバートル行きを取れるはずだ。
            </p>
        </section>
            
        <section>
            <p>
                2.バスに乗る。２通りのバス系統があるのでなんかうまいこと選ぶ。（2025年現在は一つ？）
            </p>
            <div>
                <img src="{{ asset('images/mngl2023/KIIP0714_s.jpg') }}" alt="写真1">
            </div>
            <p>
                x11バスはヒュンダイ製のマイクロバスだった。乗車率はそこそこ
            </p>

            <p>
                2-a."X11バス"に乗る。終点で降りる。ホンホルの市街地まで直通するのでこれが一番楽。本数は少ない（2025年現在は"X12"バスに置き換え？）
            </p>
            <div>
                <img src="{{ asset('images/mngl2023/KIIP0708_s.jpg') }}" alt="写真1">
            </div>
            <p>
                x5とx11はХонхор Дэнжまで同じルートを走る。<br>
                2-b-1."X5バス"に乗る。"Хонхор Дэнж"で途中下車する。路線バス的な車両。本数は毎時1~2本程度だったと思う。
            </p>

            <div>
                <img src="{{ asset('images/mngl2023/honholaruki.png') }}" alt="写真1">
            </div>
            <p>
                2-b-2."Хонхор Дэнж"からホンホル市街地(x11バスの終点)まで歩く。
            </p>

            <div class="row-container">
                <img onload="setFlex(this)" src="{{ asset('images/mngl2023/KIIP0724_s.jpg') }}" alt="写真1">    
                <img onload="setFlex(this)" src="{{ asset('images/mngl2023/aruki.png') }}" alt="写真2">
                <img onload="setFlex(this)" src="{{ asset('images/mngl2023/KIIP0735_s.jpg') }}" alt="写真3">
            </div>
            <p>
                筆者はﾆﾎﾝﾄﾘﾃﾂなので線路に近い水色で行った。うしさんを眺めてあるこう
            </p>
        </section>

        <section>
            <p>
                3.線路に向かって歩く。集落沿いの水色のルートも道路を行くピンクのルートもある。あとは好きに写真撮れ。
            </p>
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/mngl2023/DSC_0004.JPG') }}" alt="写真1">    
                <img src="{{ asset('images/mngl2023/DSC_0005.JPG') }}" alt="写真2">
            </div>
            <p>
                沼に注意
            </p>

            <div class="mt-8">
                <img src="{{ asset('images/mngl2023/KIIP0761_s.jpg') }}" alt="写真1">
            </div>
            <p>
                めっちゃながい
            </p>

            <div class="row-container mt-8">
                <img src="{{ asset('images/mngl2023/KIIP0753_s.jpg') }}" alt="写真1">
                <img src="{{ asset('images/mngl2023/mdm_004820_s.jpg') }}" alt="写真2">
            </div>
            <p>
                か゛っ゛こ゛い゛い゛
            </p>
        </section>

        <section>
            <h3>おまけ　腹が減ったらScafe&food に行け。</h3>

            <div>
                <img src="{{ asset('images/mngl2023/KIIP0781_s.jpg') }}" alt="写真1">
            </div>
            <p>
                電車に見飽きて腹が減ったらScafe＆foodにいこう。日本語ができるオーナーとオッドアイの猫ちゃんが君を待っているぞ！
            </p>

            <iframe class="mb-2 w-full mt-8" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2114.2563592152446!2d107.17078129177047!3d47.823391040506806!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d969fabd9a34d71%3A0xf3b9b95f9ff01f03!2sS-Cafe%20%26%20Food!5e1!3m2!1sja!2sjp!4v1745077589695!5m2!1sja!2sjp" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p>
                場所はここ、バス停のすぐ近く。ぱったりと旅客も貨物も途絶える時間があるので腹ごしらえをしよう。
            </p>
            <div class="grid grid-cols-2 mt-8">
                <img src="{{ asset('images/mngl2023/DSC_0010.JPG') }}" alt="写真1">
                <img src="{{ asset('images/mngl2023/DSC_0008.JPG') }}" alt="写真2">
            </div>
            <p>
                S-cafeのSは線路のS字カーブからとったそうだ。
            </p>
        </section>
    </main>

    @include('components.pager-btn')

@endsection
@push('scripts')
<script>
    document.querySelectorAll('.row-container img').forEach(img => {
        const update = () => {
            const ratio = img.naturalWidth / img.naturalHeight;
            if (ratio) img.style.setProperty('--ratio', ratio);
        };
        if (img.complete) update();
        else img.onload = update;
    });
</script>
@endpush