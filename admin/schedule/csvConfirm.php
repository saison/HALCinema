<?PHP
	$pageTitle="上映スケジュールCSV登録";
	require_once("../header.php");
?>
	
		<!-- main start -->	
		<h2><?PHP echo "映画タイトル" ?> - スケジュール確認（CSV）</h2>
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>映画名</th>
					<th>上映日</th>
					<th>上映開始時間</th>
					<th>上映終了時間</th>
					<th>スクリーン</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
				<?PHP for($i = 0; $i < 5; $i++): ?>
				<tr>	
					<td>タイトル</td>
					<td>2014/01/22</td>
					<td>15:00</td>
					<td>17:30</td>
					<td>Screen1</td>
				</tr>
				<?PHP endfor; ?>
				<!-- ここの中身をループして出してね -->
			</tbody>
		</table>
		<p><a href="list.php" name="send" class="flr btn btn-primary btn-lg" />登録する</a></p>

	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>




