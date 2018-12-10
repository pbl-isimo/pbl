<?php
require_once ('db_inc.php');
if (isset ( $_POST ['act'] )) {
	$act = $_POST ['act'];
	$pass1 = $_POST ['pass1'];
	$pass2 = $_POST ['pass2'];
	if ($pass1 === $pass2) {
		$old_uid = $_POST ['uid'];
		$uid = $_POST ['uid'];
		$uname = $_POST ['uname'];
		$urole = $_POST ['urole'];
		$sql = "INSERT INTO tb_user VALUES ('{$uid}','{$uname}','{$pass1}',$urole)";
		if ($act == 'update') { // 既存のアカウントを編集する場合は
			$sql = "UPDATE tb_user SET uid='{$uid}',uname='{$uname}',upass='{$pass1}',urole=$urole WHERE uid='{$old_uid}'";
		}
		mysql_query ( $sql, $conn );
		echo '<h3>アカウントが更新されました</h3>';
	} else {
		echo '<h3>エラー：パスワードが一致しないので登録できません</h3>';
	}
}
?>