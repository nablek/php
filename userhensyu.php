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

try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);

	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');

	//IDをもとにaccountテーブルから検索
	$sql = 'SELECT * FROM account WHERE user_id = "'.$_SESSION['id'].'"';

	foreach ($dbh->query($sql) as $row) {
		$user_name = $row['user_name'];
		$mailaddress = $row['mail_address'];
		$password = $row['password'];
	}
	// データベース切断
	$dbh = null;
	
// 例外処理
}  catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

<!-- メインカラム開始 -->
	<div align="center">
		<h1>ユーザ情報変更</h1>
		<div class="user">
			<form method="post" action="/php/userkourmshin.php">
				<!-- ユーザ名入力欄 -->
 				<tr>
				<td width="185"><span>ユーザ名：</span></td>
				<td width="500" colspan="2">
				<input type="text" name="user_name" id="user_name" style="width: 200px;" maxlength="256" autofocus required aria-required="true" x-moz-errormessage="ユーザ名が未記入です" value="<?php echo $user_name; ?>" />
				</td>
				</tr>

				<br>
				<br>

				<!-- メールアドレス入力欄 -->
				<tr>
				<td width="185"><span>メールアドレス：</span></td>
				<td width="500" colspan="2">
				<input type="text" name="mailaddress" id="mailaddress" style="width: 250px;" maxlength="256" autofocus required aria-required="true" x-moz-errormessage="メールアドレスが未記入です" value="<?php echo $mailaddress; ?>" />
				</td>
				</tr>

				<br>
				<br>

    			<!-- パスワード入力欄 -->
				<tr>
				<td width="185"><span>パスワード：</span></td>
				<td width="500" colspan="2">
				<input type="password" name="password" id="password" style="width: 100px;" maxlength="256" autofocus required aria-required="true" x-moz-errormessage="パスワードが未記入です" value="<?php echo $password; ?>" />
				</td>
				</tr>
				<br>
				<br>
				
				<!-- 送信ボタン -->
				<input type="submit" name="送信ボタン" value="変更を保存" >
				<!-- 閉じるボタン -->
				<input type="button" value="閉じる" onclick="window.close()">
			</div>
		</div>
	</div>
</body>
</html>
