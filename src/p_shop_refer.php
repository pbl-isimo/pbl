<?php

require_once ('db_inc.php');
$sname=$_GET['sname'];



$sql="SELECT sid,sname,address,open,close,time,budget,holiday,uid,rpoint
		From tb_shop natural left join tb_review
		WHERE sname='$sname'";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());

echo '<table border=1>';

$row = mysql_fetch_array($rs) ;
echo '<h1>'.$sname;
for($i=0;$i<5;$i++){
	if($i<$row ['rpoint']){
		echo '★';
	}else{
		echo '☆';
	}
}
'</h1>';
while ($row) {
	//$r  = $row['urole'];// ユーザ種別コード取得（数字）
	$_SESSION['sid']   = $row['sid'];


	echo '<tr>';
	//echo '<tr><td>' .'店舗名'.'</td><td>'. $row['sname'] . '</td></tr>'; // ユーザ種別コードを名称に変換（連想配列利用）
	echo '<tr><td>' .'営業時間'.'</td><td>'. $row['open'] . '～'.$row['close'].'</td></tr>';
	echo '<tr><td>' .'住所'.'</td><td>'. $row['address'] . '</td></tr>';
	echo '<tr><td>' .'定休日'.'</td><td>'. $row['holiday'] . '</td></tr>';
	echo '<tr><td>' .'平均予算'.'</td><td>'. $row['budget'] .'円'. '</td></tr>';
	echo '<tr><td>' .'所要時間'.'</td><td>'. $row['time'] .'分'. '</td></tr>';
	//echo '<td>'  . '</td>';
	echo '</tr>';
	//$n++;
	$row = mysql_fetch_array($rs);
}

echo '</table>';


echo '
<br>
<a href="?do=p_review_record">口コミ編集</a>
<br>
<a href="?do=p_review_detail">口コミ情報</a>
<br>
<a href="?do=p_menu_edit&sname=' . $_GET ['sname'] . '">メニュー編集</a>
<br>
<a href="?do=p_menu_refer&sname=' . $_GET ['sname'] . '">メニュー登録</a>
<br>
<a href="?do=p_shop_edit">店舗編集</a>
<br>
<a href="?do=p_map"target="_blank">マップ参照</a>
';
?>