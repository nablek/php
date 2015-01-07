<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" >
<title>おすすめ情報更新画面</title>
</head>
<body>

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

<center>
<div id="header">
<h1>おすすめ情報更新画面</h1>
</div>

<!-- mail.phpから「jukyoeve3.php」へ変更 -->
<form  action="jukyoeve3.php" method="post" enctype="multipart/form-data">
<table class="sample-table">
		<!-- 見出し入力欄 -->
		<tr>
		<th>見出し</th>
		<td><input type="text" name="event_name" size="30"></td>
		</tr>

		<!-- 開催日程入力欄 -->
		<tr>
		<th>開催日程</th>
		<td><input type="date" name="event_date" size="30"></td>
		</tr>

		<!-- 場所入力欄 -->
		<tr>
		<th>場所(住所)</th>
		<td><input type="text" name="event_place" size="30"></td>
		</tr>

		<!-- 内容入力欄 -->
		<tr>
		<th>内容</th>
		<td><textarea rows="10" cols="50" name="content"></textarea></td>
		</tr>
</table>

		<!-- 画像挿入欄 -->
		<tr>
		<!-- 下の一文があるとページの遷移ができないため、一応コメントアウトしています -->
		<!-- <form action="#" method="post" enctype="multipart/form-data"> -->
		<p>
		<input type="file" name="filename">
		</p>
		<!-- </form> -->
		</tr>
		
		<!-- 送信ボタン -->
		<div id="mainform-submit">
		<!-- nameを送信ボタンから「register」へ、,valueを送信から「確認画面へ」に変更しました。  -->
		<input type="submit" name="register" value="確認画面へ">
		</div>
</form>

<div id="footer">
  <a href="/php/top.php">トップページ</a>
</div>
</body>
</html>