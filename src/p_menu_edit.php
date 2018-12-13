<?php
$sname=$_GET ['sname'];
echo '<h1>'.$sname.'</h1>';
?>
<h2>メニュー編集</h2>
<?php
require_once ('db_inc.php');
$uid = $_SESSION ['uid'];
// echo $uid;
$sql = "SELECT * FROM tb_menu
		natural join tb_shop
		where sname='$sname'
		and uid='$uid'";
// $sql="INSERT INTO tb_shop VALUES (,'',,);";
$rs = mysql_query ( $sql, $conn );
//var_dump($row);
//$row = mysql_fetch_array ( $rs );
if (!empty($row)) {
	$num = mysql_num_rows ( $rs );

	echo 'メニュー名　　　　　　　値段　　　　　　　　　　　説明　　　<br>';
	for($j = 1; $j <= $num; $j ++) {
		$row = mysql_fetch_array ( $rs );
		echo '<form>
	 <input type="text" name="name"  size="20" maxlength="10" value="' . $row ['item'] . '">
	 <input type="text" name="price" size="20" maxlength="10" value="' . $row ['price'] . '">円
	 <textarea name="contents" rows="1" cols="40">' . $row ['mcontents'] . '</textarea><br>
	 ';
	}
	echo '<input type="submit" value="登録">';
}
else{
	echo 'まだ登録がありません';
}
?>