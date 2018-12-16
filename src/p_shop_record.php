<h2>店舗登録</h2>
＊がついているところは必須入力
<form action="?do=p_shop_new_save" method="post">
*名前　　　<input type="text" name="sname" size="20" maxlength="10"><br>
*住所　　　<input type="text" name="address" size="70" maxlength="50"><br>
定休日　　<input type="text" name="holiday" size="4" maxlength="2">曜日<br>
営業時間　<input type="text" name="open" size="4" maxlength="20">
～<input type="text" name="close" size="4" maxlength="20"><br>
所要時間　徒歩　<input type="text" name="time" size="4" maxlength="2">分<br>
平均予算　<input type="text" name="budget" size="4" maxlength="5">円<br>

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
<input type="submit" value="登録">
</form>