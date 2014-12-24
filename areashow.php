<html>
<head>
<meta charset="UTF-8">
<title>answer test</title>
</head>
<body>

<?php

	// Mysqlのユーザ情報入力
	$user = 'root';
	$password = '';
	
try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);
		
	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');
	
	$sql = 'select * from area';
	foreach ($dbh->query($sql) as $row) {
		// データテーブル内のカラムを指定して出力
		print($row['shop_id'].'<br>');
		print($row['user_id'].'<br>');
		print($row['shop_name'].'<br>');
		print($row['shop_phonetic'].'<br>');
		print($row['category'].'<br>');
		print($row['tel'].'<br>');
		print($row['address'].'<br>');
		print($row['link'].'<br>');
		print($row['event_name'].'<br>');
		print($row['event_date'].'<br>');
		print($row['event_place'].'<br>');
		print($row['content'].'<br>');
    }

// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;

?>
