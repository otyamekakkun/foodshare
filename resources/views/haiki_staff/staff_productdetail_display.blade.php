{{-- 
    商品詳細画面
    --}}
@extends('layouts.app2')
@section('content')
@section('title', "商品詳細画面")
<body>
    <header>
        @include('header.staff.staff_header')
    </header>
    <div id="app">
        <h1 class="c-detail__title">商品詳細</h1>

        <div class="l-productdetail">
<productdetail-component :id="'{{$products->id}}'" :img="'{{$products->img_path}}'" :name="'{{$products->product_name}}'" :price="'{{$products->price}}'"
    :best_by_date="'{{$products->best_by_date}}'" :prefecture="'{{$products->prefecture}}'" :bought="'{{$products->bought}}'"></productdetail-component>
            </div>

 <footerdetail-component></footerdetail-component>
</div>

</body>
@endsection