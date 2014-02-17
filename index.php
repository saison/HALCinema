<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" media="all">
	<title>
    HALCinema
	</title>
</head>
<body>
  <div id="mainContent" class="clearfix">
    <header><h1><img src="logo.png"></h1></header>
    <div id="list">
      <ul>
      <li><a href="./tokyo/top/"><img src="hcTokyo.png"></a></li>
      <li><img src="hcNagoya.png"></li><!-- <a href="./nagoya/top/"></a> -->
      <li><img src="hcOsaka.png"></li><!-- <a href="./osaka/top/"></a> -->
      </ul>
    </div>
  </div>
  
  <!-- この先開発用 -->
  <div id="adminLink"><p><a href="./admin/top/">管理側(BE)ページはこちら</a></p></div>
  <div id="lastUpdate"><p>
  <?php
  $path = 'tokyo/';
  $latest_mtime = 0;
  if ($handle = opendir($path)) {
  while (false !== ($file = readdir($handle))) {
  if ($file != "." && $file != "..") {
  $fname = $path.$file;
  $mtime = filemtime( $fname );
  if( $mtime > $latest_mtime ){
  $latest_mtime = $mtime;
  }
  }
  }
  closedir($handle);
  }

  $path = 'admin/';
  $latest_mtime2 = 0;
  if ($handle = opendir($path)) {
  while (false !== ($file = readdir($handle))) {
  if ($file != "." && $file != "..") {
  $fname = $path.$file;
  $mtime = filemtime( $fname );
  if( $mtime > $latest_mtime2 ){
  $latest_mtime2 = $mtime;
  }
  }
  }
  closedir($handle);
  }
  
  echo "FE LastUpdate:" . date( "Y/n/d H:i" , $latest_mtime )."　";
  echo "BE LastUpdate:" . date( "Y/n/d H:i" , $latest_mtime2 );
  ?>
  </p></div>
  <!-- 開発用タグ終わり -->
  
  
</body>
</html>