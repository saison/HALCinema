<?PHP
	$pageTitle = "ログイン";
	require_once("../module/reserveHeader.php");
?>

<div id="content" class="m15"><!--メインコンテンツ-->
<div class="reserveTitle">
  <h2>ログイン</h2>
</div>
<?php
if(!empty($_GET["error"])){
  switch ($_GET["error"]) {
    case 'true':
      print "<p class='error_p'>IDまたはパスワードが間違っています</p>";
      break;
    case 'nouser':
      print "<p class='error_p'>IDが入力されていません</p>";
      break;
    case 'nopass':
      print "<p class='error_p'>パスワードが入力されていません</p>";
      break;
    case 'nouserpass':
      print "<p class='error_p'>IDとパスワードが入力されていません</p>";
      break;
    case 'session':
      print "<p class='error_p'>再度ログインをしてください</p>";
      break;
  }
}
?>

<div class="boxCol2 clearfix mtb15">
  <div class="boxCol2Left">
    <div class="contentAttentionBox">
      <div class="reserveTitle">
        <h3>アカウントをお持ちの方はログインしてください</h3>
      </div>
      <form action="loginSql.php" method="post">
      <div class="loginTable mtb10">
        <table>
          <tr>
            <th>ID</th>
            <td><input type="text" name="userid" /></td>
          </tr>
          <tr>
            <th>パスワード</th>
            <td><input type="password" name="pass" /></td>
          </tr>
        </table>
        <?php
        if(!empty($_GET["sid"])){
          print "<input type='hidden' name='sid' value='".$_GET["sid"]."'>";
        }
        ?>
        <p class="loginButton"><input type="image" src="images/login.png" alt="Login"></p>
        </form>
      </div>
    </div>
  </div>
  <div class="boxCol2Right">
    <div class="contentBox">
      <div class="reserveTitle">
        <h3>アカウントをお持ちでない方は新規会員登録をしてください</h3>
      </div>
      <p class="smallText p5">HALCinemaでは映画館の座席予約をオンラインで行うことが出来ます！座席予約を行うにはHALCinemaのアカウントが必要です。このアカウントをお持ちいただくと、座席予約やポイントを貯めることが出来ます。</p>
      <p class="loginButton"><a href="../user/new.php"><img src="../mypage/images/newUser.png"></a></p>
    </div>
  </div>
</div>
</div>
<?PHP
	require_once("../module/reserveFooter.php");
?>