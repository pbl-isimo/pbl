<center>
<div class="container">
<meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
ここは
<a href="?do=p_search_result">検索結果表示画面</a>
です。<br><br>


<form method = "POST" action = "?do=p_search_result">
<select id="sel">
	<option value="high hyouka">評価が高い</option>
	<option value="short time">所要時間が短い</option>
	<option value="few yosan">予算が少ない</option>
	<option value="many yosan">予算が多い</option>
</select>
<input type = "submit" name  = "sort_button" value = "並び替える">

</form>
<?php
$sql = "
			SELECT * FROM tb_shop

			"; // sidは他の選択も出来るように
$rs = mysql_query ( $sql, $conn );
// var_dump ( $rs);
$row = mysql_fetch_array ( $rs );

while ($row){
	echo '<table class="table table-bordered">';
	echo '<tr><td>';
	echo '<center>';
	$sid = $row['sid'];
	$sql1 ="select round(avg (rpoint),0) as AVG from tb_review where sid='$sid'";
	$rs1 = mysql_query ( $sql1, $conn );
	$row1 = mysql_fetch_array ( $rs1 );
	echo '<h2><a href="?do=p_shop_refer&sname=' . $row ['sname'] . '&sid=' . $row ['sid'] .
	'&rpoint=' . $row1 ['AVG'] .'">' . $row ['sname'] . '</a>　　';
	// echo '評価数' . $row ['rpoint'] . '<br>';
	for($i = 0; $i < 5; $i ++) {
		if ($i < $row1 ['AVG']) {
			echo '★';
		} else {
			echo '☆';
		}
	}
	echo '</h2>';
	// echo $row ['rpoint'];
	echo '営業時間　' . $row ['open'] . '～' . $row ['close'] . '<br>';
	echo '定休日：' . $row ['holiday'] . '<br>';
	echo '所要時間：徒歩' . $row ['time'] . '分<br>';
	echo '予算：' . $row ['budget'] . '～<br>';
	$row = mysql_fetch_array ( $rs );
	//$row1 = mysql_fetch_array ( $rs1 );
	echo '</center>';
	echo '</tr></td>';
	echo '</table>';
}
?>