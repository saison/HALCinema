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
	$pdf->write(20,"�X�P�W���[���ꗗ");
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	$pdf->setXY(250,0);//�J�n���W
	$pdf->write(20,$today."�쐬\n");
	$pdf->image("../images/logo.png",223,10);
	
	//�f�挏���擾
  	$con = getConnection();
	$schduleCountSql = "SELECT COUNT(*) FROM show_schedule";
    $schduleCountResult = mysqli_query($con, $schduleCountSql);
	$schduleCount = mysqli_fetch_array($schduleCountResult);

	
	$pdf->setXY(10,30);//�J�n���W
	$pdf->setFillColor(198,198,198);//�w�i�F�ݒ�@
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(30,10,"��f��",1,0,'C',1);
	$pdf->cell(30,10,$schduleCount[0],1,1,'R',0);
	
	//��
	$pdf->cell(30,10,"",0,1,'R',0);
	

	$pdf->cell(25,10,"��fID",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',8);//�t�H���g�ݒ�
	$pdf->cell(15,10,"�X�N���[��",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	$pdf->cell(84,10,"�f�於",1,0,'C',1);
	$pdf->cell(25,10,"��f��",1,0,'C',1);
	
	$pdf->cell(15,10,"����",1,0,'C',1);
	$pdf->cell(15,10,"���Ȑ�",1,0,'C',1);
	$pdf->cell(15,10,"��l",1,0,'C',1);
	
	$pdf->cell(15,10,"�q��",1,0,'C',1);
	$pdf->cell(12,10,"�y�A1",1,0,'C',1);
	$pdf->cell(12,10,"�y�A2",1,0,'C',1);
	
	$pdf->cell(12,10,"�V�j�A",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',8);//�t�H���g�ݒ�
	$pdf->cell(15,10,"�\����Ȑ�",1,0,'C',1);
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	$pdf->cell(15,10,"�\��",1,1,'C',1);
	
	

	$selectScheduleSql = "SELECT * FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id = cinema_master.cinema_id";
	$selectScheduleResult =  mysqli_query($con,$selectScheduleSql);
	
	//�y�[�W�J�E���g
	$pageNo = 1;
	//�X�P�W���[���J�E���g�@�y�[�W�\���Ɏg��
	$scheduleCount = 0;
	
	while(($rowScheduleSelectResult = mysqli_fetch_array($selectScheduleResult))!=false){
		
		//��fID
		$pdf->cell(25,10,$rowScheduleSelectResult['show_id'],1,0,'C',0);
		
		//�X�N���[��
		$pdf->cell(15,10,substr($rowScheduleSelectResult['screen_id'],5,1),1,0,'C',0);
		
		$pdf->setFont(GOTHIC,'',8);//�t�H���g�ݒ�
		
		//�f�於
		$pdf->cell(84,10,mb_convert_encoding($rowScheduleSelectResult['cinema_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
				
		$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
		
		//��f��
		$pdf->cell(25,10,str_replace("-","/",$rowScheduleSelectResult['show_day']),1,0,'C',0);
		
		//����
		$pdf->cell(15,10,substr($rowScheduleSelectResult['start_time'],0,5),1,0,'C',0);
		
		//���Ȑ�
		$seatNumSql ="SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id WHERE show_schedule.screen_id = '{$rowScheduleSelectResult['screen_id']}' GROUP BY show_schedule.screen_id";
		$seatNumResult = mysqli_query($con,$seatNumSql);
		$rowSeatNumResult = mysqli_fetch_array($seatNumResult);

		$pdf->cell(15,10,strval($rowSeatNumResult[0]),1,0
		,'R',0);
		
		
		$reserveCount = 0;//�\��
		
		//movie_reserve_content��show_schedule��show_id�Ō�����cinema_id���擾����@
		//���̃e�[�u����������cinema_id�̂��@��l�̂��݂̂̂�\�����@���𐔂���
		$adultDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0001'AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$adultDateResult = mysqli_query($con,$adultDateSql);
		$rowAdultDateResult = mysqli_fetch_array($adultDateResult);
		
		$pdf->cell(15,10,strval($rowAdultDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowAdultDateResult[0];
		
		//�q���@����l�Ɠ���
		$studentDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0002' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$studentDateResult = mysqli_query($con,$studentDateSql);
		$rowStudentDateResult = mysqli_fetch_array($studentDateResult);
		
		$pdf->cell(15,10,strval($rowStudentDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowStudentDateResult[0];
		
		
		//�y�A1�@����l�Ɠ���
		$pear1DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0003' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$pear1DateResult = mysqli_query($con,$pear1DateSql);
		$rowPear1DateResult = mysqli_fetch_array($pear1DateResult);
		$pdf->cell(12,10,strval($rowPear1DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear1DateResult[0]*2;
		
		//�y�A2�@����l�Ɠ���
		$pear2DateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0004' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$pear2DateResult = mysqli_query($con,$pear2DateSql);
		$rowPear2DateResult = mysqli_fetch_array($pear2DateResult);
		$pdf->cell(12,10,strval($rowPear2DateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowPear2DateResult[0]*2;
		
		//�V�j�A�@����l�Ɠ���
		$seniorDateSql = "SELECT COUNT(movie_reserve_content.movie_price_id) FROM movie_reserve_content INNER JOIN show_schedule ON movie_reserve_content.show_id = show_schedule.show_id WHERE show_schedule.cinema_id='{$rowScheduleSelectResult['cinema_id']}' AND movie_reserve_content.movie_price_id = 'mp0005' AND movie_reserve_content.show_id='{$rowScheduleSelectResult['show_id']}'";
		$seniorDateResult = mysqli_query($con,$seniorDateSql);
		$rowSeniorDateResult = mysqli_fetch_array($seniorDateResult);
		$pdf->cell(12,10,strval($rowSeniorDateResult[0]),1,0,'R',0);
		
		$reserveCount += $rowSeniorDateResult[0];

		//�\��
		
		$pdf->cell(15,10,strval($reserveCount),1,0,'R',0);
		
		//�\��
		
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
			$pdf->cell(25,10,"��fID",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',8);//�t�H���g�ݒ�
			$pdf->cell(15,10,"�X�N���[��",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
			$pdf->cell(84,10,"�f�於",1,0,'C',1);
			$pdf->cell(25,10,"��f��",1,0,'C',1);
			
			$pdf->cell(15,10,"����",1,0,'C',1);
			$pdf->cell(15,10,"���Ȑ�",1,0,'C',1);
			$pdf->cell(15,10,"��l",1,0,'C',1);
			
			$pdf->cell(15,10,"�q��",1,0,'C',1);
			$pdf->cell(12,10,"�y�A1",1,0,'C',1);
			$pdf->cell(12,10,"�y�A2",1,0,'C',1);
			
			$pdf->cell(12,10,"�V�j�A",1,0,'C',1);
			$pdf->cell(15,10,"�\��",1,0,'C',1);
			$pdf->cell(15,10,"�\��",1,1,'C',1);
			$scheduleCount++;
			$pageNo++;
		}else if( $scheduleCount % 17 ==12){
			$pdf->cell(275,7,"page ".strval($pageNo),0,1,'R',0);
			$pdf->cell(25,10,"��fID",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',8);//�t�H���g�ݒ�
			$pdf->cell(15,10,"�X�N���[��",1,0,'C',1);
			$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
			$pdf->cell(84,10,"�f�於",1,0,'C',1);
			$pdf->cell(25,10,"��f��",1,0,'C',1);
			
			$pdf->cell(15,10,"����",1,0,'C',1);
			$pdf->cell(15,10,"���Ȑ�",1,0,'C',1);
			$pdf->cell(15,10,"��l",1,0,'C',1);
			
			$pdf->cell(15,10,"�q��",1,0,'C',1);
			$pdf->cell(12,10,"�y�A1",1,0,'C',1);
			$pdf->cell(12,10,"�y�A2",1,0,'C',1);
			
			$pdf->cell(12,10,"�V�j�A",1,0,'C',1);
			$pdf->cell(15,10,"�\��",1,0,'C',1);
			$pdf->cell(15,10,"�\��",1,1,'C',1);
	$scheduleCount++;
			$pageNo++;
		}
		
		
	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('schedulePdf','I');
	
	

?>