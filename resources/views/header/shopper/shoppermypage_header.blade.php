<div class="l-header">

      <h1 class="l-header__title">haiki share </h1>

      <!-- ハンバーガーメニュー部分 -->
      <div class="nav">
    
        <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
        <input id="drawer_input" class="c-drawer__hidden" type="checkbox">
    
        <!-- ハンバーガーアイコン -->
        <label for="drawer_input" class="c-drawer--open"><span></span></label>
    
        <!-- メニュー -->
        <nav class="nav_content">
          <ul class="nav_list">
            <li class="nav_item"><a href="{{route('haiki_shopper.shopper_profile_display')}}">プロフィールを編集する</a></li>
            <li class="nav_item"><a href="{{route('haiki_shopper.shopper_productlist_display')}}">商品を閲覧する</a></li>

            <form action="{{ route('logout') }}" method="post">
              @csrf
              <input class="l-header__nav__button " type="submit" value="ログアウト">

              {{-- <button class="l-header__nav__button"> --}}
          </button>
        </form>
          </ul>
        </nav>
      </div>
      </div>
    </div>