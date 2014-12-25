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

<form action="login.php" method="post">
ID<br><input type="text" name="id"><br>
パスワード<br><input type="password" name="password"><br>
<input type="submit" value="送信">
</form>

</div>
<div id="footer">
  <a href="?p=top">トップページ</a> |
  <a href="?p=party">秘密のパーティー</a> |
  <a href="?p=journey">秘密のジャーニー</a> |
  <a href="?p=login?$page=login">ログイン</a> |
  <a href="logout.php">ログアウト</a>
  
</div>
</body>
</html>
