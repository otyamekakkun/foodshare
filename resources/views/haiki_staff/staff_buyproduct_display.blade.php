{{-- 

//=====================================================
//1.何をするファイルか？
/======================================================
(ファイル名）staff_buyproduct_display.blade.php
商品詳細を見れる画面にする。そこから商品を購入する仕様がある。

//=====================================================
//2.どのような機能を含ませるか？
//=====================================================
1.mypageから遷移される
2.デフォルト状態でもmypageに戻る仕様とログアウト機能も含ませとく。     
3.購入すると言うボタンを押したら、確認アラートが出て、購入することができる。（購入しても画面遷移はしない
おそらく画面をリロードさせる処理は施した方が良さそう。）
4.購入されたら、商品に購入済みというlavelが出てくる。
5.

//=====================================================
//３.画面遷移先
//=====================================================
1.ログアウトボタン（ログアウトされてトップページに戻る。)
2.マイページに戻るボタン(警告で編集中の内容は保存されません。と言う表示を出してmypageに遷移させる。)
3.マイページの表示画面として、購入した商品一覧が５軒ずつ載せる。(その商品ごとに
詳細をみるボタン、購入をキャンセルするボタンがある。(詳細をみるボタンを押したら画面遷移する。)
購入をキャンセルするボタンが押したら、アラートかモーダルを表示させて商品をキャンセルする仕組みを作る。s)
4.商品を見るというボタンがあり（そこから商品一覧ページに飛ばすことができる。
5.購入するボタンを押したら利用者と管理者に各々メールが届くシステムを作る

//=====================================================
//4.導入したいアニメーション(主にhtml,cssのアニメーション機能)
//=====================================================

//====================================================
//5.導入したい(vueの機能)
//=====================================================

//=====================================================
//6.購入していた時の状況
//=====================================================
購入されている状態では、購入できないように何らかの処理を施す必要がある。
ラベルで購入している状態を表示を出すことができる。

//=====================================================
//7.購入していない時の状況
//=====================================================
購入していない状況だったら、購入できる状態に持っていく。
 --}}


{{-- 
    これもそんなに難しいものではないと思う。
    自分が出品した商品＋購入フラグが立っているものをよみこべばいい
    laravelでwhere文で呼び込めばいいのかな？


    bought の数字を取得して１なら購入されたということで表示する。
    vueコンポーネントを導入する

    --}}



@extends('layouts.app2')
@section('content')
<header>
    @include('rest.staff.header')
</header>

<body>
<h1 class="c-title">自分自身が商品を出品して購入されたものを表示する
</h1>
<main>
    <div class="l-staffmypage">
     <div class="l-staffmypage__bought">
        <h1>ご購入された商品一覧</h1>
        <a href="{{route('haiki_shopper.staff_buyproduct_display')}}"><button>購入された商品を全権表示</a></button>
</div>

    <div class="l-staffmypage__side">
    <p>メニュー</p>
    <a href="{{route('haiki_shopper.staff_profile_display')}}"><button>コンビニプロフィール編集画面</a></button>
    <a href="{{route('haiki_shopper.staff_exhibitproduct_display')}}"><button>商品を出品する</a></button>
    </div>
    </div>
    
    
    
    </main>
    
    




<div id="app">
    <bought-componennt></bought-componennt>
<footer-component></footer-component>
</div>
</body>
@endsection