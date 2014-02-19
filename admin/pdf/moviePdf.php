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
	
	//映画件数取得
  	$con = getConnection();
	$movieCountSql = "SELECT COUNT(*) FROM cinema_master";
    $movieCountResult = mysqli_query($con, $movieCountSql);
	$movieCount = mysqli_fetch_array($movieCountResult);
	mysqli_close($con);
	
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
	$pdf->cell(15,10,"予約数",1,0,'C',1);
	$pdf->cell(15,10,"予約率",1,1,'C',1);
	
	
	
	$con=getConnection();
	$selectMovieSql = "SELECT cinema_id,cinema_name,start_day,end_day FROM cinema_master";
	$selectMovieResult =  mysqli_query($con,$selectMovieSql);
	$rowMovieSelectResult = mysqli_fetch_array($selectMovieResult);
	

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
		
		$pdf->cell(15,10,$rowMovieScheduleResult[0],1,0,'C',0);
		
		$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowMovieScheduleResult['screen_id']}' GROUP BY show_schedule.screen_id";
		$seatNumResult = mysqli_query($con,$seatNumSql);
		$rowSeatNumResult = mysqli_fetch_array($seatNumResult);
		
		$seatNum = $rowSeatNumResult[0] * $rowMovieScheduleResult[0];
		
		//文字列じゃないと表示されない？
		$seatNum = strval($seatNum);
		
		$pdf->cell(15,10,$seatNum,1,0,'C',0);
		$pdf->cell(15,10,"大人",1,0,'C',0);
		
		$pdf->cell(15,10,"子供",1,0,'C',0);
		$pdf->cell(15,10,"ペア1",1,0,'C',0);
		$pdf->cell(15,10,"ペア2",1,0,'C',0);
		
		$pdf->cell(15,10,"シニア",1,0,'C',0);
		$pdf->cell(15,10,"予約数",1,0,'C',0);
		$pdf->cell(15,10,"予約率",1,1,'C',0);
	
	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('test','I');

?>