<?PHP
	$pageTitle = "会員登録";
	require_once("../module/reserveheader.php");
?>
<div id="content">
<h2>新規会員登録</h2>
<p id="newUser">HALCinemaでは映画座席予約を利用するためには会員登録が必要となっています。以下のすべての項目を埋めてください。</p>
<!--  エラー表示時は#newErrorをpタグなどに指定するとCSSが適応されます-->
<form action="comfirm.php" method="post">
<div class="newTable">
<table>
<tr>
<th>お好きなユーザID</th>
<td><input type="text" name="userId" /></td>
</tr>
<tr>
<th>パスワード</th>
<td><input type="password" name="pass" /></td>
</tr>
<tr>
<th>パスワード再入力</th>
<td><input type="password" name="passAgain" /></td>
</tr>
<tr>
<th>メールアドレス</th>
<td><input type="email" name="mail" /></td>
</tr>
<tr>
<th>性</th>
<td><input type="text" name="family" /></td>
</tr>
<tr>
<th>名</th>
<td><input type="text" name="first" /></td>
</tr>
<tr>
<th>都道府県</th>
<td><select name="prefectures">
		<option value="" selected>都道府県</option>
		<option value="北海道">北海道</option>
		<option value="青森県">青森県</option>
		<option value="岩手県">岩手県</option>
		<option value="宮城県">宮城県</option>
		<option value="秋田県">秋田県</option>
		<option value="山形県">山形県</option>
		<option value="福島県">福島県</option>
		<option value="茨城県">茨城県</option>
		<option value="栃木県">栃木県</option>
		<option value="群馬県">群馬県</option>
		<option value="埼玉県">埼玉県</option>
		<option value="千葉県">千葉県</option>
		<option value="東京都">東京都</option>
		<option value="神奈川県">神奈川県</option>
		<option value="新潟県">新潟県</option>
		<option value="富山県">富山県</option>
		<option value="石川県">石川県</option>
		<option value="福井県">福井県</option>
		<option value="山梨県">山梨県</option>
		<option value="長野県">長野県</option>
		<option value="岐阜県">岐阜県</option>
		<option value="静岡県">静岡県</option>
		<option value="愛知県">愛知県</option>
		<option value="三重県">三重県</option>
		<option value="滋賀県">滋賀県</option>
		<option value="京都府">京都府</option>
		<option value="大阪府">大阪府</option>
		<option value="兵庫県">兵庫県</option>
		<option value="奈良県">奈良県</option>
		<option value="和歌山県">和歌山県</option>
		<option value="鳥取県">鳥取県</option>
		<option value="島根県">島根県</option>
		<option value="岡山県">岡山県</option>
		<option value="広島県">広島県</option>
		<option value="山口県">山口県</option>
		<option value="徳島県">徳島県</option>
		<option value="香川県">香川県</option>
		<option value="愛媛県">愛媛県</option>
		<option value="高知県">高知県</option>
		<option value="福岡県">福岡県</option>
		<option value="佐賀県">佐賀県</option>
		<option value="長崎県">長崎県</option>
		<option value="熊本県">熊本県</option>
		<option value="大分県">大分県</option>
		<option value="宮崎県">宮崎県</option>
		<option value="鹿児島県">鹿児島県</option>
		<option value="沖縄県">沖縄県</option>
	</select></td>
</tr>
<tr>
<th>住所（都道府県よりあと）</th>
<td><input type="text" name="address" /></td>
</tr>
<tr>
<th>電話番号</th>
<td><input type="tel" name="tel" /></td>
</tr>
</table>
</div>

<!--
	<p><label>ユーザID:</label></p>
	<p><label>パスワード:</label></p>
	<p><label>メールアドレス:</label></p>
	<p><label>姓:</label></p>
	<p><label>名:</label></p>
	<p><label>
	お住まい:
	
	</label></p>
	<p><label>電話番号: </label></p>
    -->
	<p id="sendButton"><button type="button" name="" value="" class="css3button">確認画面に進む</button></p>
</form>
</div>
<?PHP
	require_once("../module/reservefooter.php");
?>