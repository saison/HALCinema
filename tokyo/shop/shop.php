<?PHP
	$pageTitle = "劇場案内";
	require_once("../module/header.php");
?>

<!--メインコンテンツが先、ナビ部分は後-->
<div class="movieTitle">
  <h2>劇場案内<small>Theaters</small></h2>
</div>

<div id="mainContent" class="mtb20"><!--メインコンテンツ-->
  <div id="menuPB">
    <div id="menuPBContent">
      <div id="menuPBMainContent">
        <!-- MainContent -->
        <p class="smallText">お好きな映画が選べる8スクリーン。約1,600席のシネマコンプレックス！無料駐車場4,000台。大型のショッピングモールも併設してますので、ショッピングからエンターテインメントまで1日中お楽しみいただけます。</p>
        <div id="screen" class="contentBox mtb30">
          <div class="movieTitle">
            <h3>スクリーン</h3>
          </div>
          <p class="mtb10 smallText">HALCinemaTokyoは8つのスクリーンが有ります。全てのスクリーンでデジタル音響を採用し、歩行が困難な方でも楽しめる用「車椅子用スペース」を完備しています。</p>
          <div class="mlr50">
            <table class="movieInfoTable">
              <tr>
                <th>スクリーン</th>
                <th>座席数＋車椅子用スペース</th>
                <th>デジタル音響</th>
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
                <td class="fontBold bigText">合計8スクリーン</td>
                <td colspan="2" class="fontBold bigText">1568+(32)</td>
              </tr>
            </table>
            <p class="()は車椅子スペース"></p>
          </div>
        </div>
        
        <!-- チケット購入方法 -->
        <div id="ticket" class="contentBox mtb20">
          <div class="movieTitle">
            <h3>チケット購入方法</h3>
          </div>
          <p class="mtb10 smallText">映画のチケットはオンラインと店頭で購入することが出来ます。<br>HALCinemaのアカウントをお持ちいただくと、オンライン上で映画の予約、HALCinemaポイントを貯めることが出来ます。</p>
          
          <div class="movieTitle">
            <h4>1.オンラインでチケット購入【ここ直します】</h4>
          </div>
          <p class="smallText">HALCinemaなら、映画チケットはパソコン・携帯電話から事前に購入できます。クレジットカード、docomo･au･SoftBankのキャリア決済も利用可能です。（現金での決済は取り扱いしておりません）</p>
          
        </div>
        
        <!-- HALCinemaポイント -->
        <div id="point" class="contentBox mtb20">
          <div class="movieTitle">
            <h3>HALCinemaポイント</h3>
          </div>
          <p class="smallText mtb10">当サイトから予約するとハルシネマポイントが105円(税込み)に付き1ポイント付きます。1ポイント1円として次回からの予約時に利用することができます。</p>
        </div>
        
        <!-- HALCinemaメルマガ -->
        <div id="merumaga" class="contentBox mtb20">
          <div class="movieTitle">
            <h3>HALCinemaメルマガ</h3>
          </div>
          <p class="smallText mtb10">HALCinemaでは会員向けサービスとしてメールマガジンを配信しています。お客様の予約された映画を元にお客様が見たい！と思われる映画を毎週金曜日にお届けします。<br>
          <span class="fontBold">メール配信設定などはログイン後、マイページから設定することができます。</span><br>
          <span class="fontBold fontCRed">※重要なお知らせは配信設定に限らず、会員の皆様に配信します。</span></p>
      </div>

        <!-- MainContent End -->
      </div>
    </div>
    <div id="menuPBSidebar">
      <!-- Sidebar -->
      <div id="subnav">
        <ul>
          <li><a href="#screen">スクリーン</a></li>
          <li><a href="#ticket">チケット購入方法</a></li>
          <li><a href="#point">HALCinemaポイント</a></li>
          <li><a href="#merumaga">HALCinemaメルマガ</a></li>
        </ul>
      </div>
      <!-- Sidebar End -->
    </div>
  </div>
</div>
  
  
  <!-- ここからcontent -->
  <!-- ここh2タイトル -->
  <div class="clearfix">
    
    <div id="rightMeinContent"><!-- w950px m-l30px -->
      
  </div>
</div>
<!-- / #mainContent -->
<?PHP
	require_once("../module/footer.php");
?>
