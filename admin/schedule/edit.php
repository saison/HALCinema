<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
	<h2><?PHP echo "映画スケジュール" ?> - 編集</h2>
		<!-- movie list table -->
		<form action="" method="post"></form>
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
				<tr>
					<th>上映ID</th>
					<td><input type="text" name="id"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>映画名</th>
					<td><input type="text" name="title"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>上映日</th>
					<td><input type="text" name="day"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>上映開始時間</th>
					<td><input type="text" name="start"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>上映終了時間</th>
					<td><input type="text" name="end"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>スクリーン</th>
					<td><input type="text" name="screen"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
		</table>
		<div id="editSend">
			<a href="delete.php" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span>削除する</a>
			<input type="submit" class="btn btn-primary btn-lg" value="確認画面へ"></div>
		</form>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>


