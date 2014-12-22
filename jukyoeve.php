<?php
//HTML冒頭に挿入↓
session_start();

// 各項目の値を取得
$event_name = $_POST['event_name'];
$event_place = $_POST['event_place'];
$telephone = $_POST['telephone'];
$content = $_POST['content'];


if(!empty($_POST)){
	//エラー項目の確認
	//見出し欄が空白の場合
	if($_POST('event_name') == ''){
		$error['event_name'] = 'blank';
	}
	//開催場所欄が空白の場合
	else if($_POST('event_place') == ''){
		$error['event_place'] = 'blank';
	}
	//電話番号欄が14桁以上の場合
	else if(strlen($_POST['telephone']) > 14){
		$error['event_name'] = 'length';
	}
	//電話番号欄が空白の場合
	else if($_POST('telephone') == ''){
		$error['telephone'] = 'blank';
	}
	//内容欄が空白の場合
	else if($_POST('content') == ''){
		$error['content'] = 'blank';
	}
	//エラーがない場合は確認画面へ遷移
	else if(empty($error)){
		$_SESSION['join'] = $_POST;
		header('Location: registconfirm.php');
	}
}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>おすすめ物件更新画面</title>
</head>
<body>
	<div align="center">
		<h1>おすすめ物件更新画面</h1>
		<form method="POST"  action="jukyoeve.php">
    		<table class="sample-table">
    			<!-- 見出し入力欄 -->
        		<tr>
            		<th>見出し</th>
            		<td><input type="text" name="title" size="30"  value="<?php print(htmlspecialchars($_POST['event_name'])); ?>" ></td>
            		<?php if($error['event_name'] == 'blank'): ?>
	                  <p class="error">＊（必須）見出しを入力してください。</p>
                    <?php endif;?>	  
        		</tr>
        		
        		<!-- 場所入力欄 -->
 			<tr>
            		<th>場所(住所)</th>
            		
            		<td><input type="text" name="address" size="30" value="<?php print(htmlspecialchars($_POST['event_place'])); ?>"></td>
            		<?php if($error['event_place'] == 'blank'): ?>
	                  <p class="error">＊（必須）場所を入力してください。</p>
                    <?php endif;?>	  
			</tr>
			
			<!-- 電話番号入力欄 -->
        		<tr>
        		<th>電話番号</th>
        		<td><input type="tel" name="telephone" size="30" maxlength="17" placeholder="00-0000-0000" pattern="\d{1,5}-\d{1,4}-\d{4,5}" title="市外局番からハイフン(-)を入れて記入してください。" required></td> ></td>
               <?php if($error['telephone'] == 'blank'): ?>
	             <p class="error">＊（必須）電話番号を入力してください。</p>
	           <?php endif;?>
	           <?php if($error['telephone'] == 'length'): ?>
	             <p class="error">＊（注）電話番号が長すぎます。</p>
	           <?php endif;?>
    			</tr>
    			
    			<!-- 内容入力欄 -->
        		<tr>
            		<th>内容</th>
            		<td><textarea rows="10" cols="50" name="content" value="<?php print(htmlspecialchars($_POST['content'])); ?>" >
            		</textarea></td>
            		<?php if($error['content'] == 'blank'): ?>
	                  <p class="error">＊（必須）内容を入力してください。</p>
	                <?php endif;?>
        		</tr>
        	</table>
        	
        	<!-- 画像挿入欄 -->
        	<tr>
        	<form action="#" method="POST" enctype="multipart/form-data">
        	<p>
        	<input type="file" name="filename">
        	</p>
        	</form>
        	</tr>
        	<!-- 送信ボタン -->
        	<div id="mainform-submit">
        	<input type="submit" name="送信ボタン" value="送信">
    		</div>
	    	</form>
	 </div>
</body>
</html>