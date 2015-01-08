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
			div.sample p.sampletabs a { display: block; width: 4em; float: left; margin: 0px 15px 0px 15px; padding: 10px; text-align: center; }
			div.sample p.sampletabs a.sampletab1 { background-color: white; color: black; }
			div.sample p.sampletabs a.sampletab2 { background-color: white; color: black; }
			div.sample p.sampletabs a.sampletab3 { background-color: white; color: black; }
			div.sample p.sampletabs a.sampletab4 { background-color: white; color: black; }
			div.sample p.sampletabs a.sampletab5 { background-color: white; color: black; }
			div.sample p.sampletabs a.sampletab6 { background-color: white; color: black; }
			div.sample p.sampletabs a.sampletab7 { background-color: white; color: black; }
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

			<!--
			.sampletab1 {list-style:url(tatesen.png);}
			.sampletab2 {list-style:url(tatesen.png);}
			.sampletab3 {list-style:url(tatesen.png);}
			.sampletab4 {list-style:url(tatesen.png);}
			.sampletab5 {list-style:url(tatesen.png);}
			.sampletab6 {list-style:url(tatesen.png);}
			.sampletab7 {list-style:url(tatesen.png);}
			-->

			</style>
		<script type="text/javascript">
		function ChangeTab(tabname) {
			// 全部消す
			document.getElementById('sampletab1').style.display = 'none';
			document.getElementById('sampletab2').style.display = 'none';
			document.getElementById('sampletab3').style.display = 'none';
			document.getElementById('sampletab4').style.display = 'none';
			document.getElementById('sampletab5').style.display = 'none';
			document.getElementById('sampletab6').style.display = 'none';
			document.getElementById('sampletab7').style.display = 'none';
			// 指定箇所のみ表示
			if(tabname) {
				document.getElementById(tabname).style.display = 'block';
			}
		}
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
			<!-- 検索  -->
			<div style="margin: 0.5em;">
				<form target="_blank" method="get" action="http://search.allabout.co.jp/s.php">
					<input type="text" title="検索したい内容を入力してください" name="qs" />
					<input type="submit" value="検索" />
					<input type="hidden" value="sjis" name="ie" />
				</form>
			</div>
			<br>
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

			<!-- ユーザ情報 -->
			<div id="user">
				<img src="/picture/user.png" style="width:10%; height:auto;" align="center"><a href="/php/login.php">ユーザ情報</a>
			</div>
			<br>
			<!-- phpにてログイン状態によりどちらかを表示 -->
			<?php
				session_start();
				$_SESSION['visited'];
				if (!isset($_SESSION['visited'])) {
					echo '<a href="/php/index4.php"><u>ログイン</a>';
				} else {
					echo'<a href="/php/logout.php"><u>ログアウト</a>';
				}
			?>
			<br>
			<br>

			<!-- フローチャート -->
			<div id="flowchart">
				合格から入学までの流れ
				<br>
				<!-- フローチャートの画像を入れてね -->
				<a href="/picture/flow.png"><img src="/picture/flow.png" style="width:175px; height:175px;" align="center"></a>
			</div>
			<br>
			<br>

			<!-- 学内イベント情報追加 -->
			<div id="gakunaievent">
				<a href="/html/gakunaieve.html">学内イベント情報追加</a>
			</div>
			<br>
			<br>
			
			<!-- 学外イベント情報追加 -->
			<div id="gakugaievent">
				<a href="/html/gakugaieve.html">学外イベント情報追加</a>
			</div>
			<br>
			<br>
			
			<!-- 商用イベント情報追加 -->
			<div id="syouyouevent">
				<a href="/php/login.php">店舗イベント・おすすめ情報追加</a>
			</div>
			<br>
			<br>

			<!-- 管理者用ページへの遷移 -->
			<div>
				<!-- リンク先は該当ページ -->
				<a href="/php/login.php">管理者用ページ</a>
			</div>
		</div>
<!-- ナビゲーション終了 -->

<!-- メインカラム開始 -->
<div id="content">
<!-- phpの方で初めはタブ領域内に桜の画像（外部設計書のtop画面参考に）を表示する処理をおなしゃす -->
<!-- タブの表示 -->
		<div id="header">
				<ul class="nl clearFix">
					<li class="first"><a onclick="ChangeTab('sampletab1'); return false;" class="sampletab1"  href="#sampletab1">TOP</a></li>
					<li><a onclick="ChangeTab('sampletab2'); return false;" class="sampletab2" href="#sampletab3">住居</a></li>
					<li><a onclick="ChangeTab('sampletab3'); return false;" class="sampletab3" href="#sampletab2">公共施設</a></li>
					<li><a onclick="ChangeTab('sampletab4'); return false;" class="sampletab4" href="#sampletab3">生活施設</a></li>
					<li><a onclick="ChangeTab('sampletab5'); return false;" class="sampletab5" href="#sampletab3">金融機関</a></li>
					<li><a onclick="ChangeTab('sampletab6'); return false;" class="sampletab6" href="#sampletab3">交通機関</a></li>
					<li><a onclick="ChangeTab('sampletab7'); return false;" class="sampletab7" href="#sampletab3">イベント</a></li>
				</ul>
				 <hr class="none">
				</div>
				<div id="tabbox">
				<div class="sampletabbox">
				<div class="sampletab">
				<div class="sampletab" id="sampletab1">
				<iframe src="/html/purpose.html" width="1200" height="1000"></iframe>
				</div>
				<div class="sampletab" id="sampletab2">
				<iframe src="/php/jukyo.php" width="1200" height="1000"></iframe>
				</div>

				<div class="sampletab" id="sampletab3">
				<iframe src="/html/koukyou.html" width="1200" height="1000"></iframe>
				</div>

				<div class="sampletab" id="sampletab4">
				<iframe src="/php/seikatu.php" width="1200" height="1000"></iframe>
				</div>

				<div class="sampletab" id="sampletab5">
				<iframe src="/html/money.html" width="1200" height="1000"></iframe>
				</div>

				<div class="sampletab" id="sampletab6">
				<iframe src="/html/koutuu.html" width="1200" height="1000"></iframe>
				</div>

				<div class="sampletab" id="sampletab7">
				<iframe src="/html/event.html" width="1200" height="1000"></iframe>
				</div>
				
				<script type="text/javascript">
					// デフォルトのタブを選択
					ChangeTab('sampletab1');
				</script>
		</div>
		</div>
		</div>
</div>
<!-- メインカラム終了 -->


<!-- コンテナ終了 -->

</body>
</html>