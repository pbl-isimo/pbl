<?php
require_once ('db_inc.php');
$roles = array (
		0 => '管理者',
		1 => '社員',
		2 => 'ゲスト',
);
$cond = 1;
$checked = 0;
if (isset ( $_POST ['urole'] )) { // 絞り込みの条件$condを決める
	$checked = $_POST ['urole'];
	if ($checked != 0)
		$cond = "urole=$checked";
}
echo "<h2>アカウント一覧</h2>";
echo '<form action="?do=ur_list" method="post">';
foreach ( $roles as $id => $name ) {
	if ($checked == $id) {
		echo '<input type="radio" name="urole" value="' . $id . '" checked>' . $name;
	} else {
		echo '<input type="radio" name="urole" value="' . $id . '">' . $name;
	}
}
echo '<input type="submit" value="絞込み">';
echo '</form>';
// 絞り込みの条件$condを使って 一覧するデータを調べる
$sql = "SELECT * FROM tb_user WHERE {$cond} ORDER BY urole";
$rs = mysql_query ( $sql, $conn );
if (! $rs)
	die ( 'エラー: ' . mysql_error () );

	// 問合せ結果を表形式で出力する。
	// まず、ヘッド部分（項目名）を出力
echo '<table border=1>';
echo '<tr><th>No.</th><th>氏名</th><th>ユーザ種別</th></tr>';
$n = 1;

// 問合せ結果を一行ずつ受け取って出力する
$row = mysql_fetch_array ( $rs );
while ( $row ) {
	$r = $row ['urole']; // ユーザ種別コード取得（数字）
	$uid = $row ['uid'];
	echo '<tr>';
	echo '<td>' . $n . '</td>';
	echo '<td>' . $row ['uname'] . '</td>';
	echo '<td>' . $roles [$r] . '</td>'; // ユーザ種別コードを名称に変換（連想配列利用）
	echo '<td><a href="?do=ur_add&uid=' . $uid . '">編集</a></td>';
	echo '</tr>';
	echo '</tr>';
	$n ++;
	$row = mysql_fetch_array ( $rs );
}
echo '</table>';
?>