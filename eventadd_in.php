<html>
<head>
<meta charset="UTF-8">
<title>�������ߕ����X�V����</title>
</head>
<body>

<?php

	//Mysql�̃��[�U������
	$user ='root';
	$password = '';

	//�e���ڂ̒l���擾
	$eventname = $_POST['event_name'];
	$eventdate = $_POST ['event_date'];
	$eventplace = $_POST['event_place'];
	$content = $_POST['content'];
	$image = $_POST['filename'];

	//$user_id�̎擾���@�̌����I�Aevent_date���e�[�u���ł�date(0000-00-00)�^�ɂȂ��Ă���̂œ��͉�ʑ���date�^�ɍ��킹�邱��
//�����炭�C��������
	//�e�X�g�p�ɖ������user_id��ݒ�A���O�C������user_id���擾��$user_id�ϐ��ɑ�����邱�Ƃňȉ���SQL�͐���ɓ���
	//�������A�}���摜�Ɋւ��Ă̓f�[�^�x�[�X�ɃJ������ݒ肵�Ă��Ȃ����ߍ���͏����Ă��Ȃ�
	
	$user_id = "JA";
	
	//�K�{���ڂɋL�����Ȃ��ꍇ�̃G���[
	if ($eventname == false){
		die ("���i�K�{�j���o������͂��Ă�������");
	}else if ($eventdate == false) {
		die ("���i�K�{�j���o������͂��Ă�������");
	}else if ($eventplace == false){
		die ("���i�K�{�j�ꏊ����͂��Ă�������");
	}else if ($content == false){
		die ("���i�K�{�j���e����͂��Ă�������");
	}

try {
	// ���f�[�^�x�[�X�֘A�͂������火
	// �f�[�^�x�[�X�ɐڑ��i�f�[�^�x�[�X���͖��L���A,IP�A�h���X��localhost, user��password�͕ϐ��Ăяo���j
	$dbh = new PDO('mysql:dbname=system;host=localhost',$user, $password);

	//sql�̕����R�[�h�ݒ�
	$dbh->query('SET NAMES utf8');

	// SQL�������ꂼ��̕ϐ��Ɋi�[(DB��,�e�[�u����,�t�B�[���h���͖��L��)

	// �}��sql�� inquiry_id��mysql���Ŏ����I�ɒǉ������̂ŕK�v�Ȃ�
	$sql = 'UPDATE area SET event_name = "'.$eventname.'", event_date = "'.$eventdate.'", event_place = "'.$eventplace.'", content =  "'.$content.'" WHERE user_id = "'.$user_id.'"';

	$dbh->query($sql);
	
	//�G���[���Ȃ��ꍇ���ʂ�\��
	print("�ȉ��̓��e�œo�^���܂��B<br /><br />");
	print("���o���F$eventname<br />");
	print("�J�Ó��� : $eventdate<br />");
	print("�ꏊ�F$eventplace<br />");
	print("���e�F$content<br />");
	print("�}���摜:$image<br />");

	//��O����
} catch (PDOEXception $e) {
	exit('�f�[�^�x�[�X�ɐڑ��ł��܂���ł����B' . $e->getMessage());
}

//�f�[�^�x�[�X�ؒf
$pdo = null;

//���b�Z�[�W�̏o��
echo "�o�^�������܂���";

//�o�^������̃y�[�W�J�ڏ�������������ݒ肵�Ȃ��Ɖ�ʂ��o�^�����Ŏ~�܂�
//header�֐����g�p���ĉ�ʂ�J��(Location�̌�́u�J�ڐ�̃t�@�C�����v�܂���./���폜���đJ�ڐ�URL���L���j
//��
//(1�ځj
//header("Location: http://-----------");
//(2�ځj
//$url = "http://------------";
//header("Location: ".$url);
//�J�ڐ���t�@�C�����ɂ����ꍇ��
header("Location: /PHP/jukyo.php");

?>

</body>
