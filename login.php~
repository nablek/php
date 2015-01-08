<?php
//セッション開始
session_start();

//次の遷移先の引数を格納する変数
//$page = @$_GET['p'];

//$pageの中身があるか、ない場合はtopを代入
if (!$page) $page = 'top';

//不正な文字が使われていないか、exit()はエラー画面へと変更すること！
if (!preg_match('/^[a-z]{1,8}$/', $page)) exit();

//ログイン中かどうかのチェック、変数nameが設定されていればログイン中、ログイン中でなければ$pageにloginを代入してログインページへ飛ぶ
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
	
	//IDとパスワードをもとにaccountテーブルから検索
	$sql = 'SELECT * FROM account WHERE user_id = "'.$input_id.'" AND password = "'.$input_password.'"';

		foreach ($dbh->query($sql) as $row) {
			//データベース照合に一致した場合の処理（権限の確認および遷移処理）
			$authority = $row['authority'];

			//authorityの権限に合わせて各種ページへと遷移
			switch ($authority) {
				case '0':
					$page = '/php/top.php';
					$_SESSION['visited'] = 1;
					break;
				case '1':
					//$page = '商用ページ';
					$_SESSION['visited'] = 1;
					break;
				case '2':
					//$page = '学内ページ';
					$_SESSION['visited'] = 1;
					break;
				case '3':
					//$page = '学外ページ';
					$_SESSION['visited'] = 1;
					break;
				default:
					print("入力内容に一致していません");
					$_SESSION['visited'] = null;
					break;
			}
		}
	} else {
		$page = 'notfound.php';
		$_SESSION['visited'] = null;
	}


} else {
	$page = '/php/top.php';
}

//$pageに代入されたphpへ遷移
header("Location: ".$page);

?>
