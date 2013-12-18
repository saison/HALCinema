<?PHP
	require_once("../module/functions.php");
	
	$pageTitle = "アカウント情報";	
	
	require_once("../module/reserveHeader.php");
	
	$con=getConnection();
	
	$userid = 111;//あとで消す
	
	
	//エラー
	$errWord="";
	if(isset($_GET["err"])){
		if($_GET["err"]==001){
			$errWord="編集できませんでした。";
		}else if($_GET["err"]==002){
			$errWord="入力に誤りがあります。";
		}else if($_GET["err"]==000){
			$errWord="パスワードが一致していません。";
		}
	}
	
	//文字コード設定
	if($con!=false){	
			//if(isset($_SESSION["userid"])){
				
				//$selectSql="SELECT * FROM user_master WHERE user_id = '{$_SESSION['userid'] }'";
				$selectSql="SELECT * FROM user_master WHERE user_id = '{$userid}'";
				$selectResult =mysqli_query($con,$selectSql);
				
				while(($row = mysqli_fetch_array($selectResult)) != false){	
							
					$userId = $row[0];//ユーザＩＤ
					$pass=$row[1];//パスワード
					$mail=$row[2];//メール
					$family=$row[3];//氏名
					$first=$row[4];//名前
					$birthday=explode("-",$row[5]);//誕生日
					$prefectures=$row[6];//都道府県
					$address=$row[7];//住所
					$settleFlag=$row[8];//支払方法フラグ
					$mailFlag=$row[10];//メールマガジンフラグ
					$tel=$row[12];//電話番号
					
					
				}	
			//}else{
				//header('Location: login.php');//ログイン処理無効化
			//}
			
		//サーバー切断				
		mysqli_close($con);		
	}
?>

<form action="edit.php" method="post">
<div id="content" class="clearfix">
	<div id="mypageMein">
<h2>アカウント情報</h2>
<?PHP
	if($errWord!=""){
		echo "<p id='newError'>".$errWord."</p>";
	}
?>
<div class="showTable">
<table>
<tr>
<th>ユーザID</th>
<td><?php echo $userId ?></td>
</tr>
<tr>
<th>パスワード</th>
<td><input type="password" name="pass"  value="<?php echo $pass ?>"/></td>
</tr>
<tr>
<th>パスワード再入力</th>
<td><input type="password" name="passAgain"  /></td>
</tr>
<tr>
<th>メールアドレス</th>
<td><input type="email" name="mail"  value="<?php echo $mail ?>"/></td>
</tr>
<tr>
<th>姓</th>
<td><input type="text" name="family" value="<?php echo $family ?>" /></td>
</tr>
<tr>
<th>名</th>
<td><input type="text" name="first"  value="<?php echo $first ?>"/></td>
</tr>
<tr>
<th>生年月日</th>
<td><input type="text" name="year"  size="4" value="<?php echo $birthday[0] ?>"/>年<input type="text" name="month"  size="2" value="<?php echo $birthday[1] ?>"/>月<input type="text" name="day"  size="2" value="<?php echo $birthday[2] ?>" />日</td>
</tr>
<tr>
<th>都道府県</th>
<td><select name="prefectures">
		<option value="" >都道府県</option>
          <?php
			echo prefectures("北海道",$prefectures);
			echo prefectures("青森県",$prefectures);
			echo prefectures("岩手県",$prefectures);
			echo prefectures("宮城県",$prefectures);
			echo prefectures("秋田県",$prefectures);
			echo prefectures("山形県",$prefectures);
			echo prefectures("福島県",$prefectures);
			echo prefectures("茨城県",$prefectures);
			echo prefectures("栃木県",$prefectures);
			echo prefectures("群馬県",$prefectures);
			echo prefectures("埼玉県",$prefectures);
			echo prefectures("千葉県",$prefectures);
			echo prefectures("東京都",$prefectures);
			echo prefectures("神奈川県",$prefectures);
			echo prefectures("新潟県",$prefectures);
			echo prefectures("富山県",$prefectures);
			echo prefectures("石川県",$prefectures);
			echo prefectures("福井県",$prefectures);
			echo prefectures("山梨県",$prefectures);
			echo prefectures("長野県",$prefectures);
			echo prefectures("岐阜県",$prefectures);
			echo prefectures("静岡県",$prefectures);
			echo prefectures("愛知県",$prefectures);
			echo prefectures("三重県",$prefectures);
			echo prefectures("滋賀県",$prefectures);
			echo prefectures("京都府",$prefectures);
			echo prefectures("大阪府",$prefectures);
			echo prefectures("兵庫県",$prefectures);
			echo prefectures("奈良県",$prefectures);
			echo prefectures("和歌山県",$prefectures);
			echo prefectures("鳥取県",$prefectures);
			echo prefectures("島根県",$prefectures);
			echo prefectures("岡山県",$prefectures);
			echo prefectures("広島県",$prefectures);
			echo prefectures("山口県",$prefectures);
			echo prefectures("徳島県",$prefectures);
			echo prefectures("香川県",$prefectures);
			echo prefectures("愛媛県",$prefectures);
			echo prefectures("高知県",$prefectures);
			echo prefectures("福岡県",$prefectures);
			echo prefectures("佐賀県",$prefectures);
			echo prefectures("長崎県",$prefectures);
			echo prefectures("熊本県",$prefectures);
			echo prefectures("大分県",$prefectures);
			echo prefectures("宮崎県",$prefectures);
			echo prefectures("鹿児島県",$prefectures);
			echo prefectures("沖縄県",$prefectures);
		?>
	</select></td>
</tr>
<tr>
<th>住所（都道府県よりあと）</th>
<td><input type="text" name="address"  value="<?php echo $address ?>"/></td>
</tr>
<tr>
<th>電話番号</th>
<td><input type="tel" name="tel"  value="<?php echo $tel ?>" /></td>
</tr>
<tr>
<th>メールマガジン配信</th>
<td><input type="radio" name="mailMaga" value="1"  id="r1"checked><label for="r1"> 希望する</label>　<input type="radio" name="mailMaga" value="0" id="r2"><label for="r2"> 希望しない</label></td>
</tr>

</table>
</div>
	
<p id="sendButton"><input type="submit" value="アカウント情報編集" name="send" id="submitBt" /></p>
</form>
</div>
<div id="mypageNav">
<nav>
<ul>
<li><a href="mypage.php"><img src="images/mypagetop.png" alt="MypageTOP"></a></li>
<li><a href="reserveView.php"><img src="images/reserveall.png" alt="予約一覧"></a></li>	
<li><a href="show.php"><img src="images/accountinfo.png" alt="アカウント情報"></a></li>	
</ul>	
</nav>
</div>
</div>
<?PHP
	require_once("../module/reservefooter.php");
?>