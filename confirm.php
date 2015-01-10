<!-- 追加した情報の確認画面 -->

<!-- 確認画面での実際の動き -->
<!-- 1.ここでは前ページの入力フォームで入力した内容にエラーがなかった場合、ここで一度入力した内容を登録を行うために確認できるようになっています。 -->
<!-- 2.もし、書いた内容に間違いがあり訂正を行いたい場合は「戻る」ボタンを押すと、もう一度入力フォームの方に戻ります。 -->
<!-- 3.書いた内容に特に訂正がない場合は「登録」ボタンを押してもらうと、登録完了画面に遷移します。 -->

<!-- 入力フォームからのデータの受け渡し -->
<?php
//$_POSTを使用して入力した各データを表示用変数にそれぞれ格納
   $view_evename = $_POST["event_name"];
   $view_evedate = $_POST["event_date"];
   $view_eveplace = $_POST["event_place"];
   $view_content = $_POST["content"];
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

<!-- actionのところのphpファイル名は登録完了画面のphpである「evecomplete.php」に設定 -->
   <form action="evecomplete.php" method="POST">
   以下の内容で登録します。修正がある場合は「戻る」を、この内容でよい場合は「登録」を押してください。<br><br>
   
   <!-- DBに格納するための値を登録完了画面の方で受け渡ししないといけないため、nameを設定。出力はphpで出力させる。 -->
   見出し:<input type="hidden"  name="event_name" value=$view_evename><?php echo $view_evename; ?><br>
   <br/>
   開催日程：<input type="hidden"  name="event_date" value=$view_evedate><?php echo $view_evedate; ?><br>
   <br/>
   場所：<input type="hidden"  name="event_place" value=$view_eveplace><?php echo $view_eveplace; ?><br>
   <br/>
   内容：<input type="hidden"  name="content" value=$view_content><?php echo $view_content; ?><br>
  <br/>
   
   <input type="button" value="戻る" onclick="history.go(-1)">
   <input type="submit" name="set" value="登録" onclick="location.href='evecomplete.php'"> 
   </form>
 
 <!-- トップページに遷移するためのボタンを設置 -->  
   <div id="footer">
  <a href="top.php">トップページ</a>
   </div>
   </div>
   </body>
   </html>