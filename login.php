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
if (!isset($_SESSION['name'])) {

	//IDとパスワードが二つとも入力された時のみ以下のif文の内容を実行する
	if (!empty($_POST['id']) && !empty($_POST['password'])) {

		$id = "tanaka";
		$id2 = "kawakami";
		$id3 = "kagawa";
		$password = "tanaka";
		$password2 = "kawakami";
		$password3 = "kagawa";
		$input_id = $_POST['id'];
		$input_password = $_POST['password'];

	//後にデータベース照合で必要となるセレクト文
	//select user_id, user_password from account where $input_id = user_id and $input_password = user_password;
	

		//IDとパスワードが上で設定したものと同じならばログイン先のそれぞれのトップページへ飛ぶ
		//間違っている場合は相応のエラーページへ飛ぶ
		//何も入力されていない場合は何も入力されてませんというページへ飛ぶ
		
	if ($id == $input_id && $password == $input_password) {
		$_SESSION['name'] = '田中';
		$page = 'top';
	} elseif ($id2 == $input_id && $password2 == $input_password) {
			$_SESSION['name'] = '川上';
			$page = 'syouyou';
		} elseif ($id3 == $input_id && $password3 == $input_password) {
			$_SESSION['name'] = '香川';
			$page = 'ippan';
	} elseif($id != $input_id || $password != $input_password) {
			$page = 'error';
		}
	} else {
		$page = 'notfound';
	}
	 
	
	
	//テスト用出力
	//$page = 'top';
}


//$pageに代入されたphpへ遷移
require "$page.php"

?>