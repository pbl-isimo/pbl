<?php
require_once ('db_inc.php');

$u = $_SESSION ['uid'];

$sql = "
  SELECT uname, psword FROM tb_user
  WHERE uid= '$u'";

$rs = mysql_query ( $sql );
$p = mysql_fetch_assoc ( $rs );
if (! $rs)
	die ( 'エラー: ' . mysql_error () );



if ($_POST ['pass0'] != $p ['psword']) {
	echo '<h3>エラー：現在のパスワードが一致しないので登録できません</h3>';
} else {
	$pass1 = $_POST ['pass1'];
	$pass2 = $_POST ['pass2'];
	if ($pass1 == $pass2) {
		$uname = $_POST ['uname'];
		$sql2 = "UPDATE tb_user SET uname='{$uname}',psword='{$pass1}' WHERE uid='{$u}'";
		mysql_query ( $sql2, $conn );
		echo '<h3>アカウントが更新されました</h3>';
	} else {
		echo '<h3>エラー：新しいパスワードが一致しないので登録できません</h3>';
	}
}
?>