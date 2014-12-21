<html>
<head>
<meta charset="UTF-8">
<title>answer test</title>
</head>
<body>

<?php
	// 各項目の値を取得
	$radio = $_POST['q'];
	$name = $_POST['name'];
	$mail = $_POST['Email'];
	$sub = $_POST['件名'];
	$content = $_POST['内容'];
	
	//必須項目に記入がない場合のエラー
	if ($radio == false) {
		print ("error:ジャンルが選択されていません");
	} else if ($name == false) {
		print ("error:氏名が未記入です");
	} else if ($sub == false) {
		print ("error:件名が未記入です");
	} else if ($content == false) {
		print ("error:本文が未記入です");
	} else {
	//エラーがなければ結果表示
	print ("以下の値が入力されました<br /><br />");
	print ("ジャンル:$radio<br />");
	print ("氏名:$name<br />");
	print ("メールアドレス:$mail<br />");
	print ("件名:$sub<br />");
	print ("本文:$content<br />");
	}
?>

</body>
</html>

<!-- 今回参考にしたページ
http://www.standpower.com/php_form.html
http://p-ho.net/index.php?page=12
http://www.ipc.hokusei.ac.jp/~z00104/php/php_form.html
-->
