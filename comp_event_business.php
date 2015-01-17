	<!-- 登録完了ページ -->

	<!-- 登録完了ページでの実際の動き -->
	<!-- ここでは、「登録完了しました。」という表示の後、トップページの方へ自動遷移できるようになっています。 -->
	<!-- DBへの格納などの処理はここで行います。（間違っていたら訂正お願いします。） -->

	<!-- ここから登録完了ページのHTML -->
	<html>
  	<head>
    	<meta charset="UTF-8">
    	<!-- 何秒後に遷移するのかと、遷移先の設定 --> 
    	<!-- top.html → top.phpに変更 / 3秒遷移なのに１秒遷移になっているのでそこを変更 -->
    	<meta http-equiv="REFRESH" content="3;URL=top.php" >
    	<title>登録完了</title>
		<style>
	  	#header, #footer {
	  	background-color: #fed;
	  	height: 60px;
	  	padding: 10px;
	  	}
	  	#main {
	  	background-color: #eee;
	  	padding: 10px;
	  	}
		</style>
  	</head>
  	<body>
    
    	<!-- ここから、DB処理（ここの訂正よろしくお願いします。値の取得以外手はつけていません。） -->
    	<?php 
       	// ユーザのIDを取得
       	session_start();
       	$user_id = $_SESSION['id'];
       
       
       	//Mysqlのユーザ情報入力
       	$user ='root';
       	$password = '';
       
       	//各項目の値を確認画面のページから取得
       	$evename = $_POST['event_name'];
       	$evedate = $_POST ['event_date'];
       	$eveplace = $_POST['event_place'];
       	$contents = $_POST['content'];
       	$upfile_dir = $_POST['upfile'];
       
       	// データテーブルへの画像リンク挿入
       	if ($upfile_dir != null) {
       	$upfile_dir = '/userpicture/'.$user_id .'/' .$_POST['upfile'].'';
       	}
       	try {
       	// ★データベース関連はここから↓
       	// データベースに接続（データベース名は未記入、,IPアドレス→localhost, userとpasswordは変数呼び出し）
       	$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);
       
       	//sqlの文字コード設定
       	$dbh->query('SET NAMES utf8');
    
    	// user_idがデータベースのあるかないかを確認する
    	$sql = "SELECT user_id as id FROM area WHERE user_id = '$user_id'";
    	$result = $dbh->query($sql)->fetchAll();
    
    	if (empty($result[0]['id']))
    	{
    	die("基本情報を先に登録してください");
    	} else {
    	// Update（データがすでに入っているときの更新）
    	$sql = "UPDATE area SET event_name = '$evename', event_date = '$evedate', event_place = '$eveplace', content = '$contents', event_picture = '$upfile_dir' WHERE user_id = '$user_id'";
    	$dbh->query($sql);
    	}
    
    	//データベース切断
    	$dbh = null;
    
    	//例外処理
    	} catch (PDOEXception $e) {
    	exit('データベースに接続できませんでした。' . $e->getMessage());
    	}
    
    	?>
    
    	<div align="center">
      	<div id="header">
		<h3>登録しました</h3>
      	</div>	
      	<p>
		3秒経ってもページが変わらない場合は
		<!-- トップページ手動で戻る -->
		<a href="top.php">ココをクリック</a>してください。
      	</p>
    	</div>
    
  	</body>
	</html>