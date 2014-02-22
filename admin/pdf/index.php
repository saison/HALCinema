<?PHP
	$pageTitle="PDF出力";
	require_once("../header.php");
?>
	<h2>PDF出力</h2>

	<blockquote>
	 <p>PDFの作成については<a href="https://docs.google.com/spreadsheet/ccc?key=0AgvRmkGL_iUQdFl3ZndTVWVzSG0yLVZ3dVhycTYxUVE&usp=drive_web#gid=2" target="_blank" >PDF作成ページの仕様</a>を見てください。</p>
  </blockquote>

  <div class="row">
    <div class="col-md-6">
      <h3>映画一覧</h3>
      <p>全ての映画を出力します</p>
      <a href="moviePdf.php" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-film"></span>映画一覧 PDF作成</a>
      
      <h3>ユーザ一覧</h3>
      <p>全てのユーザを出力します</p>
      <a href="userPdf.php" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>ユーザ一覧 PDF作成</a>
      
      <h3>上映スケジュール一覧</h3>
      <p>全ての上映スケジュールを出力します</p>
      <a href="schedulePdf.php" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-tasks"></span>上映スケジュール一覧 PDF作成</a>
      
      <h3>統計</h3>
      <p>HALCinemaの予約に関する統計を出力します</p>
      <a href="【アドレス】" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-align-left"></span>予約統計 PDF作成</a>
    </div>
    
    <div class="col-md-6">
      <h3>以下の項目は各ページにてPDF出力をしてください</h3>
      <ul>
        <li>各映画詳細</li>
        <li>各スケジュール詳細</li>
      </ul>
    </div>
    
  </div>

<?PHP
	require_once("../footer.php");
?>
