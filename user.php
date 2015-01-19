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

<div align="center">
	<h1>あなたのユーザ情報</h1>

	<?php
		// データベースから対象アカウントの内容を出力
		// セッション読み出し
		session_start();

		//ログイン中かどうかのチェック
		if (isset($_SESSION['visited'])) {

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
				<h4>メールアドレス：<?php print($row['mail_address']); ?> </h4>
	<?php
			}
		} else {
			// ログインしていないのでログインページへ遷移
			$page = "/php/loginform.php";
			header("Location: ".$page);
		}
	?>
		<br>
		<br>
		<div id="mainform-submit">
		<!-- 編集ボタン -->
			<input type="button" name="編集ボタン" value="アカウント情報の編集" onclick="location.href='/php/userhensyu.php'" >
		<!-- 閉じるボタン -->
			<input type="button" value="閉じる" onclick="window.close()">
		</div>
</div>

</head>
</html>
