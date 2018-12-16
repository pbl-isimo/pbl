<?php
//実行
$sname = $_GET ['sname'];

$sid = $_REQUEST['sid'];
$name = $_REQUEST['name'];
$price = $_REQUEST['price'];
$contents = $_REQUEST['contents'];

echo $sid;
echo $name;
echo $price;
echo $contents.'<br>';

require_once ('db_inc.php');
$mid=1;
while($mid<1000){
$sql="SELECT count(*) FROM `tb_menu`
WHERE sid='$sid' and mid='$mid'";
$rs = mysql_query ( $sql, $conn );
$num = mysql_fetch_array ( $rs );
//echo $sql;
//var_dump($num);
	if($num['count(*)']==0){
		echo 'あたり';
		break;
	}else{
		echo 'ハズレ';
		$mid++;
	}
}
echo "メニューid".$mid;
$sql1="INSERT INTO `tb_menu`(`sid`, `item`, `price`, `mid`, `mcontents`)
		VALUES ('$sid','$name','$price','$mid','$contents')";
$rs1 = mysql_query ( $sql1, $conn );
header( "Location:?do=p_top") ;
//header( "Location:?do=p_shop_refer&sname='$sname'&sid='$sid'") ;
//header( "Location: https://blog.codecamp.jp/color_pattern" ) ;
?>