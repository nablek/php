<?php	
session_start();
$page = @$_GET['p'];
if (!$page) $page = 'top';
if (!preg_match('/^[a-z]{1,8}$/', $page)) exit();

if (!isset($_SESSION['name'])) {
	$page = 'login';
	
	
	if (!empty($_POST['id']) && !empty($_POST['pass'])) {
	
		$id = "tanaka";
		$pass = "tanaka";
		$input_id = $_POST['id'];
		$input_pass = $_POST['pass'];
		 
		 
	
		if ($id == $input_id && $pass == $input_pass) {
				   $_SESSION['name'] = '�c��';
				   $page = 'top';
		}else{
			  echo  "�p�X���[�h���Ԉ���Ă��܂�";
			}
		}else{
			  echo  "�p�X���[�h����͂��Ă�������";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>�V�����x���V�X�e��</title>
<style>
h1 {
  margin: 0;
}
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
<div id="header">
  <h1>�V�����x���V�X�e��</h1>
</div>
<div id="main">
<?php
  require "$page.php";
?>
</div>
<div id="footer">
  <a href="?p=top">�g�b�v�y�[�W</a> |
  <a href="?p=party">�閧�̃p�[�e�B�[</a> |
  <a href="?p=journey">�閧�̃W���[�j�[</a> |
  <a href="?p=logout">���O�A�E�g</a>
</div>
</body>
</html>