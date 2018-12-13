<form action="?do=p_review_detail" method="post">
<?php
require_once ('src/db_inc.php');
$conn = mysql_connect("localhost","root","");//開発環境
mysql_select_db("pbl", $conn);
if (!$conn) {
  die('データベースに接続できませんでした。');
}

print('<p>接続に成功しました。</p>');

$db_selected = mysql_select_db('pbl', $conn);
if (!$db_selected) {
  die('データベースを選択できませんでした。');
}

print('<p>pblデータベースを選択しました。</p>');

$code = mysql_query('SET NAMES utf8', $conn);
if (!$code) {
  die('文字コードを指定できませんでした。');
}

$kanso = $_REQUEST['kanso'];


print('<p>データを追加します。</p>');

$sql = "INSERT INTO tb_review (comment) VALUES ('$kanso')";
$result_flag = mysql_query($sql);

if (!$result_flag) {
	die('INSERTクエリーが失敗しました。'.mysql_error());
}

/*
$result = mysql_query("SELECT * FROM `tb_review` VALUES('$kanso')", $conn);
if (!$result) {
  die('データを登録できませんでした。');
}
*/
$cnon = mysql_close($conn);
if (!$conn) {
  die('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="p_review_detail.php">戻る</a></p>
</body>
</form>
</html>