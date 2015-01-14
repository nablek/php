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
    
    if (document.busi_form.shop_name.value == "") {   // 店舗名の入力欄が未記入の時
		flag = 1;
		window.alert("店舗名が未記入です。");    //表示（ポップアップ）
    }
    
    if (document.busi_form.shop_phonetic.value == "") {  // 店舗名（ふりがな）の入力欄が未記入の場合
	    flag = 1;
		window.alert("店舗名(ふりがな)が未記入です。");    //表示（ポップアップ）
    } 
    
    if (document.busi_form.address.value == "") {   // 住所の入力欄が未記入の場合
		flag = 1;
		window.alert("住所が未記入です。");   //表示（ポップアップ）
    }
    
    if (document.busi_form.telephone.value == "") {  // 電話番号の入力欄が未記入の場合
		flag = 1;
		window.alert("電話番号が未記入です。");   //表示（ポップアップ）
    }
    if (document.busi_form.telephone.value == "") {  // 電話番号の入力欄が未記入の場合
		flag = 1;
		window.alert("電話番号が未記入です。");   //表示（ポップアップ）
    }

    if (document.busi_form.time.value == "") {  // 営業時間の入力欄が未記入の場合
		flag = 1;
		window.alert("営業時間が未記入です。");   //表示（ポップアップ）
    }

    if (document.busi_form.close.value == "") {  // 定休日の入力欄が未記入の場合
		flag = 1;
		window.alert("定休日が未記入です。");   //表示（ポップアップ）
    }

    if (document.busi_form.link.value == "") {  // URLの入力欄が未記入の場合
		flag = 1;
		window.alert("URLが未記入です。");   //表示（ポップアップ）
    }

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
<div align="center">
<div id="header">
<h1>基本情報追加更新</h1>
</div>

<div id="content">

<!-- actionのところのphpファイル名は確認画面のphpである「conf_business.php」に設定 -->
  <form  action="conf_business.php" name="busi_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">
    <table class="sample-table">
    
            <!-- カテゴリ分けのプルダウンボタン -->
            <p>
            <select name="category" id="category">
        	<option value="no_data" selected="selected">未選択</option>
  			<option value="jukyo">住居情報</option>
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
		<td><input type="text" name="shop_name" size="30" value="<?php echo $_POST["shop_name"] ?>">
		</td>
		</tr>

		<!-- 店舗名（ふりがな）入力欄 -->
		<tr>
		<th>店舗名（ふりがな）</th>
		<td><input type="text" name="shop_phonetic" size="30" value="<?php echo $_POST["shop_phonetic"] ?>">
		</td>
		</tr>

		<!-- 住所入力欄 -->
		<tr>
		<th>住所</th>
		<td><input type="text" name="address" size="30" value="<?php echo $_POST["address"] ?>">  
		</td>
		</tr>

		<!-- 電話番号入力欄 -->
		<tr>
		<th>電話番号</th>
		<td><input type="date" name="telephone" size="30" placeholder=" 0000-00-0000" value="<?php echo $_POST["telephone"] ?>">  
		</td>
		</tr>
		
		<!-- 営業時間入力欄 -->
		<tr>
		<th>営業時間</th>
		<td><input type="text" name="time" size="30" placeholder="0:00~0:00" value="<?php echo $_POST["time"] ?>">  
		</td>
		</tr>
		
		<!-- 定休日入力欄 -->
		<tr>
		<th>定休日</th>
		<td><input type="text" name="close" size="30" value="<?php echo $_POST["close"] ?>">  
		</td>
		</tr>
		
		<!-- URL入力欄 -->
		<tr>
		<th>URL</th>
		<td><input type="text" name="link" placeholder="http://www.△△△・・・" value="<?php echo $_POST["link"] ?>">  
		</td>
		</tr>
  </table>
  
  <div align="center">
  <div id="header">
<h2>おすすめ情報追加更新</h2>
</div>

<div id="content">
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
        <td><textarea rows="10" cols="50" name="content"><?php echo $_POST["content"] ?></textarea></td>
		</tr>
  </table>

		<!-- 画像挿入欄 -->
   	    <tr>
		<p>
		<input type="file" name="filename">
		</p>
		</tr>
		</form> 
  
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

