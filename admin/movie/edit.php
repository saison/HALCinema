<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
	<h2><?PHP echo "映画タイトル" ?> - 編集</h2>
		<!-- movie list table -->
		<form action="" method="post"></form>
		<table id="editTable" class="table table-striped table-bordered table-condensed listTable">
				<tr>
					<th>id</th>
					<td><input type="text" name="id"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>タイトル</th>
					<td><input type="text" name="title"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>画像</th>
					<td><img src="" alt=""></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>公開開始日</th>
					<td><input type="text" name="start"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>公開終了日</th>
					<td><input type="text" name="end"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>上映時間</th>
					<td><input type="text" name="time"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>映画説明文</th>
					<td><textarea name="description" cols="40" rows="5"></textarea></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>監督</th>
					<td><input type="text" name="director"></td>
					<td class="info">映画ID ex)xxxxxxxx</td>
				</tr>
				<tr>
					<th>出演者</th>
					<td><input type="text" name="performer"></td>
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
