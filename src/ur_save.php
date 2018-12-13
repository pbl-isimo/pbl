<?php
require_once ('db_inc.php');
$u = $_SESSION ['uid'];
//$p = $_SESSION ['psword'];

$sql = "
SELECT * FROM tb_user
WHERE uid= '$u'
AND psword='$p'";
$rs = mysql_query ( $sql, $conn );
if (! $rs)
	die ( 'エラー: ' . mysql_error () );
$row = mysql_fetch_array ( $rs );

/*
 * $sql = "
 * SELECT * FROM tb_user
 * WHERE psword='$psword'";
 * mysql_query ( $sql, $conn );
 */
$pass0 = $_POST ['pass0'];

echo $uid;

if ($psword != $pass0) {
	echo '<h3>エラー：パスワードが一致しないので登録できません</h3>';
} else {
	if (isset ( $_POST ['act'] )) {
		$act = $_POST ['act'];
		$pass1 = $_POST ['pass1'];
		$pass2 = $_POST ['pass2'];
		if ($pass1 === $pass2) {
			$old_uid = $_POST ['uid'];
			$uid = $_POST ['uid'];
			$sql = "INSERT INTO tb_user VALUES ('{$uid}','{$pass1}')";
			if ($act == 'update') { // 既存のアカウントを編集する場合は
				$sql = "UPDATE tb_user SET uid='{$uid}',upass='{$pass1}' WHERE uid='{$old_uid}'";
			}
			mysql_query ( $sql, $conn );
			echo '<h3>アカウントが更新されました</h3>';
		} else {
			echo '<h3>エラー：パスワードが一致しないので登録できません</h3>';
		}
	}
}
?>