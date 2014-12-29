<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" >
<title>おすすめ物件更新画面</title>
</head>
<body>
<center>
<h1>おすすめ物件更新画面</h1>
<!-- mail.phpから「jukyoeve3.php」へ変更 -->
<form  action="jukyoeve3.php" method="post"　enctype="multipart/form-data">
<table class="sample-table">
		<!-- 見出し入力欄 -->
		<tr>
		<th>見出し</th>
		<td><input type="text" name="event_name" size="30"></td>
				</tr>

<!-- 場所入力欄 -->
<tr>
<th>場所(住所)</th>
<td><input type="text" name="event_place" size="30"></td>
</tr>
	
<!-- 電話番号入力欄 -->
		<tr>
		<th>電話番号</th>
				<td><input type="tel" name="telephone" size="30" maxlength="17" placeholder="00-0000-0000" pattern="\d{1,5}-\d{1,4}-\d{4,5}" title="市外局番からハイフン(-)を入れて記入してください。" required></td>
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
</body>
</html>