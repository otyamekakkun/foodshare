<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class HaikiController extends Controller
{
//===================================================================
 //shoepper_mypage1   お客様のマイページを表示するもの                   //
 //==================================================================
    public function shopper_mypage_display(){
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('haiki_shopper.shopper_mypage_display',['my_user'=>$user]);
    } //...........................................ログインした人専用の画面表示するもの
//===========================================================1終了

//===================================================================
//shopper_profile_display 2   お客様のプロフィールを編集する画面         //
//===================================================================
    public function shopper_profile_display(){
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('haiki_shopper.shopper_profile_display',['user'=>$user]);
    } //...........................................画面表示するもの


public function shopper_profile_edit(Request $request)
{
$request->validate([
    'name'=>['required','max:255'],
    'email'=>['required','string', 'email:strict,dns,spoof', 'max:255', 'unique:users'],
    'password'=>['required','min:6','max:255'],
    'password_confirmation'=>['required','same:password'],
]);
$id = Auth::id();
$user = User::find($id);
$user->name=$request->name;
$user->email=$request->email;
$user->password= Hash::make($request->password);//パスワードをハッシュ化させる必要があるのでそれを記述する
$user->save();
return redirect('haiki/shopper_mypage');//..............お客様の情報を更新するもの
}
//===========================================================================2終了

//===================================================================
//3 お客様商品一覧                                                    //
//===================================================================
    public function shopper_productlist_display(){
        $product = DB::table('products')->get();
        return view('haiki_shopper.shopper_productlist_display',['products'=>$product]);
    } //.............................................................画面表示するもの
//===========================================================================3終了

//==============================================================
//4お客用商品詳細ページ                                          //
//==============================================================
    public function shopper_productdetail_display($id){
        $product = products::find($id);         
        return view('haiki_shopper.shopper_productdetail_display',['products'=>$product]);
    }
     //商品詳細ページを写すための画面
    public function shopper_productdetail_bought ($id){
        $user = Auth::id();
        $product = products::find($id);//商品専用のid
        $product->user_id = $user;//現在ログインしているコンビニユーザー情報のidをこの中に入れる
        $product->user_id=$user;
        $product->bought =1;
        $product->save();
        return redirect('haiki/shopper_mypage');
    }
     //商品が購入された時に更新するための処理
    public function shopper_productdetail_cancel ($id){
        $user = Auth::id();
        $product = products::find($id);//商品専用のid
        $product->user_id = $user;//現在ログインしているコンビニユーザー情報のidをこの中に入れる
        $product->user_id=$user;
        $product->bought =0;
        $product->save();
        return redirect('haiki/shopper_mypage');
    } 
    //購入がキャンセルされた時に更新するための処理
//=================================================4ここまで

//=============================================================
//5staffのprofileのdisplay(コンビニ情報を登録し直す)               //
//=============================================================
    public function staff_profile_display(){
        $id = Auth::guard('admin')->id();
        $admin = DB::table('admins')->find($id);
        return view('haiki_staff.staff_profile_display',['admin'=>$admin]);
    } //...................画面表示するもの

    public function staff_profile_edit(Request $request)
{
$request->validate([
'name'=>['required','max:255'],
    'email'=>['required','max:255'],
    'password'=>['required','min:6','max:255'],
    'password_confirmation'=>['required','min:6','same:password'],
    'convinience_name'=>'required',
    'convinience_branch'=>'required',
    'adress'=>'required',
    'prefecture'=>'required'
]);
$id = Auth::guard('admin')->id();
$admin = Admin::find($id);
$admin->name = $request->name;
$admin->password= Hash::make($request->password);
$admin->convinience_name = $request->convinience_name;
$admin->convinience_branch = $request->convinience_branch;
$admin->prefecture=$request->prefecture;
$admin->adress=$request->adress;
$admin->save();
return redirect('admin')->with('flash_message', __('Registered.'));
}//staffのプロフィールをデータベースに更新し直す処理
//=============================================================5ここまで

//==============================================================
//6コンビニ 商品出品画面                                          //
//==============================================================
    public function staff_exhibitproduct_display(){
        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
        return view('haiki_staff.staff_exhibitproduct_display',['admins'=>$admin]);
    } 
    //商品出品する画面を表示するための処理
public function create_exhibitproduct(Request $request){
    $request->validate([
        'product_name'=>'required',
        'img_path' => 'required|file|image|mimes:png,jpeg',
        'price'=>'required',//全角で入力した瞬間enterを押された瞬間消える
        'best_by_date'=>'required'
    ]);
$image = $request->file("img_path");
$path = Storage::disk("public")->putFile('profile', $image); 
$imagePath = "/storage/" . $path;
$id = Auth::guard('admin')->id();
$product = new products;
$product->product_name = $request->product_name;
$product->admin_id = $id;//現在ログインしているコンビニユーザー情報のidをこの中に入れる
$product->img_path=$imagePath;
$product->img_path=$imagePath;
$product->price = $request->price;
$product->best_by_date = $request->best_by_date;
$product->prefecture=$request->prefecture;
$product->save();
return redirect('admin')->with('flash_message', __('Registered.'));
} //商品の情報をデータベースに登録し直す処理

//=========================================================6ここまで

//==============================================================
//7コンビニ 購入された商品一覧画面                                 //
//==============================================================

    public function staff_buyproduct_display(){
        $id = Auth::guard('admin')->id();
        $admin = DB::table('admins')->find($id);
        return view('haiki_staff.staff_buyproduct_display',['admins'=>$admin]);
    } //.............................................購入

//=====================================================
//コンビニ用の商品編集画面を表したもの
//=====================================================

public function staff_productedit_display($id){
    $product = products::find($id);
    return view('haiki_staff.staff_productedit_display',['products'=>$product]);
 } //...................................................

public function destroy($id){
    products::find($id)->delete();
    return redirect('admin');
} //..................................................削除するためのコード


public function update_exhibitproduct(Request $request,$id){
    $request->validate([
        'product_name'=>'required',
        'img_path' => 'required|file|image|mimes:png,jpeg',
        'price'=>'required',//全角で入力した瞬間enterを押された瞬間消える
        'best_by_date'=>'required'
    ]);
$img = $request->file('img_path');
$path = $img->store('img','public');//1
$image = $request->file("img_path");
$path = Storage::disk("public")->putFile('profile', $image); 
$imagePath = "/storage/" . $path;
$product = products::find($id);
$product->product_name = $request->product_name;
$product->img_path=$imagePath;
$product->price = $request->price;
$product->best_by_date = $request->best_by_date;
$product->save();
return redirect('admin')->with('flash_message', __('Registered.'));
}//............................................商品の編集した画面をアップロードするもの
//======================================================================商品編集画面ここまで

//=====================
//削除フラグ
//=====================
public function destory($id){
    products::find($id)->delete();
    return redirect('admin');
}
//======================================================削除フラグ

//=========================================
//コンビニ側商品の詳細画面に行けるようにしたもの
//=========================================
    public function staff_productdetail_display($id){
        $product = products::find($id);
        
    return view('haiki_staff.staff_productdetail_display',['products'=>$product]);
    } //.............................................................9画面を表示するもの


//json形式
//今ログインしているものを取得してくるjson形式
public function staffproductdetailjson($id){
    $product = products::find($id);
return response()->json($product);
}

//========================================================================    
//コンビニスタッフが商品を出品したものをリスト化するもの
//========================================================================    
    public function staff_exhibitproduct_list_display(){

        $id = Auth::guard('admin')->id();
        $admin = DB::table('admins')->find($id);
        return view('haiki_staff.staff_exhibitproduct_list_display',['admin'=>$admin]);//...................画面表示するもの


    } //...................................ここに問題がありそう。
//json形式で渡す
public function staff_exhibitproduct_json(){
    $id = Auth::guard('admin')->id();
    $product = products::where("admin_id",$id);
    return response()->json($product);

}
//==========================================================ここまで

//=======================================================================
//管理者ログイン用のマイページ                                              //
//=======================================================================

public function admin(){
//ログインしているコンビニ名と名前を出力する
    $id = Auth::guard('admin')->id();
    $admin = DB::table('admins')->find($id);
    return view('admin',['admin'=>$admin]);//...................画面表示するもの
}

//==========================================================================

//================================================
//json形式でファイルを保存するためのコントローラ        //
//================================================
//これがjson形式で値を渡す方法
public function index1(){
    // $drill = products::all();
$drill = DB::table('products')->get();
    return response()->json($drill);
    //index1の内容は基本的にファイルの中に入っているもの全てを取得する
}

public function index2(){
    $drill = products::all();
    return response()->json($drill);
}

//管理者としてログインした時に、管理者専用の情報を取得するjson形式のデータベース
public function productjson(){
    $id = Auth::guard('admin')->id();
    $product = products::where("admin_id",$id)->get();
return response()->json($product);
}


//shopper自分が購入した商品を写し出すjson形式生成
//ログインしているidを取得して、productsテーブルからuser_idと照合したカラムを取り出す。
public function userjson(){
    $id = Auth::id();
    $user = products::where('user_id',$id)->get();

return response()->json($user);
}
public function buyjson(){
    $id = Auth::guard('admin')->id();
    $product = products::where("admin_id",$id)->orderBy('updated_at','desc')->get();
return response()->json($product);
}
}
//=========================================================json形式で渡すのここまで。