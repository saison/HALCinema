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
	$pdf->write(20,"スケジュール一覧");
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->setXY(250,0);//開始座標
	$pdf->write(20,$today."作成\n");
	$pdf->image("../images/logo.png",223,10);
	
	//映画件数取得
  	$con = getConnection();
	$schduleCountSql = "SELECT COUNT(*) FROM show_schedule";
    $schduleCountResult = mysqli_query($con, $schduleCountSql);
	$schduleCount = mysqli_fetch_array($schduleCountResult);

	
	$pdf->setXY(10,30);//開始座標
	$pdf->setFillColor(198,198,198);//背景色設定　
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(30,10,"上映数",1,0,'C',1);
	$pdf->cell(30,10,$schduleCount[0],1,1,'R',0);
	
	//空白
	$pdf->cell(30,10,"",0,1,'R',0);
	

	$pdf->cell(25,10,"上映ID",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',8);//フォント設定
	$pdf->cell(15,10,"スクリーン",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->cell(84,10,"映画名",1,0,'C',1);
	$pdf->cell(25,10,"上映日",1,0,'C',1);
	
	$pdf->cell(15,10,"時間",1,0,'C',1);
	$pdf->cell(15,10,"座席数",1,0,'C',1);
	$pdf->cell(15,10,"大人",1,0,'C',1);
	
	$pdf->cell(15,10,"子供",1,0,'C',1);
	$pdf->cell(12,10,"ペア1",1,0,'C',1);
	$pdf->cell(12,10,"ペア2",1,0,'C',1);
	
	$pdf->cell(12,10,"シニア",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',8);//フォント設定
	$pdf->cell(15,10,"予約座席数",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->cell(15,10,"予約率",1,1,'C',1);
	
	

	$selectScheduleSql = "SELECT * FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id = cinema_master.cinema_id";
	$selectScheduleResult =  mysqli_query($con,$selectScheduleSql);
	
	//ページカウント
	$pageNo = 1;
	//スケジュールカウント　ページ表示に使う
	$scheduleCount = 0;
	
	while(($rowScheduleSelectResult = mysqli_fetch_array($selectScheduleResult))!=false){
		
		//上映ID
		$pdf->cell(25,10,$rowScheduleSelectResult['show_id'],1,0,'C',0);
		
		//スクリーン
		$pdf->cell(15,10,substr($rowScheduleSelectResult['screen_id'],5,1),1,0,'C',0);
		
		$pdf->setFont(GOTHIC,'',8);//フォント設定
		
		//映画名
		$pdf->cell(84,10,mb_convert_encoding($rowScheduleSelectResult['cinema_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
				
		$pdf->setFont(GOTHIC,'',10);//フォント設定
		
		//上映日
		$pdf->cell(25,10,str_replace("-","/",$rowScheduleSelectResult['show_day']),1,0,'C',0);
		
		//時間
		$pdf->cell(15,10,substr($rowScheduleSelectResult['start_time'],0,5),1,0,'C',0);
		
		//座席数
		$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowScheduleSelectResult['screen_id']}' GROUP BY show_schedule.screen_id";
		$seatNumResult = mysqli_query($con,$seatNumSql);
		$rowSeatNumResult = mysqli_fetch_array($seatNumResult);

		$pdf->cell(15,10,strval($rowSeatNumResult[0]),1,0
		,'R',0);
		
		
		$reserveCount = 0;//予約数
		
		//movie_reserve_contentにshow_scheduleをshow_idで結合しcinema_idを取得する　
		//このテーブルから特定のcinema_idのかつ　大人のもののみを表示し　数を数える
		$adultDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0001'AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$adultDateResult = mysqli_query($con,$adultDateSql);
		$rowAdultDateResult = mysqli_fetch_array($adultDateResult);
		
		$pdf->cell(15,10,strval($rowAdultDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowAdultDateResult[0];
		
		//子供　↑大人と同じ
		$studentDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0002' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$studentDateResult = mysqli_query($con,$studentDateSql);
		$rowStudentDateResult = mysqli_fetch_array($studentDateResult);
		
		$pdf->cell(15,10,strval($rowStudentDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowStudentDateResult[0];
		
		
		//ペア1　↑大人と同じ
		$pear1DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0003' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$pear1DateResult = mysqli_query($con,$pear1DateSql);
		$rowPear1DateResult = mysqli_fetch_array($pear1DateResult);
		$pdf->cell(12,10,strval($rowPear1DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear1DateResult[0]*2;
		
		//ペア2　↑大人と同じ
		$pear2DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0004' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$pear2DateResult = mysqli_query($con,$pear2DateSql);
		$rowPear2DateResult = mysqli_fetch_array($pear2DateResult);
		$pdf->cell(12,10,strval($rowPear2DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear2DateResult[0]*2;
		
		//シニア　↑大人と同じ
		$seniorDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0005' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$seniorDateResult = mysqli_query($con,$seniorDateSql);
		$rowSeniorDateResult = mysqli_fetch_array($seniorDateResult);
		$pdf->cell(12,10,strval($rowSeniorDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowSeniorDateResult[0];

		//予約数
		
		$pdf->cell(15,10,strval($reserveCount),1,0,'R',0);
		
		//予約率
		
		if($reserveCount==0){
			
			$reserceRateNum = 0;
			$reserceRate = "0%";
			
		}else{
			
			$reserceRateNum = $reserveCount/$rowSeatNumResult[0];
			$reserceRateNum = round($reserceRateNum*100,2);
			$reserceRate = strval($reserceRateNum)."%";
			
		}
		
		
		
		$pdf->cell(15,10,$reserceRate,1,1,'R',0);
		
		$scheduleCount++;
		
		if($scheduleCount == 12){
			$pdf->cell(275,7,"page ".strval($pageNo),0,1,'R',0);
			$pdf->cell(25,10,"上映ID",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',8);//フォント設定
			$pdf->cell(15,10,"スクリーン",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',10);//フォント設定
			$pdf->cell(84,10,"映画名",1,0,'C',1);
			$pdf->cell(25,10,"上映日",1,0,'C',1);
			
			$pdf->cell(15,10,"時間",1,0,'C',1);
			$pdf->cell(15,10,"座席数",1,0,'C',1);
			$pdf->cell(15,10,"大人",1,0,'C',1);
			
			$pdf->cell(15,10,"子供",1,0,'C',1);
			$pdf->cell(12,10,"ペア1",1,0,'C',1);
			$pdf->cell(12,10,"ペア2",1,0,'C',1);
			
			$pdf->cell(12,10,"シニア",1,0,'C',1);
			$pdf->cell(15,10,"予約数",1,0,'C',1);
			$pdf->cell(15,10,"予約率",1,1,'C',1);
			$scheduleCount++;
			$pageNo++;
		}else if( $scheduleCount % 17 ==12){
			$pdf->cell(275,7,"page ".strval($pageNo),0,1,'R',0);
			$pdf->cell(25,10,"上映ID",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',8);//フォント設定
			$pdf->cell(15,10,"スクリーン",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',10);//フォント設定
			$pdf->cell(84,10,"映画名",1,0,'C',1);
			$pdf->cell(25,10,"上映日",1,0,'C',1);
			
			$pdf->cell(15,10,"時間",1,0,'C',1);
			$pdf->cell(15,10,"座席数",1,0,'C',1);
			$pdf->cell(15,10,"大人",1,0,'C',1);
			
			$pdf->cell(15,10,"子供",1,0,'C',1);
			$pdf->cell(12,10,"ペア1",1,0,'C',1);
			$pdf->cell(12,10,"ペア2",1,0,'C',1);
			
			$pdf->cell(12,10,"シニア",1,0,'C',1);
			$pdf->cell(15,10,"予約数",1,0,'C',1);
			$pdf->cell(15,10,"予約率",1,1,'C',1);
	$scheduleCount++;
			$pageNo++;
		}
		
		
	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('schedulePdf','I');
	
	

?>