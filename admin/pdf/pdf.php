
<?php

if(isset($_POST['send'])){
	
	//���i�P
	$name1 = $_POST['name1'];
	$price1 = $_POST['price1'];
	$num1 = $_POST['num1'];
	
	//���i�Q
	$name2 = $_POST['name2'];
	$price2 = $_POST['price2'];
	$num2 = $_POST['num2'];
	
	//���i�R
	$name3 = $_POST['name3'];
	$price3 = $_POST['price3'];
	$num3 = $_POST['num3'];
	
	$sum1 = $price1*$num1;//���z�P
	$sum2 =	$price2*$num2;//���z�Q
	$sum3 = $price3*$num3;//���z�R
	
	$syoukei = $sum1+$sum2+$sum3;//���v
	
	$all = ceil(($sum1+$sum2+$sum3)*1.05);//�����z
	
	$zei = ceil(($sum1+$sum2+$sum3)*0.05);//�����
	
	$today = date('Y/m/d');
	
	require('mbfpdf.php');
	//�C���X�^���X��
	
	$pdf = new MbfPdf('P','mm','A4');
	
	//�t�H���g�o�^
	
	$pdf->addMbFont(GOTHIC,'SJIS');
	
	//pdf�t�@�C���I�[�v��
	
	$pdf->open();
	
	//�y�[�W�ǉ�
	
	$pdf->addPage();
	
	//�g�p�t�H���g�w��
	
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	
	
	$pdf->setXY(165,0);//�J�n���W
	$pdf->write(10,$today."\n");
	$pdf->write(10,"��160-0023\n");
	$pdf->write(0,"�����s�V�h�搼�V�h1-7-3\n");
	
	$pdf->setFont(GOTHIC,'',20);//�t�H���g�ݒ�
	$pdf->write(20,"HAL ���� �䒆\n");
	
	$pdf->image("img/logo.png",120,40);
	
	$pdf->setFont(GOTHIC,'',10);//�t�H���g�ݒ�
	
	$pdf->setXY(110,60);//�J�n���W
	$pdf->write(10,"��160-0023\n");
	
	$pdf->setXY(110,60);//�J�n���W
	$pdf->write(20,"�����s�V�h�搼�V�h1-7-3\n");
	
	$pdf->setXY(110,60);//�J�n���W
	$pdf->write(30,"TEL:03-XXXX-XXXX\n");
	
	$pdf->setXY(110,60);//�J�n���W
	$pdf->write(40,"FAX:03-XXXX-XXXX\n");
	
	$pdf->setFont(GOTHIC,'',15);//�t�H���g�ݒ�
	
	$pdf->write(0,"���肪�Ƃ��������܂��B���L�̒ʂ�A�����\���グ�܂�\n");
	
	$pdf->setXY(10,110);//�J�n���W
	$pdf->cell(170,10,"���v���z        \\".$all,'B',1,'L',0);

	
	//�Z���̕\��
	
	$pdf->setXY(10,130);//�J�n���W
	$pdf->setFont(GOTHIC,'',12);//�t�H���g�ݒ�
	$pdf->setTextColor(255,255,255);//�����F�ݒ�@��
	$pdf->setFillColor(0,0,0);//�w�i�F�ݒ�@��
	$pdf->cell(60,10,'���i��',1,0,'C',1);
	$pdf->cell(30,10,'���i',1,0,'C',1);
	$pdf->cell(30,10,'��',1,0,'C',1);
	$pdf->cell(50,10,'���z',1,1,'C',1);
	
	
	//���i�P�Z��
	
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(60,10,mb_convert_encoding($name1, "SJIS-win", "UTF-8"),1,0,'L',0);
	$pdf->cell(30,10,"$price1",1,0,'R',0);
	$pdf->cell(30,10,"$num1",1,0,'R',0);
	$pdf->cell(50,10,"$sum1",1,1,'R',0);
	
	//���i�Q�Z��
	
	$pdf->cell(60,10,mb_convert_encoding($name2, "SJIS-win", "UTF-8"),1,0,'L',0);
	$pdf->cell(30,10,"$price2",1,0,'R',0);
	$pdf->cell(30,10,"$num2",1,0,'R',0);
	$pdf->cell(50,10,"$sum2",1,1,'R',0);
	
	//���i�R�Z��
	
	$pdf->cell(60,10,mb_convert_encoding($name3, "SJIS-win", "UTF-8"),1,0,'L',0);
	$pdf->cell(30,10,"$price3",1,0,'R',0);
	$pdf->cell(30,10,"$num3",1,0,'R',0);
	$pdf->cell(50,10,"$sum3",1,1,'R',0);
	
	//�󔒃Z��
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(50,10,'',0,1,'C',0);
	
	//���v
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->setTextColor(255,255,255);//�����F�ݒ�@��
	$pdf->cell(30,10,'���v',1,0,'C',1);
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(50,10,"$syoukei",1,1,'R',0);
	
	//�����
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->setTextColor(255,255,255);//�����F�ݒ�@��
	$pdf->cell(30,10,'�����(5%)',1,0,'C',1);
	$pdf->setTextColor(0,0,0);//�����F�ݒ�@��
	$pdf->cell(50,10,"$zei",1,1,'R',0);
	
	//�󔒃Z��
	
	$pdf->cell(60,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(30,10,'',0,0,'C',0);
	$pdf->cell(50,10,'',0,1,'C',0);
	
	//���l
	
	$pdf->cell(170,15,'���l�F',1,0,'L',0);
	
	
	$pdf->output('test','I');
}

?>
