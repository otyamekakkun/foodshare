
@extends('layouts.app2')
@section('content')
<body>
        <header>
            @include('rest.shopper.header') 
            </header>

{{-- 全体を決めるもの --}}
<div id="app">
    <main>
        <div class="l-productdetail__shopper">
            <div class="l-productdetail__area">

    {{-- <div class="l-productdetail__shopper"> --}}

<shopperproductdetail-component :id="'{{$products->id}}'" :img="'{{$products->img_path}}'" :name="'{{$products->product_name}}'"
    :price="'{{$products->price}}'" :best_by_date="'{{$products->best_by_date}}'" :prefecture="'{{$products->prefecture}}'"></shopperproductdetail-component>



<div class="c-productdetail__shoppermenu">
@if($products->bought<=0)
    <form action="{{ route('bought.update',$products->id)}}" enctype="multipart/form-data" method="post">
        <button class="c-productdetail__shoppermenu__button">
            <a class="btn_tw" href="https://twitter.com/intent/tweet?text=haiki share 商品名{{$products->product_name}}について自由に書いて広めよう!!" target="_blank_" rel="nofollow"><i class="fab fa-twitter fa-fw"></i> この商品をシェアする</a>
           </button> 
    
        @csrf
        <button class="c-productdetail__shoppermenu__button">商品を買う！</button>
    </form>
@endif
@if($products->bought>=1)
<button class="c-productdetail__shoppermenu__button">
    <a class="btn_tw" href="https://twitter.com/intent/tweet?text=haiki share 商品名{{$products->product_name}}について自由に書いて広めよう!!" target="_blank_" rel="nofollow"><i class="fab fa-twitter fa-fw"></i> この商品をシェアする</a>
   </button> 

    <form action="{{route('bought.cancel',$products->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <button class="c-productdetail__shoppermenu__button">購入をやめる</button>

    </form>

@endif


</div>




</div>
</main>





</div>

{{-- 括るdiv --}}
    {{-- </div> --}}











{{-- 

form属性対応
    <form action="{{ route('shopper_productdetail_bought')}}" enctype="multipart/form-data" method="post">



bought.update









    <form action="{{ route('drills.delete',$products->id ) }}" method="post" class="d-inline">
        @csrf
        <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('Go Delete')  }}</button>
    </form>
     --}}




<footer-component></footer-component>
</div>
</body>
@endsection



{{-- 
    1.写真はvueで読み込む。
    2.基本的に商品を編集するみたいな容量で記述する。ただしそれよりすごい簡易的で購入フラグと今ログインしているユーザーフラグを
    更新すれば良い。
    3.購入後はマイページに遷移する。
    4既に商品が購入されていたら購入することはできない。ただし購入をキャンセルすることができる。
    
    
    <h1>商品の詳細情報です</h1>
<div class="l-productdetail">
    ここで全体図をつける
<div class="l-productdetail__area">
<div class="l-productdetail__area__photo">


</div>

<div class="l-productdetail__area__menu">
    ここでメニューバー見たいな感じをつけようかな
    <button>購入する</button>
    <button>購入をキャンセルする</button>
   <button>
    <a class="btn_tw" href="https://twitter.com/intent/tweet?text=ここを記述するとtwitter内ですでに文が打ち込まれる;" target="_blank_" rel="nofollow"><i class="fab fa-twitter fa-fw"></i> この商品をシェアする</a>

   </button> 

</div>
</div>
</div>  

    --}}