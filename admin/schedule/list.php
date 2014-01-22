<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
		<h2>スケジュールリスト</h2>
		<!-- movie list table -->
		<table id="listTable" class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>上映ID</th>
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
					<td>id</td>
					<td><a href="details.php?id=1">タイトル</a></td>
					<td>2014/01/22</td>
					<td>15:00</td>
					<td>17:30</td>
					<td>Screen1</td>
				</tr>
				<?PHP endfor; ?>
				<!-- ここの中身をループして出してね -->
			</tbody>

		</table>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>

