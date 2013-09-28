<!doctype html>
<html>
        <head>
        <meta charset="utf-8">
        <title>HALcinema</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="shop.css" rel="stylesheet" type="text/css">
        <link href="css/juicyslider-min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/juicyslider.js"></script>
        <script type="text/javascript">
            // start to run when document ready
             $(function() {
                $('#myslider0').juicyslider({
                    width: '100%',
                    height: 350,
                    mask : 'none',
                    autoplay: 10000,
                    shuffle: false,
                });
				var footer = $("#footerBox");  
    			var offset = footer.offset().top + footer.height();  
    			var win_h = $(window).height();  
    			if( offset < win_h){  
        			footer.css({"position":"absolute", "bottom":"0"});  
    			} 
            });
        </script>
        </head>

        <body>
        <div id="wrapper"><!--メインコンテンツが先、ナビ部分は後-->
          <div id="main">
            <div id="mainContent"><!--メインコンテンツ-->
            <div class="contentTitle">
            <h2>劇場案内<br /><span class="h2En">Theater Info.</span></h2>
            </div>
              <!-- ここからcontent -->
              <!-- ここh2タイトル -->
              
			<!-- 劇場案内 -->
            <div class="shopH3Title">
                <h3 id="movieInfo">劇場案内</h3>
            </div>
            <div class="shopContents">
            <p>お好きな映画が選べる8スクリーン。約1,600席のシネマコンプレックス！無料駐車場4,000台。大型のショッピングモールも併設してますので、ショッピングからエンターテインメントまで1日中お楽しみいただけます。</p>
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
                <h4>通常料金</h4>
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
                    <td>学生</td>
                    <td class="right">&yen;1,500</td>
                  </tr>
                  <tr class="none">
                    <td colspan="2"><p class="caution">＊要学生証</p></td>
                  </tr>
                  <tr>
                    <td>シニア（60歳以上）</td>
                    <td class="right">&yen;1,000</td>
                  </tr>
                  <tr class="none">
                    <td colspan="2"><p class="caution">＊要年齢証明</p></td>
                  </tr>
                </table>
                <p>
				＊前売り券ご利用のお客様は座席指定券との引き換えが必要でございます。<br />
				＊他劇場発行のCINEMA TICKET、招待券等はご利用いただけませんので、ご注意下さい。<br />
				＊先売券（さきうりけん）は、ご覧いただく日の2日前からご購入いただけます。
                </p>
			</div>

            
            <!-- チケット購入方法 -->
            <div class="shopH3Title">
                <h3 id="ticket">チケット購入方法</h3>
            </div>
            <div class="shopContents">
                <h4>1.オンラインでチケット購入</h4>
                <p>KINEZOなら、映画チケットはパソコン・携帯電話から事前に購入できます。現金決済もOKなのでクレジットカードがなくても予約可能です。日本初・モバイルSuica対応。<br />
                <br />
                <button>チケット購入はこちら</button>
                </p>
                
                <h4>2.お得な時間帯割</h4>
                <p>平日ならいつでもどなたでも、15:30～18:00の間に上映が開始される特定作品を1,200円でご覧いただけるサービスです。詳しくは上映スケジュールをご確認ください。
                </p>
                
                <h4>3.午前0時以降も毎晩上映</h4>
                <p>HALシネマは眠らないシアター。連日深夜まで上映を行います。
ミッドナイトならではのスペシャル上映やラインナップをお見逃しなく。詳細は上映スケジュールにてご案内しています。
                </p>
                
                <h4>4.あなただけのシートをキープ</h4>
                <p>当館のすべての上映は定員入れ替え制です。立ち見なしでゆったりと作品をご鑑賞ください。
                </p>    
            </div>
            
            
            
            
            <!-- ハルシネマポイント -->
            <div class="shopH3Title">
                <h3 id="point">ハルシネマポイント</h3>
            </div>
            <div class="shopContents">
            <p>ポイントを使用して、インターネットチケットをご購入いただけます。</p>
            <a href="">詳しくはこちら</a> 
            </div>
            
            
            <!-- ハルシネマメルマガ -->
            <div class="shopH3Title">
                <h3 id="merumaga">ハルシネマメルマガ</h3>
            </div>
            <div class="shopContents">
                <h4>1.URLを入力する</h4>
                <p>以下のURLにアクセスしてください。<br />
                <strong>http://halcinema.com/</strong><br />
                ※携帯からのみアクセス可能。<br />
				　i-mode,EZWeb,Yahoo!ケータイからご覧いただけます。                
                </p>
                
                <h4>2.URLをケータイに送る</h4>
                <p>以下のボタンをクリックし、宛先にご自分の携帯電話のメールアドレスを入力して送信してください。</p>
                <button>URLを送信する</button>
            </div>
            
            
            
              
              
              <!--  content終わり -->
              
              
              <footer id="footerBox">ここフッター</footer>
            </div>
          </div>
          <div id="sub"><!--ナビゲーション-->
            <h1><a href="index.php"><img src="images/logo.png" alt="HALcinemaTOPページ"></a></h1>
            <nav id="meinMenu">
              <ul>
                <li><a href="theatreInfo.php">劇場案内</a></li>
                <li><a href="">作品案内</a></li>
                <li><a href="">イベント&キャンペーン</a></li>
                <li><a href="">サービス</a></li>
                <li><a href="">企業情報</a></li>
              </ul>
            </nav>
            <p id="copyright">CopyRight (C) 2013 HALCinema All Rights Reserved.</p>
          </div>
        </div>
</body>
</html>
