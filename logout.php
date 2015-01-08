<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>KUTARCログアウトページ</title>

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

// 現在使用中のセッションの読み込み
session_start();

// セッション変数のクリア
$_SESSION = array();

// セッションの削除
session_destroy();  

?>

ログアウトが完了しました。

<div id="footer">
  <a href="/php/top.php">トップページ</a>
  <a href="/php/index4.php">ログイン画面</a>

</div>

</body>
</html>
