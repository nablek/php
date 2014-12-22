<?php	
session_start();
$page = @$_GET['p'];
//ページ名を取得して$pageに代入、ページ名がない場合はtopを代入
if (!$page) $page = 'top';
if (!preg_match('/^[a-z]{1,8}$/', $page)) exit();

//ログイン中かどうかのチェック、変数nameが設定されていればログイン中、ログイン中でなければ$pageにloginを代入してログインページへ飛ぶ
if (!isset($_SESSION['name'])) {
	$page = 'login';
	
	//IDとパスワードが入力されれば以下のif文の内容を実行する
	if (!empty($_POST['id']) && !empty($_POST['pass'])) {
	
		$id = "tanaka";
		$pass = "tanaka";
		$input_id = $_POST['id'];
		$input_pass = $_POST['pass'];
		 
		 
		//IDとパスワードが上で設定したものと同じならばログイン先のトップページへ飛ぶ
		//IDは合っているがパスワードが間違っている場合はパスワードが間違っていますというエラーページへ飛ぶ
		//パスワードは合っているがIDが間違っている場合はIDが間違っていますというエラーページへ飛ぶ
		//どちらも間違っている場合は相応のエラーページへ飛ぶ
		//何も入力されていない場合は何も入力されてませんというページへ飛ぶ（ようにしたいけどうまくいかない←ここ重要！！！！！！！！！！）
		if ($id == $input_id && $pass == $input_pass) {
				   $_SESSION['name'] = '田中';
				   $page = 'top';
		} elseif($id == $input_id && $pass != $input_pass) {
			  $page = 'top_pass_error';
			} elseif ($id != $input_id && $pass == $input_pass) {
				$page = 'top_ID_error';
				} elseif ($id != $input_id && $pass != $input_pass) {
					$page = 'error';
				} else {
					$page = 'notfound';
				
				}
		} 
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新入生支援システム</title>
<style>
h1 {
  margin: 0;
}
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
<div id="header">
  <h1>新入生支援システム</h1>
</div>
<div id="main">
<?php
  require "$page.php";
?>
</div>
<div id="footer">
  <a href="?p=top">トップページ</a> |
  <a href="?p=party">秘密のパーティー</a> |
  <a href="?p=journey">秘密のジャーニー</a> |
  <a href="?p=logout">ログアウト</a>
</div>
</body>
</html>