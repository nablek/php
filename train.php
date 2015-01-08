<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<?php


	// Mysqlのユーザ情報入力
	$mysqluser = 'root';
	$mysqlpassword = '';
	
	// 各項目の値を取得
	$start_station = $_POST['start_station'];
	$end_station = $_POST['end_station'];
	$date = date(H:i,time());
	print($date);
	
	
try{
	
	// データベース切断
	$dbh = null;

// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>

</body>
</html>
