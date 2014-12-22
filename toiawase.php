<html>
<head>
<meta charset="UTF-8">
<title>answer test</title>
</head>
<body>

<?php
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
	
	// DBへ接続(DBのアドレス,ID,PWは未記入)
	$db = mysql_connect("DBのアドレス", "ID", "PW");
	if (!$db) {
		die ("DBへ接続できませんでした");
	}
	// DBの選択(DB名は未記入)
	$select = mysql_select_db("DB名", $db);
	if (!$select) {
		die ("DBの選択ができませんでした");
	}
	
	// SQL文をそれぞれの変数に格納(DB名,テーブル名,フィールド名は未記入)
	/*$radio_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$radio');";
	$name_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$name');";
	$mail_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$mail');";
	$sub_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$sub');";
	$content_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$content');";
	*/
	$sql = "INSERT INTO 'DB名'.'テーブル名'
			VALUES ('$radio', '$name', '$mail', '$sub', '$content');";
	
	// SQL文実行
	$result = mysql_query($sql);
	if (!$result) {
		die ("DBに格納できませんでした");
	}
	
	// エラーがなければ結果表示
	print ("以下の値が入力されました<br /><br />");
	print ("ジャンル:$radio<br />");
	print ("氏名:$name<br />");
	print ("メールアドレス:$mail<br />");
	print ("件名:$sub<br />");
	print ("本文:$content<br />");
	}
	
	// DBから切断
	$db = mysql_close($db);
	if (!$db) {
		die ("DBから切断できませんでした");
	}
	
?>

</body>
</html>

<!-- 今回参考にしたページ
http://www.standpower.com/php_form.html
http://p-ho.net/index.php?page=12
http://www.ipc.hokusei.ac.jp/~z00104/php/php_form.html
DB関連
http://liginc.co.jp/designer/archives/119
http://www.php-labo.net/tutorial/mysql/php.html
-->
