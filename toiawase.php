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
	
	// 各項目の値を取得
	$radio = $_POST['q'];
	$name = $_POST['name'];
	$mail = $_POST['Email'];
	$sub = $_POST['件名'];
	$content = $_POST['内容'];
	
	// 必須項目に記入がない場合のエラー
	if ($radio == false) {
		print ("error:ジャンルが選択されていません<br />");
		die ("<a href=toiawase.html>戻る<a>");
	} else if ($name == false) {
		print ("error:氏名が未記入です<br />");
		die ("<a href=toiawase.html>戻る</a>");
	} else if ($sub == false) {
		print ("error:件名が未記入です<br />");
		die ("<a href=toiawase.html>戻る</a>");
	} else if ($content == false) {
		print ("error:本文が未記入です<br />");
		die ("<a href=toiawase.html>戻る</a>");
	}

try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);
		
	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');
	
	// 挿入sql文 inquiry_idはmysql側で自動的に追加されるので必要なし
	$sql = 'INSERT INTO inquiry (user_name,category,mail_address,subject,sentence) VALUES ("'.$name.'", "'.$radio.'", "'.$mail.'", "'.$sub.'", "'.$content.'")';
	
	$dbh->query($sql);

	
	// エラーがなければ結果表示
	print ("以下の値が入力されました<br /><br />");
	print ("ジャンル:$radio<br />");
	print ("氏名:$name<br />");
	print ("メールアドレス:$mail<br />");
	print ("件名:$sub<br />");
	print ("本文:$content<br />");


	//入力完了した後の遷移の処理を追加して完成



	
// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;

?>
