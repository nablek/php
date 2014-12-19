<html>
<head><title>PHP DATABASE TEST</title></head>
<body>

<?php

// Mysqlのユーザ情報入力
$user = 'root';
$password = '';

// データベース接続
try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);

	echo "データベース接続完了 <br>";

	// sqlの文字コード設定　（必須）
	$dbh->query('SET NAMES utf8');

	// 実際のsql文，今回はtrafficテーブルから全内容を呼び出した
    $sql = 'select * from traffic';
    // 呼び出した内容の出力，呼び出した内容を変数$rowに一時格納
    foreach ($dbh->query($sql) as $row) {
    	// データテーブル内のカラムを指定して出力
        print($row['station_id'].' ');
        print($row['station_name'].'<br>');
    }
// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;

?>

</body>
</html>
