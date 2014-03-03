<?PHP
	$pageTitle="【開発者】パーツ一覧";
	require_once("../header.php");
?>
<link rel="stylesheet" href="../../tokyo/module/css/base.css" media="screen">
	<h2>【開発者】パーツ一覧</h2>
	<p>フロントエンドのパーツ一覧です。フロントエンドの全てのページで以下の部品を使用することが出来ます。Floatの関係上崩れる場合があります。</p>

<ul class="nav nav-pills">
  <li><a href="#kiso">ページ基礎(メニューも含む)</a></li>
  <li><a href="#layout">レイアウト</a></li>
  <li><a href="#title">タイトル</a></li>
  <li><a href="#font">フォント</a></li>
  <li><a href="#menu">メニュー</a></li>
  <li><a href="#box">ボックス</a></li>
  <li><a href="#size">サイズ</a></li>
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

<h4>サブメニューありコンテンツページ</h4>
<p>サブメニューが必要なコンテンツページの場合には以下の指定をしてください。余白などは指定していませんので、#menuContentの外で使う場合余白をつけるなど、注意してください。</p>
<div class="panel panel-info">
<div class="panel-heading">
<h5>サブメニューありコンテンツページ基礎</h5>
</div>
<div class="panel-body">
<div id="menuPB">
  <div id="menuPBContent">
    <div id="menuPBMainContent">
      <!-- MainContent -->
      <div class="contentBox">
        <div class="movieTitle">
          <h3>h3タイトル</h3>
        </div>
        <p>【使用例】コンテンツの中身です。</p>
      </div>
      <!-- MainContent End -->
    </div>
  </div>
  <div id="menuPBSidebar">
    <!-- Sidebar -->
    <div id="subnav">
      <ul>
        <li><a href="#">【使用例】劇場案内</a></li>
      </ul>
    </div>
    <!-- Sidebar End -->
  </div>
</div>
<div class="clear"></div>
<pre>
&lt;div id="menuPB"&gt;
  &lt;div id="menuPBContent"&gt;
    &lt;div id="menuPBMainContent"&gt;
    &lt;!-- MainContent --&gt;
      &lt;div class="contentBox"&gt;
        &lt;div class="movieTitle"&gt;
          &lt;h3&gt;h3タイトル&lt;/h3&gt;
        &lt;/div&gt;
        &lt;p&gt;【使用例】コンテンツの中身です。&lt;/p&gt;
      &lt;/div&gt;
    &lt;!-- MainContent End --&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div id="menuPBSidebar"&gt;
  &lt;!-- Sidebar --&gt;
    &lt;div id="subnav"&gt;
      &lt;ul&gt;
        &lt;li&gt;&lt;a href="#"&gt;【使用例】劇場案内&lt;/a&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
    &lt;!-- Sidebar End --&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="clear"&gt;&lt;/div&gt;
</pre>
</div>
</div>


<h4>フロート</h4>
<p>フロートを使用する際に使用してください。<strong>通常はclearFixを使用してください。どうしてもfloatが解除されない時はclass="clear"を使用してください</strong>。</p>

<div class="panel panel-success">
<div class="panel-heading">
<h5>clearfix</h5>
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
<pre>class="clearfix"</pre>
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



<h3 id="layout">レイアウト</h3>
<h4>ページレイアウト</h4>
<p>ページ内を2つから3つのboxに分けたいときに使用してください。</p>

<div class="panel panel-info">
<div class="panel-heading">
<h5>2カラム(50%ずつ)</h5>
</div>
<div class="panel-body">
<div class="movieTitle">
  <div class="boxCol2 clearfix">
    <div class="boxCol2Left">
      <div class="reserveTitle">
        <h3>【例】タイトル</h3>
      </div>
    </div>
    <div class="boxCol2Right">
      <div class="reserveTitle">
        <h3>【例】タイトル</h3>
      </div>
    </div>
  </div>
</div>
<pre>
&lt;div class="boxCol2 clearfix"&gt;
  &lt;div class="boxCol2Left"&gt;
    &lt;div class="reserveTitle"&gt;
      &lt;h3&gt;【例】タイトル&lt;/h3&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class="boxCol2Right"&gt;
    &lt;div class="reserveTitle"&gt;
      &lt;h3&gt;【例】タイトル&lt;/h3&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>
</div>
</div>

<h4>位置指定</h4>
<p>ボックス位置を指定したいときに使用してください。なお、サイズ指定と同時併用すると便利です。<strong>マージン指定と
同時に使用する場合は、margin-left,margin-rightを変更しないでください</strong>。</p>

<div class="panel panel-success">
<div class="panel-heading">
<h5>margin-left:auto<br>margin-right:auto</h5>
</div>
<div class="panel-body">
<pre>class="m0at"</pre>
</div>
</div>

<h4>その他のレイアウト</h4>
<p>テキストの位置などを変更します</p>

<div class="panel panel-success">
<div class="panel-heading">
<h5 class="textLeft">文字を左寄せします</h5>
</div>
<div class="panel-body">
<pre>class="textLeft"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5 class="textCenter">文字を中央に寄せます</h5>
</div>
<div class="panel-body">
<pre>class="textCenter"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5 class="textRight">文字を右寄せします</h5>
</div>
<div class="panel-body">
<pre>class="textRight"</pre>
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


<h3 id="menu">メニュー</h3>

<p>コンテンツページのメニューです。</p>

<div class="panel panel-info">
<div class="panel-heading">
<h5>MENU</h5>
</div>
<div class="panel-body">
<div id="subnav">
  <ul>
    <li><a href="#">値段</a></li>
    <li><a href="#">サービスデー</a></li>
  </ul>
</div>
<pre>&lt;div id="subnav"&gt;
        &lt;ul&gt;
          &lt;li&gt;&lt;a href="【コンテンツID】"&gt;【コンテンツ名】&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
      &lt;/div&gt;</pre>
</div>
</div>



<h3 id="box">ボックス</h3>

<p>コンテンツページのボックスです。各ページに複数指定することが出来ます。コンテンツの内容は必ずこのボックス内に入れてください（一部例外有り）</p>

<div class="panel panel-info">
<div class="panel-heading">
<h5>contentBox</h5>
</div>
<div class="panel-body">
<div class="contentBox">
  <p>通常のコンテンツボックスです</p>
</div>
<pre>&lt;div class="contentBox"&gt;
  &lt;p&gt;コンテンツの中身です&lt;/p&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>contentAttentionBox</h5>
</div>
<div class="panel-body">
<div class="contentAttentionBox">
  <p>注目して欲しいコンテンツの場合に使用してください</p>
</div>
<pre>&lt;div class="contentAttentionBox"&gt;
  &lt;p&gt;コンテンツの中身です&lt;/p&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>contentProhibitionBox</h5>
</div>
<div class="panel-body">
<div class="contentProhibitionBox">
  <p>注意して欲しい（とても重要な項目）コンテンツの場合に使用してください</p>
</div>
<pre>&lt;div class="contentProhibitionBox"&gt;
  &lt;p&gt;コンテンツの中身です&lt;/p&gt;
&lt;/div&gt;</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>contentAgreementBox</h5>
</div>
<div class="panel-body">
<div class="contentAgreementBox">
  <p>規約用のコンテンツボックスです。高さが200pxに指定されているため、オーバする部分はスクロールされます。<br>基本的な使い方は通常のBOXと変わりません</p>
</div>
<pre>&lt;div class="contentProhibitionBox"&gt;
  &lt;p&gt;規約内容の中身です&lt;/p&gt;
&lt;/div&gt;</pre>
</div>
</div>

<h3 id="size">サイズ</h3>
<p>横幅などを指定するときに使用してください。なお、同時に複数のクラスを指定した場合、余白やボーダーによってサイズが変わる場合があります。</p></p>
<h4>固定値</h4>
<p>固定値で横幅を使用したいときに選択してください。なお、m0atクラスを使用すると中央寄せにすることが出来ます。</p>

<div class="panel panel-info">
<div class="panel-heading">
<h5>width:250px</h5>
</div>
<div class="panel-body">
<pre>class="w250"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>width:500px</h5>
</div>
<div class="panel-body">
<pre>class="w500"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>width:750px</h5>
</div>
<div class="panel-body">
<pre>class="w750"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>width:980px</h5>
</div>
<div class="panel-body">
<pre>class="w980"</pre>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
<h5>width:1200px</h5>
</div>
<div class="panel-body">
<pre>class="w1200"</pre>
</div>
</div>


<h4>可変値</h4>
<p>可変値で横幅を使用したいときに選択してください。なお、m0atクラスを使用すると中央寄せにすることが出来ます。</p>

<div class="panel panel-success">
<div class="panel-heading">
<h5>width:25%</h5>
</div>
<div class="panel-body">
<pre>class="w25p"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>width:50%</h5>
</div>
<div class="panel-body">
<pre>class="w50p"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>width:75%</h5>
</div>
<div class="panel-body">
<pre>class="w75p"</pre>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">
<h5>width:100%</h5>
</div>
<div class="panel-body">
<pre>class="w100p"</pre>
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
