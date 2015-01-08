<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>KUTARCログアウト画面</title>

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

<?php
//http://gihyo.jp/dev/serial/01/start-php/0007
$_SESSION = array();
$_SESSION['visited'] = null;

setCookie('PHPSESSID');
session_destroy();  

?>
ログアウトしました。

<div id="footer">
  <a href="/php/top.php">トップページ</a>
  <a href="/php/index4.php">ログイン画面</a>

</div>

</body>
</html>
