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

//次のページに遷移
    header('Location:p_index.php');

//おすすめの店舗idを取得する
    echo '<h2>';
    //echo date("H:i:s").'<br>';
    $time=date("H:i:s");
    $week = array(
    		'日', //0
    		'月', //1
    		'火', //2
    		'水', //3
    		'木', //4
    		'金', //5
    		'土', //6
    );
    $date=date('w');
    $w=$week[$date];
    //$time= mb_convert_encoding($time, "UTF-8", "latin1");
    echo $w .'<br>';
    echo $time.'<br>';
    echo '</h2>';

    $sql1="
  		SELECT * FROM `tb_shop`
		WHERE not holiday='$w'
		and '$time' < close
		ORDER BY RAND() LIMIT 1
  		";
    echo $sql1;

    $rs1 = mysql_query($sql1, $conn);
    if (!$rs1) die('エラー: ' . mysql_error());
    $row1= mysql_fetch_array($rs1);
var_dump($row1);
    //ユーザテーブルにおすすめの店舗idを入れる
    $sid=$row1['sid'];
    $uid=$row['uid'];
    /*$sql2="
    UPDATE tb_user SET sid = 22 WHERE uid = "."'"."k16"."'";*/

    $sql2="
    UPDATE tb_user SET sid = '$sid'WHERE uid = '$uid'";
    $rs2 = mysql_query($sql2, $conn);
    if (!$rs2) die('エラー: ' . mysql_error());

  }else{//ログイン失敗
	//echo "ログイン失敗".'<br>';
	$_SESSION['login']=2;
    //header('Location:?do=sys_check');
	echo "ログインに失敗しました";
  }
?>
</div>
</center>