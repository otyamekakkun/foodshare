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

(AWSのSESでメールサーバー導入した時の証拠画像その１)
https://user-images.githubusercontent.com/120696740/210913232-40bcea36-830e-4b40-9243-aa9dd48d79b8.png
(東京リージョンに移して送信制限を解除した時の画像1日50000件まで)

https://user-images.githubusercontent.com/120696740/210937531-17bba290-3dcc-4785-9f6f-681d9c671959.png



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

アプリ概要の画像についてです（上から順にストーリーになっております）

１トップページ

https://user-images.githubusercontent.com/120696740/210931731-923b676a-2cd4-412a-a7a3-0eb9047d4a0a.png

2　管理者側mypage (初期状態)

https://user-images.githubusercontent.com/120696740/210931956-cb2a5c8a-61ce-4c89-a8f6-4e46aa29c7c0.png

3 管理側mypage(ハンバーガーメニューをクリックすると)

https://user-images.githubusercontent.com/120696740/210931980-82b86c00-6927-4405-b87f-3e976a594305.png

4 管理者側商品を出品する際のデモ画面と商品を出品するとリンクに乗る（スクリーンショットの画像が載せられない不具合が発生)

https://user-images.githubusercontent.com/120696740/210933154-1f5c4601-0d96-466a-95bb-b8ed4c4d0b82.png

https://user-images.githubusercontent.com/120696740/210933169-9a1df406-c1fa-4ac4-802e-f7dbaac18d56.png

https://user-images.githubusercontent.com/120696740/210933301-065f1155-ebaf-403b-9b8d-f7ba73d25f5f.png

5アップロードした商品を編集して再び更新する際の処理
https://user-images.githubusercontent.com/120696740/210933453-1d461e99-0c95-4eed-898e-d8aebd696b0d.png

https://user-images.githubusercontent.com/120696740/210933464-7df3134c-b8b4-49ba-a402-7a316eb793bf.png

削除

https://user-images.githubusercontent.com/120696740/210935235-92183b43-1430-491f-bb1c-a7dff825e082.png

6商品詳細画面

https://user-images.githubusercontent.com/120696740/210933621-02e6ef3a-7aea-43c4-86e7-0ab786234e01.png

https://user-images.githubusercontent.com/120696740/210933628-7fdd1c01-9e0b-4f18-86c2-acdab90641f7.png

7ページネーション対策(今回は１画面につき８件掲載されると次のリンクが発生する)
https://user-images.githubusercontent.com/120696740/210935452-458e2c6a-ee13-46e0-acfb-caf9211b5387.png

https://user-images.githubusercontent.com/120696740/210935467-af9a995f-5a2b-48b6-a44b-9ef90241313b.png

8商品を購入した時に購入知らせの通知が来る様子

https://user-images.githubusercontent.com/120696740/210936603-2ecf6726-7edc-4a96-b26b-516fed3abc63.png

https://user-images.githubusercontent.com/120696740/210936612-a0b6e475-db53-4b51-8fe8-66ce11b0ec34.png

https://user-images.githubusercontent.com/120696740/210936618-4eddf936-f758-4510-b93c-e2184be1faf0.png

https://user-images.githubusercontent.com/120696740/210936620-f69dadfd-abb7-446e-a0e2-276035934d9a.png

9商品を閲覧している時、絞り込み検索を行っている時の様子

https://user-images.githubusercontent.com/120696740/210936934-56480638-983e-4832-9d99-2ed367175790.png

https://user-images.githubusercontent.com/120696740/210936943-d7af2042-8ec6-4db0-a39a-4354cf6feae3.png

https://user-images.githubusercontent.com/120696740/210936950-7ce73b1f-3e38-4915-b627-78026085508f.png

https://user-images.githubusercontent.com/120696740/210936956-72987ec1-afd6-4933-a97c-83700f90a87d.png

https://user-images.githubusercontent.com/120696740/210936972-f0e401ce-9653-448e-94a5-9d771c5baeef.png

https://user-images.githubusercontent.com/120696740/210936976-5284b0c9-47bb-49e2-8285-dd8682a03a2e.png

https://user-images.githubusercontent.com/120696740/210936981-888849ce-9e2d-4775-9ea2-f09b2afeec92.png

https://user-images.githubusercontent.com/120696740/210937228-4b890d42-890f-4888-9528-efdc1dd2a5e6.png

https://user-images.githubusercontent.com/120696740/210937235-c320596a-0c8a-4e09-b967-53967a4749be.png

https://user-images.githubusercontent.com/120696740/210937235-c320596a-0c8a-4e09-b967-53967a4749be.png

https://user-images.githubusercontent.com/120696740/210937246-0fb0ff42-0077-4f2f-b821-20ed20546f15.png

10 パスワードリマインダー

https://user-images.githubusercontent.com/120696740/210970276-afdb4872-13ee-4e18-ad03-29427ee78b87.png

https://user-images.githubusercontent.com/120696740/210970282-4b84baac-6b2d-415f-a6fb-753926a6e7fe.png

https://user-images.githubusercontent.com/120696740/210970288-bd8eaba7-8bb6-4fcc-b5de-6562d7cf3155.png

https://user-images.githubusercontent.com/120696740/210970324-7fe008db-300e-4a56-904d-f7cd4ea0defb.png

https://user-images.githubusercontent.com/120696740/210970341-c30212fb-ad49-467d-965a-f08a989488ee.png

https://user-images.githubusercontent.com/120696740/210970355-4ae447f9-7be7-4953-b0aa-a06b61e0e313.png

https://user-images.githubusercontent.com/120696740/210970401-a4bb4c11-8525-4dd3-bb4a-78cf77344b85.png
