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
$rs = mysql_query ( $sql, $conn );
$mid_max=0;
if (! empty ( $row )) {
	$num = mysql_num_rows ( $rs );
	echo 'メニュー名　　　　　　値段　　　　　　　　　　　説明　　　<br>';
	echo '<form action="?do=p_menu_move&sname='. $_GET ['sname'] . '&sid='.$_GET ['sid'].'" method="post">';
	for($j = 1; $j <= $num; $j ++) {
		$row = mysql_fetch_array ( $rs );
	echo $row['mid'];
	 echo '<input type="text" name="name'.$row['mid'].'"  size="10" maxlength="10" value="' . $row ['item'] . '">
	 　<input type="text" name="price'.$row['mid'].'" size="10" maxlength="10" value="' . $row ['price'] . '">円
	 　<textarea name="contents'.$row['mid'].'" rows="1" cols="40">' . $row ['mcontents'] . '</textarea><br>';
	 if($mid_max<$row['mid']){
	 	$mid_max=$row['mid'];
	 }
	 echo '<input type="hidden" name="mid_max" value="'.$mid_max.'">';
	}
	echo '<input type="submit" value="編集"></form>';
} else {
	echo 'まだ登録がありません';
}
?>
</form>
<br>
<br>

