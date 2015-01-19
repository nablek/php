<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ユーザ情報変更</title>
	
<script type="text/javascript">
<!--
	function closewin() {
		// ミニウィンドウを閉じる
		window.close();
	}
// -->
</script>
</script>
</head>
<body>

<?php
	session_start();
	$user_id = $_SESSION['id'];

	// Mysqlのユーザ情報
	$user = 'root';
	$password = '';
	
	$input_user_name = $_POST['user_name'];
	$input_mailaddress = $_POST['mailaddress'];
	$input_password = $_POST['password'];
	
try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);

	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');

	//IDをもとにaccountテーブルから検索
	$sql = "update account set user_name = '$input_user_name', mail_address = '$input_mailaddress', password = '$input_password' where user_id = '$user_id'";

	$dbh->query($sql);
	
	// データベース切断
	$dbh = null;
	
// 例外処理
}  catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

<!-- メインカラム開始 -->
	<div align="center">
		<h1>ユーザ情報変更完了</h1>
		<p>
		以下の内容に変更が完了されました。
		<h4>ユーザ名：<?php print($input_user_name); ?> </h4>
		<h4>メールアドレス：<?php print($input_mailaddress); ?> </h4>
		<h4>パスワード : 入力されたパスワード</h4>
		</p>
		<!-- 閉じるボタン -->
		<input type="button" value="閉じる" onclick="window.close()">
	</div>
</body>
</html>
