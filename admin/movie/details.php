<?PHP
	require_once("../header.php");
?>
	
		<!-- main start -->
		<h2><?PHP echo "映画タイトル" ?> - 詳細<a href="edit.php?id=1" id="editButton" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a>
</h2>
		<!-- movie details table -->
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
				</tr>
			</thead>
			
			<tbody>
				<tr>	
					<td>id</td>
					<td>タイトル</td>
					<td><img src="" alt=""></td>
					<td>2014/01/22</td>
					<td>2014/01/23</td>
					<td>150分</td>
					<td class="description">ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー</td>
					<td>鈴木うーま</td>
					<td>ウーマ・キックス</td>
				</tr>
			</tbody>
		</table>
		
		<h2><?PHP echo "映画タイトル" ?> - スケジュール</h2>
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>上映ID</th>
					<th>映画名</th>
					<th>上映日</th>
					<th>上映開始時間</th>
					<th>上映終了時間</th>
					<th>スクリーン</th>
					<th>アクション</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
				<?PHP for($i = 0; $i < 5; $i++): ?>
				<tr>	
					<td>id</td>
					<td>タイトル</td>
					<td>2014/01/22</td>
					<td>15:00</td>
					<td>17:30</td>
					<td>Screen1</td>
					<td>
						<a href="../schedule/edit.php?id=1" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>編集 & 削除</a>
					</td>
				</tr>
				<?PHP endfor; ?>
				<!-- ここの中身をループして出してね -->
			</tbody>

		</table>
		
	
		
		

		<!-- /movie details table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>
