<?php
if(empty($_POST["userid"]) and empty($_POST["pass"])){
  header("location:login.php?error=nouserpass");
  break;
}
if(empty($_POST["userid"])){
  header("location:login.php?error=nouser");
  break;
}
if(empty($_POST["pass"])){
  header("location:login.php?error=nopass");
  break;
}
$link=mysqli_connect("localhost","halcinema","halcinema");
mysqli_select_db($link,"halcinema");
$user=mysqli_real_escape_string($link,$_POST["userid"]);
$pass=mysqli_real_escape_string($link,$_POST["pass"]);
$sql="SELECT * FROM user_master WHERE user_id='".$user."' AND user_pass='".$pass."'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
if($row==false){
  mysqli_close($link);
  header("location:login.php?error=true");
  break;
}
session_start();
session_regenerate_id();
$_SESSION["userid"]=$_POST["userid"];
mysqli_close($link);
header("location:../top/index.php");
print $sql;
?>