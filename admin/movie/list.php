<?PHP
	$pageTitle="映画一覧";
	require_once("../header.php");
	//今日の日付取得
	$today = date("Y-m-d");
	
?>
	<!-- main start -->
		<h2>映画一覧<a href="register.php" id="newButton" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>新規登録</a></h2>
		<!-- movie list table -->
        <?PHP if(isset($_GET['edit'])):?>
        <p>編集完了しました。</p>
        <?PHP endif; ?>
        <?PHP if(isset($_GET['register'])):?>
        <p>登録完了しました。</p>
        <?PHP endif; ?>
        <?PHP if(isset($_GET['delete'])):?>
        <p>削除完了しました。</p>
        <?PHP endif; ?>
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
            <?PHP
				//映画情報取得 表示
				$con = getConnection();
				$movieSql="SELECT * FROM cinema_master";
				$movieSelectResult =  mysqli_query($con,$movieSql);
				while(($rowMovieSelectResult = mysqli_fetch_array($movieSelectResult))!=false):
			?>
			<tr>
				<td><?PHP echo $rowMovieSelectResult['cinema_id'];//映画id?>
                <br />
                <?PHP if($rowMovieSelectResult['start_day'] > $today):?>
				<span class='label label-primary'>公開前</span>
				<?PHP elseif($rowMovieSelectResult['start_day'] <= $today && $rowMovieSelectResult['end_day'] >= $today):?>
				<span class='label label-success'>公開中</span>
				<?PHP elseif($rowMovieSelectResult['end_day'] < $today):?>
				<span class='label label-default'>終了</span>
				<?PHP endif;?>
				</td>
				<td><a href='details.php?id=<?PHP echo $rowMovieSelectResult['cinema_id'];?>'><?PHP echo $rowMovieSelectResult['cinema_name'];?></a></td>
				<td><img src='../../tokyo/movie/images/<?PHP echo $rowMovieSelectResult['main_photo'];?>'alt=''></td>
				<td><?PHP echo str_replace("-","/",$rowMovieSelectResult['start_day']);?></td>
				<td><?PHP echo str_replace("-","/",$rowMovieSelectResult['end_day']);?></td>
				<td><?PHP echo $rowMovieSelectResult['running_time'];?></td>
				<td class='description'><?PHP echo $rowMovieSelectResult['cinema_description'];?></td>
				<td><?PHP echo $rowMovieSelectResult['movie_director'];?></td>
				<td><?PHP echo $rowMovieSelectResult['movie_perfomer'];?></td>
				<td><a href='edit.php?id=<?PHP echo $rowMovieSelectResult['cinema_id'] ; ?>' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span>編集 & 削除</a></td>
			</tr>
			<?PHP endwhile; mysqli_close($con);?>
			</tbody>
		</table>
		<!-- /movie list table -->
	<!-- main end -->

<?PHP
	require_once("../footer.php");
?>
