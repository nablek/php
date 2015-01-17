	<!-- 追加した情報の確認画面 -->

	<!-- 確認画面での実際の動き -->
	<!-- 1.ここでは前ページの入力フォームで入力した内容にエラーがなかった場合、ここで一度入力した内容を登録を行うために確認できるようになっています。 -->
	<!-- 2.もし、書いた内容に間違いがあり訂正を行いたい場合は「戻る」ボタンを押すと、もう一度入力フォームの方に戻ります。 -->
	<!-- 3.書いた内容に特に訂正がない場合は「登録」ボタンを押してもらうと、登録完了画面に遷移します。 -->

	<!-- 入力フォームからのデータの受け渡し -->
	<?php
	//$_POSTを使用して入力した各データを表示用変数にそれぞれ格納
		$category = $_POST["category"];
		$view_shopname = $_POST["shop_name"];
		$view_phonetic = $_POST["shop_phonetic"];
		$view_address = $_POST["address"];
		$view_tel = $_POST["telphone"];
		$view_time = $_POST["time"];
		$view_close = $_POST["close"];
		$view_link = $_POST["link"];
		$view_file = $_FILES["upfile"]["name"];

		session_start();
		$user_id = $_SESSION['id'];
		if ($_SESSION['id'] == null) {
			header("Location: ".'/php/loginform.php');
		} else if ($_SESSION['visited'] != 2) {
			header("Location: ".'/php/top.php');
		}

	try {
		// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
		$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

		//sqlの文字コード設定
		$dbh->query('SET NAMES utf8');

		// user_idがデータベースのあるかないかを確認する
		$sql = "SELECT user_id as id FROM area WHERE user_id = '$user_id'";
		$result = $dbh->query($sql)->fetchAll();

		if (empty($result[0]['id'])) {
			// 初めて登録しているときuserpictureフォルダにuser_idのフォルダを作成
			// user_id名のフォルダにファイルを格納する
			$path = '../userpicture/'.$user_id.'';
			mkdir($path,0755);
		}

		//データベース切断
		$dbh = null;

	//例外処理
	} catch (PDOEXception $e) {
		exit('データベースに接続できませんでした。' . $e->getMessage());
	}
		// ファイルの格納（本来であれば次の格納で行うべきではあるが次のPHPをまたぐと一時ファイルが消えるため仕方ない
		if (is_uploaded_file($_FILES['upfile']['tmp_name'])) {
			if (move_uploaded_file($_FILES['upfile']['tmp_name'], "../userpicture/" .$user_id ."/" .$_FILES['upfile']['name'])) {
				chmod("../userpicture/" .$user_id ."/" .$_FILES['upfile']['name'], 0644);
			}
		}
	?>

	<!-- ここから確認画面のHTML -->
   	<html>
   	<head>
   	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   	<title> 確認ページ </title>
   	</head>
   	<body>
   
	<!-- style sheetの設定 -->
   	<style>
	#header, #footer {
  	background-color: #cff;
  	height: 60px;
  	padding: 10px;
	}
	#main {
  	background-color: #eee;
  	padding: 10px;
	}
	</style>
      
  	<div align="center">
   	<div id="header">
			<h1>追加情報確認ページ</h1>
   	</div>

	<!-- actionのところのphpファイル名は登録完了画面のphpである「basecomplete.php」に設定 -->
   	<form action="comp_base_business.php" method="POST">
   	以下の内容で登録します。<br>修正がある場合は「戻る」を、この内容でよい場合は「登録」を押してください。<br><br>
   
   	<!-- DBに格納するための値を登録完了画面の方で受け渡ししないといけないため、nameを設定。出力はphpで出力させる。 -->
   	<input type="hidden"  name="category" value="<?php echo $category ?>">
   	店舗名:<input type="hidden"  name="shop_name" value="<?php echo $view_shopname ?>"><?php echo $view_shopname; ?><br>
   	<br/>
   	店舗名(ふりがな)：<input type="hidden" name="shop_phonetic" value="<?php echo $view_phonetic ?>"><?php echo $view_phonetic; ?><br>
   	<br/>
   	住所：<input type="hidden"  name="address" value="<?php echo $view_address ?>"><?php echo $view_address; ?><br>
   	<br/>
   	電話番号：<input type="hidden"  name="telphone" value="<?php echo $view_tel ?>"><?php echo $view_tel; ?><br>
   	<br/>
   	営業時間:<input type="hidden"  name="time" value="<?php echo $view_time ?>"><?php echo $view_time; ?><br>
   	<br/>
   	定休日:<input type="hidden"  name="close" value="<?php echo $view_close ?>"><?php echo $view_close; ?><br>
   	<br/>
   	URL:<input type="hidden"  name="link" value="<?php echo $view_link ?>"><?php echo $view_link; ?><br>
   	<br/>
   	アップロードファイル:<input type="hidden"  name="upfile" value="<?php echo $view_file ?>"><?php echo $view_file; ?><br>
   	<br/>
   
   	<input type="submit" name="set" value="登録">
   	</form>
   
   	<form action="add_base_business.php" method="POST">
   	<input type="hidden"  name="category" value="<?php echo $category ?>">
   	<input type="hidden"  name="shop_name" value="<?php echo $view_shopname ?>">
   	<input type="hidden"  name="shop_phonetic" value="<?php echo $view_phonetic ?>">
   	<input type="hidden"  name="address" value="<?php echo $view_address ?>">
   	<input type="hidden"  name="telphone" value="<?php echo $view_tel ?>">
   	<input type="hidden"  name="time" value="<?php echo $view_time ?>">
   	<input type="hidden"  name="close" value="<?php echo $view_close ?>">
   	<input type="hidden"  name="link" value="<?php echo $view_link ?>">
   	<input type="hidden"  name="upfile" value="<?php echo $view_file ?>">
   	<input type="submit" value="戻る">
   	</form>

 
 	<!-- トップページに遷移するためのボタンを設置 -->  
   	<div id="footer">
  	<a href="top.php">トップページ</a>
   	</div>
   	</div>
   	</body>
   	</html>
