<html>
<head>
<meta charset="UTF-8">
<title>おすすめ物件更新完了</title>
</head>
<body>

<?php

	//Mysqlのユーザ情報入力
	$user ='root';
	$password = '';

	//各項目の値を取得
	$eventname = $_POST['event_name'];
	$eventdate = $_POST ['event_date'];
	$eventplace = $_POST['event_place'];
	$content = $_POST['content'];
	$image = $_POST['filename'];

	//$user_idの取得方法の検討！、event_dateがテーブルではdate(0000-00-00)型になっているので入力画面側もdate型に合わせること
//おそらく修正完了↑
	//テスト用に無理やりuser_idを設定、ログイン時のuser_idを取得し$user_id変数に代入することで以下のSQLは正常に動作
	//ただし、挿入画像に関してはデータベースにカラムを設定していないため今回は書いていない
	
	$user_id = "JA";
	
	//必須項目に記入がない場合のエラー
	if ($eventname == false){
		die ("※（必須）見出しを入力してください");
	}else if ($eventdate == false) {
		die ("※（必須）見出しを入力してください");
	}else if ($eventplace == false){
		die ("※（必須）場所を入力してください");
	}else if ($content == false){
		die ("※（必須）内容を入力してください");
	}

try {
	// ★データベース関連はここから↓
	// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
	$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

	//sqlの文字コード設定
	$dbh->query('SET NAMES utf8');

	// SQL文をそれぞれの変数に格納(DB名,テーブル名,フィールド名は未記入)

	// 挿入sql文 inquiry_idはmysql側で自動的に追加されるので必要なし
	$sql = 'UPDATE area SET event_name = "'.$eventname.'", event_date = "'.$eventdate.'", event_place = "'.$eventplace.'", content =  "'.$content.'" WHERE user_id = "'.$user_id.'"';

	$dbh->query($sql);
	
	//エラーがない場合結果を表示
	print("以下の内容で登録します。<br /><br />");
	print("見出し：$eventname<br />");
	print("開催日時 : $eventdate<br />");
	print("場所：$eventplace<br />");
	print("内容：$content<br />");
	print("挿入画像:$image<br />");

	//例外処理
} catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

//データベース切断
$pdo = null;

//メッセージの出力
echo "登録完了しました";

//登録完了後のページ遷移処理を何かしら設定しないと画面が登録完了で止まる
//header関数を使用して画面を遷移(Locationの後は「遷移先のファイル名」または./を削除して遷移先URLを記入）
//例
//(1つ目）
//header("Location: http://-----------");
//(2つ目）
//$url = "http://------------";
//header("Location: ".$url);
//遷移先をファイル名にした場合↓
header("Location: /PHP/jukyo.php");

?>

</body>
