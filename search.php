<html>
<head>
<meta charset="UTF-8">
<title>search</title>
</head>
<body>

<?php

	// Mysqlのユーザ情報入力
	$user = 'root';
	$password = '';
	
	// 検索ワードの値を取得
	$search = $_GET['qs'];
	
	// 検索ワードの記入がない場合のエラー
	if ($search == false) {
		print ("error:検索ワードが未記入です<br />");
		die ("<a href=top.php>戻る<a>");
	}

try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);
		
	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');
	
	// データベース検索のSQL
	$sql = 'SELECT * FROM テーブル名 WHERE ページタイトル OR ページ内容 LIKE ?';
	$sql->execute(array('%$search$%'));

	
	// 検索ワード表示
	print ("以下のワードが入力されました<br /><br />");
	print ("検索ワード:$search<br />");


	


	
// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;

?>

</body>

<!-- 参考にしたサイト
http://qiita.com/BRS_matsuoka/items/ede26b54f2d4f38f1c5f
http://rasukaru55.sitemix.jp/or_kensaku.php
-->