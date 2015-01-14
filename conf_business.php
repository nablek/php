<!-- 追加した情報の確認画面 -->

<!-- 確認画面での実際の動き -->
<!-- 1.ここでは前ページの入力フォームで入力した内容にエラーがなかった場合、ここで一度入力した内容を登録を行うために確認できるようになっています。 -->
<!-- 2.もし、書いた内容に間違いがあり訂正を行いたい場合は「戻る」ボタンを押すと、もう一度入力フォームの方に戻ります。 -->
<!-- 3.書いた内容に特に訂正がない場合は「登録」ボタンを押してもらうと、登録完了画面に遷移します。 -->

<!-- 入力フォームからのデータの受け渡し -->
<?php
//$_POSTを使用して入力した各データを表示用変数にそれぞれ格納
// 基本情報
   $view_category = $_POST["category"];
   $view_shopname = $_POST["shop_name"];
   $view_phonetic = $_POST["shop_phonetic"];
   $view_address = $_POST["address"];
   $view_tel = $_POST["telephone"];
   $view_time = $_POST["time"];
   $view_close = $_POST["close"];
   $view_link = $_POST["link"];
// イベント情報  
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
 以下の内容で登録します。<br>修正がある場合は「戻る」を、この内容でよい場合は「登録」を押してください。<br><br> 
 </div>
     
   <div align="center">
   <div id="header">
<h1>基本情報確認</h1>
   </div>
<?php
print <<<EOM
<!-- actionのところのphpファイル名は登録完了画面のphpである「basecomplete.php」に設定 -->
   <form action="comp_business.php" method="POST">
   
   <!-- DBに格納するための値を登録完了画面の方で受け渡ししないといけないため、nameを設定。出力はphpで出力させる。 -->
   <input type="hidden"  name="category" value="$view_category">
   店舗名:<input type="hidden"  name="shop_name" value="$view_shopname">$view_shopname<br>
   <br/>
   店舗名(ふりがな)：<input type="hidden" name="shop_phonetic" value="$view_phonetic">$view_phonetic<br>
   <br/>
   住所：<input type="hidden"  name="address" value="$view_address">$view_address<br>
   <br/>
   電話番号：<input type="hidden"  name="telphone" value="$view_tel">$view_tel<br>
  <br/>
   営業時間:<input type="hidden"  name="time" value="$view_time">$view_time<br>
   <br/>
   定休日:<input type="hidden"  name="close" value="$view_close">$view_close<br>
   <br/>
   URL:<input type="hidden"  name="link" value="$view_link">$view_link<br>
   <br/>

    <div align="center">
   <div id="header">
<h2>イベント情報確認</h2>
   </div>

   <!-- DBに格納するための値を登録完了画面の方で受け渡ししないといけないため、nameを設定。出力はphpで出力させる。 -->
   見出し:<input type="hidden"  name="event_name" value=$view_evename>$view_evename<br>
   <br/>
   開催日程：<input type="hidden"  name="event_date" value=$view_evedate>$view_evedate<br>
   <br/>
   場所：<input type="hidden"  name="event_place" value=$view_eveplace>$view_eveplace<br>
   <br/>
   内容：<input type="hidden"  name="content" value=$view_content>$view_content<br>
  <br/>

   <input type="button" value="戻る" onclick="history.go(-1)">
   <input type="submit" name="set" value="登録"> 
   </form>     
EOM;
?>
  
 <!-- トップページに遷移するためのボタンを設置 -->  
   <div id="footer">
  <a href="top.php">トップページ</a>
   </div>
   </div>
   </body>
   </html>
