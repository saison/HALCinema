<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
		<h2>映画リスト</h2>
		<!-- movie list table -->
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>id</th>
					<th>タイトル</th>
					<th>画像</th>
					<th>公開開始日</th>
					<th>公開終了日</th>
					<th>上映時間</th>
					<th class="description">映画説明文</th>
					<th>監督</th>
					<th>出演者</th>
					<th>アクション</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
				<?PHP for($i = 0; $i < 5; $i++): ?>
				<tr>	
					<td>id</td>
					<td><a href="details.php?id=1">タイトル</a></td>
					<td><img src="" alt=""></td>
					<td>2014/01/22</td>
					<td>2014/01/23</td>
					<td>150分</td>
					<td class="description">ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー</td>
					<td>鈴木うーま</td>
					<td>ウーマ・キックス</td>
					<td><a href="edit.php?id=1" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a></td>
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
