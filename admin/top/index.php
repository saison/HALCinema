<?PHP
	$pageTitle="";
	require_once("../header.php");
?>
	<h2>HALCinema管理画面</h2>
	
	<h3>サイトマップ</h3>
	<ul>
		<li><a href="./index.php">TOPページ</a>　top/index.php(現在いる位置）</li>
		<li><a href="../login/index.php">ログイン</a>　login/index.php</li>
		<li><a href="../movie/list.php">映画一覧ページ</a>　movie/list.php</li>
		<li><a href="../movie/details.php">映画詳細ページ</a>　movie/details.php</li>
		<li><a href="../movie/register.php">映画登録ページ</a>　movie/register.php</li>
		<li><a href="../movie/edit.php">映画情報編集ページ</a>　movie/edit.php</li>
		<li><a href="../movie/confirm.php">映画情報編集確認ページ</a>　movie/confirm.php</li>
		<li><a href="../schedule/list.php">上映スケジュール一覧</a>　schedule/list.php</li>
		<li><a href="../schedule/details.php">上映スケジュール詳細</a>　schedule/details.php</li>
		<li><a href="../schedule/register.php">上映スケジュール登録</a>　schedule/register.php</li>
		<li><a href="../schedule/edit.php">上映スケジュール編集</a>　schedule/edit.php</li>
		<li><a href="../schedule/confirm.php">上映スケジュール編集確認</a>　schedule/confirm.php</li>
		<li><a href="../user/list.php">ユーザ一覧</a>　user/list.php</li>
		<li><a href="../user/pdf.php">PDF作成</a>　user/pdf.php</li>
	</ul>

<?PHP
	require_once("../footer.php");
?>
