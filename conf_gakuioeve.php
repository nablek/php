	<!-- 追加した情報の確認画面 -->

	<!-- 確認画面での実際の動き -->
	<!-- 1.ここでは前ページの入力フォームで入力した内容にエラーがなかった場合、ここで一度入力した内容を登録を行うために確認できるようになっています。 -->
	<!-- 2.もし、書いた内容に間違いがあり訂正を行いたい場合は「戻る」ボタンを押すと、もう一度入力フォームの方に戻ります。 -->
	<!-- 3.書いた内容に特に訂正がない場合は「登録」ボタンを押してもらうと、登録完了画面に遷移します。 -->

	<!-- 入力フォームからのデータの受け渡し -->
	<?php
	//$_POSTを使用して入力した各データを表示用変数にそれぞれ格納
		$view_category = $_POST["category"];
		$view_sponame = $_POST["sponsor_name"];
		$view_mail = $_POST["mailaddress"];
		$view_evename = $_POST["event_name"];
		$view_evedate = $_POST["event_date"];
		$view_eveplace = $_POST["event_place"];
		$view_evecontent = $_POST["event_content"];
		$view_file = $_FILES["upfile"]["name"];

		session_start();
		$user_id = $_SESSION['id'];
		if ($_SESSION['id'] == null) {
			header("Location: ".'/php/loginform.php');
		} else if ($_SESSION['visited'] == 2) {
			header("Location: ".'/php/top.php');
		}
	
		$user = 'root';
		$password = '';
	
	try {
		// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
		$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

		//sqlの文字コード設定
		$dbh->query('SET NAMES utf8');

		// user_idがデータベースのあるかないかを確認する
		$sql = "SELECT user_id as id FROM inoutside_event WHERE user_id = '$user_id'";
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
 	以下の内容で登録します。<br>修正がある場合は「戻る」を、この内容でよい場合は「登録」を押してください。<br><br> 
 	</div>
     
   	<div align="center">
   	<div id="header">
	<h1>基本情報確認</h1>
   	</div>
	<?php
print <<<EOM
	<!-- actionのところのphpファイル名は登録完了画面のphpである「basecomplete.php」に設定 -->
   	<form action="comp_gakuioeve.php" method="POST">
   
   	<!-- DBに格納するための値を登録完了画面の方で受け渡ししないといけないため、nameを設定。出力はphpで出力させる。 -->
   	<input type="hidden"  name="category" value="$view_category">
   	主催者名:<input type="hidden"  name="sponsor_name" value="$view_sponame">$view_sponame<br>
   	<br/>
   	メールアドレス：<input type="hidden" name="mailaddress" value="$view_mail">$view_mail<br>
   	<br/>
   	イベント名：<input type="hidden"  name="event_name" value="$view_evename">$view_evename<br>
   	<br/>
   	イベント名：<input type="hidden"  name="event_date" value="$view_evedate">$view_evedate<br>
   	<br/>
   	開催場所:<input type="hidden" name="event_place" value="$view_eveplace">$view_eveplace<br>
   	<br/>
   	開催場所:<input type="hidden" name="event_content" value="$view_evecontent">$view_evecontent<br>
   	<br/>
   	アップロードファイル:<input type="hidden"  name="upfile" value="$view_file">$view_file<br>
   	<br/>
   
   	<input type="submit" name="set" value="登録"> 
   	</form>     
EOM;
?>

   	<form action="add_gakuioeve.php" method="POST">
   	<input type="hidden"  name="sponsor_name" value="<?php echo $view_sponame ?>">
   	<input type="hidden"  name="mailaddress" value="<?php echo $view_mail ?>">
   	<input type="hidden"  name="event_name" value="<?php echo $view_evename ?>">
   	<input type="hidden"  name="event_date" value="<?php echo $view_evedate ?>">
   	<input type="hidden"  name="event_place" value="<?php echo $view_eveplace ?>">
   	<input type="hidden"  name="event_content" value="<?php echo $view_evecontent ?>">
   	<input type="submit" value="戻る">
   	</form>
  
 	<!-- トップページに遷移するためのボタンを設置 -->  
   	<div id="footer">
  	<a href="top.php">トップページ</a>
   	</div>
   	</div>
   	</body>
   	</html>
