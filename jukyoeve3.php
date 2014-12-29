<html>
<head>
<meta charset="UTF-8">
<title>answer test</title>
</head>
<body>

<?php

        //Mysqlのユーザ情報入力
        $user ='root';
        $password = '';

        //各項目の値を取得
        $evename = $_POST['event_name'];
        $eveplace = $_POST['event_place'];
        $tel = $_POST['telephone'];
        $contents = $_POST['content'];
        $image = $_POST['filename'];
        
        //必須項目に記入がない場合のエラー
        if ($evename == false){
        	die ("※（必須）見出しを入力してください");
        }else if ($eveplace == false){
        	die ("※（必須）場所を入力してください");
        }else if ($tel == false){
        	die ("※（必須）電話番号を入力してください");
        }else if ($contents == false){
        	die ("※（必須）内容を入力してください");
        }
       
try {
	   // ★データベース関連はここから↓
	   // データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
	   $dbh = new PDO('mysql:dbname=データベース名;host=localhost',$user, $password);
	   
	   //sqlの文字コード設定
	   $dbh->query('SET NAMES utf8');

	   // SQL文をそれぞれの変数に格納(DB名,テーブル名,フィールド名は未記入)
	
	/* $eventname_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$event_name');";
	 $eventplace_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$event_place');";
	 $telephone_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$telephone');";
	 $content_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$content');"; 
	   $image_sql = "INSERT INTO 'DB名'.'テーブル名'('フィールド名') VALUES('$filename');"; */
	$sql = "INSERT INTO 'DB名'.'テーブル名'
	VALUES ('$event_name', '$event_place', '$telephone', '$content', '$image');";
	
	$dbh->query($sql);
	
	//エラーがない場合結果を表示
	print("以下の内容で登録します。<br /><br />");
	print("見出し：$evename<br />");
	print("場所：$eveplace<br />");
	print("電話番号：$tel<br />");
	print("内容：$contents<br />");
	print("挿入画像:$image<br />");
	//入力完了後の遷移処理
	
	
	//例外処理
} catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

//データベース切断
$pdo = null;

//メッセージの出力
echo "登録完了しました";

?>	