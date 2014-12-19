<!-- メッセージ表示スクリプト -->
<?php
//SELECTコマンドを実行してデータを取得
$sql = "SELECT * FROM guestdata ORDER BY id DESC";
$res = mysql_query($sql, $conn) or die("データ抽出エラー");

//取得したデータを１件ずつ表示
while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	echo "<hr>";
	if (!is_null($row["g_mail"])) {
		echo "a href=\"mailto:" . $row["g_mail"] . "\">"
				. $row["g_name"] . "<\a>";
 		}
 		else{
 			echo $row["g_name"];
 		}
 		echo "(" . date("Y/m/d H:i", strtotime($row["g_date"])) . ")";
 		echo "<p>" . nl2br($row["g_mes"]) . "</p>";
}
?>