<!-- ���b�Z�[�W�\���X�N���v�g -->
<?php
//SELECT�R�}���h�����s���ăf�[�^���擾
$sql = "SELECT * FROM guestdata ORDER BY id DESC";
$res = mysql_query($sql, $conn) or die("�f�[�^���o�G���[");

//�擾�����f�[�^���P�����\��
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