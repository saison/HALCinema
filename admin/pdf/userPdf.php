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
	$pdf->write(20,"���[�U�[�ꗗ");
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	$pdf->setXY(250,0);//�J�n���W
	$pdf->write(20,$today."�쐬\n");
	$pdf->image("../images/logo.png",223,10);
	
	//�f�挏���擾
  	$con = getConnection();
	$userCountSql = "SELECT COUNT(*) FROM user_master WHERE logic_delete_flag = 0";
    $userCountResult = mysqli_query($con, $userCountSql);
	$userCount = mysqli_fetch_array($userCountResult);
	mysqli_close($con);
	
	$pdf->setXY(10,30);//�J�n���W
	$pdf->setFillColor(198,198,198);//�w�i�F�ݒ�@
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(30,10,"���[�U�[��",1,0,'C',1);
	$pdf->cell(30,10,$userCount[0],1,1,'R',0);
	
	//��
	$pdf->cell(30,10,"",0,1,'R',0);
	

	$pdf->cell(15,10,"���ID",1,0,'C',1);
	$pdf->cell(65,10,"���[���A�h���X",1,0,'C',1);
	$pdf->cell(35,10,"��",1,0,'C',1);
	
	$pdf->cell(35,10,"��",1,0,'C',1);
	$pdf->cell(30,10,"���N����",1,0,'C',1);
	$pdf->cell(15,10,"�N��",1,0,'C',1);
	
	$pdf->cell(20,10,"�s���{��",1,0,'C',1);
	$pdf->cell(20,10,"�|�C���g",1,0,'C',1);
	$pdf->cell(25,10,"�����}�Kflag",1,1,'C',1);

	
	
	
	$con=getConnection();
	$selectUserSql = "SELECT * FROM user_master  WHERE logic_delete_flag = 0";
	$selectUserResult =  mysqli_query($con,$selectUserSql);
	

	while(($rowUserSelectResult = mysqli_fetch_array($selectUserResult))!=false){
	
		
		$pdf->cell(15,10,$rowUserSelectResult['user_id'],1,0,'C',0);
		$pdf->cell(65,10,$rowUserSelectResult['user_mail'],1,0,'L',0);
		$pdf->cell(35,10,mb_convert_encoding($rowUserSelectResult['family_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
		
		$pdf->cell(35,10,mb_convert_encoding($rowUserSelectResult['first_name'], "SJIS-win", "UTF-8"),1,0,'L',0);
		$pdf->cell(30,10,str_replace("-","/",$rowUserSelectResult['birthday']),1,0,'C',0);
		
		//�N��v�Z�@(�����̓��t-�a����)/10000���āA�����_��؎̂Ă�Β��ȒP�ɂ��Ƃ܂�I�I
		$now = date('Ymd');
		$birthday = str_replace("-","",$rowUserSelectResult['birthday']);
		$pdf->cell(15,10,strval(floor(($now-intval($birthday))/10000)),1,0,'R',0);	
		
		$pdf->cell(20,10,mb_convert_encoding($rowUserSelectResult['prefectures'], "SJIS-win", "UTF-8"),1,0,'C',0);
		$pdf->cell(20,10,$rowUserSelectResult['hal_cinema_point'],1,0,'R',0);
		
		if($rowUserSelectResult['mail_magazine_flag']==1){
			$pdf->cell(25,10,"��M����",1,1,'C',0);
		}else if($rowUserSelectResult['mail_magazine_flag']==0){
			$pdf->cell(25,10,"��M���Ȃ�",1,1,'C',0);
			
		}

	}
	
	mysqli_close($con);
	
	
	
	$pdf->output('userPdf','I');

?>