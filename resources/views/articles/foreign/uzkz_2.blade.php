@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_海外鉄入門１落単②【旅行記】_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => 'ホジケント線で乗り鉄',
    ])

    @include('components.pager-btn')

    <main class="article">

        <section>
            <h2>旅行記：エレクトリーチカに乗ろう</h2>
            <p>
                タシケント近郊にはいくつかの近郊電車網があり、今回はそのうちエレクトリーチカが走り回っているホジケント方面に乗車した際の話だ。<br>
                本路線には初期型の丸顔リーチカが活躍していたらしいが、渡航直前に退役してしまった。渡航目的の一つが消失してしまった。残念。<br>
                タシケント周辺のエレクトリーチカの時刻表は以下のリンクで確認した。<br>
                <a href="https://tashtrans.uz/raspisanie-prigorodnih-elektropoezdov-tashkenta/">TashTrans.uz</a>
            </p>
        </section>
        
        <section>
            <div>
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5282.jpg') }}" alt="泊まった宿">
            </div>
            <p>
                ホジケント方面の列車は日に３本しかない。朝の１往復を逃すと帰りが夜になってしまい、都合が悪い。<br>
                だから朝一番の列車に乗ることにしたわけだが、怠惰な生活を送る大学生に早起きなどできるわけがなかった。<br>
                始発のタシケント南駅までは宿からだとアクセスが悪く、微妙に間に合いそうにない。大急ぎでグーグルマップを叩いて気が付いた。地下鉄を乗り継げば途中駅
                で追いつけそうだ！ｵﾀｸは走った。<br>
            </p>
        </section>
            
        <section>
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5308.jpg') }}" alt="駅員？おっちゃん">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5310.jpg') }}" alt="ウズベクvl">
            </div>
            <p>
                何とか間に合ったようで、ホームにいたおっちゃんから切符を買った。「ﾋﾟｬｰﾁ:/;:@/:@:！」首をかしげると苦笑いで５本指を立ててきた。5000スムだったと思う。<br>
                どうやらホジケント線は終点付近のダムを絡めたレジャー路線らしい。観光客らしいのがちらほらいた。
                この駅は操車場の片隅にあるようでウズベク塗装のvl80とtem2が見えた。こういう地方塗装割と好き。
            </p>

            <h3>初遭遇</h3>
            <div>
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5313.jpg') }}" alt="ER9E">
            </div>
            <p>
                RVRマークが誇らしい、古き良き角顔リーチカだ。<br>
                吊り掛け駆動の轟音をまき散らし出発だ。
            </p>

            
            <div class="mt-8">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5320.jpg') }}" alt="ER9E車内">
            </div>
            <p>車内はオール木製のクロスシートだ。数種類あるウズベクのエレクトリーチカの中でも原型に近いタイプだろう。</p>
            
            <p>
                さて、ふと気がついた。そういえば私はJCBのデビットカードとアメックスのクレカしかもっていない。<br>
                完全に忘れていた。この国でJCBとかアメックスなんていう意味わからんカードが使えるわけがない。あまりの情弱ムーブだ。<br>
                とはいえ路銀はすべて現金で何とかするつもりだったから、手持ちの金を全部ドルに換えてきた。<br>
                帰れなくなることはないだろうが、残りHPが目に見えるというのはなかなか不安になるものだ。<br>
                カザフスタンまで抜ければ一部銀行でJCBが使える（※全く使えない）という記事を安心材料に旅を続けることにした。<br>
                <a href="https://www.global.jcb/ja/press/2017/201702070001_overseas.html">カザフスタンの一部でJCBが使える（使えない）</a>
            </p>    

            <div class="grid grid-cols-2 mt-8">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5324(1).jpg') }}" alt="ホジケント着">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5321.jpg') }}" alt="じゃーにーじゃーにー">
            </div>
            <p>
                金の心配をしているうちに終点ホジケントに到着した。<br>
                たくさんのハイキング客と軍楽隊を従えた迷彩服の一団が下車していく<br>
                若者連中に「じゃーにーじゃーにー！かもんかもん！」と誘われた。タシケントに折り返すと伝えるとドンびいた表情で去っていった。<br>
            </p>
        </section>

        <section>
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5325.jpg') }}" alt="ER9E">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5332.jpg') }}" alt="待合室">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5333.jpg') }}" alt="山が見える">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5345.jpg') }}" alt="ホームは多い">
            </div>
            <p>
                人気がなくなったので折り返しまで電車観察タイムだ
            </p>
        </section>

        <section>
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5368.jpg') }}" alt="ほぼ無人">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5386.jpg') }}" alt="増えてきた">
            </div>
            <p>
                折り返しでタシケントに戻る<br>
                駅ごとにどんどん客が増えていく。<br>
                大荷物のおばちゃんやら遊びに行く若者の集団やら見ていて楽しい。<br>
                やたらとろとろ走るので３時間近くかかる。
            </p>    

            
            <div class="grid grid-cols-3 mt-8">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5395.jpg') }}" alt="タシケント中央駅着">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5407.jpg') }}" alt="大荷物のおばちゃん">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5409.jpg') }}" alt="ウズベキスタン型">
            </div>
            <p>
                きっぷ購入のためにタシケント中央駅で降りた。<br>
                中華製のウズベキスタン型機関車が留置されていた。国の名前を冠する機関車が外国製なのは釈然としない。<br>
                しかしどうして釣り目にしてしまうのだろうか。実に残念だ。
            </p>  

            <h3>きっぷを買う</h3>
            <p>
                大きな大きなキジルクム砂漠を有するウズベキスタン。ﾃﾞﾝｼｬｵﾀｸなら砂漠を行く列車を取りたいと思うのは当然だろう。<br>
                しかし残念ながら砂漠のど真ん中にちょうどいい駅はない。そこで砂漠のはずれの街ミスキンで下車して撮り鉄することにした。<br>
                前述のとおり使えるカードがないので切符の購入には窓口バーブシュカと格闘する必要がある。<br>
                プランはこうだ。今晩の列車でサマルカンドに向かい、ホステル泊。翌日昼間はサマルカンドを観光する。観光した日の晩に夜行列車でサマルカンドを発ち、翌朝ミスキン着。
                砂漠を行く列車を撮影したのち、夕方の列車でブハラに戻る。<br>
                サマルカンド行きの切符はビジネスクラスしか残席がないらしく仕方なしにそれを購入した。<br>
                問題は次の工程だ。バーブシュカはどうにも朝ミスキンに到着しその日の夕方の列車で出発するという旅程が理解できないらしい。どうしてもミスキンで１泊しろという。<br>
                私もバーブシュカもまともに英語ができない。身振り手振りで説明するもどうしても理解してくれず途方に暮れているとヒジャフの女学生が横から声をかけてくれた。<br>
                旅程を説明すると「ミスキン！？あんなとこ何しに行くの？」と驚いていた。どうにか女学生がバーブシュカに説明してくれたおかげで切符を入手できた。<br>
                バーブシュカも女学生も最後まで不思議そうな顔をしていた。
            </p>
        </section>
    </main>

    @include('components.pager-btn')

@endsection