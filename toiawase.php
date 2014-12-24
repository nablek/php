<html>
<head>
<meta charset="UTF-8">
<title>answer test</title>
</head>
<body>

<?php

// テーブルのカラムでtextを使っているカラムに対して日本語を入力すると、出力の際に文字化けする
// そのためNCHARに変更するかfreebsd自体に日本語設定を行う必要あり。要件等


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
		die ("error:ジャンルが選択されていません");
	} else if ($name == false) {
		die ("error:氏名が未記入です");
	} else if ($sub == false) {
		die ("error:件名が未記入です");
	} else if ($content == false) {
		die ("error:本文が未記入です");
	}

try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);
		
	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');
	
	// 挿入sql文 inquiry_idをテーブルの件数＋１に合わせる必要あり
	$sql = 'INSERT INTO inquiry (inquiry_id,user_name,category,mail_address,subject,sentence) VALUES (3, "'.$name.'", "'.$radio.'", "'.$mail.'", "'.$sub.'", "'.$content.'")';
	
	$dbh->query($sql);
	
	
/*
	テータベースに格納されているか確認
	あくまでテスト用なので気にしなくてよい
	$sql = 'select * from inquiry';
	foreach ($dbh->query($sql) as $row) {
		// データテーブル内のカラムを指定して出力
		print($row['inquiry_id'].'<br>');
		print($row['user_name'].'<br>');
		print($row['category'].'<br>');
		print($row['mail_address'].'<br>');
		print($row['subject'].'<br>');
		print($row['sentence'].'<br>');
    }
*/
	
	// エラーがなければ結果表示
	print ("以下の値が入力されました<br /><br />");
	print ("ジャンル:$radio<br />");
	print ("氏名:$name<br />");
	print ("メールアドレス:$mail<br />");
	print ("件名:$sub<br />");
	print ("本文:$content<br />");
	
// 例外処理
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;

?>
