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
	<meta http-equiv="REFRESH" content="3;URL=top.php" >
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

<!-- ここから、DB処理 -->
<!-- DBの中身がわからないのであれですが、内部設計書の段階ではテーブルの中にmailadressがないこと、そして開催日がこちらではプルダウンになっているので
year, month, dateになっていますがテーブル内ではevent_dateになっているのでよくわかりませんでした。なにかあるときはいってください。 -->
<!-- 後から修正されたところはわからないので、追加や訂正はお願いします。（add, conf, compそれぞれ） -->
<?php 
	session_start();
	$user_id = $_SESSION['id'];

	//Mysqlのユーザ情報入力
	$user ='root';
	$password = '';

	//各項目の値を確認画面のページから取得
	$category = $_SESSION['visited'];
	$sponsor_name = $_POST['sponsor_name'];
	$mailaddress = $_POST ['mailaddress'];
	$event_name = $_POST['event_name'];
	$event_date = $_POST['event_date'];
	$event_place = $_POST['event_place'];
	$content = $_POST['event_content'];
	$upfile_dir = $_POST['upfile'];

	// データテーブルへの画像リンク挿入
	if ($upfile_dir != null) {
		$upfile_dir = '/userpicture/'.$user_id.'/'.$_POST['upfile'].'';
	}
	

try {
	// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
	$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

	//sqlの文字コード設定
	$dbh->query('SET NAMES utf8');
	
	$sql = "SELECT user_id as id FROM inoutside_event WHERE user_id = '$user_id'";
	$result = $dbh->query($sql)->fetchAll();

	if (empty($result[0]['id']))
	{
		// ここからInsert（データがまだ入っていないときの新規追加）
		$sql = "INSERT INTO inoutside_event (user_id, sponsor_name, event_name, event_date, event_place, event_content, authority, mail_address, picture)
				VALUES ('$user_id', '$sponsor_name', '$event_name', '$event_date', '$event_place', '$content', '$category', '$mailaddress', '$upfile_dir')";
		$dbh->query($sql);
	} else {
		// Update（データがすでに入っているときの更新）
		$sql = "UPDATE inoutside_event SET sponsor_name = '$sponsor_name', event_name = '$event_name', event_date = '$event_date', event_place = '$event_place', 
				event_content = '$content', authority = '$category', mail_address = '$mailaddress', picture = '$upfile_dir' WHERE user_id = '$user_id'";
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
			<a href="top.php">ココをクリック</a>
			してください。
		</p>
	</div>
</body>
</html>