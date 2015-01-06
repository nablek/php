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
	$radio = $_POST['q'];
	$user_name = $_POST['user_name'];
	$mailaddress = $_POST['mailaddress'];
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	
	// 必須項目に記入がない場合のエラー
	if ($radio == false) {
		print ("error:ジャンルが未選択です<br />");
		die ("<a href=/html/account.html>戻る<a>");
	} else if ($user_name == false) {
		print ("error:ユーザ名(団体名)が未記入です<br />");
		die ("<a href=/html/account.html>戻る<a>");
	} else if ($mailaddress == false) {
		print ("error:メールアドレスが未記入です<br />");
		die ("<a href=/html/account.html>戻る<a>");
	 else if ($mailaddress != "*@*") {
		print ("error:メールアドレスが正しくありません<br />");
		die ("<a href=/html/account.html>戻る<a>");
	} else if ($user_id == false) {
		print ("error:ユーザIDが未記入です<br />");
		die ("<a href=/html/account.html>戻る<a>");
	} else if ($password == false) {
		print ("error:パスワードが未記入です<br />");
		die ("<a href=/html/account.html>戻る<a>");
	}
	
try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $mysqluser, $mysqlpassword);
		
	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');
	
	
	// 登録済みかどうか確認するsql
	$sql = 'select count(*) from account where user_id = "'.$user_id.'"';
	foreach ($dbh->query($sql) as $row) {
		if ($row['count(*)'] == "1") {
			print ("error:このIDは既に登録されています<br />");
			die ("<a href=/html/account.html>戻る<a>");
		}
	}
	
	$sql = 'select count(*) from account where mail_address = "'.$mailaddress.'"';
	foreach ($dbh->query($sql) as $row) {
		if ($row['count(*)'] == "1") {
			print ("error:このメールアドレスは既に登録されています<br />");
			die ("<a href=/html/account.html>戻る<a>");
		}
	}
	$sql = 'INSERT INTO account (user_id,password,user_name,sign_frag,authority,session,mail_address) VALUES ("'.$user_id.'", "'.$password.'", "'.$user_name.'", "1", "'.$radio.'", "0", "'.$mailaddress.'")';
	
	$dbh->query($sql);
	
	//アカウント利用目的を表示用の値に変更
	if ($radio == 1) {
		$radio = "商用";
	} else if ($radio == 2) {
		$radio = "学内";
	} else if ($radio == 3) {
		$radio = "学外";
	}
	// エラーがなければ結果表示
	print ("アカウント発行完了<br /><br />");
	print ("アカウント利用目的:$radio<br />");
	print ("ユーザ名(団体名):$user_name<br />");
	print ("メールアドレス:$mailaddress<br />");
	print ("ユーザID:$user_id<br /><br />");

	//入力完了した後の遷移の処理を追加して完成
	print ("<a href=/php/top.php>トップページへ</a>");
	
	// データベース切断
	$dbh = null;

// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>

</body>
</html>
