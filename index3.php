<?php	
session_start();
$page = @$_GET['p'];
//�y�[�W�����擾����$page�ɑ���A�y�[�W�����Ȃ��ꍇ��top����
if (!$page) $page = 'top';
if (!preg_match('/^[a-z]{1,8}$/', $page)) exit();

//���O�C�������ǂ����̃`�F�b�N�A�ϐ�name���ݒ肳��Ă���΃��O�C�����A���O�C�����łȂ����$page��login�������ă��O�C���y�[�W�֔��
if (!isset($_SESSION['name'])) {
	$page = 'login';
	
//ID�ƃp�X���[�h�����͂����Έȉ���if���̓��e�����s����	
	if (!empty($_POST['id']) && !empty($_POST['pass'])) {
	
		$id = "tanaka";
		$pass = "tanaka";
		$input_id = $_POST['id'];
		$input_pass = $_POST['pass'];
		 
		 
//ID�ƃp�X���[�h����Őݒ肵�����̂Ɠ����Ȃ�΃��O�C����̃g�b�v�y�[�W�֔��
//ID�͍����Ă��邪�p�X���[�h���Ԉ���Ă���ꍇ�̓p�X���[�h���Ԉ���Ă��܂��Ƃ����G���[�y�[�W�֔��
//�p�X���[�h�͍����Ă��邪ID���Ԉ���Ă���ꍇ��ID���Ԉ���Ă��܂��Ƃ����G���[�y�[�W�֔��
//�ǂ�����Ԉ���Ă���ꍇ�͑����̃G���[�y�[�W�֔��
//�������͂���Ă��Ȃ��ꍇ�͉������͂���Ă܂���Ƃ����y�[�W�֔�ԁi�悤�ɂ��������ǂ��܂������Ȃ��������d�v�I�I�I�I�I�I�I�I�I�I�j	
		if ($id == $input_id && $pass == $input_pass) {
				   $_SESSION['name'] = '�c��';
				   $page = 'top';
		} elseif($id == $input_id && $pass != $input_pass) {
			  $page = 'top_pass_error';
			} elseif ($id != $input_id && $pass == $input_pass) {
				$page = 'top_ID_error';
				} elseif ($id != $input_id && $pass != $input_pass) {
					$page = 'error';
				} else {
					$page = 'notfound';
				
				}
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