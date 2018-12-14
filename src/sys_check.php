<form action="?do=sys_check" method="post" class="form">
<table class="table table-hover">
	<tr>
		<td><input type="text" name="uid" class="form-control"
			style="position: absolute; left: 45%; top: 48%"></td>
	</tr>
	<tr>
		<td><input type="password" name="psword" class="form-control"
			style="position: absolute; left: 45%; top: 54%"></td>
	</tr>
</table>
<input type="submit" value="　　ロ　グ　イ　ン　　" class="btn btn-primary"
	style="position: absolute; left: 45%; top: 60%">
</form>
<?php
  require_once('inc.php'); //データベースが必要なので読み込ませる
  $u = $_POST['uid'] ;
  $p = $_POST['psword'];
 // echo $u;
 // echo $p;

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
    echo '<script> location.replace("p_index.php"); </script>';
    //header('Location:p_index.php');
    //exit;
  }else{//ログイン失敗
	echo "ログイン失敗".'<br>';
	$_SESSION['login']=2;
    //header('Location:?do=sys_check');
	echo "ログインに失敗しました。";
  }
?>
