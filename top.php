<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="/css/top.css">

<title>TOP</title>

<style type="text/css">
	/* 表示領域全体 */
	div.sample div.sampletabbox { margin: 0px; padding: 0px; width: 1200px; height: 800px; clear: left; }
	/* タブ部分 */
	div.sample p.sampletabs { margin: 0px; padding: 0px; }
	div.sample p.sampletabs a { display: block; width: 4em; float: left; margin: 0px 10px 0px 10px; padding: 5px; text-align: center; }
	div.sample p.sampletabs a.sampletab1 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab2 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab3 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab4 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab5 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab6 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab7 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab8 { background-color: white; color: black; }
	div.sample p.sampletabs a.sampletab9 { background-color: white; color: black; }
	div.sample p.sampletabs a:hover { color: yellow; }
	/* 対応表示領域 */
	div.sample div.sampletab { height: 500px; overflow: auto; clear: left; }
	div.sample div#sampletab1 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab2 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab3 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab4 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab5 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab6 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab7 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab8 { border: 2px solid gray; background-color: white; }
	div.sample div#sampletab9 { border: 2px solid gray; background-color: white; }
	div.sample div.sampletab p { margin: 0.5em; }
	/* 装飾（今回のテクニックとは無関係） */
	div.sample div.sampletab ul, div.sampletab ol { margin-top: 0.5em; margin-bottom: 0.5em; }
	div.sample div.sampletab li { line-height: 1.35; margin-bottom: 0px; margin-top: 0px; }
	div.sample div.sampletab ul li { list-style-type: disc; }
	div.sample div.sampletab p.tabhead { font-weight: bold; border-bottom: 3px double gray; }
	p.sampletab1 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example2 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example3 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example4 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example5 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example6 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example7 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example8 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}
	p.example9 {font-family: "ＭＳ Ｐゴシック","ＭＳ ゴシック",sans-serif;}

	<!--
	.sampletab1 {list-style:url(tatesen.png);}
	.sampletab2 {list-style:url(tatesen.png);}
	.sampletab3 {list-style:url(tatesen.png);}
	.sampletab4 {list-style:url(tatesen.png);}
	.sampletab5 {list-style:url(tatesen.png);}
	.sampletab6 {list-style:url(tatesen.png);}
	.sampletab7 {list-style:url(tatesen.png);}
	.sampletab8 {list-style:url(tatesen.png);}
	.sampletab9 {list-style:url(tatesen.png);}
	-->
</style>

<script type="text/javascript">
<!--
function ChangeTab(tabname) {
	// 全部消す
	document.getElementById('sampletab1').style.display = 'none';
	document.getElementById('sampletab2').style.display = 'none';
	document.getElementById('sampletab3').style.display = 'none';
	document.getElementById('sampletab4').style.display = 'none';
	document.getElementById('sampletab5').style.display = 'none';
	document.getElementById('sampletab6').style.display = 'none';
	document.getElementById('sampletab7').style.display = 'none';
	document.getElementById('sampletab8').style.display = 'none';
	document.getElementById('sampletab9').style.display = 'none';
	// 指定箇所のみ表示
	if(tabname) {
		document.getElementById(tabname).style.display = 'block';
	}
}
function disp(url){
	// ミニウィンドウ表示
	window.open(url, "window_name", "width=600,height=500,scrollbars=yes");
}
// -->
</script>

</head>
<body>

	<!-- コンテナ開始 -->
	<div id="container">


	<!-- ヘッダ開始 -->
	<div id="header">
		<!-- ロゴの表示 -->
		<a href="/php/top.php">
			<img src="/picture/logo.png" alt="ロゴ" style="width:100%;height:150px;max-width:1200px;">
		</a>
	</div>
	<!-- ヘッダ終了 -->

	<!-- ナビゲーション開始 -->
	<!-- サイドバー -->
	<div id="nav">
		<br>
		<!-- ユーザ情報 -->
		<!-- ここにユーザ情報展開 -->
		<div id="user">
			<img src="/picture/user.png" style="width:10%; height:auto;" align="center">ユーザ情報
			
			
		<?php
			session_start();
				//Mysqlのユーザ情報入力
				$user ='root';
				$password = '';

				//データベース接続
				$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

				//sqlの文字コード設定
				$dbh->query('SET NAMES utf8');

				//IDをもとにaccountテーブルから検索
				$sql = 'SELECT * FROM account WHERE user_id = "'.$_SESSION['id'].'"';

				foreach ($dbh->query($sql) as $row) {
					// ユーザ情報表示
		?>
					<h4>ユーザID：<?php print($row['user_id']); ?> </h4>
					<h4>ユーザ名：<?php print($row['user_name']); ?> </h4>
					<h4>メールアドレス：<br><?php print($row['mail_address']); ?> </h4>
					<div id="mainform-submit">
					<!-- 編集ボタン -->
					<input type="button" name="編集ボタン" value="アカウント情報の編集" onclick="location.href='/php/userhensyu.php'" >
					</div>
		<?php } ?>
		</div>
		<br>

		<!-- phpにてログイン状態によりどちらかを表示 -->
		<?php
			if (!isset($_SESSION['visited'])) {
				echo '<a href="/php/loginform.php"><u>ログイン</a>';
			} else {
				echo'<a href="/php/logout.php"><u>ログアウト</a>';
			}
		?>
		<br>
		<br>


		<!-- はじめに -->
		<div id="first">
			<img src="/picture/yazirushi.png" style="width:10%; height:auto;"><a href="/html/first.html">はじめに</a>
		</div>
		<br>

		<!-- お問い合わせ -->
		<div id="toi">
			<img src="/picture/toiawase.png" style="width:10%; height:auto;"><a href="/html/toiawase.html">お問い合わせ</a>
		</div>
		<br>

		<!-- よくある質問 -->
		<div id="shitsumon">
			<img src="/picture/hatena.png" style="width:10%; height:auto;" align="center"><a href="/html/shitsumon.html">よくある質問</a>
		</div>
		<br>
		<br>

		<!-- 学内・学外イベント情報追加 -->
		<div id="gakuievent">
			<a href="/php/add_gakuioeve.php">学内・学外イベント情報追加</a>
		</div>
		<br>
		<br>

		<!-- 商用イベント情報追加 -->
		<div id="shouyoubase">
			<a href="/php/add_base_business.php">店舗基本情報追加</a>
		</div>
		<br>
		<br>
		
		<div id="shouyouevent">
			<a href="/php/add_event_business.php">店舗イベント情報追加</a>
		</div>
		<br>
		<br>

		<!-- 管理者用ページへの遷移 -->
		<div>
			<!-- リンク先は該当ページ -->
			<img src="/picture/neji.png" style="width:10%; height:auto;" align="center"><a href="/php/login.php">管理者用ページ</a>
		</div>
	</div>
	<!-- ナビゲーション終了 -->

	<!-- メインカラム開始 -->
	<div id="content">
	<!-- タブの表示 -->
		<div id="header">
			<ul class="nl clearFix">
				<li class="first"><a onclick="ChangeTab('sampletab1'); return false;" class="sampletab1"  href="#sampletab1">TOP</a></li>
				<li><a onclick="ChangeTab('sampletab2'); return false;" class="sampletab2"  href="#sampletab2">合格したら</a></li>
				<li><a onclick="ChangeTab('sampletab3'); return false;" class="sampletab3"  href="#sampletab3">住居</a></li>
				<li><a onclick="ChangeTab('sampletab4'); return false;" class="sampletab4"  href="#sampletab4">公共施設</a></li>
				<li><a onclick="ChangeTab('sampletab5'); return false;" class="sampletab5"  href="#sampletab5">生活施設</a></li>
				<li><a onclick="ChangeTab('sampletab6'); return false;" class="sampletab6"  href="#sampletab6">金融機関</a></li>
				<li><a onclick="ChangeTab('sampletab7'); return false;" class="sampletab7"  href="#sampletab7">交通機関</a></li>
				<li><a onclick="ChangeTab('sampletab8'); return false;" class="sampletab7"  href="#sampletab7">イベント</a></li>
				<li><a onclick="ChangeTab('sampletab9'); return false;" class="sampletab7"  href="#sampletab7">使い方!</a></li>
			</ul>
			<hr class="none">
		</div>
		<div id="tabbox">
			<div class="sampletabbox">
				<div class="sampletab">
					<div class="sampletab" id="sampletab1">
						<iframe src="/html/purpose.html" width="1200" height="800"></iframe>
					</div>
					<div class="sampletab" id="sampletab2">
						<iframe src="/php/jukyo.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab3">
						<iframe src="/php/jukyo.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab4">
						<iframe src="/php/koukyou.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab5">
						<iframe src="/php/seikatu.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab6">
						<iframe src="/php/money.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab7">
						<iframe src="/php/koutuu.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab8">
						<iframe src="/php/event.php" width="1200" height="850"></iframe>
					</div>
					<div class="sampletab" id="sampletab9">
						<iframe src="/html/event.html" width="1200" height="850"></iframe>
					</div>
				</div>
			</div>
			<!-- デフォルトのタブを選択 -->
			<script type="text/javascript">
				ChangeTab('sampletab1');
			</script>
		</div>
	</div>
	<!-- メインカラム終了 -->
</div>
<!-- コンテナ終了 -->

</body>
</html>
