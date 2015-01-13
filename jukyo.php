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
?>
		<br>
		<div id="site-box">
			<div id ="a-box">
				<h2 id="lineA"> <?php print($row['shop_name']); ?> </h2>
				<div id="b-box">
					<img src="/picture/no_image.png" width="150px" height="150px" alt="代替テキスト"><br>
				</div>
				<div id="b-box">
				<ul>
					<li>住所 : <?php print($row['address']); ?> </li>
					<li>電話番号 : <?php print($row['tel']); ?> </li>
					<li>営業時間 : <?php print($row['time']); ?> </li>
					<li>定休日 : <?php print($row['close']); ?> </li>
					<li>URL : <a href=" <?php print($row['link']); ?>" target="_blank"> <?php print($row['link']); ?> </a> </li>
				</ul>
				</div>
			</div>

			<h2>おすすめ物件</h2>
			<div id="b-box">
			<h3>物件名</h3>
			<ul>
				<li>場所（住所）</li>
				<li>部屋の広さ</li>
				<li>家賃</li>
				<li>駅から徒歩○分</li>
			</ul>
			</div>
			<img src="/picture/no_image.png" width="150px" height="150px" alt="代替テキスト">
		</div>
		<br>
<?php
	}
	
	// データベース切断
	$dbh = null;


// 例外処理
}  catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>

</head>
</html>
