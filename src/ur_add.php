<?php
require_once ('src/db_inc.php');
$uid = $_SESSION ['uid'];
$sql = "
SELECT uname
FROM tb_user
WHERE uid='$uid'";
$rs = mysql_query ( $sql );
$uname0 = mysql_fetch_assoc ( $rs );

if (isset ( $_GET ['uid'] )) { // 既存アカウントの編集かを調べる
                          // $uid = $_GET['uid'] ;
	$sql = "SELECT * FROM tb_user WHERE uid='{$uid}'";

	$rs = mysql_query ( $sql, $conn );
	if (! $rs)
		die ( 'エラー: ' . mysql_error () );
	$row = mysql_fetch_array ( $rs );
	if ($row) { // 既存アカウントを編集するために、変数に代入
		$uname = $row ['uname'];
		$pasword = $row['psword'];
	}
}
?>
<h2>ユーザ編集</h2>
<form action="?do=ur_save" method="post">
	<center><table>
		<tr>
			<td>アカウント名変更</td>
		</tr>
		<tr>
			<td><input type="text" name="uname" value="<?php echo $uname0['uname'];?>">
			</td>
		</tr>
	</table></center>
	<h2>パスワードの変更</h2>
	<center><table>
		<tr>
			<td>現在のパスワード</td>
			<td><input type="password" name="pass0"
			></td>
		</tr>
		<tr>
			<td>新しいパスワード</td>
			<td><input type="password" name="pass1"
			></td>
		</tr>
		<tr>
			<td>新しいパスワード（再入力）</td>
			<td><input type="password" name="pass2"></td>
		</tr>
	</table></center>
	<input type="submit" value="登録">
</form>