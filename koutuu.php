<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>交通機関情報</title>
<link rel="stylesheet" type="text/css" href="/css/koutuu.css">
<script type="text/javascript">
<!--
function ChangeTab(tabname) {
   // 全部消す
   document.getElementById('tab1').style.display = 'none';
   document.getElementById('tab2').style.display = 'none';

   // 指定箇所のみ表示
   document.getElementById(tabname).style.display = 'block';
}

function disp(url){
	// ミニウィンドウ表示
	window.open(url, "window_name", "width=600,height=500,scrollbars=yes");
}
// -->
</script>
</head>
<body>
<div class="tabbox">
	<p class="tabs">
		<a href="#tab1" class="tab1" onclick="ChangeTab('tab1'); return false;">バス</a>
		<a href="#tab2" class="tab2" onclick="ChangeTab('tab2'); return false;">汽車</a>
	</p>
	<div id="tab1" class="tab">
		<p>
		<!-- ここに中身を記述 -->
		<!-- 路線図の表示 -->
		<!-- ロゴにて表示テスト -->
			<div align="center">
				<img src="/picture/bus.gif" width="720px" height="540px" alt="路線図">
				<br>
				<!-- 時刻表ボタンクリックで時刻表のポップアップ表示 -->
				<!-- 時刻表の画像の大きさに合わせて今後サイズは変更 -->
				<!-- とりあえず南国市役所で動作確認 -->
				<input name="openWin" type="button" value="時刻表" onClick="window.open('/picture/bus_time.png','','scrollbars=yes,width=933,height=1855,');">
			</div>
		</p>
	</div>

	<form action="/php/train.php" method="post" target="window_name">
	<div id="tab2" class="tab">
		<p>
		<!-- ここに中身を記述 -->
		<!-- 路線図の表示 -->
		<!-- ロゴにて表示テスト -->
			<div align="center">
				<img src="/picture/logo.png" width="700px" height="300px" alt="サンプル">
				
				<!-- 時刻検索 -->
				<h3>
					<table>
						<tr>
							<td>出発駅</td>
							<td>
								<select name="start_station">
									<option value="高知" selected>高知</option>
									<option value="薊野">薊野</option>
									<option value="土佐一宮">土佐一宮</option>
									<option value="布師田">布師田</option>
									<option value="土佐大津">土佐大津</option>
									<option value="後免">後免</option>
									<option value="土佐長岡">土佐長岡</option>
									<option value="山田西町">山田西町</option>
									<option value="土佐山田">土佐山田</option>
									<option value="後免町">後免町</option>
									<option value="立田">立田</option>
									<option value="のいち">のいち</option>
								</select>
							</td>
							<td>～</td>
							<td>到着駅</td>
							<td>
								<select name="end_station">
									<option value="高知" selected>高知</option>
									<option value="薊野">薊野</option>
									<option value="土佐一宮">土佐一宮</option>
									<option value="布師田">布師田</option>
									<option value="土佐大津">土佐大津</option>
									<option value="後免">後免</option>
									<option value="土佐長岡">土佐長岡</option>
									<option value="山田西町">山田西町</option>
									<option value="土佐山田">土佐山田</option>
									<option value="後免町">後免町</option>
									<option value="立田">立田</option>
									<option value="のいち">のいち</option>
								</select>
							</td>
						</tr>
					</table>
					<br>
					<!-- 検索ボタン -->
					<!-- onclickでデータベースの呼び出し及び検索結果の表示 -->
					<input type="submit" value="検索" onClick="disp('train_result.html')">
				</h3>
				
				<br>
			</div>
		</p>
	</div>
	</form>

</div>

<script type="text/javascript"><!--
  // デフォルトのタブを選択
  ChangeTab('tab1');
// --></script>

</body>
</html>