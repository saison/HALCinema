<?php
	require_once("../../tokyo/module/functions.php");
	require('mbfpdf.php');
	$con = getConnection();
	
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
	$pdf->write(20,"統計");
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->setXY(250,0);//開始座標
	$pdf->write(20,$today."作成\n");
	$pdf->image("../images/logo.png",223,10);
	
	
	
	
	//データ取得日時
	$pdf->setXY(10,30);//開始座標
	$pdf->setFillColor(198,198,198);//背景色設定　
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(40,10,"データ日時",1,0,'C',1);
	//一番古い日を求める　
	$oldDaySql = "SELECT MIN(show_day) FROM show_schedule";
	$oldDaySqlResult = mysqli_query($con,$oldDaySql);
	$oldDay = mysqli_fetch_array($oldDaySqlResult);
	
	$pdf->cell(100,10,str_replace('-','/',$oldDay[0]) . "～" . $today,1,1,'L',0);
	
	//空白
	$pdf->cell(30,10,"",0,1,'R',0);
	
	$pdf->setFont(GOTHIC,'',13);//フォント設定
	$pdf->cell(30,10,"予約状況",0,1,'L',0);
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	
	$pdf->cell(100,10,"予約率",0,0,'L',0);
	$pdf->cell(100,10,"予約率割合",0,1,'L',0);
	
	
	
	
	
	$pdf->cell(30,10,"上映数",1,0,'C',1);
	
	//上映数
	
	$countSql = "SELECT COUNT(*) FROM show_schedule";
	$countSqlResult = mysqli_query($con,$countSql);
	$showScheduleCount = mysqli_fetch_array($countSqlResult);
	$pdf->cell(50,10,$showScheduleCount[0],1,0,'R',0);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(30,10,"",1,0,'R',0);
	$pdf->cell(20,10,"大人",1,0,'C',1);
	$pdf->cell(20,10,"学生",1,0,'C',1);
	$pdf->cell(20,10,"ペア１",1,0,'C',1);
	$pdf->cell(20,10,"ペア２",1,0,'C',1);
	$pdf->cell(20,10,"シニア",1,0,'C',1);
	$pdf->cell(20,10,"合計",1,1,'C',1);
	
	
	
	
	$pdf->cell(30,10,"合計座席数",1,0,'C',1);
	
	//合計座席数
	$seatNum = 0;
	$selectScheduleSql = "SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id";
	$selectScheduleResult =  mysqli_query($con,$selectScheduleSql);
	while(($rowScheduleSelectResult = mysqli_fetch_array($selectScheduleResult))!=false){
		$seatNum += $rowScheduleSelectResult[0];
	}
	$pdf->cell(50,10,strval($seatNum),1,0,'R',0);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(30,10,"予約座席数",1,0,'C',1);
	
	//予約座席数　大人
	$countReserveAdultSql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0001'";//mp0001で書いちゃうSQLってやばいかも…
	$countReserveAdultSqlResult = mysqli_query($con,$countReserveAdultSql);
	$reserveAdultCount = mysqli_fetch_array($countReserveAdultSqlResult);
	$pdf->cell(20,10,$reserveAdultCount[0],1,0,'C',0);
	
	//予約座席数　子供
	$countReserveStudentSql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0002'";
	$countReserveStudentSqlResult = mysqli_query($con,$countReserveStudentSql);
	$reserveStudentCount = mysqli_fetch_array($countReserveStudentSqlResult);
	$pdf->cell(20,10,$reserveStudentCount[0],1,0,'C',0);
	
	//予約座席数　ペア１
	$countReservePear1Sql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0003'";
	$countReservePear1SqlResult = mysqli_query($con,$countReservePear1Sql);
	$reservePear1Count = mysqli_fetch_array($countReservePear1SqlResult);
	$pdf->cell(20,10,$reservePear1Count[0],1,0,'C',0);
	
	//予約座席数　ペア２
	$countReservePear2Sql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0004'";
	$countReservePear2SqlResult = mysqli_query($con,$countReservePear2Sql);
	$reservePear2Count = mysqli_fetch_array($countReservePear2SqlResult);
	$pdf->cell(20,10,$reservePear2Count[0],1,0,'C',0);
	
	//予約座席数　シニア
	$countReserveSenirSql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0005'";
	$countReserveSenirSqlResult = mysqli_query($con,$countReserveSenirSql);
	$reserveSenirCount = mysqli_fetch_array($countReserveSenirSqlResult);
	$pdf->cell(20,10,$reserveSenirCount[0],1,0,'C',0);
	
	//予約座席数　合計
	$countReserveSql = "SELECT COUNT(*) FROM movie_reserve_content";
	$countReserveSqlResult = mysqli_query($con,$countReserveSql);
	$reserveCount = mysqli_fetch_array($countReserveSqlResult);
	$pdf->cell(20,10,$reserveCount[0],1,1,'C',0);
	
	
	$pdf->cell(30,10,"予約座席数",1,0,'C',1);
	
	//予約座席数
	
	$pdf->cell(50,10,$reserveCount[0],1,0,'R',0);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(30,10,"予約率",1,0,'C',1);
	//予約率大人
	$reserveAdultRateNum = $reserveAdultCount[0]/$reserveCount[0];
	$reserveAdultRateNum = round($reserveAdultRateNum*100,2);
	$reserveAdultRate = strval($reserveAdultRateNum)."%";
	$pdf->cell(20,10,$reserveAdultRate,1,0,'C',0);
	
	//予約率子供
	$reserveStudentRateNum = $reserveStudentCount[0]/$reserveCount[0];
	$reserveStudentRateNum = round($reserveStudentRateNum*100,2);
	$reserveStudentRate = strval($reserveStudentRateNum)."%";
	$pdf->cell(20,10,$reserveStudentRate,1,0,'C',0);
	
	//予約率ペア1
	$reservePear1RateNum = $reservePear1Count[0]/$reserveCount[0];
	$reservePear1RateNum = round($reservePear1RateNum*100,2);
	$reservePear1Rate = strval($reservePear1RateNum)."%";
	$pdf->cell(20,10,$reservePear1Rate,1,0,'C',0);
	
	
	//予約率ペア2
	$reservePear2RateNum = $reservePear2Count[0]/$reserveCount[0];
	$reservePear2RateNum = round($reservePear2RateNum*100,2);
	$reservePear2Rate = strval($reservePear2RateNum)."%";
	$pdf->cell(20,10,$reservePear2Rate,1,0,'C',0);
	
	//予約率シニア
	$reserveSenirRateNum = $reserveSenirCount[0]/$reserveCount[0];
	$reserveSenirRateNum = round($reserveSenirRateNum*100,2);
	$reserveSenirRate = strval($reserveSenirRateNum)."%";
	$pdf->cell(20,10,$reserveSenirRate,1,0,'C',0);
	$pdf->cell(20,10,"100%",1,0,'C',0);

	
	
	
	//空白
	$pdf->cell(30,10,"",0,1,'R',0);
	$pdf->cell(30,10,"",0,1,'R',0);
	
	$pdf->setFont(GOTHIC,'',13);//フォント設定
	$pdf->cell(30,10,"アカウント情報",0,1,'L',0);
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	
	$pdf->cell(100,10,"男女人数・比率",0,0,'L',0);
	$pdf->cell(100,10,"年代別男女人数",0,1,'L',0);
	
	
	
	
	
	
	$pdf->cell(20,10,"",1,0,'R',0);
	$pdf->cell(20,10,"男性",1,0,'C',1);
	$pdf->cell(20,10,"女性",1,0,'C',1);
	$pdf->cell(20,10,"合計",1,0,'C',1);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"",1,0,'R',0);
	$pdf->cell(20,10,"～10代",1,0,'C',1);
	$pdf->cell(20,10,"20代",1,0,'C',1);
	$pdf->cell(20,10,"30代",1,0,'C',1);
	$pdf->cell(20,10,"40代",1,0,'C',1);
	$pdf->cell(20,10,"50代",1,0,'C',1);
	$pdf->cell(20,10,"60代",1,0,'C',1);
	$pdf->cell(20,10,"70代～",1,0,'C',1);
	$pdf->cell(20,10,"合計",1,1,'C',1);
	
	
	
	$pdf->cell(20,10,"人数",1,0,'C',1);
	$pdf->cell(20,10,"4",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	//アカウント合計
	$userCountSql = "SELECT COUNT(*) FROM user_master WHERE logic_delete_flag = 0";
    $userCountResult = mysqli_query($con, $userCountSql);
	$userCount = mysqli_fetch_array($userCountResult);
	$pdf->cell(20,10,$userCount[0],1,0,'C',0);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"男性",1,0,'C',1);
	
	
	$age10 = 0;//～10代
	$age20 = 0;//20代
	$age30 = 0;//30代
	$age40 = 0;//40代
	$age50 = 0;//50代
	$age60 = 0;//60代
	$age70 = 0;//70代～
	$selectUserSql = "SELECT birthday FROM user_master  WHERE logic_delete_flag = 0";
	$selectUserResult =  mysqli_query($con,$selectUserSql);
	while(($rowUserSelectResult = mysqli_fetch_array($selectUserResult))!=false){
		//年齢計算　(今日の日付-誕生日)/10000して、小数点を切捨てれば超簡単にもとまる！！
		$now = date('Ymd');
		$birthday = str_replace("-","",$rowUserSelectResult['birthday']);
		$age = strval(floor(($now-intval($birthday))/10000));
	    
		switch(intval($age / 10)){
			case 0:
				$age10++;
				break;
			case 1:
				$age10++;
				break;
			case 2:
				$age20++;
				break;
			case 3:
				$age30++;
				break;
			case 4:
				$age40++;
				break;
			case 5:
				$age50++;
				break;
			case 6:
				$age60++;
				break;
			case 7:
				$age70++;
				break;
			default:
				$age70++;
				break;
			
		}
	
	}
	$pdf->cell(20,10,strval($age10),1,0,'C',0);
	$pdf->cell(20,10,strval($age20),1,0,'C',0);
	$pdf->cell(20,10,strval($age30),1,0,'C',0);
	$pdf->cell(20,10,strval($age40),1,0,'C',0);
	$pdf->cell(20,10,strval($age50),1,0,'C',0);
	$pdf->cell(20,10,strval($age60),1,0,'C',0);
	$pdf->cell(20,10,strval($age70),1,0,'C',0);
	$pdf->cell(20,10,"-",1,1,'C',0);
	
	
	
	
	
	
	$pdf->cell(20,10,"割合",1,0,'C',1);
	$pdf->cell(20,10,"100%",1,0,'C',0);
	$pdf->cell(20,10,"0%",1,0,'C',0);
	
	$pdf->cell(20,10,"",0,0,'C',0);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"女性",1,0,'C',1);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	$pdf->cell(20,10,"-",1,1,'C',0);	
	
	
	
	
	
	
	$pdf->cell(20,10,"",0,0,'C',0);
	$pdf->cell(20,10,"",0,0,'C',0);
	$pdf->cell(20,10,"",0,0,'C',0);
	$pdf->cell(20,10,"",0,0,'C',0);
	
	//空白
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"合計",1,0,'C',1);
	$pdf->cell(20,10,strval($age10+0),1,0,'C',0);
	$pdf->cell(20,10,strval($age20+0),1,0,'C',0);
	$pdf->cell(20,10,strval($age30+0),1,0,'C',0);
	$pdf->cell(20,10,strval($age40+0),1,0,'C',0);
	$pdf->cell(20,10,strval($age50+0),1,0,'C',0);
	$pdf->cell(20,10,strval($age60+0),1,0,'C',0);
	$pdf->cell(20,10,strval($age70+0),1,0,'C',0);
	$pdf->cell(20,10,$userCount[0],1,1,'C',0);
	
	
	
	
	mysqli_close($con);
	
	
	$pdf->output('moviePdf','I');
	
	

?>