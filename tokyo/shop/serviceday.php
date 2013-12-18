<?PHP
	$pageTitle = "劇場案内";
	require_once("../module/header.php");
?>

<!--メインコンテンツが先、ナビ部分は後-->
<div class="contentTitle" id="theatesTitle">
    <h2>サービス<span class="h2En">Service Info.</span></h2>
  </div>
<div id="mainContent"><!--メインコンテンツ-->
  
  <!-- ここからcontent -->
  <!-- ここh2タイトル -->
  <div class="clearfix">
    <div id="subnav"><!-- w200px -->
    	<ul>
            <li><a href="#serviceDay">料金&amp;サービスデー</a></li>
            <li><a href="#ticket">チケット購入方法</a></li>
        </ul>
    </div>
    <div id="rightMeinContent"><!-- w950px m-l30px -->
      

      <!-- サービスデー -->
      <div class="shopH3Title">
        <h3 class="ribbon" id="serviceDay">料金一覧</h3>
      </div>
      <div class="shopContents">
        <table class="pricelist">
          <tr class="none">
            <td>一般</td>
            <td class="right">&yen;1,800</td>
          </tr>
          <tr>
            <td>3D鑑賞</td>
            <td class="right">&yen;1,800</td>
          </tr>
          <tr>
            <td>学生(小・中・高・大生)
              <span class="caution">＊要学生証</span></td>
            <td class="right">&yen;1,500</td>
          </tr>
        </table>
        <p id="priceListP"> ＊前売り券ご利用のお客様は座席指定券との引き換えが必要でございます（前売り券ご利用の場合当サイトからは予約することができません）。<br />
          ＊他劇場発行のCINEMA TICKET、招待券等はご利用いただけませんので、ご注意下さい。<br />
          ＊当映画館では当サイトのみ7日前からチケットを購入することができます。 </p>
      </div>

      <!-- チケット購入方法 -->
      <div class="shopH3Title">
        <h3 class="ribbon" id="ticket">チケット購入方法</h3>
      </div>
      <div class="shopContents">
        <h4>1.オンラインでチケット購入</h4>
        <p>HALCinemaなら、映画チケットはパソコン・携帯電話から事前に購入できます。クレジットカード、docomo･au･SoftBankのキャリア決済も利用可能です。（現金での決済は取り扱いしておりません）</p>
        <h4>2.ペアシートを完備</h4>
        <p>一部のスクリーンにはペアシートを完備しています。ペアシートはペア･お一人様どちらでも利用可能です。 </p>
        <h4>3.あなただけのシートをキープ</h4>
        <p>当館のすべての上映は定員入れ替え制です。立ち見なしでゆったりと作品をご鑑賞ください。 </p>
      </div>

    </div><!-- / #rightMeinContent -->
  </div>
</div>
<!-- / #mainContent -->
<?PHP
	require_once("../module/footer.php");
?>