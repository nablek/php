<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>KUTARCログイン画面</title>
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
  <a href="/html/top.html">トップページ</a>
</div>
</body>
</html>
