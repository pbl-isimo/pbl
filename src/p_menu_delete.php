<?php
require_once ('db_inc.php');
//
if (isset ( $_GET ['mid'] )) {
	$mid = $_GET ['mid'];
	// echo $mid;
	$sql = "select sid,mid,item from tb_menu where mid = $mid";
	$rs = mysql_query ( $sql );
	$row = mysql_fetch_array ( $rs );
	$sid = $row ['sid'];

	$sql1 = "select sname from tb_shop where sid = $sid";
	$rs1 = mysql_query ( $sql1 );
	$row1 = mysql_fetch_array ( $rs1 );
	$sname = $row1 ['sname'];
	echo '<h2>このメニューを本当に削除しますか?</h2>';
	echo '<a href="?do=p_menu_delete&mmid=' . $mid . '">はい</a> | <a href="?do=p_shop_refer&sname=' . $sname . '">いいえ</a>';
} else if (isset ( $_GET ['mmid'] )) {
	$mid = $_GET ['mmid'];
	$sql = "DELETE FROM tb_menu WHERE mid='{$mid}'";
	mysql_query ( $sql );
	// header('Location:?do=p_top');
	echo '<h2>メニューが削除されました</h2>';
	echo '<a href="?do=p_top">戻る</a>';
}
?>