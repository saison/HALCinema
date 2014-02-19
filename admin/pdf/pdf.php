
<?php

if(isset($_POST['send'])){
	
	//商品１
	$name1 = $_POST['name1'];
	$price1 = $_POST['price1'];
	$num1 = $_POST['num1'];
	
	//商品２
	$name2 = $_POST['name2'];
	$price2 = $_POST['price2'];
	$num2 = $_POST['num2'];
	
	//商品３
	$name3 = $_POST['name3'];
	$price3 = $_POST['price3'];
	$num3 = $_POST['num3'];
	
	$sum1 = $price1*$num1;//総額１
	$sum2 =	$price2*$num2;//総額２
	$sum3 = $price3*$num3;//総額３
	
	$syoukei = $sum1+$sum2+$sum3;//小計
	
	$all = ceil(($sum1+$sum2+$sum3)*1.05);//請求額
	
	$zei = ceil(($sum1+$sum2+$sum3)*0.05);//消費税
	
	$today = date('Y/m/d');
	
	require('mbfpdf.php');
	//インスタンス化
	
	$pdf = new MbfPdf('P','mm','A4');
	
	//フォント登録
	
	$pdf->addMbFont(GOTHIC,'SJIS');
	
	//pdfファイルオープン
	
	$pdf->open();
	
	//ページ追加
	
	$pdf->addPage();
	
	//使用フォント指定
	
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	
	
	$pdf->setXY(165,0);//開始座標
	$pdf->write(10,$today."\n");
	$pdf->write(10,"〒160-0023\n");
	$pdf->write(0,"東京都新宿区西新宿1-7-3\n");
	
	$pdf->setFont(GOTHIC,'',20);//フォント設定
	$pdf->write(20,"HAL 東京 御中\n");
	
	$pdf->image("img/logo.png",120,40);
	
	$pdf->setFont(GOTHIC,'',10);//フォント設定
	
	$pdf->setXY(110,60);//開始座標
	$pdf->write(10,"〒160-0023\n");
	
	$pdf->setXY(110,60);//開始座標
	$pdf->write(20,"東京都新宿区西新宿1-7-3\n");
	
	$pdf->setXY(110,60);//開始座標
	$pdf->write(30,"TEL:03-XXXX-XXXX\n");
	
	$pdf->setXY(110,60);//開始座標
	$pdf->write(40,"FAX:03-XXXX-XXXX\n");
	
	$pdf->setFont(GOTHIC,'',15);//フォント設定
	
	$pdf->write(0,"ありがとうございます。下記の通り、請求申し上げます\n");
	
	$pdf->setXY(10,110);//開始座標
	$pdf->cell(170,10,"合計金額        \\".$all,'B',1,'L',0);

	
	//セルの表示
	
	$pdf->setXY(10,130);//開始座標
	$pdf->setFont(GOTHIC,'',12);//フォント設定
	$pdf->setTextColor(255,255,255);//文字色設定　白
	$pdf->setFillColor(0,0,0);//背景色設定　黒
	$pdf->cell(60,10,'商品名',1,0,'C',1);
	$pdf->cell(30,10,'価格',1,0,'C',1);
	$pdf->cell(30,10,'個数',1,0,'C',1);
	$pdf->cell(50,10,'総額',1,1,'C',1);
	
	
	//商品１セル
	
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(60,10,mb_convert_encoding($name1, "SJIS-win", "UTF-8"),1,0,'L',0);
	$pdf->cell(30,10,"$price1",1,0,'R',0);
	$pdf->cell(30,10,"$num1",1,0,'R',0);
	$pdf->cell(50,10,"$sum1",1,1,'R',0);
	
	//商品２セル
	
	$pdf->cell(60,10,mb_convert_encoding($name2, "SJIS-win", "UTF-8"),1,0,'L',0);
	$pdf->cell(30,10,"$price2",1,0,'R',0);
	$pdf->cell(30,10,"$num2",1,0,'R',0);
	$pdf->cell(50,10,"$sum2",1,1,'R',0);
	
	//商品３セル
	
	$pdf->cell(60,10,mb_convert_encoding($name3, "SJIS-win", "UTF-8"),1,0,'L',0);
	$pdf->cell(30,10,"$price3",1,0,'R',0);
	$pdf->cell(30,10,"$num3",1,0,'R',0);
	$pdf->cell(50,10,"$sum3",1,1,'R',0);
	
	//空白セル
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(50,10,'',0,1,'C',0);
	
	//小計
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->setTextColor(255,255,255);//文字色設定　白
	$pdf->cell(30,10,'小計',1,0,'C',1);
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(50,10,"$syoukei",1,1,'R',0);
	
	//消費税
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->setTextColor(255,255,255);//文字色設定　白
	$pdf->cell(30,10,'消費税(5%)',1,0,'C',1);
	$pdf->setTextColor(0,0,0);//文字色設定　黒
	$pdf->cell(50,10,"$zei",1,1,'R',0);
	
	//空白セル
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(50,10,'',0,1,'C',0);
	
	//備考
	
	$pdf->cell(170,15,'備考：',1,0,'L',0);
	
	
	$pdf->output('test','I');
}

?>
