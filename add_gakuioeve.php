<!-- 入力フォーム -->
<!-- エラーが出力されるのは、学外/学内両方で入力が必要なもののみ -->
<!-- （注）date.jsとの関連があります。-->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />

<!-- style sheetの設定 -->
<style type="text/css">
<!--	
 #header, #footer{
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
/* IMEモードを追加(safariでは動作しません) */
input.example1 { ime-mode: active; }   /* 日本語入力→英数字入力(またその逆も然り）へ変更が可。←メールアドレスの入力欄以外に設置　class="example1" */
input.example2 { ime-mode: disabled; } /* 日本語入力への変更が不可。英数字入力のみ。←これをメールアドレスの入力欄に設置 class="example2" */
-->
</style>

<title>学外/学内イベント情報追加更新ページ</title>

<!-- ポップアップエラー表示 -->
<script type="text/javascript">
<!--
function form_check() {
	var flag = 0;
	if (document.eve_form.category[0].checked == false && document.eve_form.category[1].checked == false ) {   // カテゴリのラジオボタンが未選択の時
		flag = 1;   
		window.alert('ラジオボタンのいずれかをご選択ください');   //表示（ポップアップ）
    }

	if (flag) {
		return false;
	} else {
		return true;
	}
}
-->
</script>

<!-- ここから入力フォームのHTML -->
</head>

<?php
	session_start();
	if ($_SESSION['id'] == null) {
		header("Location: ".'/php/loginform.php');
	} else if ($_SESSION['visited'] == 2) {
		header("Location: ".'/php/top.php');
	}
?>

<body>
	<div align="center">
		<div id="header">
			<h1>学内/学外イベント情報追加更新ページ</h1>
		</div>
		
		<div id="content">
		<form action="conf_gakuioeve.php" name="eve_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">
			<table>
			<br>
				<!-- 主催者名入力欄 -->
				<tr>
					<th>主催者名（団体名）</th>
					<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="主催者名（団体名）が未記入です" name="sponsor_name" size="50" class="example1" value="<?php echo $_POST["sponsor_name"] ?>"></td>                            
				</tr> 

				<!-- メールアドレス入力欄 -->
				<tr>
					<th>メールアドレス</th>
					<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="メールアドレスが未記入です" name="mailaddress" placeholder="info@example.com" size="50" class="example2" value="<?php echo $_POST["mailaddress"] ?>"></td>
				</tr>	

				<!-- イベント名入力欄 -->
				<tr>
					<th>イベント名</th>
					<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="イベント名が未記入です" name="event_name" size="50" class="example1" value="<?php echo $_POST["event_name"] ?>"></td>
				</tr>

				<!-- 開催日入力欄 -->
				<tr>
					<th>開催日</th>
					<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="開催日が未記入です" name="event_date" placeholder="201☆年△月○日" size="50" class="example1" value="<?php echo $_POST["event_date"] ?>"></td>
				</tr>

				<!-- イベント場所入力欄 -->
				<tr>
					<th>開催場所</th>
					<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="開催場所が未記入です" name="event_place" size="50" class="example1" value="<?php echo $_POST["event_place"] ?>"></td>
				</tr>

				<!-- イベント内容入力欄 -->
				<tr>
					<th>イベント内容</th>
					<td><textarea autofocus required aria-required="true" x-moz-errormessage="内容が未記入です" rows="10" cols="50" name="event_content" class="example1" value="<?php echo $_POST["event_content"] ?>"></textarea></td>
				</tr>
			</table>
			
			<!-- ファイルアップロード欄 -->
			<tr>
				<th>ファイルアップロード</th>
				<td><input type="file" name="upfile" size="30"/></td>
			</tr>
			<p>
			<!-- 送信ボタン -->
			<div id="mainform-submit">
				<input type="submit" name="register" value="確認画面へ">
			</div>
		</form>
	</div>		
	<!-- トップページに遷移するためのボタンを設置 -->
	<div id="footer">
		<a href="top.php">トップページ</a>
	</div>
</body>
</html>
