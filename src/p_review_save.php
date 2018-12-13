<html>
<form action="?do=p_review_detail" method="post">
<?php
require_once ('src/db_inc.php');
$conn = mysql_connect("localhost","root","");//開発環境
mysql_select_db("pbl", $conn);
if (!$conn) {
  die('データベースに接続できませんでした。');
}

$db_selected = mysql_select_db('pbl', $conn);
if (!$db_selected) {
  die('データベースを選択できませんでした。');
}


$code = mysql_query('SET NAMES utf8', $conn);
if (!$code) {
  die('文字コードを指定できませんでした。');
}



$kanso = $_REQUEST['kanso'];
$rpoint = $_REQUEST['rpoint'];
$sql = "INSERT INTO tb_review (comment, rpoint) VALUES ('$kanso','$rpoint')";


$result_flag = mysql_query($sql);

if (!$result_flag) {
	die('INSERTクエリーが失敗しました。'.mysql_error());
}

$cnon = mysql_close($conn);
if (!$conn) {
  die('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br/><a href="?do=p_review_detail">戻る</a></p>
</body>
</form>
</html>