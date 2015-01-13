<!-- 入力フォーム -->

<!-- 入力フォームでの実際の動き -->
<!-- 1.今回いろんな方法を試しましたが、エラーメッセージの表示に関してはjavascriptとhtml、どちらかで表示するようにしました。 -->
<!--    →(html) autofocus requiredを使用したエラーメッセージは、未記入の部分の枠が赤くなるのと、入力欄の上にカーソルを少しの時間置くと未記入の場合は吹き出しの注意書きが出現します。forefoxなどはこっち。 -->
<!--    →(javascript) safariを使用してページを開いた場合はこっち。上記のhtmlでは未記入の時枠が赤くなり、吹き出しがマウスイベントで出るようにしていますが、こっちではポップアップでエラーメッセージが出力されます。 -->
<!-- 2.もし、確認画面へ遷移するボタンをクリックした時にエラー出力があった場合、今まで入力した内容は消えることなくそのまま表示され続けるように設定しました。 -->
<!-- 3.追加した情報を確認画面で確認できるようになるのは、全部の入力欄が埋まった時のみとしています。 -->
<!-- 4.確認画面へ進む際は、「確認画面へ」というボタンをクリックすると確認画面へ遷移できるようになっています。 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>おすすめ情報更新ページ</title>

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
<script type="text/javascript">
<!--
function form_check() {
    var flag = 0;
    if (document.event_form.event_name.value == "") {   // 見出しの入力欄が未記入の時
		flag = 1;
		window.alert("見出しが未記入です。");    //表示（ポップアップ）
    	//return false;
    }
    
    if (document.event_form.event_date.value == "") {  // 開催日程の入力欄が未記入の場合
	    flag = 1;
		window.alert("開催日程が未記入です。");    //表示（ポップアップ）
    	//return false;
    } 
    
    if (document.event_form.event_place.value == "") {   // 場所（住所）の入力欄が未記入の場合
		flag = 1;
		window.alert("場所が未記入です。");   //表示（ポップアップ）
    	//return false;
    }
    
    if (document.event_form.content.value == "") {  // 内容の入力欄が未記入の場合
		flag = 1;
		window.alert("内容が未記入です。");   //表示（ポップアップ）
    	//return false;
    }
  
    if (flag) {
    	//window.alert("必須項目に謝りがあります。");
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

<div id="header">
<h1>おすすめ情報更新ページ</h1>
</div>

<div id="content">

<!-- actionのところのphpファイル名は確認画面のphpである「confirm.php」に設定 -->
  <form  action="confirm.php" name="event_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">
    <table class="sample-table">
		<!-- 見出し入力欄 -->
		<tr>
		<th>見出し</th>
		<!-- HTMLでのエラーメッセージを表示させる「autofocus required」を input内に設定。以下「開催日程」「場所」「内容」においても同様。 -->
		<!-- valueのところに、見出し入力欄に入力した内容がエラーなどが起きてもデータを保持できるようにphpで設定。以下「開催日程」「場所」「内容」においても同様。 -->
		<td><input type="text" autofocus required title="見出しが未記入です" name="event_name" size="30" value="<?php echo $_POST["event_name"] ?>">
		</td>
		</tr>

		<!-- 開催日程入力欄 -->
		<tr>
		<th>開催日程</th>
		<td><input type="text" autofocus required title="開催日程が未記入です" name="event_date" size="30" placeholder=" 0月00日~0月00日 0:00~0:00" value="<?php echo $_POST["event_date"] ?>">
		</td>
		</tr>

		<!-- 場所入力欄 -->
		<tr>
		<th>場所(住所)</th>
		<td><input type="text" autofocus required title="場所（住所）が未記入です" name="event_place" size="30" value="<?php echo $_POST["event_place"] ?>">  
		</td>
		</tr>

		<!-- 内容入力欄 -->
		<tr>
		<th>内容</th>
        <td><textarea rows="10" cols="50" autofocus required title="内容日程が未記入です" name="content"><?php echo $_POST["content"] ?></textarea></td>
		</tr>
  </table>

		<!-- 画像挿入欄 -->
<!-- 	<tr>
		<p>
		<input type="file" name="filename">
		</p>
		</tr>
-->
		<!-- </form> -->
		
		
		<!-- 送信ボタン -->
		<div id="mainform-submit">
		<!-- nameを送信ボタンから「register」へ、,valueを送信から「確認画面へ」に変更しました。  -->
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
