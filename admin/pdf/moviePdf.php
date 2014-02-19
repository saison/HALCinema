<?php
	require_once("../../tokyo/module/functions.php");
	require('mbfpdf.php');
	
	//�C���X�^���X��
	
	$pdf = new MbfPdf('L','mm','A4');
	
	//�t�H���g�o�^
	
	$pdf->addMbFont(GOTHIC,'SJIS');
	
	//pdf�t�@�C���I�[�v��
	
	$pdf->open();
	
	//�y�[�W�ǉ�
	
	$pdf->addPage();
	
	//�g�p�t�H���g�w��
	
	$pdf->setFont(GOTHIC,'',20);//�t�H���g�ݒ�
	
	//���t�擾
	
	$today = date('Y/m/d');
	
	
	$pdf->setXY(10,0);//�J�n���W
	$pdf->write(20,"�f��ꗗ");
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	$pdf->setXY(250,0);//�J�n���W
	$pdf->write(20,$today."�쐬\n");
	
	//�f�挏���擾
  	$con = getConnection();
	$movieCountSql = "SELECT COUNT(*) FROM cinema_master";
    $movieCountResult = mysqli_query($con, $movieCountSql);
	$movieCount = mysqli_fetch_array($movieCountResult);
	mysqli_close($con);
	
	$pdf->setFillColor(198,198,198);//�w�i�F�ݒ�@
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(30,10,"�f��o�^��",1,0,'C',1);
	$pdf->cell(30,10,$movieCount[0],1,1,'R',0);
	
	//��
	$pdf->cell(30,10,"",0,1,'R',0);
	

	$pdf->cell(15,10,"�f��ID",1,0,'C',1);
	$pdf->cell(85,10,"�f�於",1,0,'C',1);
	$pdf->cell(40,10,"���J��",1,0,'C',1);
	
	$pdf->cell(15,10,"���J��",1,0,'C',1);
	$pdf->cell(15,10,"���Ȑ�",1,0,'C',1);
	$pdf->cell(15,10,"��l",1,0,'C',1);
	
	$pdf->cell(15,10,"�q��",1,0,'C',1);
	$pdf->cell(15,10,"�y�A1",1,0,'C',1);
	$pdf->cell(15,10,"�y�A2",1,0,'C',1);
	
	$pdf->cell(15,10,"�V�j�A",1,0,'C',1);
	$pdf->cell(15,10,"�\��",1,0,'C',1);
	$pdf->cell(15,10,"�\��",1,1,'C',1);
	
	
	
	$con=getConnection();
	$selectMovieSql = "SELECT cinema_id,cinema_name,start_day,end_day FROM cinema_master";
	$selectMovieResult =  mysqli_query($con,$selectMovieSql);
	$rowMovieSelectResult = mysqli_fetch_array($selectMovieResult);
	

	while(($rowMovieSelectResult = mysqli_fetch_array($selectMovieResult))!=false){
	
		
		$pdf->cell(15,10,$rowMovieSelectResult['cinema_id'],1,0,'C',0);
		$pdf->setFont(GOTHIC,'',8);//�t�H���g�ݒ�
		$pdf->cell(85,10,mb_convert_encoding($rowMovieSelectResult['cinema_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
		$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
		$pdf->cell(40,10,str_replace('-','/',$rowMovieSelectResult['start_day'])."�`".str_replace('-','/',$rowMovieSelectResult['end_day']),1,0,'C',0);
		
		//���J���擾
		$movieScheduleSql = "SELECT COUNT( cinema_id ),screen_id FROM show_schedule WHERE cinema_id='{$rowMovieSelectResult['cinema_id']}' GROUP BY cinema_id ";
		$movieScheduleResult = mysqli_query($con,$movieScheduleSql);
		$rowMovieScheduleResult = mysqli_fetch_array($movieScheduleResult);
		
		$pdf->cell(15,10,$rowMovieScheduleResult[0],1,0,'C',0);
		
		$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowMovieScheduleResult['screen_id']}' GROUP BY show_schedule.screen_id";
		$seatNumResult = mysqli_query($con,$seatNumSql);
		$rowSeatNumResult = mysqli_fetch_array($seatNumResult);
		
		$seatNum = $rowSeatNumResult[0] * $rowMovieScheduleResult[0];
		
		//�����񂶂�Ȃ��ƕ\������Ȃ��H
		$seatNum = strval($seatNum);
		
		$pdf->cell(15,10,$seatNum,1,0,'C',0);
		$pdf->cell(15,10,"��l",1,0,'C',0);
		
		$pdf->cell(15,10,"�q��",1,0,'C',0);
		$pdf->cell(15,10,"�y�A1",1,0,'C',0);
		$pdf->cell(15,10,"�y�A2",1,0,'C',0);
		
		$pdf->cell(15,10,"�V�j�A",1,0,'C',0);
		$pdf->cell(15,10,"�\��",1,0,'C',0);
		$pdf->cell(15,10,"�\��",1,1,'C',0);
	
	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('test','I');

?>