<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>生活施設</title>
	<link rel="stylesheet" type="text/css" href="/css/seikatu.css" />


	<script type="text/javascript">
	<!--
	function ChangeTab(tabname) {
   	// 全部消す
   	document.getElementById('tab1').style.display = 'none';
   	document.getElementById('tab2').style.display = 'none';
   	document.getElementById('tab3').style.display = 'none';
   	document.getElementById('tab4').style.display = 'none';

   	// 指定箇所のみ表示
   document.getElementById(tabname).style.display = 'block';
	}
// -->
</script>

	<!-- リスト横並び -->
	<style type="text/css">

	ul.example li{
	display:inline;
	}

	</style>
</head>
<body>

	<div class="tabbox">
		<p class="tabs">
			<a href="#tab1" class="tab1" onclick="ChangeTab('tab1'); return false;">スーパー</a>
      		<a href="#tab2" class="tab2" onclick="ChangeTab('tab2'); return false;">コンビニ</a>
      		<a href="#tab3" class="tab3" onclick="ChangeTab('tab3'); return false;">自転車・バイク屋</a>
      		<a href="#tab4" class="tab4" onclick="ChangeTab('tab4'); return false;">その他</a>
		</p>

		<div id="tab1" class="tab">
		<?php
			hyoji("supermarket");
		?>
		</div>

		<div id="tab2" class="tab">
		<?php	
			hyoji("conveniencestore");
		?>
   		</div>

		<div id="tab3" class="tab">
		<?php	
			hyoji("bike");
		?>
		</div>

		<div id="tab4" class="tab">
		<?php	
			hyoji("other");
		?>
		</div>
	</div>
</body>
</html>

<?php
function hyoji($category) {
	// Mysqlのユーザ情報入力
	$user = 'root';
	$password = '';

try {
	// systemというデータベースに接続，IPアドレスはlocalhost，user,passwordは変数を呼び出し
	$dbh = new PDO('mysql:dbname=system;host=localhost', $user, $password);

	// sqlの文字コード設定（必須）
	$dbh->query('SET NAMES utf8');

	$sql = 'select * from area where category = "'.$category.'" order by shop_phonetic COLLATE utf8_unicode_ci';
	
	
	foreach ($dbh->query($sql) as $row) {
	
	echo'<div id="site-box">';
		echo'<div id ="a-box">';
			echo'<h2>'; print($row['shop_name']); echo'</h2>';

			echo'<div id="b-box">';
				echo'<img src="/picture/logo.png" width="200px" height="200px" alt="代替テキスト"><br>';
			echo'</div>';
			echo'<div id="b-box">';
			echo'<ul>';
				echo'<li>住所 :'; print($row['address']); echo'</li>';
				echo'<li>電話番号 :'; print($row['tel']); echo'</li>';
				echo'<li>営業時間 : </li>';
				echo'<li>定休日 : </li>';
				echo'<li>URL : '; print($row['link']); echo'</li>';
			echo'</ul>';
			echo'</div>';
		echo'</div>';

		echo'<h2>イベント名</h2>';
		echo'<div id="b-box">';
		echo'<ul>';
				echo'<li>場所（住所）</li>';
				echo'<li>開催日時</li>';
				echo'<li>イベント概要</li>';
		echo'</ul>';
		echo'</div>';
		echo'<img src="/picture/logo.png" width="200px" height="200px" alt="代替テキスト">';
	echo'</div>';

	echo'<br>';
	}
	

// 例外処理
}  catch (PDOEXception $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}

// データベース切断
$pdo = null;
}
?>
