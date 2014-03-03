<?php
	require_once("../../tokyo/module/functions.php");
	require('mbfpdf.php');
	
	//インスタンス化
	
	$pdf = new MbfPdf('L','mm','A4');
	
	//フォント登録
	
	$pdf->addMbFont(GOTHIC,'SJIS');
	
	//pdfファイルオープン
	
	$pdf->open();
	
	//ページ追加
	
	$pdf->addPage();
	
	//使用フォント指定
	
	$pdf->setFont(GOTHIC,'',20);//フォント設定
	
	//日付取得
	
	$today = date('Y/m/d');
	
	
	$pdf->setXY(10,0);//開始座標
	$pdf->write(20,"映画一覧");
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->setXY(250,0);//開始座標
	$pdf->write(20,$today."作成\n");
	$pdf->image("../images/logo.png",223,10);
	
	//映画件数取得
  	$con = getConnection();
	$movieCountSql = "SELECT COUNT(*) FROM cinema_master";
    $movieCountResult = mysqli_query($con, $movieCountSql);
	$movieCount = mysqli_fetch_array($movieCountResult);
	mysqli_close($con);
	
	$pdf->setXY(10,30);//開始座標
	$pdf->setFillColor(198,198,198);//背景色設定　
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(30,10,"映画登録数",1,0,'C',1);
	$pdf->cell(30,10,$movieCount[0],1,1,'R',0);
	
	//空白
	$pdf->cell(30,10,"",0,1,'R',0);
	

	$pdf->cell(15,10,"映画ID",1,0,'C',1);
	$pdf->cell(85,10,"映画名",1,0,'C',1);
	$pdf->cell(40,10,"公開日",1,0,'C',1);
	
	$pdf->cell(15,10,"公開数",1,0,'C',1);
	$pdf->cell(15,10,"座席数",1,0,'C',1);
	$pdf->cell(15,10,"大人",1,0,'C',1);
	
	$pdf->cell(15,10,"子供",1,0,'C',1);
	$pdf->cell(15,10,"ペア1",1,0,'C',1);
	$pdf->cell(15,10,"ペア2",1,0,'C',1);
	
	$pdf->cell(15,10,"シニア",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',8);//フォント設定
	$pdf->cell(15,10,"予約座席数",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->cell(15,10,"予約率",1,1,'C',1);
	
	
	
	$con=getConnection();
	$selectMovieSql = "SELECT cinema_id,cinema_name,start_day,end_day FROM cinema_master";
	$selectMovieResult =  mysqli_query($con,$selectMovieSql);
	

	while(($rowMovieSelectResult = mysqli_fetch_array($selectMovieResult))!=false){
	
		
		$pdf->cell(15,10,$rowMovieSelectResult['cinema_id'],1,0,'C',0);
		$pdf->setFont(GOTHIC,'',8);//フォント設定
		$pdf->cell(85,10,mb_convert_encoding($rowMovieSelectResult['cinema_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
		$pdf->setFont(GOTHIC,'',10);//フォント設定
		$pdf->cell(40,10,str_replace('-','/',$rowMovieSelectResult['start_day'])."～".str_replace('-','/',$rowMovieSelectResult['end_day']),1,0,'C',0);
		
		//公開数取得
		$movieScheduleSql = "SELECT COUNT( cinema_id ),screen_id FROM show_schedule WHERE cinema_id='{$rowMovieSelectResult['cinema_id']}' GROUP BY cinema_id ";
		$movieScheduleResult = mysqli_query($con,$movieScheduleSql);
		$rowMovieScheduleResult = mysqli_fetch_array($movieScheduleResult);
		
		if($rowMovieScheduleResult[0]==NULL){//公開されていなかったら
			
			$pdf->cell(15,10,"0",1,0,'R',0);
				
		}else{
			
			$pdf->cell(15,10,strval($rowMovieScheduleResult[0]),1,0,'R',0);
		}
		
		
		$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowMovieScheduleResult['screen_id']}' GROUP BY show_schedule.screen_id";
		$seatNumResult = mysqli_query($con,$seatNumSql);
		$rowSeatNumResult = mysqli_fetch_array($seatNumResult);
		
		$seatNum = $rowSeatNumResult[0] * $rowMovieScheduleResult[0];
		
		//文字列じゃないと表示されない？
	
		
		$pdf->cell(15,10,strval($seatNum),1,0,'R',0);
		
		$reserveCount = 0;//予約数
		
		//movie_reserve_contentにshow_scheduleをshow_idで結合しcinema_idを取得する　
		//このテーブルから特定のcinema_idのかつ　大人のもののみを表示し　数を数える
		$adultDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0001'";
		$adultDateResult = mysqli_query($con,$adultDateSql);
		$rowAdultDateResult = mysqli_fetch_array($adultDateResult);
		
		$pdf->cell(15,10,strval($rowAdultDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowAdultDateResult[0];
		
		//子供　↑大人と同じ
		$studentDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0002'";
		$studentDateResult = mysqli_query($con,$studentDateSql);
		$rowStudentDateResult = mysqli_fetch_array($studentDateResult);
		
		$pdf->cell(15,10,strval($rowStudentDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowStudentDateResult[0];
		
		
		//ペア1　↑大人と同じ
		$pear1DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0003'";
		$pear1DateResult = mysqli_query($con,$pear1DateSql);
		$rowPear1DateResult = mysqli_fetch_array($pear1DateResult);
		$pdf->cell(15,10,strval($rowPear1DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear1DateResult[0]*2;
		
		//ペア2　↑大人と同じ
		$pear2DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0004'";
		$pear2DateResult = mysqli_query($con,$pear2DateSql);
		$rowPear2DateResult = mysqli_fetch_array($pear2DateResult);
		$pdf->cell(15,10,strval($rowPear2DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear2DateResult[0]*2;
		
		//シニア　↑大人と同じ
		$seniorDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0005'";
		$seniorDateResult = mysqli_query($con,$seniorDateSql);
		$rowSeniorDateResult = mysqli_fetch_array($seniorDateResult);
		$pdf->cell(15,10,strval($rowSeniorDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowSeniorDateResult[0];

		$pdf->cell(15,10,strval($reserveCount),1,0,'R',0);
		
		//予約率
		
		if($reserveCount==0){
			
			$reserceRateNum = 0;
			$reserceRate = "0%";
			
		}else{
			
			$reserceRateNum = $reserveCount/$seatNum;
			$reserceRateNum = round($reserceRateNum*100,2);
			$reserceRate = strval($reserceRateNum)."%";
			
		}
		
		
		
		$pdf->cell(15,10,$reserceRate,1,1,'R',0);
	
	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('moviePdf','I');
	
	

?>