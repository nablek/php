<!-- �T�[�o�[�ւ̐ڑ� -->

//�����ɃT�[�o�[�ڑ��̏���������܂�



<!-- ���b�Z�[�W�������݃X�N���v�g -->
<?php
//POST���\�b�h�ő��M���ꂽ�ꍇ�͏������ݏ��������s����
if($_SERVER["REQUEST_METHOD"]  == "post"){
	//�t�H�[������f�[�^���󂯎��
	$title = cnv_dbstr($_post["title"]); 
	//���o��
	$address = cnv_dbstr($_post["address"]); 
	//�ꏊ
	$telephone = cnv_dbstr($_post["telephone"]); 
	//�d�b�ԍ�
	$g_name = cnv_dbstr($_post["content"]); 
	//���e
	
	//���O�ƃ��b�Z�[�W�̒ǉ������͂���Ă���΃f�[�^�̒ǉ������s����
	if(!empty($title) and !empty($address) and !empty($content) ){
		//�f�[�^��ǉ�����
		$sql = "INSERT INTO guestdata(title, address, telephone, content) ";
		$sql .= "VALUES(";
		$sql .="'" . $title . "',";
		$sql .="'" . $address . "',";
		$sql .="'" . $telephone . "',";
		$sql .="'" . $content . "',";
		$sql .="'" . date("Y/m/d H:i:s") . "',";
		$sql .=")";
		$res = mysql_query($sql, $conn) or die("�f�[�^�ǉ��G���[");
		if($res) {
			echo"<p>�������݂��肪�Ƃ��������܂���</p>";
		}
	}
	//���O�⃁�b�Z�[�W���󔒂̏ꍇ�̓G���[���b�Z�[�W���o�͂���
	else {
		echo"<p><b>�����O�ƃ��b�Z�[�W����͂��Ă�������</b></p>";
	}
}

//SQL�R�}���h�p�̕�����ɕϊ�����֐�
function cnv_dbstr($string) {
	//�^�O�𖳌��ɂ���
	$string = htmlspecialchars($string);
	
	//magic_quotes_gpc��On�̏ꍇ�̓G�X�P�[�v����������
	if (get_magic_quotes_gpc()) {
		$string = stripslashes($string);
	}
	
	//SQL�R�}���h�p�̕�����ɃG�X�P�[�v����
	$string = mysql_real_escape_string($string);
	return $string;
}
?>