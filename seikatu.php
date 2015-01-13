<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>生活施設</title>
	<link rel="stylesheet" type="text/css" href="/css/seikatu.css" />


	<script type="text/javascript">
	function ChangeTab(tabname) {
		// 全部消す
		document.getElementById('tab1').style.display = 'none';
		document.getElementById('tab2').style.display = 'none';
		document.getElementById('tab3').style.display = 'none';
		document.getElementById('tab4').style.display = 'none';

		// 指定箇所のみ表示
		document.getElementById(tabname).style.display = 'block';
	}
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
		
		<script type="text/javascript">
			// デフォルトのタブを選択
			ChangeTab('tab1');
		</script>
		
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
?>
			<br>
			<div id="site-box">
				<div id ="a-box">
					<h2 id="lineA"> <?php print($row['shop_name']); ?> </h2>
					<div id="b-box">
						<img src="/picture/no_image.png" width="150px" height="150px" alt="代替テキスト"><br>
					</div>
					<div id="b-box">
					<ul>
						<li>住所 : <?php print($row['address']); ?> </li>
						<li>電話番号 : <?php print($row['tel']); ?> </li>
						<li>営業時間 : <?php print($row['time']); ?> </li>
						<li>定休日 : <?php print($row['close']); ?> </li>
					<li>URL : <a href=" <?php print($row['link']); ?>" target="_blank"> <?php print($row['link']); ?> </a> </li>
					</ul>
					</div>
				</div>

				<h2>イベント名</h2>
				<div id="b-box">
				<ul>
					<li>場所（住所）</li>
					<li>開催日時</li>
					<li>イベント概要</li>
				</ul>
				</div>
				<img src="/picture/no_image.png" width="150px" height="150px" alt="代替テキスト">
			</div>
			<br>
<?php
		}
		// データベース切断
		$dbh = null;	

	// 例外処理
	} catch (PDOEXception $e) {
		exit('データベースに接続できませんでした。' . $e->getMessage());
	}

}

?>
