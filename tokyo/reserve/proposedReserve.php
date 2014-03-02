<?PHP
  require_once("../module/functions.php");

  $con = getConnection();
  $showId = $_SESSION["showid"];

  if(isset($_POST["seat"])){

    foreach ($_POST["seat"] as $value){
      $reserveData = array();
      $reserveData = explode("_",$value);
      switch($reserveData[1]){
        case "adult":
          $priceId = "mp0001";
          break;
        case "student":
          $priceId = "mp0002";
          break;
        case "senior":
          $priceId = "mp0005";
          break;
        case "pear1":
          $priceId = "mp0003";
          break;
        case "pear2":
          $priceId = "mp0004";
          break;
        //デバック用
        default:
          $priceId = 0;

      }
      $insertSql = "INSERT INTO `seat_reserve_list`(`show_id`, `user_id`, `seat_number`, `reserve_flag`, `movie_price_id`) VALUES ('{$showId}','".$_SESSION["userid"]."','{$reserveData[0]}',0,'{$priceId}')";
      $insertResult = mysqli_query($con,$insertSql);
    }
    $_SESSION['reserveSeat'] = $_POST['seat'];
    header("Location:pay.php");
  }else{
    header("Location:seat.php?id=".$showId."&error=notSelect");
  }
?>
