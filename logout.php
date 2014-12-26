<?php
//http://gihyo.jp/dev/serial/01/start-php/0007
$_SESSION['name'] = null;
print($_SESSION['name']);

session_destroy();  
setCookie( 'PHPSESSID' );
?>
ログアウトしました。