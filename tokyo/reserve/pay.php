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

<div class="payEach">
<div class="payEachLeft">
<h4>クレジットカード決済</h4>
<p>Master、VISA、JCB、AMEX、DINERSのクレジットカードが利用可能です。</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm"  value="クレジットカード決済" src="images/paySelect.png" alt="送信する">
</form>
</div>
<div class="clear"></div>
</div>

<div class="payEach">
<div class="payEachLeft">
<h4>docomoケータイ払い</h4>
<p>お支払い金額を月々のdocomoケータイ料金と合算してお支払いいただけます。<br />※ご利用にはSPモードの契約が必要です。</p>
</div>
<div class="payEachRight">
<form action="confirm.php" method="post">
<input type="image" name="sendConfirm"  value="docomoケータイ払い" src="images/paySelect.png" alt="送信する">
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
<input type="image" name="sendConfirm"  value="auかんたん決済"  src="images/paySelect.png" alt="送信する">
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
<input type="image" name="sendConfirm"  value="ソフトバンクまとめて支払い" src="images/paySelect.png" alt="送信する">
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