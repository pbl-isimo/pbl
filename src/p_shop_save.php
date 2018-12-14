<html>
<form action="?do=p_shop_refer" method="post">

<?php



//var_dump($_POST);


require_once('db_inc.php');
$coon=mysql_connect("localhost","root");
mysql_select_db("pbl",$conn);

//$uid = $_SESSION ['uid'];
//echo $uid;

$sname=$_POST['sname'];


//$sid=$_POST['sid'];
$address = $_POST['address'];

$open = $_POST['open'];
$close = $_POST['close'];
$time = $_POST['time'];
$budget = $_POST['budget'];
$holiday = $_POST['holiday'];
//$uid = $_POST['uid'];

if($sname==""){
	echo "店舗名が入力されていません";
}else if($address==""){
	echo "住所が入力されていません";
}else{
	$sql = "INSERT INTO tb_shop (sname,address,open,close,time,budget,holiday) VALUES
	('$sname','$address','$open','$close','$time','$budget','$holiday')";
	echo '<h3>登録されました</h3>';
}



$result_flag = mysql_query($sql);


$cnon = mysql_close($conn);



?>

</body>
</form>
</html>