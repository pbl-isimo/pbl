<center>
<div class="container">
<form action="?do=sys_check" method="post" class="form">
<table class="table table-bordered">

	<tr><td><input type="text" name="uid" class="form-control"placeholder="ユーザID"></td></tr>
	<tr><td><input type="password" name="psword" class="form-control"placeholder="パスワード"></td></tr>
	<tr><td><div class="text-center"><input type="submit" value="　　ロ　グ　イ　ン　　" class="btn btn-primary"></div></td></tr>

	</table>
</form>
<?php
  require_once('inc.php'); //データベースが必要なので読み込ませる
  $u = $_POST['uid'] ;
  $p = $_POST['psword'];

  $sql = "
  SELECT * FROM tb_user
  WHERE uid= '$u'
  AND psword='$p'";
  $rs = mysql_query($sql, $conn);
  if (!$rs) die('エラー: ' . mysql_error());
  $row= mysql_fetch_array($rs);

  if ($row){ //ログイン成功
  	//echo "ログイン成功";
    $_SESSION['uid']   = $row['uid'];
    $_SESSION['uname'] = $row['uname'];
    $_SESSION['uid_kind'] = $row['uid_kind'];
    $_SESSION['login']=1;
    header('Location:p_index.php');
  }else{//ログイン失敗
	//echo "ログイン失敗".'<br>';
	$_SESSION['login']=2;
    //header('Location:?do=sys_check');
	echo "ログインに失敗しました";
  }
?>
</div>
</center>