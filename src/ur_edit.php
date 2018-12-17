<center>
<div class="container">
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
	<center>
	<table class="table table-bordered">
		<tr>
			<td><div class="text-center">アカウント名変更　　　　　</div></td>
			<td><div class="text-center"><input type="text" name="uname" value="<?php echo $uname0['uname'];?>"></div>
			</td>
		</tr>
		</table></center>
	<h2>パスワードの変更</h2>
			<center>
	<table class="table table-bordered">
		<tr>
			<td><div class="text-center">現在のパスワード</div></td>
			<td><div class="text-center"><input type="password" name="pass0"
			></div></td>
		</tr>
		<tr>
			<td><div class="text-center">新しいパスワード</div></td>
			<td><div class="text-center"><input type="password" name="pass1"
			></div></td>
		</tr>
		<tr>
			<td><div class="text-center">新しいパスワード（再入力）</div></td>
			<td><div class="text-center"><input type="password" name="pass2"></div></td>
		</tr>
	</table></center>
	<input type="submit" value="登録" class="btn btn-info btn-sm">
</form>
</div>
</center>