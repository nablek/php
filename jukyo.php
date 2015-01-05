<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>住居情報</title>
	<link rel="stylesheet" type="text/css" href="/css/jukyo.css" />

	<!-- リスト横並び -->
	<style type="text/css">

	ul.example li{
	display:inline;
	}

	</style>
</head>
<body>

<?php

	// Mysqlのユーザ情報入力
	$user = 'root';
	$password = '';
	$category = 'jyukyo';

try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);

	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');

	$sql = 'select * from area where category = "'.$category.'" order by shop_phonetic COLLATE utf8_unicode_ci';
	
	
	foreach ($dbh->query($sql) as $row) {
	
	echo'<div id="site-box">';
		echo'<div id ="a-box">';
			echo'<h2 id="lineA">'; print($row['shop_name']); echo'</h2>';

			echo'<div id="b-box">';
				echo'<img src="/picture/logo.png" width="200px" height="200px" alt="代替テキスト"><br>';
			echo'</div>';
			echo'<div id="b-box">';
			echo'<ul>';
				echo'<li>住所 :'; print($row['address']); echo'</li>';
				echo'<li>電話番号 :'; print($row['tel']); echo'</li>';
				echo'<li>営業時間 : </li>';
				echo'<li>定休日 : </li>';
				echo'<li>URL : '; print($row['link']); echo'</li>';
			echo'</ul>';
			echo'</div>';
		echo'</div>';

		echo'<h2>おすすめ物件</h2>';
		echo'<div id="b-box">';
		echo'<h3>物件名</h3>';
		echo'<ul>';
				echo'<li>場所（住所）</li>';
				echo'<li>部屋の広さ</li>';
				echo'<li>家賃</li>';
				echo'<li>駅から徒歩○分</li>';
		echo'</ul>';
		echo'</div>';
		echo'<img src="/picture/logo.png" width="200px" height="200px" alt="代替テキスト">';
	echo'</div>';

	echo'<br>';
	}
	

// 例外処理
}  catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;

?>

</head>
</html>
