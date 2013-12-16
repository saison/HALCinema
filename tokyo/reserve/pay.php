<?php
	$pageTitle="支払方法選択";
	require_once("../module/reserveHeader.php");
?>

<!-- ここ中身 -->
<div id="content">
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->
<div class="reserveTitle">
  <h3>お支払い方法を選択してください</h3>
</div>
<h4>登録されている決済方法</h4>
<!--ここから--->	
<div class="payEach clearfix">
<div class="payEachLeft">
<h4>クレジットカード決済</h4>//クレジットカード決済表示の場合。キャリア決済の場合は以下の情報はいらないです。
<p class="mini">番号：************3432<br>//番号の下4桁のみ表示
名義人：aaaa aaaa<br>//名義人表示
有効期限：12/15(M/Y)</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm" src="images/paySelect.png" alt="送信する">
</form>
</div>
</div>
<!--ここまで-->
<!--ここから--->	
<div class="payEach clearfix">
<div class="payEachLeft">
<h4>docomoケータイ決済</h4>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm" src="images/paySelect.png" alt="送信する">
</form>
</div>
</div>
<!--ここまで-->
<h4>その他の決済方法を選択する</h4>
<div class="payEach clearfix">
<div class="payEachLeft">
<h4>クレジットカード決済</h4>
<p>Master、VISA、JCB、AMEX、DINERSのクレジットカードが利用可能です。</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm" src="images/paySelect.png" alt="送信する">
</form>
</div>
</div>

<div class="payEach">
<div class="payEachLeft">
<h4>docomoケータイ払い</h4>
<p>お支払い金額を月々のdocomoケータイ料金と合算してお支払いいただけます。<br />※ご利用にはSPモードの契約が必要です。</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm" src="images/paySelect.png" alt="送信する">
</form>
</div>
<div class="clear"></div>
</div>

<div class="payEach">
<div class="payEachLeft">
<h4>auかんたん決済</h4>
<p>お支払い金額を月々のauケータイ料金と合算してお支払いいただけます。<br />※au IDのご登録が必要になります。</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm" src="images/paySelect.png" alt="送信する">
</form>
</div>
<div class="clear"></div>
</div>

<div class="payEach">
<div class="payEachLeft">
<h4>ソフトバンクまとめて支払い</h4>
<p>お支払い金額を月々のSoftBankケータイ料金と合算してお支払いいただけます。<br />※My SoftBankのご登録が必要になります。</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm" src="images/paySelect.png" alt="送信する">
</form>
</div>
<div class="clear"></div>
</div>
<div id="payBack">
<form action="confirm.php" method="post">
<!-- <input type="image" name="sendConfirm" src="images/payBack.png" alt="戻る"> -->
</form>
</div>
</div>



<?php
	require_once("../module/reserveFooter.php");
?>