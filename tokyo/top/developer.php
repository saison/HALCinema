<?PHP
$pageTitle = "開発者設定";
require_once("../module/header.php");
?>


<div class="contentTitle" id="theatesTitle">
<h2>開発者設定<span class="h2En">DeveloperSetup</span></h2>
</div>
<div id="mainContent">
<p>開発者設定です。お使いの各PCの環境によって選択してください。</p>
<h3>DB接続軽減モード</h3>
<p>データベースの接続を早くするためのモードです。XAMPPなどの仮想環境では接続が重く、ページの読み込みが著しく遅くなる場合があります。遅い場合は軽減モードを設定してください。（XAMPPは軽減モード、MAMPは通常モードをおすすめします）</p>
<p>この設定を有効にするためにDB接続（コネクション）の設定は<br />
	<strong>$con=getConnection();<br />
	$SQL格納変数="SQL文";<br />
	$SQLリダイレクト格納変数 = mysqli_query($con,$SQL格納変数);</strong><br />にしてください。</p>
<p class="devDB">
<?php 
if(!empty($_COOKIE["deve_db"])){
if($_COOKIE["deve_db"]=="xampp"){
echo "現在は軽減モードです。<a href='deveDb.php'>切り替える</a>";
}else{
echo "現在は通常モードです。<a href='deveDb.php'>切り替える</a>";
}
}else{
echo "設定されていません。<a href='deveDb.php'>設定する</a>";			
}?></p>
<h3>お使いのPCのバージョン</h3>
<p><strong>PHPのバージョンは5.4、MySQLのバージョンは5.5</strong>で設計･開発されています（PHP5.5ではバグが出る可能性があります）</p>
MySQLのバージョン･･･<?php echo mysql_get_server_info(); ?><br />
<div>
<?php phpinfo(); ?>
</div>
<p><a href="index.php">TOPページに戻る</a></p>
</div>

<?PHP
require_once("../module/footer.php");
?>
