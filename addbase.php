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
<title>基本情報更新ページ</title>

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
    if (document.base_form.shop_name.value == "") {   // 店舗名の入力欄が未記入の時
		flag = 1;
		window.alert("店舗名が未記入です。");    //表示（ポップアップ）
    	//return false;
    }
    
    if (document.base_form.shop_phonetic.value == "") {  // 店舗名（ふりがな）の入力欄が未記入の場合
	    flag = 1;
		window.alert("店舗名(ふりがな)が未記入です。");    //表示（ポップアップ）
    	//return false;
    } 
    
    if (document.base_form.address.value == "") {   // 住所の入力欄が未記入の場合
		flag = 1;
		window.alert("住所が未記入です。");   //表示（ポップアップ）
    	//return false;
    }
    
    if (document.base_form.telephone.value == "") {  // 電話番号の入力欄が未記入の場合
		flag = 1;
		window.alert("電話番号が未記入です。");   //表示（ポップアップ）
    	//return false;
    }

    if (document.base_form.time.value == "") {  // 営業時間の入力欄が未記入の場合
		flag = 1;
		window.alert("営業時間が未記入です。");   //表示（ポップアップ）
    	//return false;
    }

    if (document.base_form.close.value == "") {  // 定休日の入力欄が未記入の場合
		flag = 1;
		window.alert("定休日が未記入です。");   //表示（ポップアップ）
    	//return false;
    }

    if (document.base_form.link.value == "") {  // URLの入力欄が未記入の場合
		flag = 1;
		window.alert("URLが未記入です。");   //表示（ポップアップ）
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
<h1>基本情報更新ページ</h1>
</div>

<div id="content">

<!-- actionのところのphpファイル名は確認画面のphpである「baseconfirm.php」に設定 -->
  <form  action="baseconfirm.php" name="base_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">
    <table class="sample-table">
		<!-- 店舗名入力欄 -->
		<tr>
		<th>店舗名</th>
		<!-- valueのところに、見出し入力欄に入力した内容がエラーなどが起きてもデータを保持できるようにphpで設定。以下「開催日程」「場所」「内容」においても同様。 -->
		<td><input type="text" autofocus required title="店舗名が未記入です" name="shop_name" size="30" value="<?php echo $_POST["shop_name"] ?>">
		</td>
		</tr>

		<!-- 店舗名（ふりがな）入力欄 -->
		<tr>
		<th>店舗名（ふりがな）</th>
		<td><input type="text" autofocus required title="店舗名（ふりがな）が未記入です" name="shop_phonetic" size="30" value="<?php echo $_POST["shop_phonetic"] ?>">
		</td>
		</tr>

		<!-- 住所入力欄 -->
		<tr>
		<th>住所</th>
		<td><input type="text" autofocus required title="住所が未記入です" name="address" size="30" value="<?php echo $_POST["address"] ?>">  
		</td>
		</tr>

		<!-- 電話番号入力欄 -->
		<tr>
		<th>電話番号</th>
		<td><input type="date" autofocus required title="電話番号が未記入です" name="telephone" size="30" placeholder=" 0000-00-0000" value="<?php echo $_POST["telephone"] ?>">  
		</td>
		</tr>
		
		<!-- 営業時間入力欄 -->
		<tr>
		<th>営業時間</th>
		<td><input type="text" autofocus required title="営業時間が未記入です" name="time" size="30" placeholder="0:00~0:00" value="<?php echo $_POST["time"] ?>">  
		</td>
		</tr>
		
		<!-- 定休日入力欄 -->
		<tr>
		<th>定休日</th>
		<td><input type="text" autofocus required title="定休日が未記入です" name="close" size="30" value="<?php echo $_POST["close"] ?>">  
		</td>
		</tr>
		
		<!-- URL入力欄 -->
		<tr>
		<th>URL</th>
		<td><input type="text" autofocus required title="URLが未記入です" name="link" placeholder="http://www.△△△・・・" value="<?php echo $_POST["link"] ?>">  
		</td>
		</tr>
  </table>

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

