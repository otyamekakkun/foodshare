        <div class="l-header">
      <!-- ヘッダーロゴ -->
      <h1 class="l-header__title">staff専用</h1>

      <!-- ハンバーガーメニュー部分 -->
      {{-- <div class="nav"> いらないかも--}}
    
        <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
        <input id="drawer_input" class="c-drawer__hidden" type="checkbox">
    
        <!-- ハンバーガーアイコン -->
        <label for="drawer_input" class="c-drawer--open"><span></span></label>
    
        <!-- メニュー -->
        <nav class="nav_content">
          <ul class="nav_list">
            <li class="nav_item"><a href="{{route('haiki_shopper.staff_profile_display')}}">コンビニ編集画面</a></li>
            <li class="nav_item"><a href="{{route('haiki_shopper.staff_exhibitproduct_display')}}">商品を出品する</a></li>
            <li class="nav_item"><a href="{{route('haiki_shopper.staff_buyproduct_display')}}">購入された商品の一覧を見る</a></li>
            <li class="nav_item"><a href="{{route('haiki_shopper.staff_exhibitproduct_list_display')}}">出品した商品の一覧を見る</a></li>

          </ul>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="l-header__nav__button" type="submit" value="ログアウト">
          </form>
        </nav>
    
      {{-- </div> --}}
    </div>