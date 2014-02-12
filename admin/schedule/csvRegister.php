<?PHP
  $pageTitle="上映スケジュールCSV登録";
	require_once("../header.php");
?>
	
		<!-- main start -->	
		<h2><?PHP echo "映画スケジュール" ?> - CSV登録</h2>
		<div>
			<form action="csvConfirm.php" method="post" enctype="multipart/form-data" >
				<h3 class="mb30">アップロードするファイルを選択してください</h3>
				<p class="mb30"><input type="file" name="upfile" /></p>
				<p><input type="submit" name="send" class="btn btn-primary btn-lg" value="確認画面へ" /></p>
			</form>
		</div>
		<!-- main end -->

<?PHP
	require_once("../footer.php");
?>


