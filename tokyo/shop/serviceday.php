<?PHP
	$pageTitle = "サービス案内";
	require_once("../module/header.php");
?>

<div class="movieTitle">
  <h2>サービス案内<small>Service</small></h2>
</div>
<div id="mainContent" class="mtb20"><!--メインコンテンツ-->
  <div id="menuPB">
    <div id="menuPBContent">
      <div id="menuPBMainContent price">
      <!-- MainContent -->
        <div class="contentBox">
          <div class="movieTitle">
            <h3>料金</h3>
          </div>
          <table class="pricelist mtb10">
          <tr class="none">
            <th>一般</th>
            <td>&yen;1,800</td>
          </tr>
          <tr>
            <th>3D鑑賞</th>
            <td>&yen;1,800</td>
          </tr>
          <tr>
            <th>学生(小・中・高・大生)<span class="fontCRed">＊要学生証</span></th>
            <td>&yen;1,500</td>
          </tr>
        </table>
        <p class="smallText mtb10"> ＊前売り券ご利用のお客様は座席指定券との引き換えが必要でございます（前売り券ご利用の場合当サイトからは予約することができません）。<br>
          ＊他劇場発行のCINEMA TICKET、招待券等はご利用いただけませんので、ご注意下さい。<br>
          ＊当映画館では当サイトのみ7日前からチケットを購入することができます。</p>
        </div>
        
        <div id="serviceday" class="contentBox mtb20">
          <div class="movieTitle">
            <h3>サービスデー</h3>
          </div>
          <p class="smallText mtb10">作成中です</p>
        </div>
      <!-- MainContent End -->
      </div>
    </div>
    <div id="menuPBSidebar">
    <!-- Sidebar -->
      <div id="subnav">
        <ul>
          <li><a href="#price">料金</a></li>
          <li><a href="#serviceday">サービスデー</a></li>
        </ul>
      </div>
      <!-- Sidebar End -->
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- / #mainContent -->
<?PHP
	require_once("../module/footer.php");
?>