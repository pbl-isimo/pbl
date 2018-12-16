<center>
<div class="container">
<h2>店舗登録</h2>
＊がついているところは必須入力
<form action="?do=p_shop_new_save" method="post">
<table class="table table-bordered">
<tr><td>*名前</td><td><input type="text" name="sname" size="20" maxlength="10" placeholder="食事処"><br></td></tr>
<tr><td>*住所</td><td><input type="text" name="address" size="70" maxlength="50" placeholder="福岡県福岡市"><br></td></tr>
<tr><td>定休日</td><td><input type="text" name="holiday" size="4" maxlength="2" placeholder="木">曜日<br></td></tr>
<tr><td>営業時間</td><td><input type="text" name="open" size="4" maxlength="20" placeholder="12:00">
～<input type="text" name="close" size="4" maxlength="20" placeholder="18:00"><br></td></tr>
<tr><td>所要時間　徒歩</td><td><input type="text" name="time" size="4" maxlength="2" placeholder="5">分<br></td></tr>
<tr><td>平均予算</td><td><input type="text" name="budget" size="4" maxlength="5"  placeholder="800">円<br></td></tr>

<?php


require_once ('db_inc.php');
$uid = $_SESSION ['uid'];
$sid_max=0;
$sql="
		SELECT * FROM tb_shop";
$rs = mysql_query ( $sql, $conn );
$num = mysql_num_rows ( $rs );//データベースに何行有るか
if($num!=0){//
	for($j = 1; $j <= $num; $j ++) {//行数分回す
		$row = mysql_fetch_array ( $rs );
		if($sid_max<$row['sid']){
			$sid_max=$row['sid'];
		}
	}
}
echo '<input type="hidden" name="sid_max" value="'.$sid_max.'">';
//echo $uid;
/*
$sql="INSERT INTO `pbl`.`tb_shop`
		(`sname`, `sid`, `address`, `open`, `close`, `time`, `budget`, `holiday`, `uid`)
		VALUES ('いろどり', '7','福岡県	北九州市八幡東区	川淵町	3-9	川淵町プレシャス301 ',
		'10:00:00', '21:00:00', '3', '1000', 'なし', '$uid');";
$rs = mysql_query ( $sql, $conn );*/
//$row = mysql_fetch_array ( $rs );
?>
</table>
<input type="submit" value="登録"  class="btn btn-info btn-sm">
</form>
</div>
</center>