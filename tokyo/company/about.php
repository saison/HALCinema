<!doctype html>
<html>
        <head>
        <meta charset="utf-8">
        <title>HALcinema</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="about.css" rel="stylesheet" type="text/css">
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
              
			<!-- 会社概要 -->
            <div class="aboutH3Title">
                <h3 id="about">会社概要</h3>
            </div>
            <div class="aboutContents">
            	<table id="company">
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">商号</td>
					<td class="company_text">HALシネマ株式会社</td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">事業内容</td>
					<td class="company_text">(1) 映画館の運営<br />
					(2) パンフレット、キャラクター商品の販売（個性的な名称や特徴を有している人物、<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;動物の画像を付したもの）<br />
					(3) 軽飲食物の販売
                    </td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">会社設立</td>
					<td class="company_text">2013年12月12日</td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">資本金</td>
					<td class="company_text">23.3億円</td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">出資比率</td>
					<td class="company_text">東宝株式会社　100%</td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">決算月</td>
					<td class="company_text">2月</td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">役員</td>
					<td class="company_text">
					<table cellspacing="0">
					<tr>
					<td>代表取締役社長&nbsp;&nbsp;&nbsp;</td>
					<td>鈴木祐馬</td>
					</tr>
					<tr>
					<td>常務取締役</td>
					<td>西村拓馬</td>
					</tr>
					<tr>
					<td>取締役</td>
					<td>澤村昌</td>
					</tr>
					<tr>
					<td>取締役</td>
					<td>石野恵伍</td>
					</tr>
					<tr>
					<td>取締役</td>
					<td>関口翔真</td>
					</tr>
					</table>
					
					</td>
					</tr>
					<tr>
					<td class="arrow"><img src="../images/arrow_s.gif" alt="" width="13" height="9" /></td>
					<td class="company_item">従業員数</td>
					<td class="company_text">約4名（2013年9月27日現在/パート・アルバイト含む）</td>
					</tr>
				</table>
            </div>
            
            
            <!-- プライバシーポリシー -->
            <div class="aboutH3Title">
                <h3 id="privacy">プライバシーポリシー</h3>
            </div>
            <div class="privacyContents">
				<div class="lead_privacy">このウェブサイトおよびホームページ（以下併せて「ウェブサイト」とする）をお客様がご利用する場合、以下の使用条件に同意されたものとみなします。当社は、東宝グループの一員として東宝株式会社のプライバシーポリシーに準拠しています。</div>
				
				<div id="privacy_area">
				<div class="title">
				東宝株式会社のプライバシーポリシー
				</div>
				<div class="detail">
				当社は、「個人情報の保護に関する法律」の基本理念「個人情報は、個人の人格尊重の理念のもとに慎重に取り扱われるべきものである」のもと、お客様の個人情報（以下「個人情報」といいます）の適正な保護を企業の社会的責任と認識し、この責務を果たすために、次の方針のもとで個人情報を取り扱います。</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				1.　個人情報の取扱いに関しては関係法令等を遵守いたします
				</div>
				<div class="detail">
				当社は、個人情報の取扱いに際して、「個人情報の保護に関する法律」その他の関係法令および社内規程等を遵守するとともに、一般に公正妥当と認められる個人情報の取扱いに関する慣行に準拠し、適切に取り扱います。また、法令や社会環境の変化等に応じて適宜取扱いの改善に努めます。</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				2.　個人情報は限られた目的のみに取得し、利用いたします
				</div>
				<div class="detail">
				当社は、個人情報の取得に際して、利用目的を特定して通知または公表し、その利用目的に従って個人情報を取り扱います。当社が個人情報を取得する目的は次の通りです。<br />
				<br />
				●映画、演劇のチケット、その他商品のご購入の確認、お届け、アフターサービスのため<br />
				●登録制・会員制サービスへのご登録の確認やサービスの提供のため<br />
				●試写会等のイベントのご案内や新製品・サービスのお知らせのため<br />
				●電子メール配信サービスへのお申し込みの確認やサービスの提供のため<br />
				●上記各種商品、サービスの改善やお問い合わせへの回答のため<br />
				●その他上記各種サービスにともなう業務の実施のため<br />
				●個人情報を統計的に分析し、個人を特定できない形態に加工した統計データを作成するため</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				3.　個人情報の安全管理を徹底いたします 
				</div>
				<div class="detail">
				当社は、個人情報の紛失、毀損、社外への不正な流出、改ざん等を防止するため、社内規程等を整備し、安全管理のための必要かつ適切な措置を講じます。<br />
				<br />
				当社は、役員および従業員に対し、個人情報の安全管理が図られるように継続的な教育を実施し、適切な監督を行うとともに、監査責任者を選任し、個人情報保護に関する社内の取り組みについて監査を実施いたします。<br />
				<br />
				当社は、業務を円滑に進めるため、業務の一部を委託し、業務委託先に対して必要な範囲で個人情報を提供することがありますが、この場合、これらの業務委託先との間で、個人情報の適切な取扱いに関する契約の締結を行い、また適切な取扱いが行われるよう監督をいたします。 
				</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				4.　個人情報は原則として第三者に提供いたしません
				</div>
				<div class="detail">
				当社は、次の場合を除き、個人情報を第三者へ開示または提供いたしません。<br />
				●「3」に記載した業務委託先への提供の場合<br />
				●お客様ご本人の同意がある場合<br />
				●その他法令で定められた場合
				</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				5.　個人情報に関するお申し出におこたえいたします 	
				</div>
				<div class="detail">
				当社は、個人情報を正確かつ最新の状態で管理するよう努めます。また、お客さまから当社が保有しているお客様ご自身の個人情報の開示・訂正を求められたときは、お申し出いただ いた方がご本人であることを確認したうえで開示･訂正いたします。<br />
				<br />
				当社は、お客様から当社の保有しているお客様ご自身の個人情報の利用停止または削除を求められたときには、お申し出いただいた方がご本人であることを確認したうえで、合理的な期間および範囲で利用停止または削除いたします。これらの情報の一部または全部を利用停止または削除した場合、不本意ながらご要望に沿ったサービスの提供が出来なくなることがございます（なお関係法令に基づき保有しております情報については、利用停止または削除のお申し出には応じられない場合がございます）。 
				</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				6.　個人情報に関するお問い合わせをお受けいたします 
				</div>
				<div class="detail">
				当社は、「5」のお申し出や、その他の個人情報の取扱いに関するお客様からのお問い合わせを、当社ホームページ上「お問い合わせ」窓口にてお受けいたします。 </div>
				</div>
				
				<div class="pageTop"><a href="#top">▲TOPに戻る</a></div>
				
			</div>
            
            
            <!-- 特定商取引法に基づく表示 -->
            <div class="aboutH3Title">
                <h3 id="tokutei">特定商取引法に基づく表示</h3>
            </div>
            <div class="tokuteiContents">
            	<p>「特定商取引法に関する法律」第11条（通信販売についての広告）に基づき、商品の提供条件を次のとおり明示します。</p>
                <table class="table_5">
				<tr>
				<th class="tokuteiTitle" colspan="2">事業者</th>
				</tr>
				<tr>
				<th>販売事業者</th>
				<td>TOHOシネマズ株式会社</td>
				</tr>
				<tr>
				<th>販売事業者所在地</th>
				<td>東京都千代田区有楽町1-2-2　東宝日比谷ビル</td>
				</tr>
				<tr>
				<th>運営責任者</th>
				<td>瀬田 一彦</td>
				</tr>
				<tr>
				<th>お問合せ先</th>
				<td>ご利用劇場（本サイトの販売画面にて電話番号を掲載しております）</td>
				</tr>
				</table>
				
				
				<table class="table_5">
				<tr>
				<th class="tokuteiTitle" colspan="2">ご購入に際して</th>
				</tr>
				<tr>
				<th>ご購入対象・価格・期間</th>
				<td>ご利用の内容に応じたサービス内容となりますので、本サイトの販売画面にて詳細のご案内を差し上げております。</td>
				</tr>
				<tr>
				<th>ご購入内容の有効期間 </th>
				<td>ご購入時から、ご利用内容の映画上映開始時刻まで、となります。</td>
				</tr>
				<tr>
				<th>ご購入枚数制限 </th>
				<td>1回のお申込みにつき、6枚までとなります（7枚以上のお申込みの場合は、必要回数のお手続きをお願いいたします）。なお、お座席はお申込み単位で離れた位置でのご案内となります。</td>
				</tr>
				<tr>
				<th>ご購入内容の変更・キャンセル・払戻し</th>
				<td>ご購入手続き完了後は、ご入場券の発券の有無に限らず、またいかなる理由に拘わらず、その内容の変更、キャンセル、払戻しはお受けしておりません。ただし、弊社事情により上映を中止した場合に限り、ご購入内容の払戻しをお受けします。払戻しは、発券済みのご入場券（弊社判断による内容判別が可能なもの）を、弊社にご返却頂くことを前提といたします。払戻し方法は、ご利用のクレジットカード会社の処理方法に準じます。また、払戻し実施に際しましては、ご入場券の券面金額のみが払戻し対象となり、その他の費用（ご利用に付随して発生した諸費用）はお支払いいたしかねます。</td>
				</tr>
				<tr>
				<th>お支払方法</th>
				<td>クレジットカード決済（VISA，MASTER，JCB，AMEX若しくはDINERS）又は楽天あんしん支払サービス（VISA，MASTER，JCB若しくはAMEX又は楽天スーパーポイント）をご利用頂けます。携帯サイトからご購入頂く場合は、「ドコモ ケータイ払い」又は「まとめてau支払い」をご利用頂けます。</td>
				</tr>
				<tr>
				<th>お支払期限</th>
				<td>商品ご購入時にお支払い対象となります(ただし、ご請求日はカード会社によって異なります）。</td>
				</tr>
				</table>
				
				
				<table class="table_5">
				<tr>
				<th class="tokuteiTitle" colspan="2">お引渡しに際して</th>
				</tr>
				<tr>
				<th>お引渡場所</th>
				<td>申込み劇場に設置の専用端末になります。</td>
				</tr>
				<tr>
				<th>お引渡方法 </th>
				<td>お申込み劇場に設置の専用端末にて、お客様ご自身の操作によるご入場券の自動発行となります。発行に際しては、ご購入時にお知らせする「購入番号」とご購入時にご登録の「電話番号」が必要となります。専用端末ご利用の際は、お手元に「購入番号」と「電話番号」をご準備頂き、上映開始時刻までにご入場券の発行手続きをお済ませ下さい。「購入番号」と「電話番号」をお忘れの場合や上映時刻を過ぎた場合はご入場券を発行できない場合もございます。その際の、ご購入の内容の変更、キャンセル、払戻しはお受けいたしかねます。なお、ご入場券の送付サービス等は行っておりません。</td>
				</tr>
				</table>
				
            </div><!-- / .tokuteiContents -->
            
            
            
            <!-- サイトのご利用に関して -->
            <div class="aboutH3Title">
                <h3 id="site">サイトのご利用に関して</h3>
            </div>
            <div class="privacyContents">
				<div class="lead_privacy">このウェブサイトおよびホームページ（以下併せて「ウェブサイト」とする）をお客様がご利用する場合、
以下の使用条件に同意されたものとみなします。</div>
				
				<div id="privacy_area">
				<div class="title">
				ウェブサイトにある情報の利用について
				</div>
				<div class="detail">
				このウェブサイトはTOHOシネマズ株式会社（以下「TOHOシネマズ」とする）によって運営されており、このウェブサイト上の文書、映像、写真など、すべての情報の著作権はTOHOシネマズまたはそれぞれの著作権者に帰属しています。これらの情報の一部または全部を、TOHOシネマズもしくは著作権者の許諾を得ずに複製、公衆送信（送信可能化を含む）などに使用することは、TOHOシネマズもしくは著作権者の著作権または実演家の肖像権などを侵害する行為であり、使用者は著作権法違反による刑事責任を問われる可能性があります。
				</div>
                </div>
				
				<div id="privacy_area">
				<div class="title">
                ウェブサイトからの引用について
				</div>
				<div class="detail">
				著作権法第三十二条では、「公表された著作物は、引用して利用することができる。」と規定していますが、この場合、「公正な慣行に合致するものであり、かつ、報道、批評、研究その他の引用の目的上正当な範囲内で行なわれるものでなければならない。」とされています。また、引用に際しては、（1）出所を明示すること（2）本文と引用の明確な区別（3）本文と引用の主従関係の厳守（4）その引用が引用される著作物の著作者人格権を侵害するものでないこと、などの条件がつけられています。このウェブサイトからの引用については慎重な対応をお願い致します。
				</div>
                </div>
				
				<div id="privacy_area">
				<div class="title">
				ウェブサイトの運営責任
				</div>
				<div class="detail">
				このウェブサイトの情報については充分に注意および確認をした上で掲載しておりますが、情報の正確性・有用性・適合性などついては一切保証をしておりませんので、このウェブサイトの情報を使用し、または使用出来なかったことに起因する一切の損害について、TOHOシネマズは責任を負いません。また、リンク先のウェブサイトの情報が正確か否かの責任、その内容から発生する問題または副次的にもたらされるあらゆる問題についての責任は全て、リンク先ウェブサイトの管理運営主体が負っており、TOHOシネマズは一切責任を負えません。このウェブサイトの情報はお客様ご自身の責任と判断においてご利用下さいますようお願い致します。
                </div>
                </div>
				
				<div id="privacy_area">
				<div class="title">
				その他の免責事項
				</div>
				<div class="detail">
				お客様がこのウェブサイトをご利用することに起因する、お客様のシステムへのコンピュータ・ウィルス感染・汚染またはお客様のシステムの誤動作・エラー・損害など、全ての不具合に関してTOHOシネマズは一切責任を負いません。また、このウェブサイト上の素材をご使用することに起因する全ての損害に関して、TOHOシネマズは一切責任を負いません。
				</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				ウェブサイトのリンクについて
				</div>
				<div class="detail">
				このウェブサイトへのリンク設定は、運営主体が企業、団体、個人を問わず、どのページからでも可能ですが、設定はインターネット上のページからに限ります。ただし、以下のようなサイトからのリンク設定はお断り致します。<br />
<br />
・HALシネマおよびそれ以外の個人、団体などを誹謗、中傷する内容を掲載しているサイト。<br /><br />
・猥褻な内容を掲載するなど、法律・モラルに反しているサイト。<br /><br />
また、オリジナルのページデザインを改変するようなリンク設定は、一切お断り致します。リンクを設定する場合には入力フォームからご連絡下さいますようお願い致します。
				</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">SSLについて</div>
				<div class="detail">
				SSL（Secure Sockets Layer ）とは、インターネット上において情報を暗号化して送受信するためのプロトコル（通信規約）のことをいいます。<br />
インターネットでやり取りされる個人情報などを、第三者への漏洩・なりすましから守り、安全に通信を行なうことが可能になります。<br />
<br />
・インターネットチケット販売“vit”<br /><br />
・会員専用のマイページ<br /><br />
・座席照会<br /><br />
・アンケート<br /><br />
上記がSSLで保護されたページとなります。<br /><br /> 
また、各ページにおいて「ログイン」ボタンをクリックし、会員番号・パスワードを入力した後にやり取りされる通信は、SSLによって保護されます。
				</div>
				</div>
				
				<div id="privacy_area">
				<div class="title">
				「EV SSL証明書」について
                </div>
				<div class="detail">
				TOHOシネマズのウェブサイトでは、お客様にインターネットサービスをより安全にご利用いただくため、日本ベリサイン株式会社の「EV SSL証明書」を採用しております。<br />
「EV SSL証明書」を導入することで、当社サイトを装ったフィッシング詐欺サイトとの違いを見分ける事が出来るようになります。<br />
TOHOシネマズでは、今後もお客様に安心してご利用いただけるウェブサイトを提供して参ります。<br />
<br />
・「EV SSL証明書」とは<br />
CA/ブラウザフォーラムによって策定された、全世界標準の認証ガイドラインに基づいて発行されるSSL証明書で、近年急増しているフィッシング対策に大きな効果を発揮し、ウェブサイトの信頼性を高める事が可能になります。
・「EV SSL証明書」は、セキュリティを強化したウェブブラウザを組み合わせると、ウェブサイトを運営する組織の実在性を明確に特定することができます。<br />
ウェブサイトの確認方法<br />
TOHOシネマズのウェブサイトを対応ブラウザで訪問すると、画面上部のアドレスバー（もしくはURLの一部、ページタイトルの右側）が緑色に変化し、アドレスバーの横にはサイトを運営する組織名が表示されます。<br />
※「EV SSL証明書」非対応のブラウザをご利用の場合、緑色に変化しません。
				</div>
				</div>
				
			</div><!-- / .privacyContents -->
            
           
           
           
              
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
