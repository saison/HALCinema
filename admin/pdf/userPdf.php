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
	$pdf->write(20,"ユーザー一覧");
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	$pdf->setXY(250,0);//開始座標
	$pdf->write(20,$today."作成\n");
	$pdf->image("../images/logo.png",223,10);
	
	//映画件数取得
  	$con = getConnection();
	$userCountSql = "SELECT COUNT(*) FROM user_master WHERE logic_delete_flag = 0";
    $userCountResult = mysqli_query($con, $userCountSql);
	$userCount = mysqli_fetch_array($userCountResult);
	mysqli_close($con);
	
	$pdf->setXY(10,30);//開始座標
	$pdf->setFillColor(198,198,198);//背景色設定　
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(30,10,"ユーザー数",1,0,'C',1);
	$pdf->cell(30,10,$userCount[0],1,1,'R',0);
	
	//空白
	$pdf->cell(30,10,"",0,1,'R',0);
	

	$pdf->cell(15,10,"会員ID",1,0,'C',1);
	$pdf->cell(65,10,"メールアドレス",1,0,'C',1);
	$pdf->cell(35,10,"姓",1,0,'C',1);
	
	$pdf->cell(35,10,"名",1,0,'C',1);
	$pdf->cell(30,10,"生年月日",1,0,'C',1);
	$pdf->cell(15,10,"年齢",1,0,'C',1);
	
	$pdf->cell(20,10,"都道府県",1,0,'C',1);
	$pdf->cell(20,10,"ポイント",1,0,'C',1);
	$pdf->cell(25,10,"メルマガflag",1,1,'C',1);

	
	
	
	$con=getConnection();
	$selectUserSql = "SELECT * FROM user_master  WHERE logic_delete_flag = 0";
	$selectUserResult =  mysqli_query($con,$selectUserSql);
	

	while(($rowUserSelectResult = mysqli_fetch_array($selectUserResult))!=false){
	
		
		$pdf->cell(15,10,$rowUserSelectResult['user_id'],1,0,'C',0);
		$pdf->cell(65,10,$rowUserSelectResult['user_mail'],1,0,'L',0);
		$pdf->cell(35,10,mb_convert_encoding($rowUserSelectResult['family_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
		
		$pdf->cell(35,10,mb_convert_encoding($rowUserSelectResult['first_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
		$pdf->cell(30,10,str_replace("-","/",$rowUserSelectResult['birthday']),1,0,'C',0);
		
		//年齢計算　(今日の日付-誕生日)/10000して、小数点を切捨てれば超簡単にもとまる！！
		$now = date('Ymd');
		$birthday = str_replace("-","",$rowUserSelectResult['birthday']);
		$pdf->cell(15,10,strval(floor(($now-intval($birthday))/10000)),1,0,'R',0);	
		
		$pdf->cell(20,10,mb_convert_encoding($rowUserSelectResult['prefectures'], "SJIS-win", "UTF-8"),1,0,'C',0);
		$pdf->cell(20,10,$rowUserSelectResult['hal_cinema_point'],1,0,'R',0);
		
		if($rowUserSelectResult['mail_magazine_flag']==1){
			$pdf->cell(25,10,"受信する",1,1,'C',0);
		}else if($rowUserSelectResult['mail_magazine_flag']==0){
			$pdf->cell(25,10,"受信しない",1,1,'C',0);
			
		}

	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('userPdf','I');

?>