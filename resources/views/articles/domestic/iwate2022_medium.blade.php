@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_中判カメラで撮る岩手開発鉄道【Mamiya645DF+】_отаку_и_плацкарт!!')
@section('content')


    @include('components.article-hero', [
        'desc' => '中判デジタルで撮る岩手開発鉄道。すでに手放したが、作例の少ない機材なので掲載する。
        機材:Mamiya645DF+,Mamiya DM22(Leaf aptusii-5)
        訪問2023/10/20',
    ])


    //@include('components.pager-btn')


    <main class="article">

        <section>

            <h3>中判デジタルで撮る岩手開発鉄道【Maimiya645DF+】</h3>

            <figre> 
            <div class="mt-8">
   
                <img src="{{ asset('images/iwate2022/mdm_003659 1.jpg') }}" alt="盛岡の701">
            </div>
            <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F3.2 1/200 ISO50</figcaption>
            </figre>
            
            //段落毎にpタグで囲む
            <p>
                紅葉と岩手開発のDL撮影のため、夜行バスで夜も明けぬ水沢に降り立った。<br>
                大学の定期試験直前ではあったが、講義をサボって訪れたように思う。
            </p>
                <figre>
                   <div class="grid grid-cols-2">
                <img src="{{ asset('images/iwate2022/mdm_003661.jpg') }}" alt="日が昇ってきた">
                <img src="{{ asset('images/iwate2022/mdm_003672.jpg') }}" alt="キハ100">
            </div>
            <figcaption class="break-all py-2">左:Mamiya 645AF 45mm F2.8  F4 1/1000 ISO50<br>
            右:Schneider Kreuznach  80mm f/2.8 LS　F2.8 1/80 ISO50</figcaption>
            </figre>
            <p>
            今となっては高性能な機材ではないが、ハイライトやボケなどリッチな映りだと思う。<br>
            一ノ関、気仙沼を経由して盛に向かう。関東からだと三陸はアクセスが悪い。
            </p>
        </section>

        <section>

            <figre>
            <div class="mt-8">

                <img src="{{ asset('images/iwate2022/mdm_003705 1.jpg') }}" alt="すぐに来た">
            </div>
            <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F4 1/640 ISO50</figcaption>
            </figre>
            <p>    
            盛を通過する積載車。岩手開発は13、15、18往復ダイヤが設定されており一番少ない日でも毎時１本は撮れる。            〇〇
            </p>


            <figre>
            <div class="mt-8">
                
                <img src="{{ asset('images/iwate2022/mdm_003707.jpg') }}" alt="満載">
            </div>
            
            <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F2.8 1/800 ISO50</figcaption>  
            </figre>  
            <p>
            満載である。            〇〇
            </p>


            <figre>
            <div class="grid grid-cols-2">
            <img src="{{ asset('images/iwate2022/mdm_003709.jpg') }}" alt="三陸鉄道">
            <img src="{{ asset('images/iwate2022/mdm_003611.jpg') }}" alt="さびてる">
        </div>
         <figcaption class="break-all py-2">左:Mamiya 645AF 45mm F2.8  F2.8 1/1250 ISO50<br>
           
         右:Mamiya 645AF 45mm F2.8  F2.8 1/1250 ISO50</figcaption>
         </figre>
         <p> 
            ３社３路線が交わるが、乗車できる鉄道車両は三陸鉄道だけだ。<br>
        </p>

        <figre>
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003713.jpg') }}" alt="保線トロ">
        </div>
        <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F2.8 1/160 ISO50
            </figcaption>
            </figre>

            <figre>
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003714.jpg') }}" alt="旅客ホーム">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F2.8 1/250 ISO50
            </figcaption>
                </figre>
            <p>
            旅客営業時代のホーム。短小気動車と丸顔気動車が走っていたらしい。
            </p>
        </section>

        <section>
            <figre>
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003618.jpg') }}" alt="機関区">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 120mm F4　MF MACRO F4 1/1000 ISO50
            </figcaption>
            </figre>
            <p>
            機関区がある。2023年に新型が導入され、DD56が廃車されている
            </p>

                <figre>
                <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003725 2.jpg') }}" alt="ローアンインカ">
        </div>
         <figcaption class="break-all py-2">Schneider Kreuznach  80mm f/2.8 LS　F3.6 1/1000 ISO50
            </figcaption>
            </figre>
            <p>
            定番の橋梁でインカーブを抑えた。秒間１コマしか撮れないのでこういうシチュエーションは苦手だ。<br>
            若干ピン甘だったのでゴリゴリ修正した。ちなみにデジタルバックの液晶だとピント確認もままならない。映ったかどうか見れる程度だ。  
            </p>

        <figre>    
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003732 1.jpg') }}" alt="整備士添乗">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 120mm F4　MF MACRO　F4.5 1/500 ISO50
            </figcaption>
            </figre>
            <p>
              次の便は整備士が添乗していた。かっこいい。
            </p>
            <figre>
            <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003743.jpg') }}" alt="もり">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F2.8 1/200 ISO100
            </figcaption>
            </figre>
            <p>
              線路沿いの小道から撮る。凸型機でこの構図だと微妙か？<br>
              測距点が死ぬほど大きいので手前の木にAFが吸われる。こういう場所ではMF必須だ。
            </p>
        <figre>    
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003746.jpg') }}" alt="かわ">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8  F5 1/200 ISO100
            </figcaption>
            </figre>
            <p>
                川沿いを行くDLを撮りたい<br>
                なんだかフィルム的な色だと思う。
            </p>
    <figre>
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003755 3.jpg') }}" alt="飛び出し注意">
        </div>
         <figcaption class="break-all py-2">Schneider Kreuznach  80mm f/2.8 LS F2.8 1/400 ISO50
            </figcaption>
            </figre>
            <p>
                トンネルから飛び出すDL<br>
                川の岩に乗って撮影。携帯を水没させた。防水万歳。撮り鉄なら機材は防水にしよう。
            </p>

        <figre>    
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003762 1.jpg') }}" alt="飛び出し注意">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 45mm F2.8 F6.3 1/320 ISO50
            </figcaption>
            </figre>
            <p>
                川沿いを行くDD5653<br>
                デジタルバックのISOは最低感度の２倍までというセオリーの通り、この機種もISO100以降はノイズが目に見えて増える。<br>
                動きものを撮る時は微ブレとの勝負だ。このカットはわかりやすく失敗。
            </p>

            <figre>
        <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003783 4.jpg') }}" alt="きれい光線">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 120mm F4　MF MACRO F4 1/320 ISO50
            </figcaption>
            </figre>
            <p>
                黄昏時の光線を浴びて走る<br>
                こういう光線の時はフィルム的な色が出ると思う。レンズの解像感とつややかな色が美しい。<br>
                このカメラで撮影した中で一番気に入っているカットだ。
            </p>   

            <figre>
            <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003787.jpg') }}" alt="暗いとつらい">
        </div>
         <figcaption class="break-all py-2">Mamiya 645AF 110-210mm F4.5 F4.5 1/200 ISO100
            </figcaption>
            </figre>
            <p>
                日が傾く時間のしかも森の中となると苦しい戦いだ。<br>
                ISO100で撮影して、編集で無理やり持ち上げた。                
            </p>
            
            <figre>
            <div class="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003797 3.jpg') }}" alt="赤崎行最終">
        </div>
         <figcaption class="break-all py-2">Schneider Kreuznach  80mm f/2.8 LS F2.8 1/320 ISO100
            </figcaption>
            </figre>
            <p>
            　この日は１３往復の日。赤崎行の終便を撮る。<br>
              開けている分森の中よりはマシだが、やはり暗い。日があるうちに来るべきだろう。<br>                
            </p>

                <figre>
            <div nclass="mt-8">
            <img src="{{ asset('images/iwate2022/mdm_003803 1.jpg') }}" alt="解結">
        </div>
         <figcaption class="break-all py-2">Schneider Kreuznach  80mm f/2.8 LS F2.8 1/2 ISO50
            </figcaption>
            </figre>
            <p>
            　赤崎から盛に戻った終便。解結して機関区に戻る<br>
              やたらデカいカメラを貧弱三脚でバルブした。<br>                
            </p>
        </section>         
    </main>

    //前へ次へのボタン
    @include('components.pager-btn')
    
@endsection