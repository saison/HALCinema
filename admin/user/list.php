<?PHP
	require_once("../header.php");
?>
	
	<!-- main start -->
		<h2>ユーザーリスト</h2>
		<!-- movie list table -->
		<table class="table table-striped table-bordered table-condensed listTable">
			<thead>
				<tr>
					<th>会員ID</th>
					<th>パスワード</th>
					<th>メールアドレス</th>
					<th>姓</th>
					<th>名</th>
					<th>生年月日</th>
					<th>都道府県</th>
					<th>市町村区以降</th>
					<th>HALシネマポイント</th>
					<th>HALメールマガジンflag</th>
					<th>電話番号</th>
				</tr>
			</thead>
			
			<tbody>
				<!-- ここの中身をループして出してね -->
				<?PHP for($i = 0; $i < 5; $i++): ?>
				<tr>	
					<td>あいでぃー</td>
					<td>password</td>
					<td>u-ma@kix.co.jp</td>
					<td>うーま</td>
					<td>きっくす</td>
					<td>1992/01/01</td>
					<td>埼玉県</td>
					<td>東久留米市</td>
					<td>100 Pt</td>
					<td>受信する</td>
					<td>0120-1234-5678</td>
				</tr>
				<?PHP endfor; ?>
				<?PHP for($i = 0; $i < 3; $i++): ?>
				<tr class="deleted">	
					<td>あいでぃー</td>
					<td>password</td>
					<td>u-ma@kix.co.jp</td>
					<td>うーま</td>
					<td>きっくす</td>
					<td>1992/01/01</td>
					<td>埼玉県</td>
					<td>東久留米市</td>
					<td>100 Pt</td>
					<td>受信する</td>
					<td>0120-1234-5678</td>
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

