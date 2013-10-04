<?PHP
	$pageTitle = "劇場案内";
	require_once("../module/header.php");
?>

<!--メインコンテンツが先、ナビ部分は後-->
<div id="mainContent"><!--メインコンテンツ-->
  <div class="contentTitle">
    <h2>劇場案内<br />
      <span class="h2En">Theater Info.</span></h2>
  </div>
  <!-- ここからcontent --> 
  <!-- ここh2タイトル -->
  <div class="clearfix">
    <div id="subnav"><!-- w200px --> 
    	<ul>
        	<li><a href="#movieInfo">劇場案内</a></li>
            <li><a href="#serviceDay">料金&amp;サービスデー</a></li>
            <li><a href="#ticket">チケット購入方法</a></li>
            <li><a href="#point">ハルシネマポイント</a></li>
            <li><a href="#merumaga">ハルシネマメールマガジン</a></li>
        </ul>
    </div>
    <div id="rightMeinContent"><!-- w950px m-l30px --> 
      <!-- 劇場案内 -->
      <div class="shopH3Title">
        <h3 id="movieInfo">劇場案内</h3>
      </div>
      <div class="shopContents">
        <p>お好きな映画が選べる8スクリーン。約1,600席のシネマコンプレックス！無料駐車場4,000台。大型のショッピングモールも併設してますので、ショッピングからエンターテインメントまで1日中お楽しみいただけます。</p>
        <br />
        <h4>スクリーン</h4>
        <table class="movieInfoTable" style="margin-bottom:25px;">
          <tr>
            <th style="width:20%;">スクリーン</th>
            <th style="width:20%;">座席数＋車椅子用スペース</th>
            <th style="width:30%;">デジタル音響</th>
          </tr>
          <tr>
            <td>SCREEN 1</td>
            <td>296+(4)</td>
            <td>ドルビーアトモス</td>
          </tr>
          <tr>
            <td>SCREEN 2</td>
            <td>296+(4)</td>
            <td>ドルビーアトモス</td>
          </tr>
          <tr>
            <td>SCREEN 3</td>
            <td>296+(4)</td>
            <td>ドルビーアトモス</td>
          </tr>
          <tr>
            <td>SCREEN 4</td>
            <td>196+(4)</td>
            <td>ドルビーサラウンド 7.1</td>
          </tr>
          <tr>
            <td>SCREEN 5</td>
            <td>196+(4)</td>
            <td>ドルビーサラウンド 7.1</td>
          </tr>
          <tr>
            <td>SCREEN 6</td>
            <td>196+(4)</td>
            <td>ドルビーサラウンド 7.1</td>
          </tr>
          <tr>
            <td>SCREEN 7</td>
            <td>96+(4)</td>
            <td>ドルビーサラウンド 7.1</td>
          </tr>
          <tr>
            <td>SCREEN 8</td>
            <td>96+(4)</td>
            <td>ドルビーサラウンド 7.1</td>
          </tr>
          <tr>
            <td><strong>8スクリーン</strong></td>
            <td><strong>1568+(32)</strong></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      
      <!-- サービスデー -->
      <div class="shopH3Title">
        <h3 id="serviceDay">料金一覧</h3>
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
              <p class="caution">＊要学生証</p></td>
            <td class="right">&yen;1,500</td>
          </tr>
        </table>
        <p id="priceListP"> ＊前売り券ご利用のお客様は座席指定券との引き換えが必要でございます（前売り券ご利用の場合当サイトからは予約することができません）。<br />
          ＊他劇場発行のCINEMA TICKET、招待券等はご利用いただけませんので、ご注意下さい。<br />
          ＊当映画館では当サイトのみ7日前からチケットを購入することができます。 </p>
      </div>
      
      <!-- チケット購入方法 -->
      <div class="shopH3Title">
        <h3 id="ticket">チケット購入方法</h3>
      </div>
      <div class="shopContents">
        <h4>1.オンラインでチケット購入</h4>
        <p>HALCinemaなら、映画チケットはパソコン・携帯電話から事前に購入できます。クレジットカード、docomo･au･SoftBankのキャリア決済も利用可能です。（現金での決済は取り扱いしておりません）<br />
          <br />
          <button>チケット購入はこちら</button>
        </p>
        <h4>2.ペアシートを完備</h4>
        <p>一部のスクリーンにはペアシートを完備しています。ペアシートはペア･お一人様どちらでも利用可能です。 </p>
        <h4>3.あなただけのシートをキープ</h4>
        <p>当館のすべての上映は定員入れ替え制です。立ち見なしでゆったりと作品をご鑑賞ください。 </p>
      </div>
      
      <!-- ハルシネマポイント -->
      <div class="shopH3Title">
        <h3 id="point">ハルシネマポイント</h3>
      </div>
      <div class="shopContents">
        <p>当サイトから予約するとハルシネマポイントが105円(税込み)に付き1ポイント付きます。1ポイント1円として次回からの予約時に利用することができます。</p>
      </div>
      
      <!-- ハルシネマメルマガ -->
      <div class="shopH3Title">
        <h3 id="merumaga">ハルシネマメルマガ</h3>
      </div>
      <div class="shopContents">
        <p>ハルシネマでは会員向けサービスとしてメールマガジンを配信しています。お客様の予約された映画を元にお客様が見たい！と思われる映画を毎週金曜日にお届けします。<br />
          メール配信設定などはログイン後、マイページから設定することができます。<br />
          ※重要なお知らせは配信設定に限らず、会員の皆様に配信します。</p>
      </div>
    </div>
  </div>
</div>
<!-- / #mainContent -->
<?PHP
	require_once("../module/footer.php");
?>
