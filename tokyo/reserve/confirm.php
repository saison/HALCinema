<?php
	$pageTitle="確認";
	require_once("../module/reserveHeader.php");
?>

<!-- ここ中身 -->
<div id="content">
<!-- 座席予約ナビゲーション --><!-- 横幅980固定 -->
<div class="reserveTitle">
  <h3>以下の内容でよろしいですか？</h3>
</div>
<div class="confirmTable">
<h4>映画情報</h4>
<table>
<tr>
<th>劇場</th>
<td>HALCinema TOKYO</td>
</tr>
<tr>
<th>作品･日時</th>
<td><?php print "ここに作品日時"; ?></td>
</tr>
</table>
</div>

<div class="confirmTable">
<h4>座席</h4>
<table>
<tr>
<th>座席</th>
<td><?php print "座席番号"; ?></td>
</tr>
<tr>
<th>購入枚数</th>
<td><?php print "大人×3枚"; ?></td>
</tr>
</table>
</div>

<div class="confirmTable">
<h4>決済</h4>
<table>
<tr>
<th>決済方法</th>
<td><?php print "決済方法"; ?></td>
</tr>
<tr>
<th>金額</th>
<td><?php print "金額"; ?></td>
</tr>
</table>
</div>



<?php
	require_once("../module/reserveFooter.php");
?>