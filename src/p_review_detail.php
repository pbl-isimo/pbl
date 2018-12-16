<h2>口コミ詳細</h2>
<?php
require_once ('db_inc.php');
$sid = $_SESSION['sid'];
$rid = $_GET['rid'];

$sql = "SELECT uname,rpoint,comment
From tb_review natural join tb_user
WHERE rid='$rid'";

$rs = mysql_query ( $sql );
$row = mysql_fetch_array ( $rs );
echo '<center>';
echo '<table border=1>';
echo '<tr><th>ユーザ名</th><th>評価</th><th>コメント</th></tr>';

while ( $row ) {
	echo '<tr>';
	echo '<td>' . $row ['uname'] . '</td>';
	echo '<td>';
	for($i = 0; $i < 5; $i ++) {
		if ($i < $row ['rpoint']) {
			echo '★';
		} else {
			echo '☆';
		}
	}
	echo '</td>';
	echo '<td>' . $row ['comment'] . '</td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs);
}
// echo '<br>'.$row['rpoint'];
echo '</table>';
echo '</center>';
echo '<br>';
echo "更新日時：";
echo date ( "Y" ) . "年" . date ( "n" ) . "月" . date ( "j" ) . "日　";
echo date ( "G" ) . ":" . date ( "i" );

?>

