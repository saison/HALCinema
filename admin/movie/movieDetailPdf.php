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
	$pdf->write(20,"映画詳細");
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->setXY(250,0);//開始座標
	$pdf->write(20,$today."作成\n");
	$pdf->image("../images/logo.png",223,10);
	
	
	//映画情報取得
	$con=getConnection();
	$selectMovieSql = "SELECT cinema_id,cinema_name,start_day,end_day FROM cinema_master WHERE cinema_id = '{$_GET["id"]}'";
	$selectMovieResult =  mysqli_query($con,$selectMovieSql);
	$rowMovieSelectResult = mysqli_fetch_array($selectMovieResult);
	
	$pdf->setXY(10,30);//開始座標
	$pdf->setFillColor(198,198,198);//背景色設定　
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(35,15,"映画名",1,0,'C',1);
	$pdf->cell(180,15,mb_convert_encoding($rowMovieSelectResult['cinema_name'],"SJIS-win", "UTF-8"),1,1,'L',0);
	$pdf->cell(35,10,"映画ID",1,0,'C',1);
	$pdf->cell(65,10,$rowMovieSelectResult['cinema_id'],1,0,'L',0);
	$pdf->cell(30,10,"公開期間",1,0,'C',1);
	$pdf->cell(85,10,str_replace('-','/',$rowMovieSelectResult['start_day'])."～".str_replace('-','/',$rowMovieSelectResult['end_day']),1,1,'L',0);
	
	//空白
	$pdf->cell(30,10,"",0,1,'R',0);
	
	
	
	$pdf->cell(15,15,"公開数",1,0,'C',1);
	//公開数取得
	$movieScheduleSql = "SELECT COUNT( cinema_id ),screen_id FROM show_schedule WHERE cinema_id='{$rowMovieSelectResult['cinema_id']}' GROUP BY cinema_id ";
	$movieScheduleResult = mysqli_query($con,$movieScheduleSql);
	$rowMovieScheduleResult = mysqli_fetch_array($movieScheduleResult);
		
	if($rowMovieScheduleResult[0]==NULL){//公開されていなかったら
			
		$pdf->cell(20,15,"0",1,0,'R',0);
				
	}else{
			
		$pdf->cell(20,15,strval($rowMovieScheduleResult[0]),1,0,'R',0);
	}
	
	$reserveCount = 0;//予約数
	
	$pdf->cell(15,15,"座席数",1,0,'C',1);
	$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowMovieScheduleResult['screen_id']}' GROUP BY show_schedule.screen_id";
	$seatNumResult = mysqli_query($con,$seatNumSql);
	$rowSeatNumResult = mysqli_fetch_array($seatNumResult);
		
	$seatNum = $rowSeatNumResult[0] * $rowMovieScheduleResult[0];
		
	$pdf->cell(20,15,strval($seatNum),1,0,'R',0);
	
	
	
	$pdf->cell(15,15,"大人",1,0,'C',1);
	//movie_reserve_contentにshow_scheduleをshow_idで結合しcinema_idを取得する　
	//このテーブルから特定のcinema_idのかつ　大人のもののみを表示し　数を数える
	$adultDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0001'";
	$adultDateResult = mysqli_query($con,$adultDateSql);
	$rowAdultDateResult = mysqli_fetch_array($adultDateResult);
		
	$pdf->cell(15,15,strval($rowAdultDateResult[0]),1,0,'R',0);
		
	$reserveCount += $rowAdultDateResult[0];
	
	
	
	$pdf->cell(15,15,"子供",1,0,'C',1);
	//子供　↑大人と同じ
	$studentDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0002'";
	$studentDateResult = mysqli_query($con,$studentDateSql);
	$rowStudentDateResult = mysqli_fetch_array($studentDateResult);
		
	$pdf->cell(15,15,strval($rowStudentDateResult[0]),1,0,'R',0);
		
	$reserveCount += $rowStudentDateResult[0];
	
	
	$pdf->cell(15,15,"ペア1",1,0,'C',1);
	//ペア1　↑大人と同じ
	$pear1DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0003'";
	$pear1DateResult = mysqli_query($con,$pear1DateSql);
	$rowPear1DateResult = mysqli_fetch_array($pear1DateResult);
	$pdf->cell(15,15,strval($rowPear1DateResult[0]),1,0,'R',0);
		
	$reserveCount += $rowPear1DateResult[0]*2;
	
	
	$pdf->cell(15,15,"ペア2",1,0,'C',1);
	//ペア2　↑大人と同じ
	$pear2DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0004'";
	$pear2DateResult = mysqli_query($con,$pear2DateSql);
	$rowPear2DateResult = mysqli_fetch_array($pear2DateResult);
	$pdf->cell(15,15,strval($rowPear2DateResult[0]),1,0,'R',0);
		
	$reserveCount += $rowPear2DateResult[0]*2;
	
	
	$pdf->cell(15,15,"シニア",1,0,'C',1);
	//シニア　↑大人と同じ
	$seniorDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowMovieSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0005'";
	$seniorDateResult = mysqli_query($con,$seniorDateSql);
	$rowSeniorDateResult = mysqli_fetch_array($seniorDateResult);
	$pdf->cell(15,15,strval($rowSeniorDateResult[0]),1,0,'R',0);
		
	$reserveCount += $rowSeniorDateResult[0];

	
	
	$pdf->cell(15,15,"予約数",1,0,'C',1);
	$pdf->cell(15,15,strval($reserveCount),1,0,'R',0);
	
	$pdf->cell(15,15,"予約率",1,0,'C',1);
	//予約率
	if($reserveCount==0){
			
		$reserceRateNum = 0;
		$reserceRate = "0%";
			
	}else{
			
		$reserceRateNum = $reserveCount/$seatNum;
		$reserceRateNum = round($reserceRateNum*100,2);
		$reserceRate = strval($reserceRateNum)."%";
			
	}
	
	$pdf->cell(15,15,$reserceRate,1,1,'R',0);

	
	$pdf->cell(30,10,"",0,1,'R',0);
	
	
	$pdf->setFont(GOTHIC,'',15);//フォント設定
	$pdf->cell(100,10,"この映画のスケジュール一覧",0,1,'L',0);
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	
	$pdf->cell(25,10,"上映ID",1,0,'C',1);
	$pdf->cell(20,10,"スクリーン",1,0,'C',1);
	$pdf->cell(30,10,"上映日",1,0,'C',1);
	
	$pdf->cell(30,10,"上映開始時間",1,0,'C',1);
	$pdf->cell(25,10,"座席数",1,0,'C',1);
	$pdf->cell(20,10,"大人",1,0,'C',1);
	
	$pdf->cell(20,10,"子供",1,0,'C',1);
	$pdf->cell(20,10,"ペア1",1,0,'C',1);
	$pdf->cell(20,10,"ペア2",1,0,'C',1);
	
	$pdf->cell(20,10,"シニア",1,0,'C',1);
	$pdf->cell(25,10,"予約数",1,0,'C',1);
	$pdf->cell(25,10,"予約率",1,1,'C',1);
	
	
	
	//ページカウント
	$pageNo = 1;
	//スケジュールカウント　ページ表示に使う
	$scheduleCount = 0;
	
	$con=getConnection();
	$selectScheduleSql = "SELECT * FROM show_schedule WHERE cinema_id = '{$rowMovieSelectResult['cinema_id']}'";
	$selectScheduleResult =  mysqli_query($con,$selectScheduleSql);
	

	while(($rowScheduleSelectResult = mysqli_fetch_array($selectScheduleResult))!=false){
	
		//上映ID
		$pdf->cell(25,10,$rowScheduleSelectResult['show_id'],1,0,'C',0);
		
		//スクリーン
		$pdf->cell(20,10,substr($rowScheduleSelectResult['screen_id'],5,1),1,0,'C',0);
	
		
		//上映日
		$pdf->cell(30,10,str_replace("-","/",$rowScheduleSelectResult['show_day']),1,0,'C',0);
		
		//時間
		$pdf->cell(30,10,substr($rowScheduleSelectResult['start_time'],0,5),1,0,'C',0);
		
		//座席数
		$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowScheduleSelectResult['screen_id']}' GROUP BY show_schedule.screen_id";
		$seatNumResult = mysqli_query($con,$seatNumSql);
		$rowSeatNumResult = mysqli_fetch_array($seatNumResult);

		$pdf->cell(25,10,strval($rowSeatNumResult[0]),1,0
		,'R',0);
		
		
		$reserveCount = 0;//予約数
		
		//movie_reserve_contentにshow_scheduleをshow_idで結合しcinema_idを取得する　
		//このテーブルから特定のcinema_idのかつ　大人のもののみを表示し　数を数える
		$adultDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0001'AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$adultDateResult = mysqli_query($con,$adultDateSql);
		$rowAdultDateResult = mysqli_fetch_array($adultDateResult);
		
		$pdf->cell(20,10,strval($rowAdultDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowAdultDateResult[0];
		
		//子供　↑大人と同じ
		$studentDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0002' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$studentDateResult = mysqli_query($con,$studentDateSql);
		$rowStudentDateResult = mysqli_fetch_array($studentDateResult);
		
		$pdf->cell(20,10,strval($rowStudentDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowStudentDateResult[0];
		
		
		//ペア1　↑大人と同じ
		$pear1DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0003' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$pear1DateResult = mysqli_query($con,$pear1DateSql);
		$rowPear1DateResult = mysqli_fetch_array($pear1DateResult);
		$pdf->cell(20,10,strval($rowPear1DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear1DateResult[0]*2;
		
		//ペア2　↑大人と同じ
		$pear2DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0004' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$pear2DateResult = mysqli_query($con,$pear2DateSql);
		$rowPear2DateResult = mysqli_fetch_array($pear2DateResult);
		$pdf->cell(20,10,strval($rowPear2DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear2DateResult[0]*2;
		
		//シニア　↑大人と同じ
		$seniorDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0005' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$seniorDateResult = mysqli_query($con,$seniorDateSql);
		$rowSeniorDateResult = mysqli_fetch_array($seniorDateResult);
		$pdf->cell(20,10,strval($rowSeniorDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowSeniorDateResult[0];

		//予約数
		
		$pdf->cell(25,10,strval($reserveCount),1,0,'R',0);
		
		//予約率
		
		if($reserveCount==0){
			
			$reserceRateNum = 0;
			$reserceRate = "0%";
			
		}else{
			
			$reserceRateNum = $reserveCount/$rowSeatNumResult[0];
			$reserceRateNum = round($reserceRateNum*100,2);
			$reserceRate = strval($reserceRateNum)."%";
			
		}
		
		
		
		$pdf->cell(25,10,$reserceRate,1,1,'R',0);
		
		$scheduleCount++;
		
		if($scheduleCount == 7){
			$pdf->cell(280,7,"page ".strval($pageNo),0,1,'R',0);
			$pdf->cell(25,10,"上映ID",1,0,'C',1);
			$pdf->cell(20,10,"スクリーン",1,0,'C',1);
			$pdf->cell(30,10,"上映日",1,0,'C',1);
			
			$pdf->cell(30,10,"上映開始時間",1,0,'C',1);
			$pdf->cell(25,10,"座席数",1,0,'C',1);
			$pdf->cell(20,10,"大人",1,0,'C',1);
			
			$pdf->cell(20,10,"子供",1,0,'C',1);
			$pdf->cell(20,10,"ペア1",1,0,'C',1);
			$pdf->cell(20,10,"ペア2",1,0,'C',1);
			
			$pdf->cell(20,10,"シニア",1,0,'C',1);
			$pdf->cell(25,10,"予約数",1,0,'C',1);
			$pdf->cell(25,10,"予約率",1,1,'C',1);
	
			$scheduleCount++;
			$pageNo++;
		}else if( $scheduleCount % 17 ==7){
			$pdf->cell(280,7,"page ".strval($pageNo),0,1,'R',0);
			$pdf->cell(25,10,"上映ID",1,0,'C',1);
			$pdf->cell(20,10,"スクリーン",1,0,'C',1);
			$pdf->cell(30,10,"上映日",1,0,'C',1);
			
			$pdf->cell(30,10,"上映開始時間",1,0,'C',1);
			$pdf->cell(25,10,"座席数",1,0,'C',1);
			$pdf->cell(20,10,"大人",1,0,'C',1);
			
			$pdf->cell(20,10,"子供",1,0,'C',1);
			$pdf->cell(20,10,"ペア1",1,0,'C',1);
			$pdf->cell(20,10,"ペア2",1,0,'C',1);
			
			$pdf->cell(20,10,"シニア",1,0,'C',1);
			$pdf->cell(25,10,"予約数",1,0,'C',1);
			$pdf->cell(25,10,"予約率",1,1,'C',1);
	
	$scheduleCount++;
			$pageNo++;
		}
		
		
	
	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('moviePdf','I');
	
	

?>