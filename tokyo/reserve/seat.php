<?php

	$showID = $_GET["id"];

	if(!(isset($showID))){
		header("Location:../movie/movie.php");
		return;
	}
	$pageTitle="座席選択&amp;フード･ドリンク選択";
	require_once("../module/reserveHeader.php");

	if(!(isset($_SESSION["userid"]))){
		$loginGet="Location:../mypage/login.php?sid=".$showID;
		header($loginGet);
		return;
	}
	$_SESSION["showid"] = $showID;

	$con = getConnection();
	$reserveSelectSql = "SELECT show_schedule.show_id AS showID , show_schedule.screen_id AS SID , show_schedule.show_day AS showDay , show_schedule.start_time AS startTime , cinema_master.cinema_name AS movieName FROM show_schedule INNER JOIN cinema_master ON show_schedule.cinema_id=cinema_master.cinema_id WHERE show_schedule.show_id='".$showID."'";
	$reserveSelectResult = mysqli_query($con,$reserveSelectSql);
	$reserveSelectRow = mysqli_fetch_array($reserveSelectResult);
	$dateAndTime=$reserveSelectRow["showDay"]." ".$reserveSelectRow["startTime"];
	$screenDay=date_parse($dateAndTime);
	$screenID=$reserveSelectRow["SID"];
	$screenSelectSql = "SELECT * FROM screen_master WHERE screen_id='".$screenID."'";
	$screenSelectResult = mysqli_query($con,$screenSelectSql);
	$screenSelect = mysqli_fetch_array($screenSelectResult);
?>

<div id="nav"></div>
<div id="content100">
  <div class="reserveTitle">
    <h3>座席を選択してください</h3>
  </div>

  <div id="sertChoice"><!-- シートブロック・種類選択 200px-->
  <div id="sertEachChoiceMenu"><img src="images/menuOpen.png" alt="Menuを表示する" /></div>
			<div id="sertChoiceBox">
  <div id="movieInfo"><!-- 映画情報 -->
    <h4>選択映画情報</h4>
    <div class="setEachChoiceContent">
    <h5></h5>
    </div>


    <table>
      <tr>
        <td class="movieInfoTitle">日時</td></tr><tr>
        <td><?php echo $screenDay["year"]."年".$screenDay["month"]."月".$screenDay["day"]."日 ".$screenDay["hour"]."：".$screenDay["minute"]."~"; ?></td></tr><tr>
        <td class="movieInfoTitle">映画</td></tr><tr>
        <td><?php echo $reserveSelectRow["movieName"]; ?></td>
      </tr>
    </table>
  </div>
  <h4>座席選択</h4>
    <div id="sertEachChoice"><!-- シート選択指定 --><!-- 人形は増やしてちょうだい！ -->
      <div class="setEachChoiceContent">
        <h5>大人</h5>
        <ul id="adult">
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
          <li><img class="dragIcon" src="images/adultImage.png"></li>
        </ul>
      </div>
      <div class="setEachChoiceContent">
        <h5>学生</h5>
        <ul id="student">
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
          <li><img class="dragIcon" src="images/studentImage.png"></li>
        </ul>
      </div>
      <!--  シニアは映画日時を取得して表示（DB接続） -->
      <div class="setEachChoiceContent">
        <h5>シニア</h5>
        <ul id="senior">
          <li><img class="dragIcon" src="images/seniorImage.png"></li>
          <li><img class="dragIcon" src="images/seniorImage.png"></li>
          <li><img class="dragIcon" src="images/seniorImage.png"></li>
          <li><img class="dragIcon" src="images/seniorImage.png"></li>
          <li><img class="dragIcon" src="images/seniorImage.png"></li>
        </ul>
      </div>
    </div>
    <p class="blockTyui">各料金タイプ内の人形を選択したい座席にドラック&amp;ドロップしてください</p>
  </div>
			</div>


  <div class="sertArrange">
  <div class="Ablock"><!-- Aブロック始まり -->
    <div class="sertScreenTitle clearfix">
      <p class="sertTitleCenter"><?php echo "HALCinemaTOKYO Screen<span class='captionBig'>".substr($screenID,-1,1)."</span>"; ?><span class="captionBig">A</span>(Left)Block</p>
      <p class="sertChangeRight"><span class='captionBig'>B</span>(Right)Block ▶</p>
    </div>
    <table id="ABlockSeat">
      <tr>
        <th class="screenTop" colspan="19"><img src="./images/screenTop.png" alt="↑スクリーン方向↑" /></th>
      </tr>
      <tr>
        <th></th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th class=" lMargin30">5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
      </tr>
      <tr>
        <th>A</th>
        <td id="a-1" class="seat">A-1</td>
        <td id="a-2" class="seat">A-2</td>
        <td id="a-3" class="seat">A-3</td>
        <td id="a-4" class="seat">A-4</td>
        <td id="a-5" class="seat lMargin30">A-5</td>
        <td id="a-6" class="seat">A-6</td>
        <td id="a-7" class="seat">A-7</td>
        <td id="a-8" class="seat">A-8</td>
        <td id="a-9" class="seat">A-9</td>
        <td id="a-10" class="seat">A-10</td>
        <td id="a-11" class="seat">A-11</td>
        <td id="a-12" class="seat">A-12</td>
        <td id="a-13" class="seat">A-13</td>
        <td id="a-14" class="seat">A-14</td>
        <td id="a-15" class="seat">A-15</td>
        <td id="a-16" class="seat">A-16</td>
        <td id="a-17" class="seat">A-17</td>
        <td id="a-18" class="seat">A-18</td>
      </tr>
      <tr>
        <th>B</th>
        <td id="b-1" class="seat">B-1</td>
        <td id="b-2" class="seat">B-2</td>
        <td id="b-3" class="seat">B-3</td>
        <td id="b-4" class="seat">B-4</td>
        <td id="b-5" class="seat lMargin30">B-5</td>
        <td id="b-6" class="seat">B-6</td>
        <td id="b-7" class="seat">B-7</td>
        <td id="b-8" class="seat">B-8</td>
        <td id="b-9" class="seat">B-9</td>
        <td id="b-10" class="seat">B-10</td>
        <td id="b-11" class="seat">B-11</td>
        <td id="b-12" class="seat">B-12</td>
        <td id="b-13" class="seat">B-13</td>
        <td id="b-14" class="seat">B-14</td>
        <td id="b-15" class="seat">B-15</td>
        <td id="b-16" class="seat">B-16</td>
        <td id="b-17" class="seat">B-17</td>
        <td id="b-18" class="seat">B-18</td>
      </tr>
      <tr>
        <th>C</th>
        <td id="c-1" class="seat">C-1</td>
        <td id="c-2" class="seat">C-2</td>
        <td id="c-3" class="seat">C-3</td>
        <td id="c-4" class="seat">C-4</td>
        <td id="c-5" class="seat lMargin30">C-5</td>
        <td id="c-6" class="seat">C-6</td>
        <td id="c-7" class="seat">C-7</td>
        <td id="c-8" class="seat">C-8</td>
        <td id="c-9" class="seat">C-9</td>
        <td id="c-10" class="seat">C-10</td>
        <td id="c-11" class="seat">C-11</td>
        <td id="c-12" class="seat">C-12</td>
        <td id="c-13" class="seat">C-13</td>
        <td id="c-14" class="seat">C-14</td>
        <td id="c-15" class="seat">C-15</td>
        <td id="c-16" class="seat">C-16</td>
        <td id="c-17" class="seat">C-17</td>
        <td id="c-18" class="seat">C-18</td>
      </tr>
      <tr>
        <th>D</th>
        <td id="d-1" class="seat">D-1</td>
        <td id="d-2" class="seat">D-2</td>
        <td id="d-3" class="seat">D-3</td>
        <td id="d-4" class="seat">D-4</td>
        <td id="d-5" class="seat lMargin30">D-5</td>
        <td id="d-6" class="seat">D-6</td>
        <td id="d-7" class="seat">D-7</td>
        <td id="d-8" class="seat">D-8</td>
        <td id="d-9" class="seat">D-9</td>
        <td id="d-10" class="seat">D-10</td>
        <td id="d-11" class="seat">D-11</td>
        <td id="d-12" class="seat">D-12</td>
        <td id="d-13" class="seat">D-13</td>
        <td id="d-14" class="seat">D-14</td>
        <td id="d-15" class="seat">D-15</td>
        <td id="d-16" class="seat">D-16</td>
        <td id="d-17" class="seat">D-17</td>
        <td id="d-18" class="seat">D-18</td>
      </tr>
      <tr>
        <th>E</th>
        <td id="e-1" class="seat">E-1</td>
        <td id="e-2" class="seat">E-2</td>
        <td id="e-3" class="seat">E-3</td>
        <td id="e-4" class="seat">E-4</td>
        <td id="e-5" class="seat lMargin30">E-5</td>
        <td id="e-6" class="seat">E-6</td>
        <td id="e-7" class="seat">E-7</td>
        <td id="e-8" class="seat">E-8</td>
        <td id="e-9" class="seat">E-9</td>
        <td id="e-10" class="seat">E-10</td>
        <td id="e-11" class="seat">E-11</td>
        <td id="e-12" class="seat">E-12</td>
        <td id="e-13" class="seat">E-13</td>
        <td id="e-14" class="seat">E-14</td>
        <td id="e-15" class="seat">E-15</td>
        <td id="e-16" class="seat">E-16</td>
        <td id="e-17" class="seat">E-17</td>
        <td id="e-18" class="seat">E-18</td>
      </tr>
      <tr>
        <th>F</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="f-3" class="seat wheelChair">F-3</td>
        <td id="f-4" class="seat wheelChair">F-4</td>
        <td id="f-5" class="seat lMargin30">F-5</td>
        <td id="f-6" class="seat">F-6</td>
        <td id="f-7" class="seat">F-7</td>
        <td id="f-8" class="seat">F-8</td>
        <td id="f-9" class="seat">F-9</td>
        <td id="f-10" class="seat">F-10</td>
        <td id="f-11" class="seat">F-11</td>
        <td id="f-12" class="seat">F-12</td>
        <td id="f-13" class="seat">F-13</td>
        <td id="f-14" class="seat">F-14</td>
        <td id="f-15" class="seat">F-15</td>
        <td id="f-16" class="seat">F-16</td>
        <td id="f-17" class="seat">F-17</td>
        <td id="f-18" class="seat">F-18</td>
      </tr>
      <tr class="tMargin40">
        <th>G</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="g-5" class="seat lMargin30">G-5</td>
        <td id="g-6" class="seat">G-6</td>
        <td id="g-7" class="seat">G-7</td>
        <td id="g-8" class="seat">G-8</td>
        <td id="g-9" class="seat">G-9</td>
        <td id="g-10" class="seat">G-10</td>
        <td id="g-11" class="seat">G-11</td>
        <td id="g-12" class="seat">G-12</td>
        <td id="g-13" class="seat">G-13</td>
        <td id="g-14" class="seat">G-14</td>
        <td id="g-15" class="seat">G-15</td>
        <td id="g-16" class="seat">G-16</td>
        <td id="g-17" class="seat">G-17</td>
        <td id="g-18" class="seat">G-18</td>
      </tr>
      <tr>
        <th>H</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="h-5" class="seat lMargin30">H-5</td>
        <td id="h-6" class="seat">H-6</td>
        <td id="h-7" class="seat">H-7</td>
        <td id="h-8" class="seat">H-8</td>
        <td id="h-9" class="seat">H-9</td>
        <td id="h-10" class="seat">H-10</td>
        <td id="h-11" class="seat">H-11</td>
        <td id="h-12" class="seat">H-12</td>
        <td id="h-13" class="seat">H-13</td>
        <td id="h-14" class="seat">H-14</td>
        <td id="h-15" class="seat">H-15</td>
        <td id="h-16" class="seat">H-16</td>
        <td id="h-17" class="seat">H-17</td>
        <td id="h-18" class="seat">H-18</td>
      </tr>
      <tr>
        <th>I</th>
        <td id="i-1" class="seat">I-1</td>
        <td id="i-2" class="seat">I-2</td>
        <td id="i-3" class="seat">I-3</td>
        <td id="i-4" class="seat">I-4</td>
        <td id="i-5" class="seat lMargin30">I-5</td>
        <td id="i-6" class="seat">I-6</td>
        <td id="i-7" class="seat">I-7</td>
        <td id="i-8" class="seat">I-8</td>
        <td id="i-9" class="seat">I-9</td>
        <td id="i-10" class="seat">I-10</td>
        <td id="i-11" class="seat">I-11</td>
        <td id="i-12" class="seat">I-12</td>
        <td id="i-13" class="seat">I-13</td>
        <td id="i-14" class="seat">I-14</td>
        <td id="i-15" class="seat">I-15</td>
        <td id="i-16" class="seat">I-16</td>
        <td id="i-17" class="seat">I-17</td>
        <td id="i-18" class="seat">I-18</td>
      </tr>
      <tr>
        <th>J</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="j-5" class="seat lMargin30">J-5</td>
        <td id="j-6" class="seat">J-6</td>
        <td id="j-7" class="seat">J-7</td>
        <td id="j-8" class="seat">J-8</td>
        <td id="j-9" class="seat">J-9</td>
        <td id="j-10" class="seat">J-10</td>
        <td id="j-11" class="seat">J-11</td>
        <td id="j-12" class="seat">J-12</td>
        <td id="j-13" class="seat">J-13</td>
        <td id="j-14" class="seat">J-14</td>
        <td id="j-15" class="seat">J-15</td>
        <td id="j-16" class="seat">J-16</td>
        <td id="j-17" class="seat">J-17</td>
        <td id="j-18" class="seat">J-18</td>
      </tr>
    </table>
    </div><!-- ABlock 終わり-->

    <div class="Bblock"><!-- Bブロック始まり -->
    <div class="sertScreenTitle clearfix">
    <p class="sertChangeLeft">◀ <span class='captionBig'>B</span>(Left)Block</p>
      <p class="sertTitleCenter"><?php echo "HALCinemaTOKYO Screen<span class='captionBig'>".substr($screenID,-1,1)."</span>"; ?><span class="captionBig">B</span>(Right)Block</p>

    </div>
    <table id="ABlockSeat">
      <tr>
        <th class="screenTop" colspan="19"><img src="./images/screenTop.png" alt="↑スクリーン方向↑" /></th>
      </tr>
      <tr>
        <th></th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th class=" lMargin30">5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
      </tr>
      <tr>
        <th>A</th>
        <td id="a-1" class="seat">A-1</td>
        <td id="a-2" class="seat">A-2</td>
        <td id="a-3" class="seat">A-3</td>
        <td id="a-4" class="seat">A-4</td>
        <td id="a-5" class="seat lMargin30">A-5</td>
        <td id="a-6" class="seat">A-6</td>
        <td id="a-7" class="seat">A-7</td>
        <td id="a-8" class="seat">A-8</td>
        <td id="a-9" class="seat">A-9</td>
        <td id="a-10" class="seat">A-10</td>
        <td id="a-11" class="seat">A-11</td>
        <td id="a-12" class="seat">A-12</td>
        <td id="a-13" class="seat">A-13</td>
        <td id="a-14" class="seat">A-14</td>
        <td id="a-15" class="seat">A-15</td>
        <td id="a-16" class="seat">A-16</td>
        <td id="a-17" class="seat">A-17</td>
        <td id="a-18" class="seat">A-18</td>
      </tr>
      <tr>
        <th>B</th>
        <td id="b-1" class="seat">B-1</td>
        <td id="b-2" class="seat">B-2</td>
        <td id="b-3" class="seat">B-3</td>
        <td id="b-4" class="seat">B-4</td>
        <td id="b-5" class="seat lMargin30">B-5</td>
        <td id="b-6" class="seat">B-6</td>
        <td id="b-7" class="seat">B-7</td>
        <td id="b-8" class="seat">B-8</td>
        <td id="b-9" class="seat">B-9</td>
        <td id="b-10" class="seat">B-10</td>
        <td id="b-11" class="seat">B-11</td>
        <td id="b-12" class="seat">B-12</td>
        <td id="b-13" class="seat">B-13</td>
        <td id="b-14" class="seat">B-14</td>
        <td id="b-15" class="seat">B-15</td>
        <td id="b-16" class="seat">B-16</td>
        <td id="b-17" class="seat">B-17</td>
        <td id="b-18" class="seat">B-18</td>
      </tr>
      <tr>
        <th>C</th>
        <td id="c-1" class="seat">C-1</td>
        <td id="c-2" class="seat">C-2</td>
        <td id="c-3" class="seat">C-3</td>
        <td id="c-4" class="seat">C-4</td>
        <td id="c-5" class="seat lMargin30">C-5</td>
        <td id="c-6" class="seat">C-6</td>
        <td id="c-7" class="seat">C-7</td>
        <td id="c-8" class="seat">C-8</td>
        <td id="c-9" class="seat">C-9</td>
        <td id="c-10" class="seat">C-10</td>
        <td id="c-11" class="seat">C-11</td>
        <td id="c-12" class="seat">C-12</td>
        <td id="c-13" class="seat">C-13</td>
        <td id="c-14" class="seat">C-14</td>
        <td id="c-15" class="seat">C-15</td>
        <td id="c-16" class="seat">C-16</td>
        <td id="c-17" class="seat">C-17</td>
        <td id="c-18" class="seat">C-18</td>
      </tr>
      <tr>
        <th>D</th>
        <td id="d-1" class="seat">D-1</td>
        <td id="d-2" class="seat">D-2</td>
        <td id="d-3" class="seat">D-3</td>
        <td id="d-4" class="seat">D-4</td>
        <td id="d-5" class="seat lMargin30">D-5</td>
        <td id="d-6" class="seat">D-6</td>
        <td id="d-7" class="seat">D-7</td>
        <td id="d-8" class="seat">D-8</td>
        <td id="d-9" class="seat">D-9</td>
        <td id="d-10" class="seat">D-10</td>
        <td id="d-11" class="seat">D-11</td>
        <td id="d-12" class="seat">D-12</td>
        <td id="d-13" class="seat">D-13</td>
        <td id="d-14" class="seat">D-14</td>
        <td id="d-15" class="seat">D-15</td>
        <td id="d-16" class="seat">D-16</td>
        <td id="d-17" class="seat">D-17</td>
        <td id="d-18" class="seat">D-18</td>
      </tr>
      <tr>
        <th>E</th>
        <td id="e-1" class="seat">E-1</td>
        <td id="e-2" class="seat">E-2</td>
        <td id="e-3" class="seat">E-3</td>
        <td id="e-4" class="seat">E-4</td>
        <td id="e-5" class="seat lMargin30">E-5</td>
        <td id="e-6" class="seat">E-6</td>
        <td id="e-7" class="seat">E-7</td>
        <td id="e-8" class="seat">E-8</td>
        <td id="e-9" class="seat">E-9</td>
        <td id="e-10" class="seat">E-10</td>
        <td id="e-11" class="seat">E-11</td>
        <td id="e-12" class="seat">E-12</td>
        <td id="e-13" class="seat">E-13</td>
        <td id="e-14" class="seat">E-14</td>
        <td id="e-15" class="seat">E-15</td>
        <td id="e-16" class="seat">E-16</td>
        <td id="e-17" class="seat">E-17</td>
        <td id="e-18" class="seat">E-18</td>
      </tr>
      <tr>
        <th>F</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="f-3" class="seat wheelChair">F-3</td>
        <td id="f-4" class="seat wheelChair">F-4</td>
        <td id="f-5" class="seat lMargin30">F-5</td>
        <td id="f-6" class="seat">F-6</td>
        <td id="f-7" class="seat">F-7</td>
        <td id="f-8" class="seat">F-8</td>
        <td id="f-9" class="seat">F-9</td>
        <td id="f-10" class="seat">F-10</td>
        <td id="f-11" class="seat">F-11</td>
        <td id="f-12" class="seat">F-12</td>
        <td id="f-13" class="seat">F-13</td>
        <td id="f-14" class="seat">F-14</td>
        <td id="f-15" class="seat">F-15</td>
        <td id="f-16" class="seat">F-16</td>
        <td id="f-17" class="seat">F-17</td>
        <td id="f-18" class="seat">F-18</td>
      </tr>
      <tr class="tMargin40">
        <th>G</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="g-5" class="seat lMargin30">G-5</td>
        <td id="g-6" class="seat">G-6</td>
        <td id="g-7" class="seat">G-7</td>
        <td id="g-8" class="seat">G-8</td>
        <td id="g-9" class="seat">G-9</td>
        <td id="g-10" class="seat">G-10</td>
        <td id="g-11" class="seat">G-11</td>
        <td id="g-12" class="seat">G-12</td>
        <td id="g-13" class="seat">G-13</td>
        <td id="g-14" class="seat">G-14</td>
        <td id="g-15" class="seat">G-15</td>
        <td id="g-16" class="seat">G-16</td>
        <td id="g-17" class="seat">G-17</td>
        <td id="g-18" class="seat">G-18</td>
      </tr>
      <tr>
        <th>H</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="h-5" class="seat lMargin30">H-5</td>
        <td id="h-6" class="seat">H-6</td>
        <td id="h-7" class="seat">H-7</td>
        <td id="h-8" class="seat">H-8</td>
        <td id="h-9" class="seat">H-9</td>
        <td id="h-10" class="seat">H-10</td>
        <td id="h-11" class="seat">H-11</td>
        <td id="h-12" class="seat">H-12</td>
        <td id="h-13" class="seat">H-13</td>
        <td id="h-14" class="seat">H-14</td>
        <td id="h-15" class="seat">H-15</td>
        <td id="h-16" class="seat">H-16</td>
        <td id="h-17" class="seat">H-17</td>
        <td id="h-18" class="seat">H-18</td>
      </tr>
      <tr>
        <th>I</th>
        <td id="i-1" class="seat">I-1</td>
        <td id="i-2" class="seat">I-2</td>
        <td id="i-3" class="seat">I-3</td>
        <td id="i-4" class="seat">I-4</td>
        <td id="i-5" class="seat lMargin30">I-5</td>
        <td id="i-6" class="seat">I-6</td>
        <td id="i-7" class="seat">I-7</td>
        <td id="i-8" class="seat">I-8</td>
        <td id="i-9" class="seat">I-9</td>
        <td id="i-10" class="seat">I-10</td>
        <td id="i-11" class="seat">I-11</td>
        <td id="i-12" class="seat">I-12</td>
        <td id="i-13" class="seat">I-13</td>
        <td id="i-14" class="seat">I-14</td>
        <td id="i-15" class="seat">I-15</td>
        <td id="i-16" class="seat">I-16</td>
        <td id="i-17" class="seat">I-17</td>
        <td id="i-18" class="seat">I-18</td>
      </tr>
      <tr>
        <th>J</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td id="j-5" class="seat lMargin30">J-5</td>
        <td id="j-6" class="seat">J-6</td>
        <td id="j-7" class="seat">J-7</td>
        <td id="j-8" class="seat">J-8</td>
        <td id="j-9" class="seat">J-9</td>
        <td id="j-10" class="seat">J-10</td>
        <td id="j-11" class="seat">J-11</td>
        <td id="j-12" class="seat">J-12</td>
        <td id="j-13" class="seat">J-13</td>
        <td id="j-14" class="seat">J-14</td>
        <td id="j-15" class="seat">J-15</td>
        <td id="j-16" class="seat">J-16</td>
        <td id="j-17" class="seat">J-17</td>
        <td id="j-18" class="seat">J-18</td>
      </tr>
    </table>
    </div><!-- BBlock 終わり-->
  </div>
  <div class="clear"></div>
  <div class="reserveTitle">
    <h3>利用規約</h3>
  </div>
  <div id="kiyaku"> ここに利用規約 </div>
  <!-- 利用規約 -テキストエリア表示 -->
  <div class="sertDecideButton">
    <form action="proposedReserve.php" method="post" id="postData">
      <input name="send" id="sendButton" type="submit" value="送信する">
    </form>
  </div>
</div>
<!-- 映画選択完了ボタン-->

<!--この先飲食物選択。プロトタイプでは未実装 -->
<!--
<div class="reserveTitle">
  <h3>飲み物･食べ物</h3>
</div>

<div id="sertDrink"></div>-->
<!-- 飲み物 470px m-r 40px -->
<!--
<div id="sertFood"></div>
-->
<!-- 飲み物 470px -->
<!--
<div class="clear"></div>
<div class="sertDecideButton"></div>-->
<!-- 映画選択完了ボタン（上のボタンと一緒）-->
<!--
</div>
-->
<?php
	require_once("../module/reserveFooter.php");
?>
