<div class="sertArrange">
  <div class="Ablock"><!-- Aブロック始まり -->
    <div class="sertScreenTitle clearfix">
      <p class="sertTitleCenter"><?php echo "HALCinemaTOKYO Screen<span class='captionBig'>".substr($screenID,-1,1)."</span>"; ?><span class="captionBig">A</span>(Left)Block</p>
      <p class="sertChangeRight"><span class='captionBig'>B</span>(Right)Block ▶</p>
    </div>
    <?php
		require_once("../module/functions.php");
		$con = getConnection();
		$reserveListSql = "SELECT  seat_number FROM seat_reserve_list WHERE show_id = '{$showID}'" ;
		$reserveListResult = mysqli_query($con,$reserveListSql);
		$arrayRearveList = array();
		while(($rowReserveList = mysqli_fetch_array($reserveListResult)) != false){
			array_push($arrayRearveList ,$rowReserveList[0]);
		}
		mysqli_close($con);
		 
    ?>
    <table id="ABlockSeat">
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
      </tr>
      <tr>
        <th>A</th>
        <?php echo reserve("a-1",$arrayRearveList,"A-1","seat",0);?>
        <?php echo reserve("a-2",$arrayRearveList,"A-2","seat",0);?>
        <?php echo reserve("a-3",$arrayRearveList,"A-3","seat",0);?>
        <?php echo reserve("a-4",$arrayRearveList,"A-4","seat",0);?>
   		<?php echo reserve("a-5",$arrayRearveList,"A-5","seat lMargin30",1);?>
        <?php echo reserve("a-6",$arrayRearveList,"A-6","seat",0);?>
        <?php echo reserve("a-7",$arrayRearveList,"A-7","seat",0);?>
        <?php echo reserve("a-8",$arrayRearveList,"A-8","seat",0);?>
        <?php echo reserve("a-9",$arrayRearveList,"A-9","seat",0);?>
        <?php echo reserve("a-10",$arrayRearveList,"A-10","seat",0);?>
        <?php echo reserve("a-11",$arrayRearveList,"A-11","seat",0);?>
        <?php echo reserve("a-12",$arrayRearveList,"A-12","seat",0);?>
        <?php echo reserve("a-13",$arrayRearveList,"A-13","seat",0);?>
        <?php echo reserve("a-14",$arrayRearveList,"A-14","seat",0);?>
        <?php echo reserve("a-15",$arrayRearveList,"A-15","seat",0);?>
        <?php echo reserve("a-16",$arrayRearveList,"A-16","seat",0);?>
        <?php echo reserve("a-17",$arrayRearveList,"A-17","seat",0);?>
      </tr>
      <tr>
        <th>B</th>
        <?php echo reserve("b-1",$arrayRearveList,"B-1","seat",0);?>
        <?php echo reserve("b-2",$arrayRearveList,"B-2","seat",0);?>
        <?php echo reserve("b-3",$arrayRearveList,"B-3","seat",0);?>
        <?php echo reserve("b-4",$arrayRearveList,"B-4","seat",0);?>
   		<?php echo reserve("b-5",$arrayRearveList,"B-5","seat lMargin30",1);?>
        <?php echo reserve("b-6",$arrayRearveList,"B-6","seat",0);?>
        <?php echo reserve("b-7",$arrayRearveList,"B-7","seat",0);?>
        <?php echo reserve("b-8",$arrayRearveList,"B-8","seat",0);?>
        <?php echo reserve("b-9",$arrayRearveList,"B-9","seat",0);?>
        <?php echo reserve("b-10",$arrayRearveList,"B-10","seat",0);?>
        <?php echo reserve("b-11",$arrayRearveList,"B-11","seat",0);?>
        <?php echo reserve("b-12",$arrayRearveList,"B-12","seat",0);?>
        <?php echo reserve("b-13",$arrayRearveList,"B-13","seat",0);?>
        <?php echo reserve("b-14",$arrayRearveList,"B-14","seat",0);?>
        <?php echo reserve("b-15",$arrayRearveList,"B-15","seat",0);?>
        <?php echo reserve("b-16",$arrayRearveList,"B-16","seat",0);?>
        <?php echo reserve("b-17",$arrayRearveList,"B-17","seat",0);?>
      </tr>
      <tr>
        <th>C</th>
        <?php echo reserve("c-1",$arrayRearveList,"C-1","seat",0);?>
        <?php echo reserve("c-2",$arrayRearveList,"C-2","seat",0);?>
        <?php echo reserve("c-3",$arrayRearveList,"C-3","seat",0);?>
        <?php echo reserve("c-4",$arrayRearveList,"C-4","seat",0);?>
   		<?php echo reserve("c-5",$arrayRearveList,"C-5","seat lMargin30",1);?>
        <?php echo reserve("c-6",$arrayRearveList,"C-6","seat",0);?>
        <?php echo reserve("c-7",$arrayRearveList,"C-7","seat",0);?>
        <?php echo reserve("c-8",$arrayRearveList,"C-8","seat",0);?>
        <?php echo reserve("c-9",$arrayRearveList,"C-9","seat",0);?>
        <?php echo reserve("c-10",$arrayRearveList,"C-10","seat",0);?>
        <?php echo reserve("c-11",$arrayRearveList,"C-11","seat",0);?>
        <?php echo reserve("c-12",$arrayRearveList,"C-12","seat",0);?>
        <?php echo reserve("c-13",$arrayRearveList,"C-13","seat",0);?>
        <?php echo reserve("c-14",$arrayRearveList,"C-14","seat",0);?>
        <?php echo reserve("c-15",$arrayRearveList,"C-15","seat",0);?>
        <?php echo reserve("c-16",$arrayRearveList,"C-16","seat",0);?>
        <?php echo reserve("c-17",$arrayRearveList,"C-17","seat",0);?>
      </tr>
      <tr>
        <th>D</th>
        <?php echo reserve("d-1",$arrayRearveList,"D-1","seat",0);?>
        <?php echo reserve("d-2",$arrayRearveList,"D-2","seat",0);?>
        <?php echo reserve("d-3",$arrayRearveList,"D-3","seat",0);?>
        <?php echo reserve("d-4",$arrayRearveList,"D-4","seat",0);?>
   		<?php echo reserve("d-5",$arrayRearveList,"D-5","seat lMargin30",1);?>
        <?php echo reserve("d-6",$arrayRearveList,"D-6","seat",0);?>
        <?php echo reserve("d-7",$arrayRearveList,"D-7","seat",0);?>
        <?php echo reserve("d-8",$arrayRearveList,"D-8","seat",0);?>
        <?php echo reserve("d-9",$arrayRearveList,"D-9","seat",0);?>
        <?php echo reserve("d-10",$arrayRearveList,"D-10","seat",0);?>
        <?php echo reserve("d-11",$arrayRearveList,"D-11","seat",0);?>
        <?php echo reserve("d-12",$arrayRearveList,"D-12","seat",0);?>
        <?php echo reserve("d-13",$arrayRearveList,"D-13","seat",0);?>
        <?php echo reserve("d-14",$arrayRearveList,"D-14","seat",0);?>
        <?php echo reserve("d-15",$arrayRearveList,"D-15","seat",0);?>
        <?php echo reserve("d-16",$arrayRearveList,"D-16","seat",0);?>
        <?php echo reserve("d-17",$arrayRearveList,"D-17","seat",0);?>
      </tr>
      <tr>
        <th>E</th>
        <?php echo reserve("e-1",$arrayRearveList,"E-1","seat",0);?>
        <?php echo reserve("e-2",$arrayRearveList,"E-2","seat",0);?>
        <?php echo reserve("e-3",$arrayRearveList,"E-3","seat",0);?>
        <?php echo reserve("e-4",$arrayRearveList,"E-4","seat",0);?>
   		<?php echo reserve("e-5",$arrayRearveList,"E-5","seat lMargin30",1);?>
        <?php echo reserve("e-6",$arrayRearveList,"E-6","seat",0);?>
        <?php echo reserve("e-7",$arrayRearveList,"E-7","seat",0);?>
        <?php echo reserve("e-8",$arrayRearveList,"E-8","seat",0);?>
        <?php echo reserve("e-9",$arrayRearveList,"E-9","seat",0);?>
        <?php echo reserve("e-10",$arrayRearveList,"E-10","seat",0);?>
        <?php echo reserve("e-11",$arrayRearveList,"E-11","seat",0);?>
        <?php echo reserve("e-12",$arrayRearveList,"E-12","seat",0);?>
        <?php echo reserve("e-13",$arrayRearveList,"E-13","seat",0);?>
        <?php echo reserve("e-14",$arrayRearveList,"E-14","seat",0);?>
        <?php echo reserve("e-15",$arrayRearveList,"E-15","seat",0);?>
        <?php echo reserve("e-16",$arrayRearveList,"E-16","seat",0);?>
        <?php echo reserve("e-17",$arrayRearveList,"E-17","seat",0);?>
      </tr>
      <tr>
        <th>F</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <?php echo reserve("f-3",$arrayRearveList,"F-3","seat wheelChair",0);?>
        <?php echo reserve("f-4",$arrayRearveList,"F-4","seat wheelChair",0);?>
   		<?php echo reserve("f-5",$arrayRearveList,"F-5","seat lMargin30",1);?>
        <?php echo reserve("f-6",$arrayRearveList,"F-6","seat",0);?>
        <?php echo reserve("f-7",$arrayRearveList,"F-7","seat",0);?>
        <?php echo reserve("f-8",$arrayRearveList,"F-8","seat",0);?>
        <?php echo reserve("f-9",$arrayRearveList,"F-9","seat",0);?>
        <?php echo reserve("f-10",$arrayRearveList,"F-10","seat",0);?>
        <?php echo reserve("f-11",$arrayRearveList,"F-11","seat",0);?>
        <?php echo reserve("f-12",$arrayRearveList,"F-12","seat",0);?>
        <?php echo reserve("f-13",$arrayRearveList,"F-13","seat",0);?>
        <?php echo reserve("f-14",$arrayRearveList,"F-14","seat",0);?>
        <?php echo reserve("f-15",$arrayRearveList,"F-15","seat",0);?>
        <?php echo reserve("f-16",$arrayRearveList,"F-16","seat",0);?>
        <?php echo reserve("f-17",$arrayRearveList,"F-17","seat",0);?>
      </tr>
      <tr class="tMargin40">
        <th>G</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
   		<?php echo reserve("g-5",$arrayRearveList,"G-5","seat lMargin30",1);?>
        <?php echo reserve("g-6",$arrayRearveList,"G-6","seat",0);?>
        <?php echo reserve("g-7",$arrayRearveList,"G-7","seat",0);?>
        <?php echo reserve("g-8",$arrayRearveList,"G-8","seat",0);?>
        <?php echo reserve("g-9",$arrayRearveList,"G-9","seat",0);?>
        <?php echo reserve("g-10",$arrayRearveList,"G-10S","seat pear1",0);?>
        <?php echo reserve("g-11",$arrayRearveList,"G-11W","seat pear2",0);?>
        <?php echo reserve("g-12",$arrayRearveList,"G-12S","seat pear1",0);?>
        <?php echo reserve("g-13",$arrayRearveList,"G-13W","seat pear2",0);?>
        <?php echo reserve("g-14",$arrayRearveList,"G-14S","seat pear1",0);?>
        <?php echo reserve("g-15",$arrayRearveList,"G-15W","seat pear2",0);?>
        <?php echo reserve("g-16",$arrayRearveList,"G-16S","seat pear1",0);?>
        <?php echo reserve("g-17",$arrayRearveList,"G-17W","seat pear2",0);?>
      </tr>
      <tr>
        <th>H</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <?php echo reserve("h-5",$arrayRearveList,"H-5","seat lMargin30",1);?>
        <?php echo reserve("h-6",$arrayRearveList,"H-6","seat",0);?>
        <?php echo reserve("h-7",$arrayRearveList,"H-7","seat",0);?>
        <?php echo reserve("h-8",$arrayRearveList,"H-8","seat",0);?>
        <?php echo reserve("h-9",$arrayRearveList,"H-9","seat",0);?>
        <?php echo reserve("h-10",$arrayRearveList,"H-10","seat",0);?>
        <?php echo reserve("h-11",$arrayRearveList,"H-11","seat",0);?>
        <?php echo reserve("h-12",$arrayRearveList,"H-12","seat",0);?>
        <?php echo reserve("h-13",$arrayRearveList,"H-13","seat",0);?>
        <?php echo reserve("h-14",$arrayRearveList,"H-14","seat",0);?>
        <?php echo reserve("h-15",$arrayRearveList,"H-15","seat",0);?>
        <?php echo reserve("h-16",$arrayRearveList,"H-16","seat",0);?>
        <?php echo reserve("h-17",$arrayRearveList,"H-17","seat",0);?>
      </tr>
      <tr>
        <th>I</th>
        <?php echo reserve("i-1",$arrayRearveList,"I-1","seat",0);?>
        <?php echo reserve("i-2",$arrayRearveList,"I-2","seat",0);?>
        <?php echo reserve("i-3",$arrayRearveList,"I-3","seat",0);?>
        <?php echo reserve("i-4",$arrayRearveList,"I-4","seat",0);?>
   		<?php echo reserve("i-5",$arrayRearveList,"I-5","seat lMargin30",1);?>
        <?php echo reserve("i-6",$arrayRearveList,"I-6","seat",0);?>
        <?php echo reserve("i-7",$arrayRearveList,"I-7","seat",0);?>
        <?php echo reserve("i-8",$arrayRearveList,"I-8","seat",0);?>
        <?php echo reserve("i-9",$arrayRearveList,"I-9","seat",0);?>
        <?php echo reserve("i-10",$arrayRearveList,"I-10","seat",0);?>
        <?php echo reserve("i-11",$arrayRearveList,"I-11","seat",0);?>
        <?php echo reserve("i-12",$arrayRearveList,"I-12","seat",0);?>
        <?php echo reserve("i-13",$arrayRearveList,"I-13","seat",0);?>
        <?php echo reserve("i-14",$arrayRearveList,"I-14","seat",0);?>
        <?php echo reserve("i-15",$arrayRearveList,"I-15","seat",0);?>
        <?php echo reserve("i-16",$arrayRearveList,"I-16","seat",0);?>
        <?php echo reserve("i-17",$arrayRearveList,"I-17","seat",0);?>
      </tr>
      <tr>
        <th>J</th>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
        <?php echo reserve("j-5",$arrayRearveList,"J-5","seat lMargin30",1);?>
        <?php echo reserve("j-6",$arrayRearveList,"J-6","seat",0);?>
        <?php echo reserve("j-7",$arrayRearveList,"J-7","seat",0);?>
        <?php echo reserve("j-8",$arrayRearveList,"J-8","seat",0);?>
        <?php echo reserve("j-9",$arrayRearveList,"J-9","seat",0);?>
        <?php echo reserve("j-10",$arrayRearveList,"J-10","seat",0);?>
        <?php echo reserve("j-11",$arrayRearveList,"J-11","seat",0);?>
        <?php echo reserve("j-12",$arrayRearveList,"J-12","seat",0);?>
        <?php echo reserve("j-13",$arrayRearveList,"J-13","seat",0);?>
        <?php echo reserve("j-14",$arrayRearveList,"J-14","seat",0);?>
        <?php echo reserve("j-15",$arrayRearveList,"J-15","seat",0);?>
        <?php echo reserve("j-16",$arrayRearveList,"J-16","seat",0);?>
        <?php echo reserve("j-17",$arrayRearveList,"J-17","seat",0);?>
      </tr>
    </table>
    </div><!-- ABlock 終わり-->
    
    <div class="Bblock"><!-- Bブロック始まり -->
    <div class="sertScreenTitle clearfix">
    <p class="sertChangeLeft">◀ <span class='captionBig'>A</span>(Left)Block</p>
      <p class="sertTitleCenter"><?php echo "HALCinemaTOKYO Screen<span class='captionBig'>".substr($screenID,-1,1)."</span>"; ?><span class="captionBig">B</span>(Right)Block</p>
      
    </div>
    <table id="ABlockSeat">
      <tr>
        <th></th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
        <th>21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>25</th>
        <th>26</th>
        <th>27</th>
        <th>28</th>
        <th>29</th>
							 <th class=" lMargin30">30</th>
        <th>31</th>
        <th>32</th>
        <th>33</th>
      </tr>
      <tr>
        <th>A</th>
        <?php echo reserve("a-18",$arrayRearveList,"A-18","seat",0);?>
        <?php echo reserve("a-19",$arrayRearveList,"A-19","seat",0);?>
        <?php echo reserve("a-20",$arrayRearveList,"A-20","seat",0);?>
        <?php echo reserve("a-21",$arrayRearveList,"A-21","seat",0);?>
   		<?php echo reserve("a-22",$arrayRearveList,"A-22","seat",0);?>
        <?php echo reserve("a-23",$arrayRearveList,"A-23","seat",0);?>
        <?php echo reserve("a-24",$arrayRearveList,"A-24","seat",0);?>
        <?php echo reserve("a-25",$arrayRearveList,"A-25","seat",0);?>
        <?php echo reserve("a-26",$arrayRearveList,"A-26","seat",0);?>
        <?php echo reserve("a-27",$arrayRearveList,"A-27","seat",0);?>
        <?php echo reserve("a-28",$arrayRearveList,"A-28","seat",0);?>
        <?php echo reserve("a-29",$arrayRearveList,"A-29","seat",0);?>
        <?php echo reserve("a-30",$arrayRearveList,"A-30","seat  lMargin30",1);?>
        <?php echo reserve("a-31",$arrayRearveList,"A-31","seat",0);?>
        <?php echo reserve("a-32",$arrayRearveList,"A-32","seat",0);?>
        <?php echo reserve("a-33",$arrayRearveList,"A-33","seat",0);?>
      </tr>
      <tr>
        <th>B</th>
        <?php echo reserve("b-18",$arrayRearveList,"B-18","seat",0);?>
        <?php echo reserve("b-19",$arrayRearveList,"B-19","seat",0);?>
        <?php echo reserve("b-20",$arrayRearveList,"B-20","seat",0);?>
        <?php echo reserve("b-21",$arrayRearveList,"B-21","seat",0);?>
   		<?php echo reserve("b-22",$arrayRearveList,"B-22","seat",0);?>
        <?php echo reserve("b-23",$arrayRearveList,"B-23","seat",0);?>
        <?php echo reserve("b-24",$arrayRearveList,"B-24","seat",0);?>
        <?php echo reserve("b-25",$arrayRearveList,"B-25","seat",0);?>
        <?php echo reserve("b-26",$arrayRearveList,"B-26","seat",0);?>
        <?php echo reserve("b-27",$arrayRearveList,"B-27","seat",0);?>
        <?php echo reserve("b-28",$arrayRearveList,"B-28","seat",0);?>
        <?php echo reserve("b-29",$arrayRearveList,"B-29","seat",0);?>
        <?php echo reserve("b-30",$arrayRearveList,"B-30","seat  lMargin30",1);?>
        <?php echo reserve("b-31",$arrayRearveList,"B-31","seat",0);?>
        <?php echo reserve("b-32",$arrayRearveList,"B-32","seat",0);?>
        <?php echo reserve("b-33",$arrayRearveList,"B-33","seat",0);?>
      </tr>
      <tr>
        <th>C</th>
        <?php echo reserve("c-18",$arrayRearveList,"C-18","seat",0);?>
        <?php echo reserve("c-19",$arrayRearveList,"C-19","seat",0);?>
        <?php echo reserve("c-20",$arrayRearveList,"C-20","seat",0);?>
        <?php echo reserve("c-21",$arrayRearveList,"C-21","seat",0);?>
   		<?php echo reserve("c-22",$arrayRearveList,"C-22","seat",0);?>
        <?php echo reserve("c-23",$arrayRearveList,"C-23","seat",0);?>
        <?php echo reserve("c-24",$arrayRearveList,"C-24","seat",0);?>
        <?php echo reserve("c-25",$arrayRearveList,"C-25","seat",0);?>
        <?php echo reserve("c-26",$arrayRearveList,"C-26","seat",0);?>
        <?php echo reserve("c-27",$arrayRearveList,"C-27","seat",0);?>
        <?php echo reserve("c-28",$arrayRearveList,"C-28","seat",0);?>
        <?php echo reserve("c-29",$arrayRearveList,"C-29","seat",0);?>
        <?php echo reserve("c-30",$arrayRearveList,"C-30","seat  lMargin30",1);?>
        <?php echo reserve("c-31",$arrayRearveList,"C-31","seat",0);?>
        <?php echo reserve("c-32",$arrayRearveList,"C-32","seat",0);?>
        <?php echo reserve("c-33",$arrayRearveList,"C-33","seat",0);?>
      </tr>
      <tr>
        <th>D</th>
        <?php echo reserve("d-18",$arrayRearveList,"D-18","seat",0);?>
        <?php echo reserve("d-19",$arrayRearveList,"D-19","seat",0);?>
        <?php echo reserve("d-20",$arrayRearveList,"D-20","seat",0);?>
        <?php echo reserve("d-21",$arrayRearveList,"D-21","seat",0);?>
   		<?php echo reserve("d-22",$arrayRearveList,"D-22","seat",0);?>
        <?php echo reserve("d-23",$arrayRearveList,"D-23","seat",0);?>
        <?php echo reserve("d-24",$arrayRearveList,"D-24","seat",0);?>
        <?php echo reserve("d-25",$arrayRearveList,"D-25","seat",0);?>
        <?php echo reserve("d-26",$arrayRearveList,"D-26","seat",0);?>
        <?php echo reserve("d-27",$arrayRearveList,"D-27","seat",0);?>
        <?php echo reserve("d-28",$arrayRearveList,"D-28","seat",0);?>
        <?php echo reserve("d-29",$arrayRearveList,"D-29","seat",0);?>
        <?php echo reserve("d-30",$arrayRearveList,"D-30","seat  lMargin30",1);?>
        <?php echo reserve("d-31",$arrayRearveList,"D-31","seat",0);?>
        <?php echo reserve("d-32",$arrayRearveList,"D-32","seat",0);?>
        <?php echo reserve("d-33",$arrayRearveList,"D-33","seat",0);?>
      </tr>
      <tr>
        <th>E</th>
        <?php echo reserve("e-18",$arrayRearveList,"E-18","seat",0);?>
        <?php echo reserve("e-19",$arrayRearveList,"E-19","seat",0);?>
        <?php echo reserve("e-20",$arrayRearveList,"E-20","seat",0);?>
        <?php echo reserve("e-21",$arrayRearveList,"E-21","seat",0);?>
   		<?php echo reserve("e-22",$arrayRearveList,"E-22","seat",0);?>
        <?php echo reserve("e-23",$arrayRearveList,"E-23","seat",0);?>
        <?php echo reserve("e-24",$arrayRearveList,"E-24","seat",0);?>
        <?php echo reserve("e-25",$arrayRearveList,"E-25","seat",0);?>
        <?php echo reserve("e-26",$arrayRearveList,"E-26","seat",0);?>
        <?php echo reserve("e-27",$arrayRearveList,"E-27","seat",0);?>
        <?php echo reserve("e-28",$arrayRearveList,"E-28","seat",0);?>
        <?php echo reserve("e-29",$arrayRearveList,"E-29","seat",0);?>
        <?php echo reserve("e-30",$arrayRearveList,"E-30","seat  lMargin30",1);?>
        <?php echo reserve("e-31",$arrayRearveList,"E-31","seat",0);?>
        <?php echo reserve("e-32",$arrayRearveList,"E-32","seat",0);?>
        <?php echo reserve("e-33",$arrayRearveList,"E-33","seat",0);?>
      </tr>
      <tr>
        <th>F</th>
        <?php echo reserve("f-18",$arrayRearveList,"F-18","seat",0);?>
        <?php echo reserve("f-19",$arrayRearveList,"F-19","seat",0);?>
        <?php echo reserve("f-20",$arrayRearveList,"F-20","seat",0);?>
        <?php echo reserve("f-21",$arrayRearveList,"F-21","seat",0);?>
   		<?php echo reserve("f-22",$arrayRearveList,"F-22","seat",0);?>
        <?php echo reserve("f-23",$arrayRearveList,"F-23","seat",0);?>
        <?php echo reserve("f-24",$arrayRearveList,"F-24","seat",0);?>
        <?php echo reserve("f-25",$arrayRearveList,"F-25","seat",0);?>
        <?php echo reserve("f-26",$arrayRearveList,"F-26","seat",0);?>
        <?php echo reserve("f-27",$arrayRearveList,"F-27","seat",0);?>
        <?php echo reserve("f-28",$arrayRearveList,"F-28","seat",0);?>
        <?php echo reserve("f-29",$arrayRearveList,"F-29","seat",0);?>
        <?php echo reserve("f-30",$arrayRearveList,"F-30","seat lMargin30 wheelChair",1);?>
        <?php echo reserve("f-31",$arrayRearveList,"F-31","seat wheelChair",0);?>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
      </tr>
      <tr class="tMargin40">
        <th>G</th>
        <?php echo reserve("g-18",$arrayRearveList,"G-18S","pearSeat pear1",0);?>
        <?php echo reserve("g-19",$arrayRearveList,"G-19W","pearSeat pear2",0);?>
        <?php echo reserve("g-20",$arrayRearveList,"G-20S","pearSeat pear1",0);?>
        <?php echo reserve("g-21",$arrayRearveList,"G-21W","pearSeat pear2",0);?>
   		<?php echo reserve("g-22",$arrayRearveList,"G-22S","pearSeat pear1",0);?>
        <?php echo reserve("g-23",$arrayRearveList,"G-23W","pearSeat pear2",0);?>
        <?php echo reserve("g-24",$arrayRearveList,"G-24S","pearSeat pear1",0);?>
        <?php echo reserve("g-25",$arrayRearveList,"G-25W","pearSeat pear2",0);?>
        <?php echo reserve("g-26",$arrayRearveList,"G-26","seat",0);?>
        <?php echo reserve("g-27",$arrayRearveList,"G-27","seat",0);?>
        <?php echo reserve("g-28",$arrayRearveList,"G-28","seat",0);?>
        <?php echo reserve("g-29",$arrayRearveList,"G-29","seat",0);?>
		<td class="notSeat lMargin30"></td>
		<td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
      </tr>
      <tr>
        <th>H</th>
        <?php echo reserve("h-18",$arrayRearveList,"H-18","seat",0);?>
        <?php echo reserve("h-19",$arrayRearveList,"H-19","seat",0);?>
        <?php echo reserve("h-20",$arrayRearveList,"H-20","seat",0);?>
        <?php echo reserve("h-21",$arrayRearveList,"H-21","seat",0);?>
   		<?php echo reserve("h-22",$arrayRearveList,"H-22","seat",0);?>
        <?php echo reserve("h-23",$arrayRearveList,"H-23","seat",0);?>
        <?php echo reserve("h-24",$arrayRearveList,"H-24","seat",0);?>
        <?php echo reserve("h-25",$arrayRearveList,"H-25","seat",0);?>
        <?php echo reserve("h-26",$arrayRearveList,"H-26","seat",0);?>
        <?php echo reserve("h-27",$arrayRearveList,"H-27","seat",0);?>
        <?php echo reserve("h-28",$arrayRearveList,"H-28","seat",0);?>
        <?php echo reserve("h-29",$arrayRearveList,"H-29","seat",0);?>
		<td class="notSeat lMargin30"></td>
		<td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
      </tr>
      <tr>
        <th>I</th>
        <?php echo reserve("i-18",$arrayRearveList,"I-18","seat",0);?>
        <?php echo reserve("i-19",$arrayRearveList,"I-19","seat",0);?>
        <?php echo reserve("i-20",$arrayRearveList,"I-20","seat",0);?>
        <?php echo reserve("i-21",$arrayRearveList,"I-21","seat",0);?>
   		<?php echo reserve("i-22",$arrayRearveList,"I-22","seat",0);?>
        <?php echo reserve("i-23",$arrayRearveList,"I-23","seat",0);?>
        <?php echo reserve("i-24",$arrayRearveList,"I-24","seat",0);?>
        <?php echo reserve("i-25",$arrayRearveList,"I-25","seat",0);?>
        <?php echo reserve("i-26",$arrayRearveList,"I-26","seat",0);?>
        <?php echo reserve("i-27",$arrayRearveList,"I-27","seat",0);?>
        <?php echo reserve("i-28",$arrayRearveList,"I-28","seat",0);?>
        <?php echo reserve("i-29",$arrayRearveList,"I-29","seat",0);?>
        <?php echo reserve("i-30",$arrayRearveList,"I-30","seat  lMargin30",1);?>
        <?php echo reserve("i-31",$arrayRearveList,"I-31","seat",0);?>
        <?php echo reserve("i-32",$arrayRearveList,"I-32","seat",0);?>
        <?php echo reserve("i-33",$arrayRearveList,"I-33","seat",0);?>
      </tr>
      <tr>
        <th>J</th>
        <?php echo reserve("j-18",$arrayRearveList,"J-18","seat",0);?>
        <?php echo reserve("j-19",$arrayRearveList,"J-19","seat",0);?>
        <?php echo reserve("j-20",$arrayRearveList,"J-20","seat",0);?>
        <?php echo reserve("j-21",$arrayRearveList,"J-21","seat",0);?>
   		<?php echo reserve("j-22",$arrayRearveList,"J-22","seat",0);?>
        <?php echo reserve("j-23",$arrayRearveList,"J-23","seat",0);?>
        <?php echo reserve("j-24",$arrayRearveList,"J-24","seat",0);?>
        <?php echo reserve("j-25",$arrayRearveList,"J-25","seat",0);?>
        <?php echo reserve("j-26",$arrayRearveList,"J-26","seat",0);?>
        <?php echo reserve("j-27",$arrayRearveList,"J-27","seat",0);?>
        <?php echo reserve("j-28",$arrayRearveList,"J-28","seat",0);?>
        <?php echo reserve("j-29",$arrayRearveList,"J-29","seat",0);?>
		<td class="notSeat lMargin30"></td>
		<td class="notSeat"></td>
        <td class="notSeat"></td>
        <td class="notSeat"></td>
      </tr>
    </table>
    </div><!-- BBlock 終わり-->
  </div>
  <div class="clear"></div>