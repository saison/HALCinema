<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
	<h2><?PHP echo "映画スケジュール" ?> - 新規追加<a href="register.php" id="newButton" class="flr btn btn-success"><span class="glyphicon glyphicon-log-in"></span>CSVファイルで追加</a></h2>
		<!-- movie list table -->
		<form action="" method="post"></form>
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
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
			<input type="submit" class="btn btn-primary btn-lg" value="確認画面へ"></div>
		</form>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>



