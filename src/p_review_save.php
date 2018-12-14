<html>
<form action="?do=p_review_detail" method="post">
<?php
require_once ('src/db_inc.php');
$conn = mysql_connect ( "localhost", "root", "" ); // 開発環境
mysql_select_db ( "pbl", $conn );
if (! $conn) {
	die ( 'データベースに接続できませんでした。' );
}

$db_selected = mysql_select_db ( 'pbl', $conn );
if (! $db_selected) {
	die ( 'データベースを選択できませんでした。' );
}

$code = mysql_query ( 'SET NAMES utf8', $conn );
if (! $code) {
	die ( '文字コードを指定できませんでした。' );
}

$sql = "select MAX(rid) as Mrid from tb_review";
$rs = mysql_query ( $sql );
$r = mysql_fetch_assoc ( $rs );
$rid = $r ['Mrid'] + 1;

//echo $rid;
$sid = $_SESSION['sid'];
$uid = $_SESSION ['uid'];
$kanso = $_POST ['kanso'];
$rpoint = $_POST ['rpoint'];

if ($rpoint == "selected") {
	echo '<h3>エラー:評価点を選択してください</h3>';
} else {
	if ($kanso == "") {
		echo '<h3>エラー:コメントを入力してください</h3>';
	} else {
		$sql = "INSERT INTO tb_review (rid,rpoint,comment,sid,uid ) VALUES ('$rid','$rpoint','$kanso','$sid','$uid')";
		$result_flag = mysql_query ( $sql );
		echo '<h3>登録が完了しました</h3>';
	}
}

/*
if (! $result_flag) {
	die ( 'INSERTクエリーが失敗しました。' . mysql_error () );
}
*/

$cnon = mysql_close ( $conn );
if (! $conn) {
	die ( 'データベースとの接続を閉じられませんでした。' );
}

?>
<p>
		<br /> <a href="?do=p_review_detail">戻る</a>
	</p>
	</body>
</form>
</html>