<?php
require_once ('db_inc.php');

$uname0 = $_POST ['uname'];
$u = $_SESSION ['uid'];
$people = 0;

$sql = "
  SELECT uname, psword FROM tb_user
  WHERE uid= '$u'";

$rs = mysql_query ( $sql );
$p = mysql_fetch_assoc ( $rs );
if (! $rs)
	die ( 'エラー: ' . mysql_error () );

if ($_POST ['uname'] != $p ['uname']) {
	$sql1 = "
SELECT COUNT(*) AS people FROM tb_user
WHERE uname = '$uname0'";
	$rs1 = mysql_query ( $sql1 );
	$userp = mysql_fetch_assoc ( $rs1 );
	$people = $userp['people'];
}

if ($people >= 1) {
	echo '<h3>エラー:アカウント名が重複しています</h3>';
} else if($people == 0) {
	if ($_POST ['uname'] == "") {
		echo '<h3>エラー:アカウント名が入力されていません</h3>';

	} else {
		if ($_POST ['pass0'] != $p ['psword']) {
			echo '<h3>エラー：現在のパスワードが一致しないので登録できません</h3>';
//			echo $u['people'];
		} else {
			$pass1 = $_POST ['pass1'];
			$pass2 = $_POST ['pass2'];
			if ($pass1 == $pass2) {
				$uname = $_POST ['uname'];
				$sql2 = "UPDATE tb_user SET uname='$uname',psword='$pass1' WHERE uid='{$u}'";
				mysql_query ( $sql2);
				echo '<h3>アカウントが更新されました</h3>';
				echo '<a href="?do=p_top">戻る</a>';
			} else {
				echo '<h3>エラー：新しいパスワードが一致しないので登録できません</h3>';
			}
		}
	}
}

?>