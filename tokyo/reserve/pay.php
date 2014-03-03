<?php
	$pageTitle="支払方法選択";
	require_once("../module/reserveHeader.php");
	
	if(!(isset($_SESSION["userid"]))){
		header("Location:../mypage/login.php");
		return;
	}
?>
<div id="content" class="m15">
  <div class="reserveTitle">
    <h2>お支払い方法を選択してください</h2>
  </div>
  <div class="boxCol2 clearfix">
    <div class="boxCol2Left">
      <div class="reserveTitle mtb20">
        <h3>登録されている決済方法</h3>
      </div>
      <p class="smallText mtb20">登録されている決済方法はありません</p>
      <!--
      <div class="contentAttentionBox mtb20">
        <div class="reserveTitle">
          <h4>クレジットカード決済</h4>
        </div>
        <p class="smallText mtb10">番号：************3432 //番号の下4桁のみ表<br>
          名義人：aaaa aaaa //名義人表示<br>
          有効期限：12/15(M/Y)</p>
        <form action="confirm.php" method="post">
          <input type="hidden"name="sendConfirm"  value="docomoケータイ決済">
          <p class="payBt">
            <input type="image" src="images/paySelect.png" alt="送信する">
          </p>
        </form>
      </div>
      -->
    </div>
    <div class="boxCol2Right">
      <div class="reserveTitle mtb20">
        <h3>その他の決済方法</h3>
      </div>
      
      <div class="contentBox mtb20">
        <div class="reserveTitle">
          <h4>クレジットカード決済</h4>
        </div>
        <p class="smallText mtb10">Master、VISA、JCB、AMEX、DINERSのクレジットカードが利用可能です。</p>
        <form action="confirm.php" method="post">
          <input type="hidden"name="sendConfirm"  value="docomoケータイ決済">
          <p class="payBt">
            <input type="image" src="images/paySelect.png" alt="送信する">
          </p>
        </form>
      </div>
      
      <div class="contentBox mtb20">
        <div class="reserveTitle">
          <h4>docomoケータイ払い</h4>
        </div>
        <p class="smallText mtb10">お支払い金額を月々のdocomoケータイ料金と合算してお支払いいただけます。<br />※ご利用にはSPモードの契約が必要です</p>
        <form action="confirm.php" method="post">
          <input type="hidden"name="sendConfirm"  value="docomoケータイ決済">
          <p class="payBt">
            <input type="image" src="images/paySelect.png" alt="送信する">
          </p>
        </form>
      </div>
      
      <div class="contentBox mtb20">
        <div class="reserveTitle">
          <h4>auかんたん決済</h4>
        </div>
        <p class="smallText mtb10">お支払い金額を月々のauケータイ料金と合算してお支払いいただけます。<br />※au IDのご登録が必要になります。</p>
        <form action="confirm.php" method="post">
          <input type="hidden"name="sendConfirm"  value="docomoケータイ決済">
          <p class="payBt">
            <input type="image" src="images/paySelect.png" alt="送信する">
          </p>
        </form>
      </div>
      
      <div class="contentBox mtb20">
        <div class="reserveTitle">
          <h4>ソフトバンクまとめて支払い</h4>
        </div>
        <p class="smallText mtb10">お支払い金額を月々のSoftBankケータイ料金と合算してお支払いいただけます。<br />※My SoftBankのご登録が必要になります。</p>
        <form action="confirm.php" method="post">
          <input type="hidden"name="sendConfirm"  value="docomoケータイ決済">
          <p class="payBt">
            <input type="image" src="images/paySelect.png" alt="送信する">
          </p>
        </form>
      </div>
      
    </div>
  </div>


<!-- <input type="image" name="sendConfirm" src="images/payBack.png" alt="戻る"> -->
</form>
</div>
</div>



<?php
	require_once("../module/reserveFooter.php");
?>