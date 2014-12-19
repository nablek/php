<!-- サーバーへの接続 -->

//ここにサーバー接続の処理が入ります



<!-- メッセージ書き込みスクリプト -->
<?php
//POSTメソッドで送信された場合は書き込み処理を実行する
if($_SERVER["REQUEST_METHOD"]  == "post"){
	//フォームからデータを受け取る
	$title = cnv_dbstr($_post["title"]); 
	//見出し
	$address = cnv_dbstr($_post["address"]); 
	//場所
	$telephone = cnv_dbstr($_post["telephone"]); 
	//電話番号
	$g_name = cnv_dbstr($_post["content"]); 
	//内容
	
	//名前とメッセージの追加が入力されていればデータの追加を実行する
	if(!empty($title) and !empty($address) and !empty($content) ){
		//データを追加する
		$sql = "INSERT INTO guestdata(title, address, telephone, content) ";
		$sql .= "VALUES(";
		$sql .="'" . $title . "',";
		$sql .="'" . $address . "',";
		$sql .="'" . $telephone . "',";
		$sql .="'" . $content . "',";
		$sql .="'" . date("Y/m/d H:i:s") . "',";
		$sql .=")";
		$res = mysql_query($sql, $conn) or die("データ追加エラー");
		if($res) {
			echo"<p>書き込みありがとうございました</p>";
		}
	}
	//名前やメッセージが空白の場合はエラーメッセージを出力する
	else {
		echo"<p><b>お名前とメッセージを入力してください</b></p>";
	}
}

//SQLコマンド用の文字列に変換する関数
function cnv_dbstr($string) {
	//タグを無効にする
	$string = htmlspecialchars($string);
	
	//magic_quotes_gpcがOnの場合はエスケープを解除する
	if (get_magic_quotes_gpc()) {
		$string = stripslashes($string);
	}
	
	//SQLコマンド用の文字列にエスケープする
	$string = mysql_real_escape_string($string);
	return $string;
}
?>