<div class="sertArrange">
  <div class="Ablock"><!-- Aブロック始まり -->
    <div class="sertScreenTitle clearfix">
      <p class="sertTitleCenter"><?php echo "HALCinemaTOKYO Screen<span class='captionBig'>".substr($screen,-1,1)."</span>"; ?><span class="captionBig">A</span>(Left)Block</p>
      <p class="sertChangeRight"><span class='captionBig'>B</span>(Right)Block ▶</p>
    </div>
    <?php
		$con = getConnection();
		$reserveListSql = "SELECT  seat_number FROM seat_reserve_list WHERE show_id = '{$showId}'" ;
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
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
      </tr>
      <tr>
        <th>A</th>
        <?php echo reserve("a-1",$arrayRearveList,"A-1","seat",0);?>
        <?php echo reserve("a-2",$arrayRearveList,"A-2","seat",0);?>
        <?php echo reserve("a-3",$arrayRearveList,"A-3","seat",0);?>
        <?php echo reserve("a-4",$arrayRearveList,"A-4","seat",0);?>
   		<?php echo reserve("a-5",$arrayRearveList,"A-5","seat",0);?>
        <?php echo reserve("a-6",$arrayRearveList,"A-6","seat",0);?>
        <?php echo reserve("a-7",$arrayRearveList,"A-7","seat",0);?>
        <?php echo reserve("a-8",$arrayRearveList,"A-8","seat",0);?>
        <?php echo reserve("a-9",$arrayRearveList,"A-9","seat",0);?>
   		<?php echo reserve("a-10",$arrayRearveList,"A-10","seat",0);?>
      </tr>
      <tr>
        <th>B</th>
        <?php echo reserve("b-1",$arrayRearveList,"B-1","seat",0);?>
        <?php echo reserve("b-2",$arrayRearveList,"B-2","seat",0);?>
        <?php echo reserve("b-3",$arrayRearveList,"B-3","seat",0);?>
        <?php echo reserve("b-4",$arrayRearveList,"B-4","seat",0);?>
   		<?php echo reserve("b-5",$arrayRearveList,"B-5","seat",0);?>
        <?php echo reserve("b-6",$arrayRearveList,"B-6","seat",0);?>
        <?php echo reserve("b-7",$arrayRearveList,"B-7","seat",0);?>
        <?php echo reserve("b-8",$arrayRearveList,"B-8","seat",0);?>
        <?php echo reserve("b-9",$arrayRearveList,"B-9","seat",0);?>
   		<?php echo reserve("b-10",$arrayRearveList,"B-10","seat",0);?>
      </tr>
      <tr>
        <th>C</th>
        <?php echo reserve("c-1",$arrayRearveList,"C-1","seat",0);?>
        <?php echo reserve("c-2",$arrayRearveList,"C-2","seat",0);?>
        <?php echo reserve("c-3",$arrayRearveList,"C-3","seat",0);?>
        <?php echo reserve("c-4",$arrayRearveList,"C-4","seat",0);?>
   		<?php echo reserve("c-5",$arrayRearveList,"C-5","seat",0);?>
        <?php echo reserve("c-6",$arrayRearveList,"C-6","seat",0);?>
        <?php echo reserve("c-7",$arrayRearveList,"C-7","seat",0);?>
        <?php echo reserve("c-8",$arrayRearveList,"C-8","seat",0);?>
        <?php echo reserve("c-9",$arrayRearveList,"C-9","seat",0);?>
   		<?php echo reserve("c-10",$arrayRearveList,"C-10","seat",0);?>
      </tr>
      <tr>
        <th>D</th>
        <?php echo reserve("d-1",$arrayRearveList,"D-1","seat",0);?>
        <?php echo reserve("d-2",$arrayRearveList,"D-2","seat",0);?>
        <?php echo reserve("d-3",$arrayRearveList,"D-3","seat",0);?>
        <?php echo reserve("d-4",$arrayRearveList,"D-4","seat",0);?>
   		<?php echo reserve("d-5",$arrayRearveList,"D-5","seat",0);?>
        <?php echo reserve("d-6",$arrayRearveList,"D-6","seat",0);?>
        <?php echo reserve("d-7",$arrayRearveList,"D-7","seat",0);?>
        <?php echo reserve("d-8",$arrayRearveList,"D-8","seat",0);?>
        <?php echo reserve("d-9",$arrayRearveList,"D-9","seat",0);?>
   		<?php echo reserve("d-10",$arrayRearveList,"D-10","seat",0);?>
      </tr>
      <tr>
        <th>E</th>
        <?php echo reserve("e-1",$arrayRearveList,"E-1","seat wheelChair",0);?>
        <?php echo reserve("e-2",$arrayRearveList,"E-2","seat wheelChair",0);?>
        <?php echo reserve("e-3",$arrayRearveList,"E-3","seat",0);?>
        <?php echo reserve("e-4",$arrayRearveList,"E-4","seat",0);?>
   		<?php echo reserve("e-5",$arrayRearveList,"E-5","seat",0);?>
        <?php echo reserve("e-6",$arrayRearveList,"E-6","seat",0);?>
        <?php echo reserve("e-7",$arrayRearveList,"E-7","seat",0);?>
        <?php echo reserve("e-8",$arrayRearveList,"E-8","seat",0);?>
        <?php echo reserve("e-9",$arrayRearveList,"E-9","seat",0);?>
   		<?php echo reserve("e-10",$arrayRearveList,"E-10","seat",0);?>
      </tr>
    </table>
    </div><!-- ABlock 終わり-->
    <div class="Bblock"><!-- Bブロック始まり -->
    <div class="sertScreenTitle clearfix">
    <p class="sertChangeLeft">◀ <span class='captionBig'>B</span>(Left)Block</p>
      <p class="sertTitleCenter"><?php echo "HALCinemaTOKYO Screen<span class='captionBig'>".substr($screen,-1,1)."</span>"; ?><span class="captionBig">A</span>(Right)Block</p>
    </div>
    <table id="ABlockSeat">
      <tr>
        <th></th>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
      </tr>
      <tr>
        <th>A</th>
        <?php echo reserve("a-11",$arrayRearveList,"A-11","seat",0);?>
        <?php echo reserve("a-12",$arrayRearveList,"A-12","seat",0);?>
        <?php echo reserve("a-13",$arrayRearveList,"A-13","seat",0);?>
        <?php echo reserve("a-14",$arrayRearveList,"A-14","seat",0);?>
   		<?php echo reserve("a-15",$arrayRearveList,"A-15","seat",0);?>
        <?php echo reserve("a-16",$arrayRearveList,"A-16","seat",0);?>
        <?php echo reserve("a-17",$arrayRearveList,"A-17","seat",0);?>
        <?php echo reserve("a-18",$arrayRearveList,"A-18","seat",0);?>
        <?php echo reserve("a-19",$arrayRearveList,"A-19","seat",0);?>
   		<?php echo reserve("a-20",$arrayRearveList,"A-20","seat",0);?>
      </tr>
      <tr>
        <th>B</th>
        <?php echo reserve("b-11",$arrayRearveList,"B-11","seat",0);?>
        <?php echo reserve("b-12",$arrayRearveList,"B-12","seat",0);?>
        <?php echo reserve("b-13",$arrayRearveList,"B-13","seat",0);?>
        <?php echo reserve("b-14",$arrayRearveList,"B-14","seat",0);?>
   		<?php echo reserve("b-15",$arrayRearveList,"B-15","seat",0);?>
        <?php echo reserve("b-16",$arrayRearveList,"B-16","seat",0);?>
        <?php echo reserve("b-17",$arrayRearveList,"B-17","seat",0);?>
        <?php echo reserve("b-18",$arrayRearveList,"B-18","seat",0);?>
        <?php echo reserve("b-19",$arrayRearveList,"B-19","seat",0);?>
   		<?php echo reserve("b-20",$arrayRearveList,"B-20","seat",0);?>
      </tr>
      <tr>
        <th>C</th>
        <?php echo reserve("c-11",$arrayRearveList,"C-11","seat",0);?>
        <?php echo reserve("c-12",$arrayRearveList,"C-12","seat",0);?>
        <?php echo reserve("c-13",$arrayRearveList,"C-13","seat",0);?>
        <?php echo reserve("c-14",$arrayRearveList,"C-14","seat",0);?>
   		<?php echo reserve("c-15",$arrayRearveList,"C-15","seat",0);?>
        <?php echo reserve("c-16",$arrayRearveList,"C-16","seat",0);?>
        <?php echo reserve("c-17",$arrayRearveList,"C-17","seat",0);?>
        <?php echo reserve("c-18",$arrayRearveList,"C-18","seat",0);?>
        <?php echo reserve("c-19",$arrayRearveList,"C-19","seat",0);?>
   		<?php echo reserve("c-20",$arrayRearveList,"C-20","seat",0);?>
      </tr>
      <tr>
        <th>D</th>
        <?php echo reserve("d-11",$arrayRearveList,"D-11","seat",0);?>
        <?php echo reserve("d-12",$arrayRearveList,"D-12","seat",0);?>
        <?php echo reserve("d-13",$arrayRearveList,"D-13","seat",0);?>
        <?php echo reserve("d-14",$arrayRearveList,"D-14","seat",0);?>
   		<?php echo reserve("d-15",$arrayRearveList,"D-15","seat",0);?>
        <?php echo reserve("d-16",$arrayRearveList,"D-16","seat",0);?>
        <?php echo reserve("d-17",$arrayRearveList,"D-17","seat",0);?>
        <?php echo reserve("d-18",$arrayRearveList,"D-18","seat",0);?>
        <?php echo reserve("d-19",$arrayRearveList,"D-19","seat",0);?>
   		<?php echo reserve("d-20",$arrayRearveList,"D-20","seat",0);?>
      </tr>
      <tr>
        <th>E</th>
        <?php echo reserve("e-11",$arrayRearveList,"E-11","seat",0);?>
        <?php echo reserve("e-12",$arrayRearveList,"E-12","seat",0);?>
        <?php echo reserve("e-13",$arrayRearveList,"E-13","seat",0);?>
        <?php echo reserve("e-14",$arrayRearveList,"E-14","seat",0);?>
   		<?php echo reserve("e-15",$arrayRearveList,"E-15","seat",0);?>
        <?php echo reserve("e-16",$arrayRearveList,"E-16","seat",0);?>
        <?php echo reserve("e-17",$arrayRearveList,"E-17","seat",0);?>
        <?php echo reserve("e-18",$arrayRearveList,"E-18","seat",0);?>
        <?php echo reserve("e-19",$arrayRearveList,"E-19","seat wheelChair",0);?>
   		<?php echo reserve("e-20",$arrayRearveList,"E-20","seat wheelChair",0);?>
        </tr>
    </table>
    </div><!-- BBlock 終わり-->
  </div>
  <div class="clear"></div>