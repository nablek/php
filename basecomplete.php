<!-- 登録完了ページ -->

<!-- 登録完了ページでの実際の動き -->
<!-- ここでは、「登録完了しました。」という表示の後、トップページの方へ自動遷移できるようになっています。 -->
<!-- DBへの格納などの処理はここで行います。（間違っていたら訂正お願いします。） -->

<!-- ここから登録完了ページのHTML -->
<html>
<head>
	<meta charset="UTF-8">
	<!-- 何秒後に遷移するのかと、遷移先の設定 --> 
	<!-- top.html → top.phpに変更　/ 3秒遷移なのに１秒遷移になっているのでそこを変更 -->
	<meta http-equiv="REFRESH" content="20;URL=top.php" >
	<title>登録完了</title>
	<style>
		#header, #footer {
		background-color: #fed;
		height: 60px;
		padding: 10px;
		}
		#main {
		background-color: #eee;
		padding: 10px;
		}
	</style>
</head>
<body>

<!-- ここから、DB処理（ここの訂正よろしくお願いします。値の取得以外手はつけていません。） -->
<?php 

//Mysqlのユーザ情報入力
$user ='root';
$password = '05040128';

//各項目の値を確認画面のページから取得
$shop_name = $_POST['shop_name'];
$shop_phonetic = $_POST ['shop_phonetic'];
$address = $_POST['address'];
$telphone = $_POST['telphone'];
$category = 'super';
//$time = $_POST['time'];
//$close = $_POST['close'];
//$link = $_POST['link'];


//$user_idの取得方法の検討！
//テスト用に無理やりuser_idを設定、ログイン時のuser_idを取得し$user_id変数に代入することで以下のSQLは正常に動作
//ただし、挿入画像に関してはデータベースにカラムを設定していないため今回は書いていない

$user_id = "JA";

try {
// ★データベース関連はここから↓
	// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
	$dbh = new PDO('mysql:dbname=system;host=127.0.0.1',$user, $password);

	//sqlの文字コード設定
	$dbh->query('SET NAMES utf8');

	// SQL文をそれぞれの変数に格納(DB名,テーブル名,フィールド名は未記入)

	// ★手をつけるの怖いので、イベント情報追加画面の$sqlのままにしてます
	// shop_nameがデータベースのあるかないかを確認する
	$sql = "SELECT shop_id as id FROM area WHERE shop_name = '$shop_name'";
	$result = $dbh->query($sql)->fetchAll();

	if (empty($result[0]['id']))
	{
		print "insert!";
		//formのすべての値をいれる
		// Insert
		$sql = "INSERT INTO area (shop_name, shop_phonetic, category, tel, address) VALUES ('$shop_name', '$shop_phonetic', '$category', '$telphone', '$address')";
		$dbh->query($sql);
	} else {
		print "update!";
		// Update（shop_nameはいらない）
		$shop_id = $result[0]['id'];
		$sql ="UPDATE area SET shop_name = '$shop_name', shop_phonetic = '$shop_phonetic', category = '$category', tel ='$telphone', address ='$address' WHERE shop_id = $shop_id";
		$dbh->query($sql);
	}
	
	//例外処理
} catch (PDOEXception $e) {
exit('データベースに接続できませんでした。' . $e->getMessage());
}

//データベース切断
$pdo = null;
?>

	<div align="center">
		<div id="header">
			<h3>登録しました</h3>
		</div>	
		<p>
		3秒経ってもページが変わらない場合は
		<!-- トップページ手動で戻る -->
			<a href="top.php">ココをクリックしてください</a>
		</p>
	</div>
</body>
</html>


