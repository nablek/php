<?php	
session_start();
$page = @$_GET['p'];
if (!$page) $page = 'top';
if (!preg_match('/^[a-z]{1,8}$/', $page)) exit();

if (!isset($_SESSION['name'])) {
	$page = 'login';
	
	
	if (!empty($_POST['id']) && !empty($_POST['pass'])) {
	
		$id = "tanaka";
		$pass = "tanaka";
		$input_id = $_POST['id'];
		$input_pass = $_POST['pass'];
		 
		 
	
		if ($id == $input_id && $pass == $input_pass) {
				   $_SESSION['name'] = '田中';
				   $page = 'top';
		}else{
			  echo  "パスワードが間違っています";
			}
		}else{
			  echo  "パスワードを入力してください";
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