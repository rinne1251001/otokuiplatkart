@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_行くな(行け)平汝鉄路で乗り鉄【旅行記】_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => '中国は寧夏省北部に平汝線という路線がある。火星のような荒野を走り、大迫力の鉱山に乗り付ける、さながら火星鉄道だ。乗り鉄には非常におすすめ<br>toritetusurunara,metarugianosinnsakuda<br>コミュニテーワーカーや公安とのハートフルな出会いも楽しめる素敵な路線だ。',
    ])

    @include('components.pager-btn')


    <main class="article">
        <section>
            <div>
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5282.jpg') }}" alt="泊まった宿">
            </div>
            <h3>クソ雑まとめ</h3>
            <div>
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5282.jpg') }}" alt="泊まった宿">
            </div>

            <p>
                平汝線は包蘭線平羅駅から分岐し、汝箕溝駅に至る約80kmの路線だ。<br>
                旅客列車は１日１往復で、銀川まで直通する。銀川→汝箕溝のきっぷは12306で購入できる。銀川行のきっぷは車内で車掌から購入する。<br>
                列車の時刻も12306で確認できるが、汝箕溝→銀川は時刻表ページに列車番号を入力しないと確認できない。<br> 

                参考までに2026/04/04時点では以下の時刻と列車番号でである。<br>
                7524 銀川(07:55)→汝箕溝(11:27)<br>
                7526 汝箕溝(13:40)→銀川(17:09)<br>
                <br>
                私が訪れた際は大武口発着の有蓋貨物と白芨溝発着の石炭貨物が確認できた。どちらも運が良ければSS3が運用につく<br>
                石炭貨物は7524の白芨溝到着を待って出発するものと、7526と棗窩で行違うものが確認できた。あくまで筆者が見た範囲であり、これらが定期列車かどうかはわからない<br>
                もし撮り鉄や乗り鉄に行くのなら、あなたはこの記事を読んでいない。激山激VSS3に期待する。<br>
            </p>
        </section>

        <section>
            
            <h3>オヌヌメ平汝鉄路で乗り鉄</h3>
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5308.jpg') }}" alt="駅員？おっちゃん">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5310.jpg') }}" alt="ウズベクvl">
            </div>
            <p>
                旧ソ連もいくらか回って、次は中国にと決めたのと、平汝鉄路のSS7Cが退役すると知ったのはほぼ同時期のことだった。<br>
                春運の間は運用する ら し い とのことで、国際葬式鉄を敢行することにした。
            </p>

            <div>
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5313.jpg') }}" alt="ER9E">
            </div>
            <p>
                銀川のやたらデカいホームに降りると、SS7Eが４両の硬座車を従えていた。残念なことにSS7Cには間に合わなかったらしい<br>
                呼魯斯太で下車し、平汝鉄路随一の撮影地で折り返しの列車を撮影する計画だったが、乗り鉄デーに予定変更した。<br>
            </p>

            <div>
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5320.jpg') }}" alt="ER9E車内">
            </div>
            <p>
                きっぷは呼魯斯太までなので、ダメもとで車掌に切符を終点まで買い足せないか聞いてみる<br>
                すると鉄道警察がやってきて「この列車には補票の設備がないので延長できない。なぜ呼魯斯太にいく？」と翻訳アプリ越しに聞いてくる<br>
                観光であること、景色がきれいだと聞いたと答えると苦笑いしながら戻っていった。<br>
                包蘭線内はそこそこスピードに乗っていたが、平汝鉄路に分岐してからは芸備線並みの必殺徐行である<br>
            </p>
            <p>
                大武口に到着するとまた列車警察がやってきて「駅に補票で補票を作れる。列車内で待ってろ」と言われた。<br>
                別に何か作業が発生するでもなく発車。機関区にSS7Cの死体が止まっている。かなしい<br>
                列車はここから一気に山岳地帯に入っていく。草木が極めて少ない。荒野といった感じだ。<br>
            </p>      

    
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5324(1).jpg') }}" alt="ホジケント着">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5321.jpg') }}" alt="じゃーにーじゃーにー">
            </div>
            <p>
                火星に鉄道があったらきっとこんな感じだろう。火星鉄道だ。
            </p>
            <p>
                大磴溝あたりから鉱山らしい施設や"軍事禁区禁止进入"といった物騒なものが目に入る。
            </p>

            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5325.jpg') }}" alt="ER9E">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5332.jpg') }}" alt="待合室">
            </div>
            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5333.jpg') }}" alt="山が見える">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5345.jpg') }}" alt="ホームは多い">
            </div>
            <p>
                呼魯斯太に到着すると列警に「補票は車掌から購入できる。ここから先のエリアは撮影が禁止されている」と告げられる<br>
                つまりこの路線の見どころはここから先だということだ。
            </p>           

            <div class="grid grid-cols-2">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5368.jpg') }}" alt="ほぼ無人">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5386.jpg') }}" alt="増えてきた">
            </div>
            <p>
                柳樹溝のΩカーブ付近からさらにきつい勾配になったようで、ぐいぐい山を登っていく。<br>
                いくつかトンネルを抜けると山の色が違うことに気づく。荒野ばかりだった視界は黒、黒、黒。列車は大炭鉱地帯に入ったのだ。<br>
                気がつくと、列車はかなり高度を上げている。これまで見上げるばかりだった斜面が、いつのまにか見下ろす位置に変わっている。<br>
                見える斜面はすべて炭鉱ようで、段上に切り取られて真っ黒だ。山の形を変えようかという勢いだ。谷にへばりつくような街が見える。きっと日本にも同じような光景があったのだろう。<br>
                そんな風景が見えてほどなくして白芨溝に到着する。側線には石炭を満載したSS3が火を入れて停車している。この列車を待って山を下るのだろう。<br>
                やってしまった！途中で降りていれば石炭貨物を撮れたはずだ。
            </p>    

            <div class="grid grid-cols-3">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5395.jpg') }}" alt="タシケント中央駅着">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5407.jpg') }}" alt="大荷物のおばちゃん">
                <img src="{{ asset('images/uzbkkzqh2023/KIIP5409.jpg') }}" alt="ウズベキスタン型">
            </div>
            <p>
                列車は定刻で汝箕溝に到着した。休憩がてら機関車の解結を見に行く。<br>
                中華製のウズベキスタン型機関車が留置されていた。国の名前を冠する機関車が外国製なのは釈然としない。<br>
                しかしどうして釣り目にしてしまうのだろうか。実に残念だ。
            </p>

        </section>
    </main>

    @include('components.pager-btn')
    
@endsection