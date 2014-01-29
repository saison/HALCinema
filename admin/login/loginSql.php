<?php
require_once("../../tokyo/module/functions.php");
$con = getConnection();

if(empty($_POST["userID"]) and empty($_POST["userPass"])){
  header("location:index.php?error=nouserpass");
  break;
}
if(empty($_POST["userID"])){
  header("location:index.php?error=nouser");
  break;
}
if(empty($_POST["userPass"])){
  header("location:index.php?error=nopass");
  break;
}

mysqli_select_db($link,"halcinema");
$user=mysqli_real_escape_string($con,$_POST["userID"]);
$pass=mysqli_real_escape_string($con,$_POST["userPass"]);
$sql="SELECT * FROM admin_user_master WHERE user_id='".$user."' AND user_pass='".$pass."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row==false){
  mysqli_close($con);
  header("location:index.php?error=true");
  break;
}

session_start();
session_regenerate_id();
$_SESSION["userID"]=$_POST["userID"];
mysqli_close($con);
header("location:../top/index.php");
?>