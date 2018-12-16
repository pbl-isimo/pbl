
<?php
require_once ('db_inc.php');
if (isset ( $_POST ['act'] )) {
	$act = $_POST ['act'];
	$uid = $_POST ['uid'];
	$uname = $_POST ['uname'];
	$type = $_POST ['type'];


	$sql="select psword from tb_user where uid = '$uid'";
	$rs  = mysql_query ( $sql, $conn );
	$row = mysql_fetch_array($rs);
	$cur_ps = $row['psword'];

	if($act == 'update'){
		$old_ps = $_POST['old_ps'];
		if ($old_ps === $cur_ps){
			if ($_POST ['new_ps1'] === $_POST ['new_ps2']) {
				$old_ps = $_POST ['old_ps'];
				$pass1 = $_POST ['new_ps1'];
				$pass2 = $_POST ['new_ps2'];
				$sql = "SELECT psword FROM tb_user WHERE uid='{$uid}'";
				$rs = mysql_query ( $sql, $conn );
				$row = mysql_fetch_array($rs);
				$cur_ps = $row['psword'];
				$sql = "UPDATE tb_user SET uid='{$uid}',uname='{$uname}',psword='{$pass1}',uid_kind='{$type}' WHERE uid='{$uid}'";
				mysql_query ( $sql, $conn );
				echo '<h3>アカウントが更新されました</h3>';
			} else {
				echo '<h3>エラー：新しいパスワードが一致しないので登録できません</h3>';
			}
		}else{
			echo '<h3>エラー：現在のパスワードが一致しないので登録できません</h3>';
		}
	}
	if($act == 'insert'){
		$pass = $_POST ['new_ps'];
		$sql = "INSERT INTO tb_user VALUES ('{$uid}','{$pass}',{$type},'{$uname}')";
		mysql_query ( $sql, $conn );
		echo '<h3>アカウントが追加されました</h3>';
	}
}
?>
