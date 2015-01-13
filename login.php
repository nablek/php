<?php
//セッション開始
session_start();

//次の遷移先の引数を格納する変数
//$page = @$_GET['p'];

//$pageの中身があるか、ない場合はtopを代入
if (!$page) $page = '/php/top.php';

//ログイン中かどうかのチェック、変数visitedが設定されていればログイン中
if (!isset($_SESSION['visited'])) {

	//IDとパスワードが二つとも入力された時のみ以下のif文の内容を実行する
	if (!empty($_POST['id']) && !empty($_POST['password'])) {

		//入力されたIDとパスワードを各変数に格納
		$input_id = $_POST['id'];
		$input_password = $_POST['password'];


		//Mysqlのユーザ情報入力
		$user ='root';
		$password = '';

		//データベース接続
		$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

		//sqlの文字コード設定
		$dbh->query('SET NAMES utf8');
	
		$sql = 'SELECT count(*) FROM account WHERE user_id = "'.$input_id.'" AND password = "'.$input_password.'"';
		foreach ($dbh->query($sql) as $row) {
			if ($row['count(*)'] != "1") {
				print ("入力内容が正しくありません<br />");
				die ("<a href=/php/index4.php>戻る<a>");
			}
		}
	
		//IDとパスワードをもとにaccountテーブルから検索
		$sql = 'SELECT * FROM account WHERE user_id = "'.$input_id.'" AND password = "'.$input_password.'"';

		//データベース照合に一致した場合の処理（権限の確認および遷移処理）
		foreach ($dbh->query($sql) as $row) {
			
			$authority = $row['authority'];
			$_SESSION['id'] = $row['user_id'];

			// authorityの権限に合わせて各種ページへと遷移
			// SESSION['visited']にはどの権限でログイン中であるかの値を格納
			switch ($authority) {
				// 管理者の場合
				case '0':
					$_SESSION['visited'] = 1;
					$page = '/html/ktop.html';
					break;
					
				// 商用ユーザの場合
				case '1':
					$_SESSION['visited'] = 2;
					$page = '/php/eventadd_out.php';
					break;
					
				// 学内ユーザの場合
				case '2':
					$_SESSION['visited'] = 3;
					break;
					
				// 学外ユーザの場合
				case '3':
					$_SESSION['visited'] = 4;
					break;
				default:
					print("入力内容が一致していません");
					$_SESSION['visited'] = null;
					break;
			}
		}
	} else {
		$page = 'notfound.php';
		$_SESSION['visited'] = null;
		$_SESSION['id'] = null;
	}

} else {

	// どの権限でログイン中であるかを判定
	switch ($_SESSION['visited']) {
		case '1':
			$page = '/html/ktop.html';
			break;
		case '2':
			$page = '/php/eventadd_out.php';
			break;
		default:
			$page = '/php/top.php';
			break;
	}
}

//$pageに代入されたphpへ遷移
header("Location: ".$page);

?>
