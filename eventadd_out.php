<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" >
<title>�������ߏ��X�V���</title>
</head>
<body>

<style>
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

<center>
<div id="header">
<h1>�������ߏ��X�V���</h1>
</div>

<!-- mail.php����ujukyoeve3.php�v�֕ύX -->
<form  action="jukyoeve3.php" method="post" enctype="multipart/form-data">
<table class="sample-table">
		<!-- ���o�����͗� -->
		<tr>
		<th>���o��</th>
		<td><input type="text" name="event_name" size="30"></td>
		</tr>

		<!-- �J�Ó������͗� -->
		<tr>
		<th>�J�Ó���</th>
		<td><input type="date" name="event_date" size="30"></td>
		</tr>

		<!-- �ꏊ���͗� -->
		<tr>
		<th>�ꏊ(�Z��)</th>
		<td><input type="text" name="event_place" size="30"></td>
		</tr>

		<!-- ���e���͗� -->
		<tr>
		<th>���e</th>
		<td><textarea rows="10" cols="50" name="content"></textarea></td>
		</tr>
</table>

		<!-- �摜�}���� -->
		<tr>
		<!-- ���̈ꕶ������ƃy�[�W�̑J�ڂ��ł��Ȃ����߁A�ꉞ�R�����g�A�E�g���Ă��܂� -->
		<!-- <form action="#" method="post" enctype="multipart/form-data"> -->
		<p>
		<input type="file" name="filename">
		</p>
		<!-- </form> -->
		</tr>
		
		<!-- ���M�{�^�� -->
		<div id="mainform-submit">
		<!-- name�𑗐M�{�^������uregister�v�ցA,value�𑗐M����u�m�F��ʂցv�ɕύX���܂����B  -->
		<input type="submit" name="register" value="�m�F��ʂ�">
		</div>
</form>

<div id="footer">
  <a href="/php/top.php">�g�b�v�y�[�W</a>
</div>
</body>
</html>