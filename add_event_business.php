<!-- 入力フォーム -->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>イベント情報追加更新ページ</title>

<!-- style sheetの設定 -->
<style type="text/css">
<!--
#header, #footer {
  background-color: #fed;
  height: 60px;
  padding: 10px;
}
#main {
  background-color: #eee;
  padding: 10px;
}
div#conten {
  text-align: center;
}
-->
</style>

<!-- ↓ここからjavascriptでのエラーメッセージ表示の処理 -->
<!-- else if にすると、２つ以上エラーがあるとき一つしか表示が出ないことから　else if　の書き方はしていません -->
<script type="text/javascript">
<!--
function form_check() {
	var flag = 0;
	if (document.busi_form.event_name.value == "") {   // 見出しの入力欄が未記入の時
		flag = 1;
		window.alert("見出しが未記入です。");    //表示（ポップアップ）
	}

	if (document.busi_form.event_date.value == "") {  // 開催日程の入力欄が未記入の場合
		flag = 1;
		window.alert("開催日程が未記入です。");    //表示（ポップアップ）
	}

	if (document.busi_form.event_place.value == "") {   // 場所（住所）の入力欄が未記入の場合
		flag = 1;
		window.alert("場所が未記入です。");   //表示（ポップアップ）
	}

	if (document.busi_form.content.value == "") {  // 内容の入力欄が未記入の場合
		flag = 1;
		window.alert("内容が未記入です。");   //表示（ポップアップ）
	}

	if (flag) {
		return false;
	} else {
		return true;
	}
}
-->
</script>

<!-- ここから入力フォームのhtml -->
</head>

<body>

<?php
	session_start();
	$user_id = $_SESSION['id'];
	if ($_SESSION['id'] == null) {
		header("Location: ".'/php/loginform.php');
	} else if ($_SESSION['visited'] != 2) {
		header("Location: ".'/php/top.php');
	}

	//Mysqlのユーザ情報入力
	$user ='root';
	$password = '';
	
try {
	// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
	$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

	//sqlの文字コード設定
	$dbh->query('SET NAMES utf8');

	// user_idがデータベースのあるかないかを確認する
	$sql = "SELECT user_id as id FROM area WHERE user_id = '$user_id'";
	$result = $dbh->query($sql)->fetchAll();

	if (empty($result[0]['id']))
	{
		print("先に店舗の基本情報を入力してください");
?>
		<a href="add_base_business.php">ココをクリック</a>
<?php
		die();
	}
	
	$dbh = null;
//例外処理
} catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
<div align="center">

	<div id="content">

	<!-- actionのところのphpファイル名は確認画面のphpである「conf_business.php」に設定 -->
		<form  action="conf_event_business.php" name="busi_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">

			<div id="header">
				<h1>おすすめ情報追加更新</h1>
			</div>

			<table class="sample-table">
				<!-- 見出し入力欄 -->
				<tr>
				<th>見出し</th>
				<td><input type="text" name="event_name" size="30" value="<?php echo $_POST["event_name"] ?>">
				</td>
				</tr>

				<!-- 開催日程入力欄 -->
				<tr>
				<th>開催日程</th>
				<td><input type="text" name="event_date" size="30" placeholder=" 0月00日~0月00日 0:00~0:00" value="<?php echo $_POST["event_date"] ?>">
				</td>
				</tr>

				<!-- 場所入力欄 -->
				<tr>
				<th>場所(住所)</th>
				<td><input type="text" name="event_place" size="30" value="<?php echo $_POST["event_place"] ?>">  
				</td>
				</tr>

				<!-- 内容入力欄 -->
				<tr>
				<th>内容</th>
				<td><textarea rows="10" cols="50" name="content"><?php echo $_POST["content"] ?></textarea>
				</td>

				</tr>
				<!-- ファイルアップロード欄 -->
				<tr>
				<th>ファイルアップロード</th>
				<td><input type="file" name="upfile" size="30"/></td>
				</tr>
				<p>
			</table>
			<p>
			<!-- 送信ボタン -->
			<div id="mainform-submit">
				<!-- nameを送信ボタンから「register」へ、,valueを送信から「確認画面へ」に変更しました。  -->
				<input type="submit" name="register" value="確認画面へ">
			</div>
		</form>
	</div>
<p>
<!-- トップページに遷移するためのボタンを設置 -->
<div id="footer">
  <a href="top.php">トップページ</a>
</div>

</div>

</body>
</html>

