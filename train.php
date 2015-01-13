<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta charset="UTF-8">
<title>交通機関情報</title>

// 祝日の判定処理が未記入
// 終電後の判定処理が未記入

<style>
	#header, #footer {
		background-color: #fed;
		height: 60px;
		padding: 10px;
	}
	#main {
		background-color: #eee;
		padding: 10px;
	}
</style>

<script type="text/javascript">
	<!--
	function closewin() {
		// ミニウィンドウを閉じる
		window.close();
	}
	// -->
</script>

</head>
<body>

<?php
	// Mysqlのユーザ情報入力
	$mysqluser = 'root';
	$mysqlpassword = '';

	// 各項目の値を取得
	$start_station = $_POST['start_station'];
	$end_station = $_POST['end_station'];
	$youbi = date(w,time());
	$date = date("H:i:00",time());

	// 入力内容判定
	if ($start_station == $end_station) {
?>
		<div align="center">
			<div id="header">
				<h3>汽車情報検索結果エラー</h3>
			</div>
			<div id="main">
				出発駅と到着駅が一緒です。入力をやり直してください。
			</div>
			<div id="footer">
				<p><a href="#" onClick="window.close(); return false;">閉じる</a></p>
			</div>
		</div>
<?php
	die();
	}

	// 曜日判定
	if ($youbi == 0) {
		$day_division = 2;
	} else if ($youbi == 6) {
		$day_division = 1;
	} else {
		$day_division = 0;
	}


	try{

		// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
		$dbh = new PDO('mysql:dbname=system;host=localhost', $mysqluser, $mysqlpassword);

		// sqlの文字コード設定（必須）
		$dbh->query('SET NAMES utf8');

		// start_stationを文字から番号へ変更
		$sql = 'select station_id from traffic where station_name = "'.$start_station.'"';	
		foreach ($dbh->query($sql) as $row) {
			$start_station_id = $row['station_id'];
		}

		// end_stationを文字から番号へ変更	
		$sql = 'select station_id from traffic where station_name = "'.$end_station.'"';
		foreach ($dbh->query($sql) as $row) {
			$end_station_id = $row['station_id'];
		}

		// 運賃検索SQL
		$sql = 'select * from fare where start_station = "'.$start_station_id.'" and stop_station = "'.$end_station_id.'"';
		foreach ($dbh->query($sql) as $row) {
			$fare = $row['fare'];
			$necessary_time = $row['necessary_time'];
		}

		// 検索時刻から次の出発時刻検索SQL
		if ($start_station_id == 30) {
			// 後免，野市間
			$datatable = gomen_noichi_traffic_time;
			$sql = 'select * from gomen_noichi_traffic_time where day_division = "'.$day_division.'" and start_time > "'.$date.'" limit 1';
		} else if ($start_station_id - $end_station_id > 0) {
			// のぼり
			$datatable = up_traffic_time;
			$sql = 'select * from up_traffic_time where station_id = "'.$start_station_id.'" and day_division = "'.$day_division.'" and start_time > "'.$date.'" limit 1';
		} else if ($start_station_id - $end_station_id < 0) {
			// くだり
			$datatable = down_traffic_time;
			$sql = 'select * from down_traffic_time where station_id = "'.$start_station_id.'" and day_division = "'.$day_division.'" and start_time > "'.$date.'" limit 1';
		} else {
			// error
		}

		// 検索時刻の次の出発時間を取得
		foreach ($dbh->query($sql) as $row) {
			$start_time = $row['start_time'];
		}
		
?>
		<!-- 結果HTML出力 -->
		<div align="center">
			<div id="header">
				<h3>汽車情報検索結果</h3>
			</div>
			<div id="main">
				<h3> <?php print($start_station); ?>駅から<?php print($end_station); ?>駅までの運賃は</h3>
				<h2> <?php print($fare); ?>円</h2>
				<h3>次の<?php print($start_station); ?>駅から<?php print($end_station); ?>駅方面の出発時刻は<?php print($start_time); ?>です。
				<h3>移動時間はおおよそ <?php print($necessary_time); ?>分です。
			</div>
			<div id="footer">
				<p><a href="#" onClick="window.close(); return false;">閉じる</a></p>
			</div>
<?php
		// データベース切断
		$dbh = null;

	// 例外処理
	} catch (PDOException $e) {
		exit('データベースに接続できませんでした。' . $e->getMessage());
	}


?>

</body>
</html>
