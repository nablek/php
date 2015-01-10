<!-- 登録完了ページ -->

<!-- 登録完了ページでの実際の動き -->
<!-- ここでは、「登録完了しました。」という表示の後、トップページの方へ自動遷移できるようになっています。 -->
<!-- DBへの格納などの処理はここで行います。（間違っていたら訂正お願いします。） -->

<!-- ここから登録完了ページのHTML -->
<html>
<head>
	<meta charset="UTF-8">
	<!-- 何秒後に遷移するのかと、遷移先の設定 --> 
	<!-- top.html → top.phpに変更　/ 2秒遷移なのに１秒遷移になっているのでそこを変更 -->
	<meta http-equiv="REFRESH" content="2;URL=top.php" >
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

<!-- ここから、DB処理（ここの訂正よろしくお願いします。） -->
<?php 

//Mysqlのユーザ情報入力
$user ='root';
$password = '';

//各項目の値を確認画面のページから取得
$evename = $_POST['event_name'];
$evedate = $_POST ['event_date'];
$eveplace = $_POST['event_place'];
$contents = $_POST['content'];
//$images = $_POST['image'];

//$user_idの取得方法の検討！
//テスト用に無理やりuser_idを設定、ログイン時のuser_idを取得し$user_id変数に代入することで以下のSQLは正常に動作
//ただし、挿入画像に関してはデータベースにカラムを設定していないため今回は書いていない

$user_id = "JA";

try {
// ★データベース関連はここから↓
	// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
	$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

	//sqlの文字コード設定
	$dbh->query('SET NAMES utf8');

	// SQL文をそれぞれの変数に格納(DB名,テーブル名,フィールド名は未記入)

	// ★名前変わってるけどはたして大丈夫なのか
	// 挿入sql文 inquiry_idはmysql側で自動的に追加されるので必要なし
	$sql = 'UPDATE area SET view_evename = "'.$evename.'", view_evedate = "'.$evedate.'", view_eveplace = "'.$eveplace.'", view_content =  "'.$contents.'" WHERE user_id = "'.$user_id.'"';

	$dbh->query($sql);

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
		5秒経ってもページが変わらない場合は
		<!-- トップページ手動で戻る -->
			<a href="top.php">ココをクリックしてください</a>
		</p>
	</div>
</body>
</html>

