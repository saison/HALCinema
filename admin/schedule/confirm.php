<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
	<h2><?PHP echo "映画スケジュール" ?> - 確認</h2>
		<!-- movie list table -->
		<form action="" method="post"></form>
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
				<tr>
					<th>映画名</th>
					<td></td>
				</tr>
				<tr>
					<th>上映日</th>
					<td></td>
				</tr>
				<tr>
					<th>上映開始時間</th>
					<td></td>
				</tr>
				<tr>
					<th>上映終了時間</th>
					<td></td>
				</tr>
				<tr>
					<th>スクリーン</th>
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



