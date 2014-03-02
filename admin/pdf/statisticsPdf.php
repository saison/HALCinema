<?php
	require_once("../../tokyo/module/functions.php");
	require('mbfpdf.php');
	$con = getConnection();
	
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
	$pdf->write(20,"���v");
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	$pdf->setXY(250,0);//�J�n���W
	$pdf->write(20,$today."�쐬\n");
	$pdf->image("../images/logo.png",223,10);
	
	
	
	
	//�f�[�^�擾����
	$pdf->setXY(10,30);//�J�n���W
	$pdf->setFillColor(198,198,198);//�w�i�F�ݒ�@
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(40,10,"�f�[�^����",1,0,'C',1);
	//��ԌÂ��������߂�@
	$oldDaySql = "SELECT MIN(show_day) FROM show_schedule";
	$oldDaySqlResult = mysqli_query($con,$oldDaySql);
	$oldDay = mysqli_fetch_array($oldDaySqlResult);
	
	$pdf->cell(100,10,str_replace('-','/',$oldDay[0]) . "�`" . $today,1,1,'L',0);
	
	//��
	$pdf->cell(30,10,"",0,1,'R',0);
	
	$pdf->setFont(GOTHIC,'',13);//�t�H���g�ݒ�
	$pdf->cell(30,10,"�\���",0,1,'L',0);
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	
	$pdf->cell(100,10,"�\��",0,0,'L',0);
	$pdf->cell(100,10,"�\�񗦊���",0,1,'L',0);
	
	
	
	
	
	$pdf->cell(30,10,"��f��",1,0,'C',1);
	
	//��f��
	
	$countSql = "SELECT COUNT(*) FROM show_schedule";
	$countSqlResult = mysqli_query($con,$countSql);
	$showScheduleCount = mysqli_fetch_array($countSqlResult);
	$pdf->cell(50,10,$showScheduleCount[0],1,0,'R',0);
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(30,10,"",1,0,'R',0);
	$pdf->cell(20,10,"��l",1,0,'C',1);
	$pdf->cell(20,10,"�w��",1,0,'C',1);
	$pdf->cell(20,10,"�y�A�P",1,0,'C',1);
	$pdf->cell(20,10,"�y�A�Q",1,0,'C',1);
	$pdf->cell(20,10,"�V�j�A",1,0,'C',1);
	$pdf->cell(20,10,"���v",1,1,'C',1);
	
	
	
	
	$pdf->cell(30,10,"���v���Ȑ�",1,0,'C',1);
	
	//���v���Ȑ�
	$seatNum = 0;
	$selectScheduleSql = "SELECT screen_master.seat_number FROM show_schedule INNER JOIN screen_master ON screen_master.screen_id = show_schedule.screen_id";
	$selectScheduleResult =  mysqli_query($con,$selectScheduleSql);
	while(($rowScheduleSelectResult = mysqli_fetch_array($selectScheduleResult))!=false){
		$seatNum += $rowScheduleSelectResult[0];
	}
	$pdf->cell(50,10,strval($seatNum),1,0,'R',0);
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(30,10,"�\����Ȑ�",1,0,'C',1);
	
	//�\����Ȑ��@��l
	$countReserveAdultSql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0001'";//mp0001�ŏ������ႤSQL���Ă�΂������c
	$countReserveAdultSqlResult = mysqli_query($con,$countReserveAdultSql);
	$reserveAdultCount = mysqli_fetch_array($countReserveAdultSqlResult);
	$pdf->cell(20,10,$reserveAdultCount[0],1,0,'C',0);
	
	//�\����Ȑ��@�q��
	$countReserveStudentSql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0002'";
	$countReserveStudentSqlResult = mysqli_query($con,$countReserveStudentSql);
	$reserveStudentCount = mysqli_fetch_array($countReserveStudentSqlResult);
	$pdf->cell(20,10,$reserveStudentCount[0],1,0,'C',0);
	
	//�\����Ȑ��@�y�A�P
	$countReservePear1Sql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0003'";
	$countReservePear1SqlResult = mysqli_query($con,$countReservePear1Sql);
	$reservePear1Count = mysqli_fetch_array($countReservePear1SqlResult);
	$pdf->cell(20,10,$reservePear1Count[0],1,0,'C',0);
	
	//�\����Ȑ��@�y�A�Q
	$countReservePear2Sql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0004'";
	$countReservePear2SqlResult = mysqli_query($con,$countReservePear2Sql);
	$reservePear2Count = mysqli_fetch_array($countReservePear2SqlResult);
	$pdf->cell(20,10,$reservePear2Count[0],1,0,'C',0);
	
	//�\����Ȑ��@�V�j�A
	$countReserveSenirSql = "SELECT COUNT(*) FROM movie_reserve_content WHERE movie_price_id = 'mp0005'";
	$countReserveSenirSqlResult = mysqli_query($con,$countReserveSenirSql);
	$reserveSenirCount = mysqli_fetch_array($countReserveSenirSqlResult);
	$pdf->cell(20,10,$reserveSenirCount[0],1,0,'C',0);
	
	//�\����Ȑ��@���v
	$countReserveSql = "SELECT COUNT(*) FROM movie_reserve_content";
	$countReserveSqlResult = mysqli_query($con,$countReserveSql);
	$reserveCount = mysqli_fetch_array($countReserveSqlResult);
	$pdf->cell(20,10,$reserveCount[0],1,1,'C',0);
	
	
	$pdf->cell(30,10,"�\����Ȑ�",1,0,'C',1);
	
	//�\����Ȑ�
	
	$pdf->cell(50,10,$reserveCount[0],1,0,'R',0);
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(30,10,"�\��",1,0,'C',1);
	//�\�񗦑�l
	$reserveAdultRateNum = $reserveAdultCount[0]/$reserveCount[0];
	$reserveAdultRateNum = round($reserveAdultRateNum*100,2);
	$reserveAdultRate = strval($reserveAdultRateNum)."%";
	$pdf->cell(20,10,$reserveAdultRate,1,0,'C',0);
	
	//�\�񗦎q��
	$reserveStudentRateNum = $reserveStudentCount[0]/$reserveCount[0];
	$reserveStudentRateNum = round($reserveStudentRateNum*100,2);
	$reserveStudentRate = strval($reserveStudentRateNum)."%";
	$pdf->cell(20,10,$reserveStudentRate,1,0,'C',0);
	
	//�\�񗦃y�A1
	$reservePear1RateNum = $reservePear1Count[0]/$reserveCount[0];
	$reservePear1RateNum = round($reservePear1RateNum*100,2);
	$reservePear1Rate = strval($reservePear1RateNum)."%";
	$pdf->cell(20,10,$reservePear1Rate,1,0,'C',0);
	
	
	//�\�񗦃y�A2
	$reservePear2RateNum = $reservePear2Count[0]/$reserveCount[0];
	$reservePear2RateNum = round($reservePear2RateNum*100,2);
	$reservePear2Rate = strval($reservePear2RateNum)."%";
	$pdf->cell(20,10,$reservePear2Rate,1,0,'C',0);
	
	//�\�񗦃V�j�A
	$reserveSenirRateNum = $reserveSenirCount[0]/$reserveCount[0];
	$reserveSenirRateNum = round($reserveSenirRateNum*100,2);
	$reserveSenirRate = strval($reserveSenirRateNum)."%";
	$pdf->cell(20,10,$reserveSenirRate,1,0,'C',0);
	$pdf->cell(20,10,"100%",1,0,'C',0);

	
	
	
	//��
	$pdf->cell(30,10,"",0,1,'R',0);
	$pdf->cell(30,10,"",0,1,'R',0);
	
	$pdf->setFont(GOTHIC,'',13);//�t�H���g�ݒ�
	$pdf->cell(30,10,"�A�J�E���g���",0,1,'L',0);
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	
	$pdf->cell(100,10,"�j���l���E�䗦",0,0,'L',0);
	$pdf->cell(100,10,"�N��ʒj���l��",0,1,'L',0);
	
	
	
	
	
	
	$pdf->cell(20,10,"",1,0,'R',0);
	$pdf->cell(20,10,"�j��",1,0,'C',1);
	$pdf->cell(20,10,"����",1,0,'C',1);
	$pdf->cell(20,10,"���v",1,0,'C',1);
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"",1,0,'R',0);
	$pdf->cell(20,10,"�`10��",1,0,'C',1);
	$pdf->cell(20,10,"20��",1,0,'C',1);
	$pdf->cell(20,10,"30��",1,0,'C',1);
	$pdf->cell(20,10,"40��",1,0,'C',1);
	$pdf->cell(20,10,"50��",1,0,'C',1);
	$pdf->cell(20,10,"60��",1,0,'C',1);
	$pdf->cell(20,10,"70��`",1,0,'C',1);
	$pdf->cell(20,10,"���v",1,1,'C',1);
	
	
	
	$pdf->cell(20,10,"�l��",1,0,'C',1);
	$pdf->cell(20,10,"4",1,0,'C',0);
	$pdf->cell(20,10,"0",1,0,'C',0);
	//�A�J�E���g���v
	$userCountSql = "SELECT COUNT(*) FROM user_master WHERE logic_delete_flag = 0";
    $userCountResult = mysqli_query($con, $userCountSql);
	$userCount = mysqli_fetch_array($userCountResult);
	$pdf->cell(20,10,$userCount[0],1,0,'C',0);
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"�j��",1,0,'C',1);
	
	
	$age10 = 0;//�`10��
	$age20 = 0;//20��
	$age30 = 0;//30��
	$age40 = 0;//40��
	$age50 = 0;//50��
	$age60 = 0;//60��
	$age70 = 0;//70��`
	$selectUserSql = "SELECT birthday FROM user_master  WHERE logic_delete_flag = 0";
	$selectUserResult =  mysqli_query($con,$selectUserSql);
	while(($rowUserSelectResult = mysqli_fetch_array($selectUserResult))!=false){
		//�N��v�Z�@(�����̓��t-�a����)/10000���āA�����_��؎̂Ă�Β��ȒP�ɂ��Ƃ܂�I�I
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
	
	
	
	
	
	
	$pdf->cell(20,10,"����",1,0,'C',1);
	$pdf->cell(20,10,"100%",1,0,'C',0);
	$pdf->cell(20,10,"0%",1,0,'C',0);
	
	$pdf->cell(20,10,"",0,0,'C',0);
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"����",1,0,'C',1);
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
	
	//��
	$pdf->cell(20,10,"",0,0,'R',0);
	
	$pdf->cell(20,10,"���v",1,0,'C',1);
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