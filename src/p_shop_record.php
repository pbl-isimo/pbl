<h2>店舗登録</h2>
<form action="" method="">
名前　　　<input type="text" name="namae" size="20" maxlength="10"><br>
住所　　　<input type="text" name="namae" size="70" maxlength="50"><br>
定休日　　<input type="text" name="namae" size="4" maxlength="2">曜日<br>
営業時間　<input type="text" name="namae" size="4" maxlength="20">
～<input type="text" name="namae" size="4" maxlength="20"><br>
所要時間　徒歩　<input type="text" name="namae" size="4" maxlength="2">分<br>
平均予算　<input type="text" name="namae" size="4" maxlength="5">円<br>
福岡県	北九州市八幡東区	川淵町	3-9	川淵町プレシャス301
<?php
require_once ('db_inc.php');
$uid = $_SESSION ['uid'];
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