<?php
require_once('src/db_inc.php');
$uid=$_SESSION['uid'];
$sname=$_GET['sname'];

$sql="SELECT sname,address,open,close,holiday,budget,time,uid
FROM tb_shop NATURAL LEFT JOIN tb_user
WHERE sname='{$sname}'";

$rs = mysql_query ( $sql,$conn);
//$row = mysql_fetch_array ( $rs );

if(isset($_GET['sname'])){
	$sname=$_GET['sname'];
	$sql1 = "SELECT*FROM tb_shop WHERE sname='{$sname}'";
	$rs1=mysql_query($sql1,$conn);
if (! $rs1)
		die ( 'エラー: ' . mysql_error () );
	$row = mysql_fetch_array ( $rs1 );
	if ($row) { // 既存アカウントを編集するために、変数に代入
		$sname = $row['sname'];
		$address = $row['address'];
		$holiday = $row['holiday'];
		$open = $row['open'];
		$close = $row['close'];
		$time = $row['time'];
		$budget = $row['budget'];
	}
}
//echo '名前　　　<input type="text" name="snamae" size="20" maxlength="10" value="'.$sname.'"><br>';
?>

<h2>店舗編集</h2>
<form action="?do=p_shop_save" method="post">
名前　　　<input type="text" name="sname" size="20" maxlength="10" value="<?php echo $sname;?>"><br>
住所　　　<input type="text" name="address" size="70" maxlength="50" value="<?php echo $address;?>"><br>
定休日　　<input type="text" name="holiday" size="4" maxlength="2" value="<?php echo $holiday;?>">曜日<br>
営業時間　<input type="text" name="open" size="4" maxlength="20"value="<?php echo $open;?>">
～<input type="text" name="close" size="4" maxlength="20" value="<?php echo $close;?>"><br>
所要時間　徒歩　<input type="text" name="time" size="4" maxlength="2" value="<?php echo $time;?>">分<br>
平均予算　<input type="text" name="budget" size="4" maxlength="5" value="<?php echo $budget;?>">円<br>

<input type="submit" value="登録">
</form>