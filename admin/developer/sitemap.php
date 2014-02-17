<?PHP
	$pageTitle="【開発者】サイトマップ(FE/BE)";
	require_once("../header.php");
?>
	<h2>【開発者】サイトマップ(FE/BE)</h2>
	
	<h3>フロントエンド、バックエンドのサイトマップです。コーディング進捗管理表に書かれていない部分も出来る限り網羅しています。ただし、各ページに関して詳しくはコーディング進捗管理表をご覧ください。</h3>
  <h4>仕様書･進捗管理表 <small>Googleのログインが必要です</small></h4>
  <dl class="dl-horizontal">
    <dt><a href='https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdE0yb25GZzUtSGhjQTNzWEYyWU1xaFE&usp=drive_web#gid=0'>進捗管理表</a></dt><dd>フロントエンドとバックエンドの進捗管理･画面一覧です https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdE0yb25GZzUtSGhjQTNzWEYyWU1xaFE&usp=drive_web#gid=0</dd>
    <dt><a href='https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdFota3I3MmFfUFdpdmU4Y3NFbTR2VUE&usp=drive_web#gid=3'>テーブル仕様書</a></dt><dd>HALシネマのテーブル仕様書です https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdFota3I3MmFfUFdpdmU4Y3NFbTR2VUE&usp=drive_web#gid=3</dd>
</dl>
<h4>開発者設定 <small>XAMPPの設定など</small></h4>
  <dl class="dl-horizontal">
    <dt><a href='../../tokyo/top/developer.php'>開発者設定</a></dt><dd>開発者の環境設定を変更するページです。 tokyo/top/developer.php</dd>
  </dl>
<div class="row">
  <div class="col-xs-6">
    <h4>FE <small>ユーザエンド側</small></h4>
    <dl class="dl-horizontal">
    <dt><a href='../../tokyo/module/header.php'>メインheader</a></dt><dd>HALシネマのメインheader。 header.php</dd>
    <dt><a href='../../tokyo/module/footer.php'>メインfooter</a></dt><dd>HALシネマのメインfooter。 footer.php</dd>
    <dt><a href='../../tokyo/module/reserveHeader.php'>予約ページheader</a></dt><dd>HALシネマの予約ページheader。 reserveHeader.php</dd>
    <dt><a href='../../tokyo/module/reserveFooter.php'>予約ページfooter</a></dt><dd>HALシネマの予約ページfooter。 reserveFooter.php</dd>
    <dt><a href='../../index.php'>TOPページ</a></dt><dd>HALシネマTOPページ。劇場を選択するページ index.php</dd>
<dt><a href='../../tokyo/top/index.php'>劇場TOPページ</a></dt><dd>各劇場のTOPページ tokyo/top/index.php</dd>
<dt><a href='../../tokyo/movie/movie.php'>上映作品一覧</a></dt><dd>現在上映している映画一覧 tokyo/movie/movie.php</dd>
<dt><a href='../../tokyo/movie/details.php'>各上映映画詳細ページ</a></dt><dd>各映画の詳細ページ。映画内容と映画の上映スケジュールなどを記載。 tokyo/movie/details.php</dd>
<dt><a href='../../tokyo/movie/ranking.php'>上映中映画ランキング</a></dt><dd>現在上映している映画のランキング。ランキングはアクセス数をもとに計算。 tokyo/movie/ranking.php</dd>
<dt><a href='../../tokyo/shop/shop.php'>劇場案内</a></dt><dd>劇場の案内。劇場名、住所、アクセス、各シアターの説明、座席数、座席配置図など。 tokyo/shop/shop.php</dd>
<dt><a href='../../tokyo/support/faq.php'>よくある質問</a></dt><dd>劇場によく問い合わせがある質問のまとめ tokyo/support/faq.php</dd>
<dt><a href='../../tokyo/support/help.php'>お問い合わせ</a></dt><dd>劇場へのお問い合わせ tokyo/support/help.php</dd>
<dt><a href='../../tokyo/company/about.php'>会社概要</a></dt><dd>HALシネマの会社概要 tokyo/company/about.php</dd>
<dt><a href='../../tokyo/user/new.php'>新規アカウント登録</a></dt><dd>アカウント新規登録（会員登録） tokyo/user/new.php</dd>
<dt><a href='../../tokyo/user/confirm.php'>新規アカウント登録確認</a></dt><dd>アカウント新規登録（会員登録）の確認 tokyo/user/confirm.php</dd>
<dt><a href='../../tokyo/user/finish.php'>新規アカウント登録完了</a></dt><dd>アカウント新規登録（会員登録）の確認完了画面 tokyo/user/finish.php</dd>
<dt><a href='../../tokyo/mypage/login.php'>ログイン</a></dt><dd>会員ログイン tokyo/mypage/login.php</dd>
<dt><a href='../../tokyo/mypage/mypage.php'>MyPage</a></dt><dd>MyPageTOP tokyo/mypage/mypage.php</dd>
<dt><a href='../../tokyo/mypage/reserveView.php'>MyPage予約一覧</a></dt><dd>予約している映画一覧 tokyo/mypage/reserveView.php</dd>
<dt><a href='../../tokyo/mypage/show.php'>MyPageアカウント情報</a></dt><dd>アカウントの情報一覧 tokyo/mypage/show.php</dd>
<dt><a href='../../tokyo/mypage/edit.php'>MyPageアカウント情報修正</a></dt><dd>アカウントの情報修正 tokyo/mypage/edit.php</dd>
<dt><a href='../../tokyo/reserve/seat.php'>座席選択･注意事項</a></dt><dd>座席と種別を選択する。また、注意事項にも同意してもらう。 tokyo/reserve/seat.php</dd>
<dt><a href='../../tokyo/reserve/pay.php'>決済方法選択</a></dt><dd>決済方法を選択する。決済方法はクレジットカードor携帯決済。クレジットの場合は番号入力。携帯決済の場合はキャリア(docomo,au,Softbank)を選択する。 tokyo/reserve/pay.php</dd>
<dt><a href='../../tokyo/reserve/confirm.php'>確認</a></dt><dd>映画、日時、座席、決済などを確認する。 tokyo/reserve/confirm.php</dd>
<dt><a href='../../tokyo/reserve/finish.php'>完了&購入番号発行</a></dt><dd>完了画面を表示。また、購入番号発行をする。 tokyo/reserve/finish.php</dd>
    </dl>
  </div>
  <div class="col-xs-6">
    <h4>BE <small>管理側</small></h4>
    <dl class="dl-horizontal">
    <dt><a href='../header.php'>管理側header</a></dt><dd>HALシネマの管理ページheader。 header.php</dd>
    <dt><a href='../footer.php'>管理側footer</a></dt><dd>HALシネマの管理ページfooter。 footer.php</dd>
<dt><a href='../top/index.php'>TOPページ</a></dt><dd>TOPページ top/index.php</dd>
<dt><a href='../login/index.php'>ログイン</a></dt><dd>管理者ログイン login/index.php</dd>
<dt><a href='../movie/list.php'>映画一覧</a></dt><dd>登録されている映画一覧 movie/list.php</dd>
<dt><a href='../movie/details.php'>映画詳細</a></dt><dd>映画の詳細ページ movie/details.php</dd>
<dt><a href='../movie/register.php'>映画登録</a></dt><dd>映画登録ページ movie/register.php</dd>
<dt><a href='../movie/edit.php'>映画情報編集</a></dt><dd>登録されている映画の編集･削除ページ movie/edit.php</dd>
<dt><a href='../movie/confirm.php'>映画登録･情報編集確認</a></dt><dd>映画登録･情報編集確認ページ movie/confirm.php</dd>
<dt><a href='../schedule/list.php'>上映スケジュール一覧</a></dt><dd>上映スケジュール一覧ページ schedule/list.php</dd>
<dt><a href='../schedule/details.php'>上映スケジュール詳細</a></dt><dd>上映スケジュール詳細ページ schedule/details.php</dd>
<dt><a href='../schedule/register.php'>上映スケジュール登録</a></dt><dd>上映スケジュール登録映画選択ページ schedule/register.php</dd>
<dt><a href='../schedule/registerDetail.php'>上映スケジュール登録</a></dt><dd>上映スケジュール登録詳細入力ページ schedule/registerDetail.php</dd>
<dt><a href='../schedule/registerConfirm.php'>上映スケジュール登録確認</a></dt><dd>上映スケジュール登録確認ページ schedule/registerConfirm.php</dd>
<dt><a href='../schedule/csvRegister.php'>上映スケジュールCSV登録</a></dt><dd>上映スケジュールCSV読み込み登録ページ schedule/csvRegister.php</dd>
<dt><a href='../schedule/csvConfirm.php'>上映スケジュールCSV登録確認</a></dt><dd>上映スケジュールCSV登録確認ページ schedule/csvConfirm.php</dd>
<dt><a href='../schedule/edit.php'>上映スケジュール編集</a></dt><dd>上映スケジュール編集･削除ページ schedule/edit.php</dd>
<dt><a href='../schedule/confirm.php'>上映スケジュール登録･編集確認</a></dt><dd>上映スケジュール登録･編集確認ページ schedule/confirm.php</dd>
<dt><a href='../user/list.php'>ユーザ一覧</a></dt><dd>登録されているユーザ一覧 user/list.php</dd>
<dt><a href='../pdf/index.php'>PDF出力</a></dt><dd>PD出力ページ pdf/index.php</dd>
    </dl>
  </div>
</div>
<?PHP
	require_once("../footer.php");
?>
