# foodshare

アプリの概要

今日本では2018年度のゴミ総排出量は年間4272トンにも上ります。東京ドームに例えると約115分もの量を廃棄しているとなります。
食品ロスに関しては年間で約612トンにのぼりこれは国民一人当たりお茶碗約1杯分の食べ物が毎日排出されている。
そこで、今アプリではそういったゴミ問題を減らすという意味合いをかねて、コンビニで売れ残った食品や生活用品を安く販売することで
ゴミ問題と買い手の財布に優しくなるように作られたアプリです。
利用者が商品を購入することでメールが通知され、コンビニ側はその商品を準備して利用者はそのコンビニに行って商品を購入をするといったアプリです。

使用言語　HTML CSS(SASS) PHP JAVASCRIPT 

フレームワーク　Laravel(Ver 8.75 Vue.JS ver 2.6.12)

OS .macOS(ver 12 Montery)　amazonlinux

機能一覧
『管理者側、利用者側の共通した機能」

1 利用者側はメールアドレスとパスワードでユーザー登録ができます

2 管理者側(コンビニお店側)はメールアドレスと支店名と住所、パスワードでユーザー登録ができます

3 利用者側と管理者側はログイン画面とユーザー登録画面に分かれております（マルチログインの実装＋１つのアプリ内で役割が異なる)

4 利用者、管理者側ともにログアウトができる。

5　利用者管理者側ともにパスワードを忘れた際にパスワードリマインダーでパスワード忘れの際に変更してアプリ内に入ることができる

6 管理者、利用者ともにユーザー登録で登録した内容についてプロフィール編集にてユーザー情報を変更することができる

「管理者側の機能」

7 管理者側は商品を投稿することができる（投稿された商品は自動的に利用者側にも商品が投稿されるように設定しています)

8 管理者側は自身が投稿した商品について編集して更新しなおしたり、アップロードした商品を削除することができる。
(ただし利用者に購入された場合は、商品は存在しないということで商品が編集、削除ができなくなるように設定しております。）

9　管理者側は自身が出品した商品の一覧と自身が出品して購入された商品一覧を閲覧することができる
（それぞれの管理者によって出品状況、購入状況は異なるのでそれに合わせて画面が切り替わるようにしている)

10 管理者側のマイページで出品した商品一覧,購入した商品一覧が最新順に5件表示されるようにしている
（何も商品を出品していない、購入していない状態ですと表示されないようにしている)

11　商品詳細画面にて商品の情報についてtwitterでシェアすることができる
(商品名がオニギリでしたら,twitterでリンクを叩くと自動的に商品名オニギリをシェアしよう！と動的に情報が切り替わるようにしている)

「利用者側の機能」

12　利用者側のマイページにて今まで購入された商品がリストとして表示される（ただし何も購入していない場合は何も表示されない)

13　利用者側は商品一覧にて、管理者側（コンビニ側)で出品された商品を閲覧することができる
また、商品の数は膨大になると予想したのでJSの処理でお値段、賞味期限、出品されたコンビニの都道府県で絞り込み検索ができるようにしてある。
（組み合わせて絞り込み検索をすることも可能) 購入された商人に関しては自動的に一覧から外れる)

14 利用者側は商品詳細画面で商品を購入(商品が購入されていない場合)商品の購入をキャンセル（ご自身で商品を購入してある場合)することができる
また商品

15 利用者側が商品を購入した際に購入した利用者と出品したコンビニ側の方にメールが通知されるようにしている
　
16　利用者側は自分以外が購入した商品については商品詳細画面に行ってその商品閲覧することができない

17　利用者側は自分が購入した商品に関しては自身のマイページから商品詳細画面に行くことができて、その商品を購入するのをやめることができる
（購入をやめた場合、その商品は購入する前の状態に戻る)

18 商品が購入されると利用者側、管理者側ともにsold outといったラベルがつくようになる

非機能一覧
1 デザインのレイアウトが崩れないように今回はレスポンシブデザインで対応しています。

2　管理者側の商品リストに関しては可読性がよくなるようにページネーションんを導入しました

3　セッションの有効期限が切れた際に自動的にログアウトされます


DBのテーブル設計についてです
テーブル全体の画像

https://user-images.githubusercontent.com/120696740/210924631-a388c367-b042-4bd7-bd95-e9307abdf92d.png

adminsテーブルの画像(管理者側のテーブル)
https://user-images.githubusercontent.com/120696740/210926108-5f8c35cb-0a99-473c-82ae-4c9d23ae53e4.png

usersテーブルの画像(利用者側のテーブル)

https://user-images.githubusercontent.com/120696740/210926212-23da6f36-39b1-4a47-b619-c1cee6c62dea.png

productテーブルの画像(商品情報についてのテーブル)

https://user-images.githubusercontent.com/120696740/210926254-8dcc9342-d357-45bb-851a-557dc444cfa8.png

failed_jobs password_resets personal_access_tokens は元々defaultの状態をそのまま引用しているので省略

注力した機能工夫した点

 一番工夫した点はマルチログインを実装したところと商品が購入された際に出品した管理者側と購入されたお客様側にメールが受信できるように,
AWSのSESを使ってメールサーバーを導入したところです。
また、商品を購入した状況、出品した状況、購入された状況は各ユーザー全員が違いますので、それぞれのユーザーの状況に合わせた画面処理を行いました。
(例えば、商品が購入されていない場合は何も表示されない。購入された商品があったらその商品がリストに追加される等などです。)
つまり運用すること視野に入れているので

(AWSのSESでメールサーバー導入した時の証拠画像その１)
https://user-images.githubusercontent.com/120696740/210913232-40bcea36-830e-4b40-9243-aa9dd48d79b8.png
(東京リージョンに移して送信制限を解除した時の画像1日50000件まで)


セキュリティ面に関して

(ロードバランサーを導入してhttps化にした画像)
https://user-images.githubusercontent.com/120696740/210911987-8a2d6d3f-f626-4005-a6e0-bc1954ec79c6.png

テストアカウント
管理者１
名前 admintest1
Email gitkaku4837@gmail.com
パスワード aaaaaaaa

管理者２
名前　admintest2
Email  privatesuki4902@gmail.com
パスワード bbbbbbbb

お客様１
名前 shopper1
Email haikisampleshopper111@gmail.com
パスワード　cccccccc
お客様２


注意点１
メールについて
迷惑設定メールに登録されていたらメール受信ができないかもしれませんので、適時よろしくお願いします。
メール受信がされているかどうかをお確かめされる場合は御社のテストアドレスにて,ご確認をお願いします。


このコードにおける反省点
バックエンド重視で作ったので、UI,UXがあまり整っていないところが反省点です。例えば商品が購入されていない状態と商品が購入されている状態だとデザインが異なってしまう,
商品を編集する際に、value={$product->img-path}を導入した際にうまくpost送信ができずにそのまま入力必須としてしまったところがあります。
今後は開発者目線とユーザー目線の２つの目線を持ってしっかりと開発ができるように心がけていきたいです。

アプリ概要の画像についてです
１トップページ
https://user-images.githubusercontent.com/120696740/210931731-923b676a-2cd4-412a-a7a3-0eb9047d4a0a.png
2　管理者側mypage (初期状態)
https://user-images.githubusercontent.com/120696740/210931956-cb2a5c8a-61ce-4c89-a8f6-4e46aa29c7c0.png
3 管理側mypage(ハンバーガーメニューをクリックすると)
https://user-images.githubusercontent.com/120696740/210931980-82b86c00-6927-4405-b87f-3e976a594305.png




