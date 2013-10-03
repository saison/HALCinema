#HALCinema
ここはHAL東京3年の年間制作が作られている場所です。

##DBに関して
テストデータはDropbox内にあります   
ファイル名 halcinema_1503.sql  
DB名 halcinema  
ユーザ名 halcinema  
ホスト localhost  
パスワード halcinema   


##日程に関して
* 9月 => プロトタイプ完成/提出(フロント完成/テスト)  
* 10月 => インターンシップ(作業はできたらやっといて)  
* 11月 => バックエンド制作  
* 12月 => バックエンド制作/フロント調整  
* 1月 => トータルでのテスト  
* 2月 => 完成  


##同じファイル名が存在する問題について
西村氏回答待ち


##ページタイトルの指定
ページタイトルは以下のように指定してください 
>$pageTitle="［ページタイトル名］";  
>例）$pageTitle="座席予約"; →座席予約 ｜HALCinema


##header･footerファイルに関して
ディレクトリにより、利用ファイルが異なります。
* mypage、reserve、user･･･reserveHeader.php、reserveFooter.php 
* その他･･･header.php、footer.php


##スタイルに関して
以下のファイルは共通で使います(すべてmodule/css内)
>style.css(mypage･reserve･user以外)
>reserveStyle.css(mypage･reserve･user)
2つのファイルは読み込むheaderファイルで決まります。
今後、base.cssを作り、style.cssとreserveStyle.cssの共通部分をbase.cssに移行します。


##保存場所に関して  
以下のファイルは記述通りに保存すること 

css  
style.css･reserveStyle.cssは統一スタイル  
>HALCinema/module/css/style.css(reserveStyle.css)  
>HALCinema/module/css/[画面名].css  

js  
script.jsは統一スクリプト  
>HALCinema/module/js/script.js  
>HALCinema/module/js/[画面名].js  
