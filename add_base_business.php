<!-- 入力フォーム -->

<!-- 入力フォームでの実際の動き -->
<!-- 1.今回いろんな方法を試しましたが、エラーメッセージの表示に関してはjavascriptで表示するようにしました。 -->
<!--    →ポップアップでエラーメッセージが出力されます。 -->
<!-- 2.もし、確認画面へ遷移するボタンをクリックした時にエラー出力があった場合、今まで入力した内容は消えることなくそのまま表示され続けるように設定しました。 -->
<!-- 3.追加した情報を確認画面で確認できるようになるのは、全部の入力欄が埋まった時のみとしています。 -->
<!-- 4.確認画面へ進む際は、「確認画面へ」というボタンをクリックすると確認画面へ遷移できるようになっています。 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本/イベント情報追加更新ページ</title>

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
/* IMEモードを追加(safariでは動作しません) */
input.example1 { ime-mode: active; }   /* 日本語入力→英数字入力(またその逆も然り）へ変更が可。←メールアドレスの入力欄以外に設置　class="example1" */
input.example2 { ime-mode: disabled; } /* 日本語入力への変更が不可。英数字入力のみ。←これをメールアドレスの入力欄に設置 class="example2" */
-->
</style>

<!-- ↓ここからjavascriptでのエラーメッセージ表示の処理 -->
<!-- else if にすると、２つ以上エラーがあるとき一つしか表示が出ないことから　else if　の書き方はしていません -->
<script type="text/javascript">
<!--
function form_check() {
	var flag = 0;
	if (document.busi_form.category.value == "no_data") {   // 店舗名の入力欄が未記入の時
		flag = 1;
		window.alert("カテゴリが未記入です。");    //表示（ポップアップ）
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
	if ($_SESSION['id'] == null) {
		header("Location: ".'/php/loginform.php');
	} else if ($_SESSION['visited'] == 1) {
		// 管理者の場合および商用以外のアカウント権限はtopへ
	} else if ($_SESSION['visited'] != 2) {
		header("Location: ".'/php/top.php');
	}
?>
<div align="center">
	<div id="header">
		<h1>基本情報追加更新</h1>
	</div>

	<div id="content">

	<!-- actionのところのphpファイル名は確認画面のphpである「conf_business.php」に設定 -->
		<form  action="conf_base_business.php" name="busi_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">
			<table class="sample-table">
				<!-- カテゴリ分けのプルダウンボタン -->
				<p>
				<select name="category" id="category">
				<option value="no_data" selected>未選択</option>
				<option value="jyukyo">住居情報</option>
				<option value="supermarket">スーパーマーケット</option>
				<option value="conveniencestore">コンビニエンスストア</option>
				<option value="bike">自転車/バイク販売店</option>
				<option value="cityhall">市役所</option>
				<option value="hospital">病院</option>
				<option value="Librarymuseum">図書館/美術館</option>	
				<option value="postoffice">郵便局</option>
				<option value="bank">銀行</option>
				<option value="other">その他</option>
				</select>
				</p>

				<!-- 店舗名入力欄 -->
				<tr>
				<th>店舗名</th>
				<!-- valueのところに、見出し入力欄に入力した内容がエラーなどが起きてもデータを保持できるようにphpで設定。以下「開催日程」「場所」「内容」においても同様。 -->
				<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="店舗名が未記入です" name="shop_name" size="30" class="example1" value="<?php echo $_POST["shop_name"] ?>">
				</td>
				</tr>

				<!-- 店舗名（ふりがな）入力欄 -->
				<tr>
				<th>店舗名（ふりがな）</th>
				<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="店舗名（ふりがな）が未記入です" name="shop_phonetic" size="30" class="example1" value="<?php echo $_POST["shop_phonetic"] ?>">
				</td>
				</tr>

				<!-- 住所入力欄 -->
				<tr>
				<th>住所</th>
				<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="住所が未記入です" name="address" size="30" class="example1" value="<?php echo $_POST["address"] ?>">  
				</td>
				</tr>

				<!-- 電話番号入力欄 -->
				<tr>
				<th>電話番号</th>
				<td><input type="date" autofocus required aria-required="true" x-moz-errormessage="電話番号が未記入です" name="telphone" size="30" placeholder="0000-00-0000" class="example2" value="<?php echo $_POST["telphone"] ?>">  
				</td>
				</tr>

				<!-- 営業時間入力欄 -->
				<tr>
				<th>営業時間</th>
				<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="営業時間が未記入です" name="time" size="30" placeholder="0:00~0:00" class="example1" value="<?php echo $_POST["time"] ?>">  
				</td>
				</tr>

				<!-- 定休日入力欄 -->
				<tr>
				<th>定休日</th>
				<td><input type="text" autofocus required aria-required="true" x-moz-errormessage="定休日が未記入です" name="close" size="30" class="example1" value="<?php echo $_POST["close"] ?>">  
				</td>
				</tr>

				<!-- URL入力欄 -->
				<tr>
				<th>URL</th>
				<td><input type="text" name="link" placeholder="http://www.△△△・・・" class="example2" value="<?php echo $_POST["link"] ?>">  
				</td>
				</tr>

				<!-- ファイルアップロード欄 -->
				<tr>
				<th>ファイルアップロード</th>
				<td><input type="file" name="upfile" size="30"/></td>
				</tr>
				<p>
			</table>
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

