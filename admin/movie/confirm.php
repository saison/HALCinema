<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
	<h2><?PHP echo "映画タイトル" ?> - 編集</h2>
		<!-- movie list table -->
		<form action="" method="post"></form>
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
				<tr>
					<th>タイトル</th>
					<td></td>
				</tr>
				<tr>
					<th>画像</th>
					<td></td>
				</tr>
				<tr>
					<th>公開開始日</th>
					<td></td>
				</tr>
				<tr>
					<th>公開終了日</th>
					<td></td>
				</tr>
				<tr>
					<th>上映時間</th>
					<td></td>
				</tr>
				<tr>
					<th>映画説明文</th>
					<td></td>
				</tr>
				<tr>
					<th>監督</th>
					<td></td>
				</tr>
				<tr>
					<th>出演者</th>
					<td></td>
				</tr>
		</table>
		<div id="editSend">
			<input type="submit" class="btn btn-primary btn-lg" value="登録する"></div>
		</form>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>


