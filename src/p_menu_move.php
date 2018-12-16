<?php
$sid=$_GET['sid'];
$sname = $_GET ['sname'];
echo $sid;
echo "画面遷移";
$name = $_REQUEST['name1'];
$price = $_REQUEST['price1'];
$contents = $_REQUEST['contents1'];
echo $name.$price.$contents;
$mid_max = $_REQUEST['mid_max'];
echo $mid_max;
$i=1;
while($i<=$mid_max){
	if(!empty($_REQUEST['name'.$i])){
	$name = $_REQUEST['name'.$i];
	$price = $_REQUEST['price'.$i];
	$contents = $_REQUEST['contents'.$i];
	echo $name.$price.$contents.'<br>';
	//sqlでデータベースに入れる
	$sql="UPDATE `tb_menu`
		SET `sid`='$sid',`item`='$name',
			`price`='$price',`mid`='$i',
			`mcontents`='$contents'
			where mid='$i'
			and sid='$sid'";
	}
	$rs = mysql_query ( $sql, $conn );
	//$num = mysql_fetch_array ( $rs );
	$i++;
}
//戻る　
header( "Location:?do=p_top") ;
//header( "Location:?do=p_shop_refer&sname='$sname'&sid='$sid'") ;
//echo '<form action="?do=p_menu_edit&sname='.$sname.'&sid='.$sid.'" ></form>';
?>