<meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
ここは
<a href="?do=p_search_result">検索結果表示画面</a>
です。
<?php
require_once ('src/db_inc.php');
//phpinfo();
$sql = "
			SELECT * FROM tb_shop
			natural left join tb_review
			"; // sidは他の選択も出来るように
$rs = mysql_query ( $sql, $conn );
//var_dump ( $rs);
$num=mysql_num_rows( $rs );
for($j=1;$j<=$num;$j++) {
$row = mysql_fetch_array ( $rs );
/*
var_dump ( $row3 );
$row2 = mysql_fetch_array ( $rs );
var_dump ( $row2 );*/

	echo '<h2><a href="?do=p_shop_refer&sname=' . $row ['sname'] . '">'
		. $row ['sname'] . '</a>　　';
	//echo '評価数' . $row ['rpoint'] . '<br>';
	for($i=0;$i<5;$i++){
		if($i<$row ['rpoint']){
			echo '★';
		}else{
			echo '☆';
		}
	}
	echo '</h2>';
	//echo $row ['rpoint'];
	echo '営業時間　' . $row ['open'] . '～' . $row ['close'] . '<br>';
	echo '定休日：' . $row ['holiday'] . '<br>';
	echo '所要時間：徒歩' . $row ['time'] . '分<br>';
	echo '予算：' . $row ['budget'] . '～<br><br><br>';
}
?>