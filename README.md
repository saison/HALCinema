#HALCinema
ここはHAL東京3年の年間制作が作られている場所です。

##進捗管理に関して　
FE･BEの進捗管理はGoogleDocsで行われています。   
<a href="https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdE0yb25GZzUtSGhjQTNzWEYyWU1xaFE&usp=sharing">https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdE0yb25GZzUtSGhjQTNzWEYyWU1xaFE&usp=sharing</a>　
  
  
##DBに関して
DBの使用方法などはGoogleDocsを確認して下さい。  
<a href="https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdFota3I3MmFfUFdpdmU4Y3NFbTR2VUE&usp=sharing">https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdFota3I3MmFfUFdpdmU4Y3NFbTR2VUE&usp=sharing</a>　

テストデータはDropbox内にあります。  
ファイル名の修正、自動読み込みなど今後改善します。  
ファイル名 halcinema_1503.sql  


##日程に関して
今後修正します。詳しくは進捗管理表を確認して下さい。  
* 9月 => プロトタイプ完成/提出(フロント完成/テスト)  
* 10月 => インターンシップ(作業はできたらやっといて)  
* 11月 => バックエンド制作  
* 12月 => バックエンド制作/フロント調整  
* 1月 => トータルでのテスト  
* 2月 => 完成  


##DB接続が重い問題について
TOPページのアクセスが著しく重い現象が一部環境により発生します。原因は仮想環境の問題なのですが、作業できる状態ではないので開発者モードを実装しました。/tokyo/top/developer.phpにアクセスすると変更することが出来ます（cookieで管理されています）。軽減モードにすることによって改善しますので重い場合は使用してください。


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
