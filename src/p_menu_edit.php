<center>
<div class="container">
<?php
$sname=$_GET ['sname'];
echo '<h1>'.$sname.'</h1>';
echo '<h2>メニュー編集</h2>';
require_once ('db_inc.php');
$uid = $_SESSION ['uid'];
// echo $uid;
$sql = "SELECT * FROM tb_menu
		natural join tb_shop
		where sname='$sname'";
$rs = mysql_query ( $sql, $conn );
$mid_max=0;
if (! empty ( $row )) {
	echo '<center>';
	echo '<table class="table table-bordered">';
	$num = mysql_num_rows ( $rs );
	echo '<tr><td>メニュー名</td><td>値段</td><td>説明</td></tr><br>';
	echo '<form action="?do=p_menu_move&sname='. $_GET ['sname'] . '&sid='.$_GET ['sid'].'" method="post">';
	for($j = 1; $j <= $num; $j ++) {
		$row = mysql_fetch_array ( $rs );
		//echo $row['mid'];
	 echo '<tr><td><div class="text-center"><input type="text" name="name'.$row['mid'].'"  size="10" maxlength="10" value="' . $row ['item'] . '">
	 </div></td><td><div class="text-center"><input type="text" name="price'.$row['mid'].'" size="10" maxlength="10" value="' . $row ['price'] . '">円
	 </div></td><td><div class="text-center"><textarea name="contents'.$row['mid'].'" rows="1" cols="60">' . $row ['mcontents'] . '</textarea></div></td></tr><br>';
	 if($mid_max<$row['mid']){
	 	$mid_max=$row['mid'];
	 }
	 echo '<input type="hidden" name="mid_max" value="'.$mid_max.'">';
	}
	echo '</table>';
	echo '</center>';
	echo '<input type="submit" value="編集" class="btn btn-info btn-sm"></form>';
} else {
	echo 'まだ登録がありません';
}
?>
</form>
<br>
<br>
</div>
</center>
