<center>
<div class="container">
<?php
require_once ('db_inc.php');
$sname = $_GET ['sname'];
//$rpoint = $_GET ['rpoint'];
$uid = $_SESSION ['uid'];
$sql = "SELECT sid,sname,address,open,close,time,budget,holiday,uid
		From tb_shop
		WHERE sname='$sname'";
$rs = mysql_query ( $sql, $conn );
if (! $rs)
	die ( 'エラー: ' . mysql_error () );
$row = mysql_fetch_array ( $rs );
$s_uid = $row ['uid'];
$sid = $row['sid'];


$sql_a = "select round(avg (rpoint),0) as AVG from tb_review where sid='$sid'";
$rs_a = mysql_query ( $sql_a, $conn );
$row_a = mysql_fetch_array ( $rs_a );
$rpoint = $row_a['AVG'];

$sql0 = "SELECT uid,uid_kind FROM tb_user WHERE uid = '$uid'";
$rs0 = mysql_query ( $sql0 );
$row0 = mysql_fetch_array ( $rs0 );
$uid_kind = $row0 ['uid_kind'];
// $sname = $row['sname'];
echo '<br><h1>' . $sname.'<br>'.'</h1>';

echo '<h3>評価';
for($i = 0; $i < 5; $i ++) {
	if ($i < $rpoint) {
		echo '★';
	} else {
		echo '☆';
	}
}
// 各種ボタン
'</h3>';
if ($uid_kind == 0 || $uid_kind == 1) {
	if ($uid_kind == 0 || $s_uid == $uid) {
		echo '<form action="?do=p_shop_edit&sname=' . $sname . '" method="post">';
		echo '<input type="submit" onclick="location.href="p_shop_edit&sname=' . $sname . '" " value="店舗編集" / class="btn btn-info btn-sm">';
		echo '</form>';

		echo '<form action="?do=p_shop_delete&sname=' . $sname . '" method="post">';
		echo '<input type="submit" onclick="location.href="p_shop_delete&sname=' . $sname . '" " value="店舗削除" / class="btn btn-danger btn-sm">';
		echo '</form>';
	}
}
/*
echo '<form action="?do=p_review_detail" method="post">';
echo '<input type="submit" onclick="location.href="?do=p_review_detail" " value="口コミ詳細" />';
echo '</form>';
echo '<form action="?do=p_review_record" method="post">';
echo '<input type="submit" onclick="location.href="?do=p_review_record" " value="口コミ編集" />';
echo '</form>';
*/
while ( $row ) {
	// $r = $row['urole'];// ユーザ種別コード取得（数字）
	$_SESSION ['sid'] = $row ['sid'];
	echo '<center>';
	echo '<table class="table table-bordered">';
	// echo '<tr>';
	// echo '<tr><td>' .'店舗名'.'</td><td>'. $row['comment'] . '</td></tr>'; // ユーザ種別コードを名称に変換（連想配列利用）
	echo '<tr><td>' . '営業時間' . '</td><td>' . $row ['open'] . '～' . $row ['close'] . '</td></tr>';
	echo '<tr><td>' . '住所' . '</td><td>' . $row ['address'] ;
	//echo '<a href="?do=p_map"target="_blank">マップ参照</a></td>';
	echo '</tr>';
	echo '<tr><td>' . '定休日' . '</td><td>' . $row ['holiday'] . '</td></tr>';
	echo '<tr><td>' . '平均予算' . '</td><td>' . $row ['budget'] . '円' . '</td></tr>';
	echo '<tr><td>' . '所要時間' . '</td><td>' . '徒歩' . $row ['time'] . '分' . '</td></tr>';
	// echo '<td>' . '</td>';
	// echo '</tr>';
	// $n++;
	echo '</table>';
	echo '</center>';
	echo '<br>';
	// echo'<h2>メニュー</h2>';
	$row = mysql_fetch_array ( $rs );
}
$sql2 = "SELECT sid,item,price,mid,mcontents From tb_menu  WHERE sid='$sid'";
$rs2 = mysql_query ( $sql2, $conn );
$row2 = mysql_fetch_array ( $rs2 );
$item = $row2['item'];
// $num=mysql_num_rows( $rs2 );
if (! $rs2)
	die ( 'エラー: ' . mysql_error () );
echo '<center>';
echo '<table class="table table-bordered">';
echo "<tr><th>メニュー</th><th>値段</th><th>説明</th></tr>";
while ( $row2 ) {
//	$_SESSION ['sid'] = $row2 ['sid'];
	$mid = $row2['mid'];
	echo '<tr><td>' . $row2 ['item'] . '</td><td>' . $row2 ['price'] . "円" . '</td><td>' . $row2 ['mcontents'] . '</td>
		<td><a href="?do=p_menu_edit&mid=' . $mid . '&sname='.$sname.'&sid='.$sid.'">編集</a></td>
		<td><a href="?do=p_menu_delete&mid=' . $mid . '">削除</a></td></tr>';
	$row2 = mysql_fetch_array ( $rs2 );
}
echo '</table>';
echo '</center>';

if ($uid_kind == 0 || $uid_kind == 1) {
	//if ($uid_kind == 0 || $s_uid == $uid) {
	echo '<form action="?do=p_menu_refer&sname=' . $sname . '&sid='.$sid.'" method="post">';
	echo '<input type="submit" onclick="location.href="p_menu_refer&sname=' . $sname .'&sid='.$sid. '" value="メニュー追加" / class="btn btn-info btn-sm">';
	echo '</form>';
		//}
	}
	echo '<br>';
echo '<h2>口コミ</h2>';
if ($uid_kind == 0 || $uid_kind == 1) {
	//if ($uid_kind == 0 || $s_uid == $uid) {
echo '<form action="?do=p_review_record&sname=' . $_GET ['sname'] . '" method="post">';
echo '<input type="submit" onclick="location.href="p_review_record&sname=' . $_GET ['sname'] . '" " value="口コミ投稿" / class="btn btn-info btn-sm">';
echo '</form>';
	//}
}
$sql3 = "SELECT sid,rid,rpoint,comment,uid,pid,uname From tb_review Natural left join tb_user Natural left join tb_shop WHERE sid='$sid'";
$rs3 = mysql_query ( $sql3, $conn );
// if (!$rs) die ('エラー: ' . mysql_error());
$row3 = mysql_fetch_array ( $rs3 );

while ( $row3 ) {
	echo '<table class="table table-bordered">';
	echo '<tr><td><b>' . $row3 ['uname'] . '</b>';
	for($i = 0; $i < 5; $i ++) {
		if ($i < $row3 ['rpoint']) {
			echo '★';
		} else {
			echo '☆';
		}
	}
	$rid = $row3['rid'];
	echo '<br>' . $row3 ['comment'];
	echo '<br><div class="text-right"><a href="?do=p_review_detail&rid='.$rid.'">もっと見る</a></div><br></td></tr>';
	$row3 = mysql_fetch_array ( $rs3 );
}
?>
</div>
</center>