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

        if (document.eve_form.event_name.value == "") {   // イベント名の入力欄が未記入の時
    		flag = 1;
    		window.alert("イベント名が未記入です。");    //表示（ポップアップ）
        }

        if (document.eve_form.event_date.value == "") {   // 開催日の入力欄が未選択の時
    		flag = 1;
    		window.alert("開催日が未選択です。");    //表示（ポップアップ）
        }

        if (document.eve_form.event_place.value == "") {   // 開催場所の入力欄が未記入の場合
    		flag = 1;
    		window.alert("場所が未記入です。");   //表示（ポップアップ）
        }
        
        if (document.eve_form.event_content.value == "") {  // 内容の入力欄が未記入の場合
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
	
	<!-- ここから入力フォームのHTML -->
</head>
<body>
	<div align="center">
		<div id="header">
            <h1>学外/学内イベント情報追加更新ページ</h1>
		</div>
		
		<div id="content">
		<form action="conf_gakuioeve.php" name="eve_form" method="post" enctype="multipart/form-data" onSubmit="return form_check()">
         <table>
         <br>
         <!-- 学外/学内カテゴリ分け -->
                <FORM name="category">
                    <INPUT type="radio" name="category" value="gakugai" autofocus required aria-required="true" x-moz-errormessage="カテゴリが未記入です。学外か学内どちらかにチェックを付けてください。">学外
                    <INPUT type="radio" name="category" value="gakunai">学内
                    <font size="2" color=red>※入力必須</font>
                </FORM>               
                <br>
                <br>
				<!-- 主催者名入力欄 -->
				<tr>
					<th>主催者名</th>
					<td><input type="text" name="sponsor_name" size="50" class="example1" value="<?php echo $_POST["sponsor_name"] ?>"></td>                            
				</tr>
				<table>
				<div align="right">
				<th><font size="1" color=blue>※学外イベントの追加をする人のみ入力必須</font></th>
				</div>
				</table> 
		
				<!-- メールアドレス入力欄 -->
				<tr>
					<th>メールアドレス</th>
					<td><input type="text" name="mailaddress" placeholder="info@example.com" size="50" class="example2" value="<?php echo $_POST["mailaddress"] ?>"></td>
				</tr>
				<table>
				<div align="right">
				<th><font size="1" color=blue>※学外イベントの追加をする人のみ入力必須</font></th>
				</div>
				</table>
			</table>	
			<table>	
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
			
			<!-- 画像挿入欄 -->
			<tr>
					<p>
						<input type="file" name="filename">
					</p>
			</tr>

			<!-- 送信ボタン -->
			<!-- データベースに書き込みを行うことができればsousin.htmlに -->
			<!-- データベースに書き込みを行うことができなければerror.htmlに遷移 -->
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
