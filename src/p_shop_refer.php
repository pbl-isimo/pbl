<?php
require_once ('db_inc.php');

$sname = $_GET ['sname'];
// $sid = $_SESSION ['sid'];
$uid = $_SESSION ['uid'];

$sql = "SELECT sid,sname,address,open,close,time,budget,holiday,uid,rpoint,rid,comment,pid,uname
		From tb_shop natural left join tb_review natural left join tb_user
		WHERE sname='$sname'";
$rs = mysql_query ( $sql, $conn );
if (! $rs)
	die ( 'エラー: ' . mysql_error () );
$row = mysql_fetch_array ( $rs );
$s_uid = $row ['uid'];

$sql0 = "SELECT uid,uid_kind FROM tb_user WHERE uid = '$uid'";
$rs0 = mysql_query ( $sql0 );
$row0 = mysql_fetch_array ( $rs0 );
$uid_kind = $row0 ['uid_kind'];

// $sname = $row['sname'];
echo '<h1>' . $sname;
for($i = 0; $i < 5; $i ++) {
	if ($i < $row ['rpoint']) {
		echo '★';
	} else {
		echo '☆';
	}
}

// 各種ボタン
'</h1>';
if ($uid_kind == 0 || $uid_kind == 1) {
	if ($uid_kind == 0 || $s_uid == $uid) {
		echo '<form action="?do=p_shop_edit&sname=' . $sname . '" method="post">';
		echo '<input type="submit" onclick="location.href="p_shop_edit&sname=' . $sname . '" " value="店舗編集" />';
		echo '</form>';

		echo '<form action="?do=p_shop_delete&sname=' . $sname . '" method="post">';
		echo '<input type="submit" onclick="location.href="p_shop_delete&sname=' . $sname . '" " value="店舗削除" />';
		echo '</form>';
	}
}

echo '<form action="?do=p_review_detail" method="post">';
echo '<input type="submit" onclick="location.href="?do=p_review_detail" " value="口コミ詳細" />';
echo '</form>';

echo '<form action="?do=p_review_record" method="post">';
echo '<input type="submit" onclick="location.href="?do=p_review_record" " value="口コミ編集" />';
echo '</form>';

while ( $row ) {
	// $r = $row['urole'];// ユーザ種別コード取得（数字）
	$_SESSION ['sid'] = $row ['sid'];

	echo '<table border=1>';
	// echo '<tr>';
	// echo '<tr><td>' .'店舗名'.'</td><td>'. $row['comment'] . '</td></tr>'; // ユーザ種別コードを名称に変換（連想配列利用）
	echo '<tr><td>' . '営業時間' . '</td><td>' . $row ['open'] . '～' . $row ['close'] . '</td></tr>';
	echo '<tr><td>' . '住所' . '</td><td>' . $row ['address'] . '<a href="?do=p_map"target="_blank">マップ参照</a></td></tr>';
	echo '<tr><td>' . '定休日' . '</td><td>' . $row ['holiday'] . '</td></tr>';
	echo '<tr><td>' . '平均予算' . '</td><td>' . $row ['budget'] . '円' . '</td></tr>';
	echo '<tr><td>' . '所要時間' . '</td><td>' . '徒歩' . $row ['time'] . '分' . '</td></tr>';

	// echo '<td>' . '</td>';
	// echo '</tr>';
	// $n++;

	echo '</table>';

	echo '<br>';

	// echo'<h2>メニュー</h2>';

	$sql2 = "SELECT sid,item,price,mcontents From tb_menu Natural Join tb_shop WHERE sname='$sname'";
	$rs2 = mysql_query ( $sql2, $conn );

	$row = mysql_fetch_array ( $rs2 );
	// $num=mysql_num_rows( $rs2 );

	if (! $rs2)
		die ( 'エラー: ' . mysql_error () );
	echo '<table border=1>';
	echo "<tr><th>メニュー</th></tr>";
	while ( $row ) {
		$_SESSION ['sid'] = $row ['sid'];

		echo '<tr><td>' . $row ['item'] . '</td><td>' . $row ['price'] . "円" . '</td><td>' . $row ['mcontents'] . '</td>
		<td><a href="?do=p_menu_edit&sname=' . $_GET ['sname'] . '">編集</a></td>
		<td><a href="?do=p_menu_delete&sname=' . $_GET ['sname'] . '">削除</a></td></tr>';

		$row = mysql_fetch_array ( $rs2 );
	}
	echo '</table>';

	echo '<form action="?do=p_menu_refer&sname=' . $_GET ['sname'] . '" method="post">';
	echo '<input type="submit" onclick="location.href="p_menu_refer&sname=' . $_GET ['sname'] . '" " value="メニュー追加" />';
	echo '</form>';

	echo '<h2>口コミ</h2>';

	echo '<form action="?do=p_review_record&sname=' . $_GET ['sname'] . '" method="post">';
	echo '<input type="submit" onclick="location.href="p_review_record&sname=' . $_GET ['sname'] . '" " value="口コミ投稿" />';
	echo '</form>';

	$sql3 = "SELECT sid,rid,rpoint,comment,uid,pid,uname From tb_review Natural left join tb_user Natural left join tb_shop WHERE sname='$sname'";
	$rs3 = mysql_query ( $sql3, $conn );
	// if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array ( $rs3 );
	while ( $row ) {
		echo '<b>' . $row ['uname'] . '</b>';
		for($i = 0; $i < 5; $i ++) {
			if ($i < $row ['rpoint']) {
				echo '★';
			} else {
				echo '☆';
			}
		}

		echo '<br>' . $row ['comment'];
		echo '<br><a href="?do=p_review_detail&uid">もっと見る</a>';

		$row = mysql_fetch_array ( $rs3 );
	}
	$row = mysql_fetch_array ( $rs );
}

/*
 * echo '
 * <br>
 * <br>
 * <a href="?do=p_review_record' . $_GET ['sname'] . '">口コミ編集</a>
 * <br>
 * <a href="?do=p_review_detail' . $_GET ['sname'] . '">口コミ情報</a>
 * <br>
 * <a href="?do=p_menu_edit&sname=' . $_GET ['sname'] . '">メニュー編集</a>
 * <br>
 * <a href="?do=p_menu_refer&sname=' . $_GET ['sname'] . '">メニュー登録</a>
 * <br>
 * <a href="?do=p_shop_edit&sname='.$_GET['sname'].'">店舗編集</a>
 * <br>
 * <a href="?do=p_map"target="_blank">マップ参照</a>
 * ';
 */
?>