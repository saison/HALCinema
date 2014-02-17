<?PHP
	$pageTitle="【開発者】パーツ一覧";
	require_once("../header.php");
?>
<link rel="stylesheet" href="../../tokyo/module/css/base.css" media="screen">
	<h2>【開発者】パーツ一覧</h2>
	<p>フロントエンドのパーツ一覧です。フロントエンドの全てのページで以下の部品を使用することが出来ます。Floatの関係上崩れる場合があります。</p>

<ul class="nav nav-pills">
  <li><a href="#kiso">ページ基礎(メニューも含む)</a></li>
  <li><a href="#title">タイトル</a></li>
  <li><a href="#font">フォント</a></li>
  <li><a href="#yohaku">余白</a></li>
</ul>

<h3 id="kiso">ページ基礎</h3>
<h4>コンテンツページ</h4>
<p>コンテンツページの基礎です。このコードがないとコンテンツとして読み込みません。<strong>多くのルールが有ります。必ずルールを確認して使用してください</strong>。</p>

<div class="panel panel-info">
<div class="panel-heading">
<h5>コンテンツページ基礎</h5>
</div>
<div class="panel-body">
$pageTitle="ページタイトル";<br>
コンテンツは#mainContentの中に入れてください。<br>
h2は#mainContentの外に書いてください。。
<pre>&lt;?PHP
	$pageTitle = "";
	require_once("../module/header.php");
?&gt;
&lt;div id="mainContent"&gt;

&lt;/div&gt;
&lt;?PHP
	require_once("../module/footer.php");
?&gt;</pre>
</div>
</div>


<h4>フロート</h4>
<p>フロートを使用する際に使用してください。<strong>通常はclearFixを使用してください。どうしてもfloatが解除されない時はclass="clear"を使用してください</strong>。</p>

<div class="panel panel-success">
<div class="panel-heading">
<h5>clearFix</h5>
</div>
<div class="panel-body">
&lt;div class="clearfix"&gt; //floatをかけているboxを囲って指定してください<br>
 &lt;div id="floatL"&gt; //左側のBOX><br>
  &lt;p&gt;左&lt;/p&gt;<br>
 &lt;/div&gt;<br>
 &lt;div id="floatR"&gt; //右側のBOX<br>
  &lt;p&gt;右&lt;/p&gt;<br>
 &lt;/div&gt;<br>
&lt;/div&gt;<br>
<pre>class="clearFix"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>clear</h5>
</div>
<div class="panel-body">
  &lt;div class="clear"&gt;&lt;/div&gt;　をフロートを解除したい部分に指定してください。
<pre>class="clear"</pre>
</div>
</div>


<h3 id="title">タイトル</h3>

<p>映画館ページ部分、予約部分で使用する2つのパーツが用意されています。</p>

<h4>h2~h5(映画館ページ部分)</h4>
<p>h2~h5のタイトルです。<strong>マージンなどは指定していません。マージンは各部品を指定してください</strong>。<br>
BootStrapの関係上見た目が異なる場合があります。</p>

<div class="panel panel-info">
<div class="panel-heading">
<h5>h2</h5>
</div>
<div class="panel-body">
<div class="movieTitle">
  <h2>h2タイトル<small>サブタイトルです</small></h2>
</div>
<pre>&lt;div class="movieTitle"&gt;
  &lt;h2&gt;h2タイトル&lt;small&gt;サブタイトルです&lt;/small&gt;&lt;/h2&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>h3</h5>
</div>
<div class="panel-body">
<div class="movieTitle">
  <h3>h3タイトル</h3>
</div>
<pre>&lt;div class="movieTitle"&gt;
  &lt;h3&gt;h3タイトル&lt;/h3&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>h4</h5>
</div>
<div class="panel-body">
<div class="movieTitle">
  <h4>h4タイトル</h4>
</div>
<pre>&lt;div class="movieTitle"&gt;
  &lt;h4&gt;h4タイトル&lt;/h4&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>h5</h5>
</div>
<div class="panel-body">
<div class="movieTitle">
  <h5>h5タイトル</h5>
</div>
<pre>&lt;div class="movieTitle"&gt;
  &lt;h5&gt;h5タイトル&lt;/h5&gt;
&lt;/div&gt;</pre>
</div>
</div>


<h4>h2~h5(予約ページ部分)</h4>
<p>h2~h5のタイトルです。<strong>マージンなどは指定していません。マージンは各部品を指定してください</strong>。<br>
BootStrapの関係上見た目が異なる場合があります。</p>

<div class="panel panel-success">
<div class="panel-heading">
<h5>h2</h5>
</div>
<div class="panel-body">
<div class="reserveTitle">
  <h2>h2タイトル</h2>
</div>
<pre>&lt;div class="reserveTitle"&gt;
  &lt;h2&gt;h2タイトル&lt;/h2&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>h3</h5>
</div>
<div class="panel-body">
<div class="reserveTitle">
  <h3>h3タイトル</h3>
</div>
<pre>&lt;div class="reserveTitle"&gt;
  &lt;h3&gt;h3タイトル&lt;/h3&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>h4</h5>
</div>
<div class="panel-body">
<div class="reserveTitle">
  <h4>h4タイトル</h4>
</div>
<pre>&lt;div class="reserveTitle"&gt;
  &lt;h4&gt;h4タイトル&lt;/h4&gt;
&lt;/div&gt;</pre>
</div>
</div>



<h3 id="font">フォント</h3>
<h4>フォントサイズ</h4>
<p>フォントサイズを指定します。標準フォントサイズは100%です。<strong>入れ子構造の場合は使用する際に注意してください</strong>。</p>
<div class="panel panel-info">
<div class="panel-heading">
<h5 class="bigText">文字を少し大きくします</h5>
</div>
<div class="panel-body">
<pre>class="bigText"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5 class="largeText">文字を大きくします</h5>
</div>
<div class="panel-body">
<pre>class="largeText"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5 class="smallText">文字を少し小さくします</h5>
</div>
<div class="panel-body">
<pre>class="smallText"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5 class="microText">文字を小さくします</h5>
</div>
<div class="panel-body">
<pre>class="microText"</pre>
</div>
</div>


<h4>装飾</h4>
<p>文字に装飾します</p>
<div class="panel panel-success">
<div class="panel-heading">
<h5 class="fontBold">文字を太くします</h5>
</div>
<div class="panel-body">
<pre>class="fontBold"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5 class="fontItalic">文字を斜体にします</h5>
</div>
<div class="panel-body">
<pre>class="fontItalic"</pre>
</div>
</div>


<h4>色</h4>
<p>文字に色をつけます</p>
<div class="panel panel-warning">
<div class="panel-heading">
<h5 class="fontCRed">文字を赤色にします</h5>
</div>
<div class="panel-body">
<pre>class="fontCRed"</pre>
</div>
</div>

<div class="panel panel-warning">
<div class="panel-heading">
<h5 class="fontCYellow">文字を黄色にします</h5>
</div>
<div class="panel-body">
<pre>class="fontCYellow"</pre>
</div>
</div>

<div class="panel panel-warning">
<div class="panel-heading">
<h5 class="fontCBlue">文字を青色にします</h5>
</div>
<div class="panel-body">
<pre>class="fontCBlue"</pre>
</div>
</div>



<h3 id="yohaku">余白</h3>
<h4>マージン(margin)</h4>
<p>マージンを開けたいときに使用してください。全てのマージンを開けるタイプ、上下を開けるタイプ、左右を開けるタイプが有ります。<strong>使用時はマージンの相殺に注意してください！</strong></p>
<div class="panel panel-info">
<div class="panel-heading">
<h5>margin:5px</h5>
</div>
<div class="panel-body">
<pre>class="m5"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin:10px</h5>
</div>
<div class="panel-body">
<pre>class="m10"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin:15px</h5>
</div>
<div class="panel-body">
<pre>class="m15"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin:20px</h5>
</div>
<div class="panel-body">
<pre>class="m20"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin:30px</h5>
</div>
<div class="panel-body">
<pre>class="m30"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin:50px</h5>
</div>
<div class="panel-body">
<pre>class="m50"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-left:5px<br>margin-right:5px</h5>
</div>
<div class="panel-body">
<pre>class="mlr5"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-left:10px<br>margin-right:10px</h5>
</div>
<div class="panel-body">
<pre>class="mlr10"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-left:15px<br>margin-right:15px</h5>
</div>
<div class="panel-body">
<pre>class="mlr15"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-left:20px<br>margin-right:20px</h5>
</div>
<div class="panel-body">
<pre>class="mlr20"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-left:30px<br>margin-right:30px</h5>
</div>
<div class="panel-body">
<pre>class="mlr30"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-left:50px<br>margin-right:50px</h5>
</div>
<div class="panel-body">
<pre>class="mlr50"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-top:5px<br>margin-bottom:5px</h5>
</div>
<div class="panel-body">
<pre>class="mtb5"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-top:10px<br>margin-bottom:10px</h5>
</div>
<div class="panel-body">
<pre>class="mtb10"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-top:15px<br>margin-bottom:15px</h5>
</div>
<div class="panel-body">
<pre>class="mtb15"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-top:20px<br>margin-bottom:20px</h5>
</div>
<div class="panel-body">
<pre>class="mtb20"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-top:30px<br>margin-bottom:30px</h5>
</div>
<div class="panel-body">
<pre>class="mtb30"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>margin-top:50px<br>margin-bottom:50px</h5>
</div>
<div class="panel-body">
<pre>class="mtb50"</pre>
</div>
</div>


<h4>パディング(padding)</h4>
<p>パディングを開けたいときに使用してください。全てのパディングを開けるタイプ、上下を開けるタイプ、左右を開けるタイプが有ります。</p>


<div class="panel panel-success">
<div class="panel-heading">
<h5>padding:5px</h5>
</div>
<div class="panel-body">
<pre>class="p5"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding:10px</h5>
</div>
<div class="panel-body">
<pre>class="p10"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding:15px</h5>
</div>
<div class="panel-body">
<pre>class="p15"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding:20px</h5>
</div>
<div class="panel-body">
<pre>class="p20"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-left:5px<br>padding-right:5px</h5>
</div>
<div class="panel-body">
<pre>class="plr5"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-left:10px<br>padding-right:10px</h5>
</div>
<div class="panel-body">
<pre>class="plr10"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-left:15px<br>padding-right:15px</h5>
</div>
<div class="panel-body">
<pre>class="plr15"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-left:20px<br>padding-right:20px</h5>
</div>
<div class="panel-body">
<pre>class="plr20"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-top:5px<br>padding-bottom:5px</h5>
</div>
<div class="panel-body">
<pre>class="ptb5"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-top:10px<br>padding-bottom:10px</h5>
</div>
<div class="panel-body">
<pre>class="ptb10"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-top:15px<br>padding-bottom:15px</h5>
</div>
<div class="panel-body">
<pre>class="ptb15"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>padding-top:20px<br>padding-bottom:20px</h5>
</div>
<div class="panel-body">
<pre>class="ptb20"</pre>
</div>
</div>


<?PHP
	require_once("../footer.php");
?>
