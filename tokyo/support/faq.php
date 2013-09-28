<!doctype html>
<html>
        <head>
        <meta charset="utf-8">
        <title>HALcinema</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="faq.css" rel="stylesheet" type="text/css">
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
              
			<!-- よくあるご質問 -->
            <div class="faqH3Title">
                <h3 id="faq">よくあるご質問</h3>
            </div>
            <div class="faqContents">
            <p>オンラインチケット予約に関する、よくあるご質問をまとめました。</p>
            <h4>チケットご購入に関して</h4>
            <ul>
		    	<li><a href="faq02.html">前売券・先売券とはなんですか？</a></li>
		        <li><a href="faq02.html">オンライン予約はいつからできますか？</a></li>
		        <li><a href="faq02.html">一度に何枚まで買えますか？</a></li>
		        <li><a href="faq02.html">座席は指定できますか？</a></li>
		        <li><a href="faq02.html">予約チケットの変更・キャンセルはできますか？</a></li>
		        <li><a href="faq02.html">前売券は利用できますか？</a></li>
		        <li><a href="faq02.html">予約番号を家に忘れてきてしまいました&hellip;。</a></li>
		        <li><a href="faq02.html">電話で座席の予約はできますか？</a></li>
		        <li><a href="faq02.html">レディースデーのようなサービスデーはありますか？</a></li>
		    </ul>
            
		    <h4>モバイルsuicaについて</h4>
		    <ul class="last">
		        <li><a href="faq03.html">モバイルSuicaとはどんなサービスですか？</a></li>
		        <li><a href="faq03.html">モバイルSuicaに会員登録するためには何か条件はありますか？</a></li>
		        <li><a href="faq03.html">モバイルSuicaにはどのようにしたら登録できますか？</a></li>
		        <li><a href="faq03.html">ネット決済で買った商品の返品はどうすればよいですか？</a></li>
		        <li><a href="faq03.html">決済受付メールが届かない場合はどうすればよいですか？</a></li>
		        <li><a href="faq03.html">窓口での支払いでモバイルSuicaは利用できますか？</a></li>
		    </ul>
            
          
       
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